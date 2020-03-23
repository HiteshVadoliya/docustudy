<style type="text/css">
   
   .checkbox input[type="checkbox"] {
       cursor: pointer;
       opacity: 0;
       z-index: 1;
       outline: none !important;
   }
   .checkbox-success input[type="checkbox"]:checked + label::before {
       background-color: #4bd396;
       border-color: #4bd396;
   }

   .checkbox label::before {
       -o-transition: 0.3s ease-in-out;
       -webkit-transition: 0.3s ease-in-out;
       background-color: #ffffff;
       border-radius: 2px;
       border: 1px solid #dadada;
       content: "";
       display: inline-block;
       height: 17px;
       left: 0;
       margin-left: -20px;
       position: absolute;
       transition: 0.3s ease-in-out;
       width: 22px;
       outline: none !important;
       margin-top: 2px;
   }

   .checkbox-success input[type="checkbox"]:checked + label::after {
       color: #ffffff;
   }
   .checkbox input[type="checkbox"]:checked + label::after {
       content: "Yes";
       font-family: 'Material Design Icons';
       font-weight: bold;
   }
   .checkbox label::after {
       color: #797979;
       display: inline-block;
       font-size: 11px;
       height: 16px;
       left: 0;
       margin-left: -20px;
       padding-left: 3px;
       padding-top: 1px;
       position: absolute;
       top: 2px;
       width: 16px;
       content: "No";
   }
</style>
<?php
$this->table = 'doc_faq';
$tablename = base64_encode($this->table);
$tableId = base64_encode('id');
?>
<form id="export_schools" method="post" action="<?php echo ADMIN_LINK.'Exportschool/export' ?>">
<!--   <div>
    <button id="exportSchoolBtn" class="btn btn-primary">Export Schools</button>
  </div> -->
<table class="table table-responsive Table">
   <thead>
      <tr>
         <!-- <td><input type="checkbox" name="select_all_school" id="select_all_scholl"></td> -->
         <td>Question</td>
         <td>Status</td>
         <td>Action</td>
      </tr>
   </thead>
   <tbody>
   <?php
   if(count($tours)) { 
      $i = 0;
      foreach ($tours as $key => $data) {
         $i++;
         $action = '<a href="'.ADMIN_LINK.'add-faq/'.$data['id'].'" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o"></i></a> ';
         $action .= '<button type="button" class="btn btn-icon waves-effect btn-sm btn-danger rowDelete ajaxTable" data-url="'.ADMIN_LINK.'Faq/deleteData" data-id="'.$data['id'].'" data-td="'.$tablename.'" data-i="'.$tableId.'"> <i class="fa fa-trash"></i> </button> ';
         $checked = '';
         if($data['status'] == 1) {
            $checked = 'checked=""';
         }
         
         $status = '<div class="material-switch tex-center">
                <input id="status'.$data['id'].'" name="status" class="changeStatus" data-id="'.$data['id'].'" data-value="'.$data['title'].'" type="checkbox" '.$checked.' value="0"   />
                <label for="status'.$data['id'].'" class="label-primary"></label>
            </div>';
      ?>
      <tr>
         <td><?php echo $data['title'] ?></td>
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
      url: '<?php echo ADMIN_LINK.'Faq/changeStatus/' ?>',
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