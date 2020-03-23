    <div class="slider-se bradscarm-se">
        <div class="container">
        <!-- <img src="<?php echo FRONTENDPATH ?>images/slider-background.png"> -->
            <div class="search-box-po">
                <div class="search-box">
                    <h1>Forgot Password</h1>
                    <p>Reset your password here.</p>                
                    <!-- <div class="search-text-box">
                        <input type="text" class="form-control" placeholder="Search for courses, books or documents">
                        <div class="btn-rught">
                            <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

<div class="login-signup-se ">
        <div class="container-fluid ">            
            <div class="row">
                <div class="col-md-3 p-0">
                  <div class="p-5">
                    <div class="text-center mb-3 ">
                      <img src="<?php echo FRONTENDPATH ?>images/logo.png">
                      <div class="comman-title">
                        <h2>Reset Password</h2>
                      </div>
                    </div> 

            
                    <form method="post" id="forgotForm" name="forgotForm" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="email" id="email_forgot" name="email_forgot" class="form-control validate" placeholder="email">
                        </div>
                
                
                        <div class="form-group">
                            <button type="submit" class="btn btn-deep-orange nav-link blue-btn animation_button">Send</button>
                        </div>                                
                    </form>

                </div>
            </div>
            <div class="col-md-9 p-0">
                <div class="right-side-box">
                  <img src="<?php echo FRONTENDPATH ?>images/img4.jpg">
                </div>
              </div>
        </div>        
    </div>

   <script>

       $(document).ready(function(){

           $("#forgotForm").validate({
               rules: {
                   email_forgot: { required:true,email:true },
               },
               messages: {
                   email_forgot: { required: "Please Enter Email" },
               },
               errorElement: "span",
               errorPlacement: function ( error, element ) {
                   error.addClass("text-danger");
                   if (element.prop( "type" ) === "checkbox") {
                       error.insertAfter(element.parent( "label") );
                   } else {
                       error.insertAfter(element.parent());
                   }
               },
               highlight: function ( element, errorClass, validClass ) {
                   //$( element ).parents( ".col-md-6 col-sm-6,.col-md-12" ).addClass( "has-error" ).removeClass( "has-success" );
               },
               unhighlight: function (element, errorClass, validClass) {
                   //$( element ).parents( ".col-md-6 col-sm-6,.col-md-12" ).addClass( "has-success" ).removeClass( "has-error" );
               },
               submitHandler: function (form) {
                   var formData = new FormData($(form)[0]);
                   let url_redirect = '<?= base_url() ?>';

                   let btn_class = ".animation_button";
                   var btn_val = jQuery(btn_class).html();
                   var new_btn_val = btn_val + '<i class="fa fa-spinner fa-spin"></i>';
                   jQuery(btn_class).html(new_btn_val);

                   $.ajax({
                       type: 'POST',
                       url: '<?php echo base_url().FRONTEND.'Login/forgotpass' ?>',
                       data: formData,
                       async: false,
                       cache: false,
                       contentType: false,
                       processData: false,
                       success: function(data) {
                           data = jQuery.parseJSON(data);
                           if(data.res) {
                               $.notify({message: data.msg },{type: data.res_type});
                           } else {
                               $.notify({message: data.msg },{type: data.res_type});
                           }
                           jQuery(btn_class).html(btn_val);
                           $("#forgotForm")[0].reset();
                       }
                   });
                   return false;
               }
           });
       });

   </script>