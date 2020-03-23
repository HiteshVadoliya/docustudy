<style type="text/css">
	.fav-custom-wishlist{
		cursor: pointer;
	}
	.isliked svg{
		color: #ff0000
	}
	

</style>
<?php 
$sesssion = $this->session->get_userdata('DS_USER');

$user_id = ($sesssion['DS_USER']['DS_Id']) ? $sesssion['DS_USER']['DS_Id'] : 0;
if($user_id) {
	$fav_doc = $this->common->get_num_rows_with_where("doc_wishlist",array("doc_id"=>$wish_doc_id,"user_id"=>$user_id));

	if($fav_doc){ ?>
	
		<div class="fav-icon fav-custom-wishlist add_to_fav isliked" data-id="<?php echo $wish_doc_id ?>"><i class="fa fa-heart"></i></div>

	<?php 
	}else{		
	?>
		<div class="fav-icon fav-custom-wishlist add_to_fav " data-id="<?php echo $wish_doc_id ?>"><i class="fa fa-heart"></i></div>
	
	<?php } 
	
} else { ?>

	<div class="fav-icon fav-custom-wishlist " data-toggle="modal" data-target="#myModalLogin" data-id="<?php echo $wish_doc_id ?>"><i class="fa fa-heart"></i></div>
	<?php
}
?>

<!-- Modal -->

<div class="modal" id="myModalLogin">
	<div class="modal-dialog">
		<div class="modal-content">

		  <!-- Modal Header -->
		  <div class="modal-header">
		    <h4 class="modal-title">Add To Favourite</h4>
		    <button type="button" class="close" data-dismiss="modal">&times;</button>
		  </div>

		  <!-- Modal body -->
		  <div class="modal-body text-center">
		    <a href="<?php echo base_url('login') ?>" class="btn btn-primary"> Login</a>
		  </div>

		  <!-- Modal footer -->
		  <div class="modal-footer">
		    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		  </div>

		</div>
	</div>
</div>

