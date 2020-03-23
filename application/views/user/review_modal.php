
<?php 
$sesssion = $this->session->get_userdata('DS_USER');
if($sesssion["DS_USER"]){ ?>
<div class="modal fade bannerformmodal" id="reviewmodal_popup" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
		  	<form id="reviewform" method="POST" name="reviewform">
		    	
		    	<div class="modal-content">      
			        <div class="modal-header">
			          <h4 class="modal-title" id="myModalLabel">Leave a Review</h4>
			          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        </div>
			        <div class="modal-body">
			          
			            <div class="form-group">              
			                <label>How you would rate <?php echo  $doc_detail['title'] ?> ? This rating will remain anonymous. *</label>
			                <div class="list-style-none form-review-stars">
			                    <span style="cursor: pointer;">
			                        <div class="rating-symbol" style="display: inline-block; position: relative;">
			                            <div class="rating-symbol-background far fa-star fa-2x" style="visibility: visible;"></div>
			                            <div class="rating-symbol-foreground" style="display: inline-block; position: absolute; overflow: hidden; left: 0px; right: 0px; top: 0px; width: 0px;"><span class="fa fa-star fa-2x" style="color: rgb(115, 207, 66);"></span></div>
			                        </div>
			                        <div class="rating-symbol" style="display: inline-block; position: relative;">
			                            <div class="rating-symbol-background far fa-star fa-2x" style="visibility: visible;"></div>
			                            <div class="rating-symbol-foreground" style="display: inline-block; position: absolute; overflow: hidden; left: 0px; right: 0px; top: 0px; width: 0px;"><span class="fa fa-star fa-2x" style="color: rgb(115, 207, 66);"></span></div>
			                        </div>
			                        <div class="rating-symbol" style="display: inline-block; position: relative;">
			                            <div class="rating-symbol-background far fa-star fa-2x" style="visibility: visible;"></div>
			                            <div class="rating-symbol-foreground" style="display: inline-block; position: absolute; overflow: hidden; left: 0px; right: 0px; top: 0px; width: 0px;"><span class="fa fa-star fa-2x" style="color: rgb(115, 207, 66);"></span></div>
			                        </div>
			                        <div class="rating-symbol" style="display: inline-block; position: relative;">
			                            <div class="rating-symbol-background far fa-star fa-2x" style="visibility: visible;"></div>
			                            <div class="rating-symbol-foreground" style="display: inline-block; position: absolute; overflow: hidden; left: 0px; right: 0px; top: 0px; width: 0px;"><span class="fa fa-star fa-2x" style="color: rgb(115, 207, 66);"></span></div>
			                        </div>
			                        <div class="rating-symbol" style="display: inline-block; position: relative;">
			                            <div class="rating-symbol-background far fa-star fa-2x" style="visibility: visible;"></div>
			                            <div class="rating-symbol-foreground" style="display: inline-block; position: absolute; overflow: hidden; left: 0px; right: 0px; top: 0px; width: 0px;"><span class="fa fa-star fa-2x" style="color: rgb(115, 207, 66);"></span></div>
			                        </div>
			                    </span>
			                    <input type="hidden" name="rating" class="rating-tooltip" data-filled="fas fa-star fa-2x" data-empty="fa fa-star-o fa-2x" value="">
			                    <input type="hidden" name="doc_id" id="doc_id" value="<?php echo  $doc_detail['id'] ?>">
			                    <div class="review-emoticons">
			                        <div class="review angry"><img class="icon icons8-angry" src="<?php echo base_url().IMG_SMILY ?>angry.png" alt="angry"></div>
			                        <div class="review cry"><img class="icon icons8-crying" src="<?php echo base_url().IMG_SMILY ?>cry.png" alt="crying"></div>
			                        <div class="review sleeping"><img class="icon icons8-sleeping" src="<?php echo base_url().IMG_SMILY ?>sleeping.png" alt="sleeping"></div>
			                        <div class="review smily" style="opacity: 0; visibility: hidden;"><img class="icon icons8-smily" src="<?php echo base_url().IMG_SMILY ?>smily.png" alt="smily"></div>
			                        <div class="review cool" style="opacity: 0; visibility: hidden;"><img class="icon icons8-cool" src="<?php echo base_url().IMG_SMILY ?>cool.png" alt="cool"></div>
			                    </div>
			                </div>
			            </div>
			            <div class="form-group">              
			                <label>Please tell us why you left this star rating. Your comment and account name will be shared with the public.</label>
			                <input id="review_commnet" type="text" class="form-control" placeholder="Review" name="review_commnet"/>
			            </div>            
			            <div class="form-group" style="display: none;">                
			                <label>Help us rank this profile based on your experience in each of the below categories by sliding the pin across the line. This rating will remain anonymous.<span class="star-mend">*</span></label>
			                <br>
			                <div class="icon-se">
			                    <div class="icon-box icon-box-1"></div>
			                    <div class="icon-box icon-box-2"></div>
			                    <div class="icon-box icon-box-3"></div>
			                    <div class="icon-box icon-box-4"></div>
			                    <div class="icon-box icon-box-5"></div>
			                </div>
			                
			                <div class="range-slider">
			                    <label>Facilities</label>
			                    <input class="range-slider__range" name="facilities" id="facilities" type="range" value="" min="0" max="100" aria-invalid="false">
			                </div>
			                <div class="range-slider">
			                    <label>Culture</label>
			                    <input class="range-slider__range" name="culture" id="culture" type="range" value="" min="0" max="100">
			                </div>
			                <div class="range-slider">
			                    <label>Staff</label>
			                    <input class="range-slider__range" name="staff" id="staff" type="range" value="" min="0" max="100">
			                </div>
			                <div class="range-slider">
			                    <label>Curriculum / STEM</label>
			                    <input class="range-slider__range" name="curriculum" id="curriculum" type="range" value="" min="0" max="100">
			                </div>
			                <div class="range-slider">
			                    <label>Fees</label>
			                    <input class="range-slider__range" name="fees" id="fees" type="range" value="" min="0" max="100">
			                </div>
			            </div>
		         
			        </div>
			        <div class="modal-footer">
			          <button type="submit" id="reviewformBtn" class="btn blue-btn">Submit</button>
			        </div>        
		        </div>

		  	</form>
	  </div>
</div>
<?php }else{ ?>
<div class="modal fade bannerformmodal" id="reviewmodal_popup" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
		  	<form id="reviewform" method="POST" name="reviewform">
		    	
		    	<div class="modal-content">      
			        <div class="modal-header">
			          <h4 class="modal-title" id="myModalLabel">Leave a Review</h4>
			          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        </div>
			        <br>
			        <div class="text-center">
				        <a href="<?php echo base_url('login'); ?>" class="blue-btn" >Login To review</a>
				    </div>
				    <br>
			               
		        </div>

		  	</form>
	  </div>
</div>	
<?php }?>

<script type="text/javascript">
	
	function onHoverStar(element)
	{
		$(element).find('.rating-symbol-background').css('visibility','hidden');
		$(element).find('.rating-symbol-foreground').css('width','auto');
	}

	function outHoverStar(element)
	{
		$(element).find('.rating-symbol-background').css('visibility','visible');
		$(element).find('.rating-symbol-foreground').css('width','0px');
	}

	function overHoverStar()
	{
		let count = 0;
		$('.rating-symbol').each(function(k,v) {
			let check = $(v).hasClass('myClass');
			if(!check) {
				outHoverStar(v);
			}
			else {
				count++;
			}
		});
		if(count > 0) {
			let myArr = { 1: '#de9147', 2: '#de9147', 3: '#dec435', 4: '#c5de35', 5: '#73cf42'}
			$('.myClass').find('.rating-symbol-foreground span').css('color', myArr[count]);
		}
	}

	$("#reviewForm").validate({
  		ignore: [],
      	rules: {
        	review: {
        		// required: true
        		// check_ck_add_method: true
        		/*required: function() {
             		CKEDITOR.instances.review.updateElement();
                },*/
        	},
        	rating: {
        		required: true
        	}
      	},
      	messages: {
         	review: {
        		// required: 'Please Enter Review',
        		// check_ck_add_method: 'Please Enter Review'
        	},
        	rating: {
        		required: 'Please Select Your Rating'
        	}
      	},
      	errorElement: "span",
      	errorPlacement: function ( error, element ) {
     		// Add the `help-block` class to the error element
         	error.addClass("text-danger");
         	if (element.prop( "type" ) === "checkbox") {
	            error.insertAfter(element.parent( "label") );
         	} else if(element.hasClass("phone")){
	            error.insertAfter(element.parent(".input-group"));
         	} else if(element.hasClass("funding")){
            	error.insertAfter(element);
         	} else if (element.prop( "type" ) === "file") {
            	// error.insertAfter(element.parent());
            	element.parent().parent().append(error);
         	} else if(element.hasClass('rating-tooltip')) {
            	error.insertAfter(element.parent());
         		error.addClass('mt-15');
            	$('<br>').insertAfter(error);
         	} else {
            	error.insertAfter(element.parent());
         	}
      	},
      	highlight: function ( element, errorClass, validClass ) {
         	//$( element ).parents( ".col-md-6,.col-md-12" ).addClass( "has-error" ).removeClass( "has-success" );
      	},
      	unhighlight: function (element, errorClass, validClass) {
         	//$( element ).parents( ".col-md-6,.col-md-12" ).addClass( "has-success" ).removeClass( "has-error" );
      	}
   	});

	$('#reviewform').on('submit',function(e) {
   		//$('#reviewForm').valid();
		e.preventDefault();
		//if($('#reviewForm').valid()) {
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url(FRONTEND.'Document/add_review') ?>',
				data: $('#reviewform').serialize(),
				success: function(response) {
					data = jQuery.parseJSON(response);
            		$.notify({message: data.msg },{type: data.res_type});
            		$("#reviewmodal_popup").modal("hide");
				}
			});
		//}
	});

</script>