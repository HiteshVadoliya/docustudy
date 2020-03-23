<?php
$this->table = 'doc_newsletter';
$tablename = base64_encode($this->table);
$tableId = base64_encode('id');
?>
<table class="table table-responsive Table">
   <thead>
      <tr>
         <td>First Name</td>
         <td>Email</td>
         <td>Status</td>
         <td>Action</td>
      </tr>
   </thead>
   <tbody>
   <?php
   if(count($tours)) { 
      $i = 0;
      foreach ($tours as $key => $newsletter) {
         $i++;
         $action = '<button type="button" class="btn btn-icon waves-effect btn-sm btn-danger rowDelete ajaxTable" data-url="'.ADMIN_LINK.'Contact/deleteData" data-id="'.$newsletter['id'].'" data-td="'.$tablename.'" data-i="'.$tableId.'"> <i class="fa fa-trash"></i> </button> ';
         $checked = '';
         if($newsletter['status'] == 1) {
            $checked = 'checked=""';
         }
         $status = '<div class="material-switch tex-center">
             <input id="status'.$newsletter['id'].'" name="status" class="changeStatus" data-id="'.$newsletter['id'].'" data-value="'.$newsletter['fname'].'" type="checkbox" '.$checked.' value="0"   />
             <label for="status'.$newsletter['id'].'" class="label-primary"></label>
         </div>';
      ?>
      <tr>
         <td><?php echo $newsletter['fname']; ?></td>
         <td><?php echo $newsletter['email']; ?></td>
         <td><?php echo $status; ?></td>
         <td><?php echo $action; ?></td>
      </tr>
      <?php
      } 
   }
   ?>
   </tbody>
</table>
<div class="row">
   <div class="col-md-12">
      <?php echo $this->ajax_pagination->create_links(); ?>
   </div>
</div>

<script type="text/javascript">
$('.changeStatus').on('change',function() {

   var status = $(this).prop('checked') ? '1' : '0';
   Id = $(this).attr('data-id');
   Value = $(this).attr('data-value');

   swal({
      title: "Are you sure?",
      text: "Are you sure you want to change status for "+Value+"?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes!",
      cancelButtonText: "No",
      closeOnConfirm: false,
      closeOnCancel: true
   }, 
   function (isConfirm) {    
      if (isConfirm) {
         changestatus(status,Id);
      }
      else {
         status = (status == '1') ? false : true;
         $('#status'+Id).prop('checked',status);
      } 
   });
   
});

function changestatus(status,Id)
{
   $.ajax({
      type: 'POST',
      url: '<?php echo ADMIN_LINK.'Contact/changeStatus/newsletter' ?>',
      data: { status: status, id: Id },
      success: function(data) {
         data = jQuery.parseJSON(data);
         swal("Success", data.message, "success");
         let abc = $('.pagination .active a').text();
         if(abc >= 1) {
            abc -= 1;
         }
         let pagenum = abc * 10;
         gettour(pagenum);
      }
   });
}
</script>