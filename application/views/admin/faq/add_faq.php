<link rel="stylesheet" type="text/css" href="<?= ADMINPATH.'fileupload/css/jquery.dm-uploader.css' ?>">
<link rel="stylesheet" type="text/css" href="<?= ADMINPATH.'fileupload/css/styles.css' ?>">
<section class="content-header">
   <?php
   if(isset($edit)) {
   ?>
   <h1><i class="fa fa-pencil"></i>&nbsp;Edit FAQ</h1>
   <?php
   }
   else {
   ?>
   <h1><i class="fa fa-plus"></i>&nbsp;Add FAQ</h1>
   <?php
   }
   ?>
</section>
<!-- Main content -->
<section class="content">
   <?php $this->load->view(ADMIN.'include/message'); ?>
   <!-- Default box -->
   <div class="box box-info">      
      <div class="box-header with-border">
         <h3 class="box-title">
            <a href="<?= base_url(ADMIN.'manage-faq') ?>" class="btn btn-info btn-md text-center"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back</a>
         </h3>
      </div>
      
     <div class="tab-content">
       <div>
            <?php
            if(isset($edit)) {
            ?>
            <form role="form" action="<?= ADMIN_LINK.'Faq/save_data/'.$edit['id'] ?>" method="post" id="frm" enctype="multipart/form-data">
            <?php
            }
            else {
            ?>
            <form role="form" action="<?= ADMIN_LINK.'Faq/save_data' ?>" method="post" id="frm" enctype="multipart/form-data">
            <?php
            }
            ?>
               <div class="box-body">
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label>Quetion<span class="star-mend">*</span></label>
                           <input type="text" name="title" id="title" class="form-control" value="<?php if(isset($edit)) { echo $edit['title']; } ?>" placeholder="Name">
                        </div>
                        
                        <div class="form-group">
                           <label>Answer<span class="star-mend">*</span></label>
                           <textarea name="description" id="description" class="form-control"><?php if(isset($edit)) { echo $edit['description']; } ?></textarea>
                        </div>

                     </div>
                  </div><!-- row -->
               </div><!-- /.box-body -->

               <div class="box-footer">
                  <button type="submit" class="btn btn-primary"><?php if(isset($edit)) { echo 'Modify'; }else { echo 'save'; } ?></button>
                  <a href="<?= base_url(ADMIN.'manage-faq') ?>" class="btn btn-danger pull-right">Cancel</a>
               </div><!-- /.box footer-->
            </form>

       </div>
     </div>
   </div><!-- /.box -->
</section>

<script src="<?php echo ASSETPATH ?>plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETPATH ?>plugins/jquery.validate.min.js" type="text/javascript"></script>

<script src="<?php echo F_JSPATH ?>custom.js"></script>

<script src="<?= ADMINPATH.'fileupload/js/jquery.dm-uploader.js'; ?>"></script>
<script src="<?= ADMINPATH.'fileupload/js/file_upload.js'; ?>"></script>

<script type="text/javascript">
$(document).ready(function() {
   $('#description').ckeditor();

    $("#frm").validate({
      rules: {
         title: { required: true },
         description: { required: true },
      },
      messages: {
         title: { required: 'Please Enter Quetion' },
         description: { required: 'Please Enter answer' },
      },
      errorElement: "span",
      errorPlacement: function ( error, element ) {
         error.addClass("text-danger");
         if (element.prop( "type" ) === "file") {
            element.parent().parent().append(error);
         } else {
            error.insertAfter(element.parent());
         }
      },
      highlight: function ( element, errorClass, validClass ) {
      },
      unhighlight: function (element, errorClass, validClass) {
      }
   });
});

</script>