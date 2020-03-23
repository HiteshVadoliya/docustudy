<?php
$this->table = 'doc_user';
$tablename = base64_encode($this->table);
$tableId = base64_encode('id');
?>
<table class="table table-responsive Table">
   <thead>
      <tr>
         <td>Name</td>
         <td>Email</td>
         <td>Status</td>
         <td>Action</td>
      </tr>
   </thead>
   <tbody>
   <?php
   if(count($tours)) { 
      $i = 0;
      foreach ($tours as $key => $user) {
         $i++;
         $action = '<a href="'.ADMIN_LINK.'view-users/'.md5($user['id']).'" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a> ';
         $action .= '<button class="btn btn-icon waves-effect btn-sm btn-danger rowDelete ajaxTable" data-url="'.ADMIN_LINK.'Users/deleteData" data-id="'.$user['id'].'" data-td="'.$tablename.'" data-i="'.$tableId.'"> <i class="fa fa-trash"></i> </button> ';

         $checked = '';
         if($user['status'] == 1) {
            $checked = 'checked=""';
         }
         $status = '<div class="material-switch tex-center">
             <input id="status'.$user['id'].'" name="status" class="userStatus" data-id="'.$user['id'].'" data-value="'.$user['fname'].' '.$user['lname'].'" type="checkbox" '.$checked.' value="0" />
             <label for="status'.$user['id'].'" class="label-primary"></label>
         </div>';
      ?>
      <tr>
         <td><?php echo ucwords($user['fname'].' '.$user['lname']); ?></td>
         <td><?php echo $user['email']; ?></td>
         <td><?php echo $status ?></td>
         <td><?php echo $action ?></td>
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
$(document).ready(function() {

   /**/
   $('.userStatus').on('change',function() {

      var status = $(this).prop('checked') ? '1' : '0';
      userId = $(this).attr('data-id');
      user = $(this).attr('data-value');
      
      swal({
         title: "Are you sure?",
         text: "Are you sure you want to change status for "+user+"?",
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
            changestatus(status,userId);
            swal("Success", "Status has been changed successfully..", "success");
         }
         else {
            status = (status == '1') ? false : true;
            $('#status'+userId).prop('checked',status);
         } 
      });
      
   });

});


function changestatus(status,userId)
{
   $.ajax({
      type: 'POST',
      url: '<?php echo ADMIN_LINK.'Users/changeStatus/user' ?>',
      data: { status: status, userId: userId },
      success: function(data) {
         data = jQuery.parseJSON(data);
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