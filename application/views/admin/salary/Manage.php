<style>
   .pagination { float: right; }
</style>
<section class="content-header">
   <h1 class="pull-left col-md-3"><i class="fa fa-university"></i>&nbsp;<?= $MainTitle." Manage "; ?></h1>
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
         <h3 class="box-title"><?= $MainTitle; ?> List</h3>
         <div class="pull-right">            
            <a class="btn btn-info btn-flat " href="<?= ADMIN_LINK.$url."/add/" ?>" ><i class="fa fa-plus"></i> Add New <?= $MainTitle; ?></a>
         </div>
      </div>
      <div class="box-body">
         <div class="row">
            <div class="col-lg-2">
               <div class="form-group">
                  <select name="PerPage" class="form-control" id="PerPage" onchange="getData()">
                     <?php $this->load->view(ADMIN.'optionperpage'); ?>
                  </select>
               </div>
            </div>
            <div class="col-lg-8">

            </div>
            <div class="col-lg-2">
               <div class="form-group">
                  <input type="text" class="form-control" onkeyup="getData()" name="keywords" id="keywords" placeholder="Search"/>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12 col-lg-12">
               <div id="listing"></div>
            </div>
         </div>
      </div><!-- /.box-body -->
   </div><!-- /.box -->
</section>
<script type="text/javascript">
$(document).ready(function(){
   load_ajex_loader('<?= ADMINPATH.'images/ajax-loader.gif'; ?>','Loading Please Wait...');
   getData();
});
function getData(page_num) {
   page_num = page_num?page_num:0;
   var perpage = $('#PerPage').val();
   var keywords = $('#keywords').val();
   $.ajax({
      type: 'POST',
      url: "<?php echo base_url(ADMIN).$Controller ?>/ajax_list/"+page_num,
      data:'page='+page_num+'&perpage='+perpage+'&keywords='+keywords,
      success: function (html) {
         $('#listing').html(html);
         $(".Table").DataTable({
            "bAutoWidth": false,
            "bPaginate": false,
            "bFilter": false,
            "bInfo": false,
            "aoColumns": [
               { "sWidth": "10%" },
               { "sWidth": "15%" },               
               { "sWidth": "15%" },               
               { "sWidth": "15%","bSortable": false }
            ]
         });
      }
   });
}
</script>