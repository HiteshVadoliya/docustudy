<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-8">
	<?php if($this->session->userdata('success')){ ?>
		<div class="alert alert-success alert-dismissable remove-alert">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <strong>Success!</strong> <?= $this->session->userdata('success') ?>
		</div>
	<?php } ?>
	<?php if($this->session->userdata('error')){ ?>
		<div class="alert alert-danger alert-dismissable remove-alert">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <strong>Error!</strong> <?= $this->session->userdata('error') ?>
		</div>
	<?php } ?>
	</div>
</div>