<section class="content-header">
   <h1><i class="fa fa-users"></i>&nbsp;View Details</h1>
</section>

<!-- Main content -->
<section class="content">
   <!-- Default box -->
   <div class="box">
      <div class="box-header with-border">
         <h3 class="box-title">
            <a href="<?= base_url(ADMIN.'manage-users') ?>" class="btn btn-info btn-md text-center"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back</a>
         </h3>
      </div>
      <div class="box-body">
         <div class="row">
            <div class="col-md-6">
               <table class="table table-responsive table-striped">
                  <tr>
                     <td>
                        <label>Name</label>
                     </td>
                     <td><?php echo ucwords($view['fname']." ".$view['lname']); ?></td>
                  </tr>
                  <tr>
                     <td>
                        <label>Email</label>
                     </td>
                     <td><?php echo $view['email']; ?></td>
                  </tr>
               </table>
            </div>
         </div>
         
      </div><!-- /.box-body -->
   </div><!-- /.box -->
</section>
   
<script type="text/javascript">
$(document).ready(function(){
   load_ajex_loader('<?= ADMINPATH.'images/ajax-loader.gif'; ?>','Loading Please Wait...');
});
</script>