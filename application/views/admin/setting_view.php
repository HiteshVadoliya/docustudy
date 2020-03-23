<style>
  /*.lg-bg { background-color: black; }*/
</style>
<section class="content-header">
   <h1>Setting</h1>
</section>
<!-- Main content -->
<section class="content">
   <?php $this->load->view(ADMIN.'include/message'); ?>
   <!-- Default box -->
   <div class="box box-info">
      <form role="form" action="<?= base_url(ADMIN.'Configuration/update_setting') ?>" method="post" enctype="multipart/form-data">
        <div class="box-header with-border">
          <h3 class="box-title">Setting</h3>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label>Admin Title</label>
                <input type="text" id="Admin_Title_2" name="Admin_Title_2" class="form-control" value="<?= isset($setting['Admin_Title_2'])?$setting['Admin_Title_2']:set_value('Admin_Title_2') ?>" placeholder="Admin Title">
                <span id="Admin_Title_2-error" class="text-danger pull-right"></span>
              </div>
              <!-- <label>Choose Image </label> -->
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                      <label>Admin Logo</label>
                      <input type="file" name="Admin_Logo_2" id="Admin_Logo_2" class="Admin_Logo_2">
                      <p class="help-block">(Valid File Type: JPEG , PNG).</p>
                      <span id="Admin_Logo_2-error" class="text-danger pull-right"></span>
                  </div>
                </div>
                <div class="col-lg-5 lg-bg">
                <?php $path = isset($setting['Admin_Logo_2'])?$setting['Admin_Logo_2']:'' ?>
                <img src="<?= LOGOPATH.$path; ?>" id="PreviewAdmin_Logo_2" alt="Admin Logo" class="img img-responsive" style="height: 50px;" />
                </div>
                <div class="col-lg-1"></div>
              </div>
            </div><!-- col-lg-6 -->
            <div class="col-lg-6">
              <div class="form-group">
                <label>Front End Title</label>
                <input type="text" id="FrontEnd_Title_2" name="FrontEnd_Title_2" class="form-control" value="<?= isset($setting['FrontEnd_Title_2'])?$setting['FrontEnd_Title_2']:set_value('FrontEnd_Title_2') ?>" placeholder="Front End Title">
                <span id="FrontEnd_Title_2-error" class="text-danger pull-right"></span>
              </div>
              <!-- <label>Choose Image 160(w) * 34(h) </label> -->
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                      <label>Front End Logo</label>
                      <input type="file" name="FrontEnd_Logo_2" id="FrontEnd_Logo_2" class="FrontEnd_Logo_2">
                      <p class="help-block">(Valid File Type: JPEG , PNG).</p>
                      <span id="FrontEnd_Logo_2-error" class="text-danger pull-right"></span>
                  </div>
                </div>
                <div class="col-lg-5 lg-bg">
                <?php $path = isset($setting['FrontEnd_Logo_2'])?$setting['FrontEnd_Logo_2']:'' ?>
                    <img src="<?= LOGOPATH.$path; ?>" id="PreviewFrontEnd_Logo_2" alt="Front End Logo" class="img img-responsive" style="height: 50px;" />
                </div>
                <div class="col-lg-1"></div>
              </div>
            </div>
          </div><!-- row -->
        </div><!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" id="Add" class="btn btn-primary">Update</button>
          <a href="<?= base_url(ADMIN.'Home') ?>" id="Cancel" class="btn btn-danger pull-right">Cancel</a>
        </div><!-- /.box footer-->
      </form>
  </div><!-- /.box -->
</section>
    
<?php $this->load->view(ADMIN.'include/footer'); ?>
<script type="text/javascript">
$(document).ready(function(){
   $('#Answer').ckeditor();
   $('#Add').click(function(event) {
      if(requireandmessage('Admin_Title_2','Admin Title') || requireandmessage('FrontEnd_Title_2','Front End Title')){
         return false;
      }// || requireandmessage('TwitterLink','Twitter Link')
   });
   $(".Admin_Logo_2,.FrontEnd_Logo_2").on("change", function (event) {
      var id = $(this).attr("id");
      filename = event.target.files[0].name;
      file = filename.split(".").pop().toLowerCase();
      $("#Preview"+id).fadeIn("fast").attr('src','');
      if(file == "jpg" || file == "png" || file == "jpeg"){
         var tmppath = URL.createObjectURL(event.target.files[0]);
         $("#Preview"+id).fadeIn("fast").attr('src',tmppath);
         $('#'+id+'-error').html('');
      }
      else {
         $('#'+id+'-error').html("Please Select Correct File Only.!!!");
         $(this).val("");
      }
   });
});
</script>