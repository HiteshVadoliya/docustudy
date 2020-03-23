// Adds an entry to our debug area
function ui_add_log(message, color)
{
	var d = new Date();

	var dateString = (('0' + d.getHours())).slice(-2) + ':' +
	(('0' + d.getMinutes())).slice(-2) + ':' +
	(('0' + d.getSeconds())).slice(-2);

	color = (typeof color === 'undefined' ? 'muted' : color);

	var template = $('#debug-template').text();
	template = template.replace('%%date%%', dateString);
	template = template.replace('%%message%%', message);
	template = template.replace('%%color%%', color);

	$('#debug').find('li.empty').fadeOut(); // remove the 'no messages yet'
	$('#debug').prepend(template);
}

// Creates a new file and add it to our list
function ui_multi_add_file(id, file, element)
{
	var template = $('#files-template').text();
	template = template.replace('%%filename%%', file.name);

	template = $(template);
	template.prop('id', 'uploaderFile' + id);
	template.data('file-id', id);

	/*$('#files').find('li.empty').fadeOut();
	$('#files').prepend(template);*/
	$(element).find('#files').find('li.empty').fadeOut();
	$(element).find('#files').prepend(template);
}

// Changes the status messages on our list
function ui_multi_update_file_status(id, status, message)
{
	$('#uploaderFile' + id).find('span').html(message).prop('class', 'status text-' + status);
	/*let html = '<div class="status text-'+message+'">'+status+'</div>';
	$(id).append(html);*/
}

// Updates a file progress, depending on the parameters it may animate it or change the color.
function ui_multi_update_file_progress(id, percent, color, active)
{
	color = (typeof color === 'undefined' ? false : color);
	active = (typeof active === 'undefined' ? true : active);

	var bar = $('#uploaderFile' + id).find('div.progress-bar');

	bar.width(percent + '%').attr('aria-valuenow', percent);
	bar.toggleClass('progress-bar-striped progress-bar-animated', active);

	if (percent === 0){
		bar.html('');
	} else {
		bar.html(percent + '%');
	}

	if (color !== false){
		bar.removeClass('bg-success bg-info bg-warning bg-danger');
		bar.addClass('bg-' + color);
	}
}

// Toggles the disabled status of Star/Cancel buttons on one particual file
function ui_multi_update_file_controls(id, start, cancel, wasError)
{
	wasError = (typeof wasError === 'undefined' ? false : wasError);

	$('#uploaderFile' + id).find('button.start').prop('disabled', !start);
	$('#uploaderFile' + id).find('button.cancel').prop('disabled', !cancel);

	if (!start && !cancel) {
		$('#uploaderFile' + id).find('.controls').fadeOut();
	} else {
		$('#uploaderFile' + id).find('.controls').fadeIn();
	}

	if (wasError) {
		$('#uploaderFile' + id).find('button.start').html('Retry');
	}
}

function ui_single_update_active(element, active)
{
	element.find('div.progress').toggleClass('d-none', !active);
	element.find('input[type="text"]').toggleClass('d-none', active);

	element.find('input[type="file"]').prop('disabled', active);
	element.find('.btn').toggleClass('disabled', active);

	element.find('.btn i').toggleClass('fa-circle-o-notch fa-spin', active);
	element.find('.btn i').toggleClass('fa-folder-o', !active);
}

function ui_single_update_progress(element, percent, active)
{
	active = (typeof active === 'undefined' ? true : active);

	var bar = element.find('div.progress-bar');

	bar.width(percent + '%').attr('aria-valuenow', percent);
	bar.toggleClass('progress-bar-striped progress-bar-animated', active);

	if (percent === 0){
		bar.html('');
	} else {
		bar.html(percent + '%');
	}
}

function ui_single_update_status(element, message, color)
{
	color = (typeof color === 'undefined' ? 'muted' : color);
	element.find('small.status').prop('class','status text-' + color).html(message);
	let html = '<div class="status text-'+color+'">'+message+'</div>';
	$(element).append(html);
}