<style>
   .pagination { float: right; }
</style>
<section class="content-header">
   <h1 class="pull-left col-md-3"><i class="fa fa-university"></i>&nbsp;Manage Story</h1>
      <div class="pull-right col-md-9">
           <div class="col-md-5">
              <?php
               if(null !== $this->session->flashdata('msg')) {
                   $message = $this->session->flashdata('msg');
                   echo "<div class='alert alert-".$message["class"]." alert-dismissable' class=".$message["class"].">".$message["message"]."</div>"; 
               } ?>
            </div>
      </div>
</section>
<br>

<!-- Main content -->
<section class="content">
   <?php $this->load->view(ADMIN.'include/message'); ?>
   <!-- Default box -->
   <div class="box">
      <div class="box-header with-border">
         <h3 class="box-title">Manage Story</h3>
         <div class="pull-right">
            <a href="<?= base_url(ADMIN.'add-demo') ?>" class="btn btn-info btn-flat"> <i class="fa fa-plus"> </i> Add Story</a>
         </div>
      </div>
      <div class="box-body">
         <div class="row">
            <div class="col-lg-2">
               <div class="form-group">
                  <select name="PerPage" class="form-control" id="PerPage" onchange="gettour()">
                     <?php $this->load->view(ADMIN.'product/optionperpage'); ?>
                  </select>
               </div>
            </div>
            <div class="col-lg-8">

            </div>
            <div class="col-lg-2">
               <div class="form-group">
                  <input type="text" class="form-control" onkeyup="gettour()" name="keywords" id="keywords" placeholder="Search"/>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12 col-lg-12">
               <div id="tourList"></div>
            </div>
         </div>
         <input type="hidden" name="is_sponsored_filter" id="is_sponsored_filter" value="1">
      </div><!-- /.box-body -->
   </div><!-- /.box -->
</section>
<script type="text/javascript">
$(document).ready(function(){
   load_ajex_loader('<?= ADMINPATH.'images/ajax-loader.gif'; ?>','Loading Please Wait...');
   gettour();
});
function gettour(page_num) {
   page_num = page_num?page_num:0;
   var perpage = $('#PerPage').val();
   var keywords = $('#keywords').val();
   $.ajax({
      type: 'POST',
      url: '<?php echo base_url(ADMIN); ?>Story/ajax_story/'+page_num,
      data:'page='+page_num+'&perpage='+perpage+'&keywords='+keywords,
      success: function (html) {
         $('#tourList').html(html);
         $(".Table").DataTable({
            "bAutoWidth": false,
            "bPaginate": false,
            "bFilter": false,
            "bInfo": false,
            "aoColumns": [
               { "sWidth": "20%" },
               { "sWidth": "20%" },
               { "sWidth": "15%" },               
               { "sWidth": "15%" },               
               { "sWidth": "15%","bSortable": false }
            ]
         });
      }
   });
}
</script>