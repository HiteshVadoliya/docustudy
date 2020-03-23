    <div class="slider-se bradscarm-se">
        <div class="container">
        <!-- <img src="<?php echo FRONTENDPATH ?>images/slider-background.png"> -->
            <div class="search-box-po">
                <div class="search-box">
                    <h1>Sign in</h1>
                    <p>Login using your registered email.</p>                
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
                        <h2>Log In</h2>
                      </div>
                    </div>
                      <p class="mb-3">Need a Docu Study account? <a href="javascript:;" data-toggle="modal" data-target="#modalRegisterForm"> Create an account</a></p>
                      <form method="post" id="loginForm" name="loginForm" enctype="multipart/form-data">                        
                        <div class="form-group">
                          <label>User name</label> 
                            <input type="email" id="email" name="email" class="form-control validate" placeholder="email">
                        </div>
                        <div class="form-group">
                          <label>Password</label> 
                            <input type="password" id="password" name="password" class="form-control validate" placeholder="password" autocomplete="off">
                        </div>                            
                        <div class="form-group">
                            <button type="submit" class="btn btn-deep-orange nav-link blue-btn animation_button ">Sign in</button>
                        </div>

                        <!-- <div class="modal-body">
                            <a class="forgotpass" href="<?= base_url('forgot-password') ?>">Forgot password</a>
                        </div> -->

                        <div class="text-center">
                          <!-- <div class="form-group">
                            <input type="checkbox" id="Keep" name="fruit-1" value="Apple">                            
                            <label for="Keep">Keep me logged in</label>
                          </div>                           -->
                          <a class="forgotpass" href="<?= base_url('forgot-password') ?>">Forgot password?</a>
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
    </div>

   <script>

       $(document).ready(function(){

           $("#loginForm").validate({
               rules: {
                   email: { required:true,email:true },
                   password: { required:true },
               },
               messages: {
                   email: { required: "Please Enter Email" },
                   password: { required: "Please Enter Password" },
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
                       url: '<?php echo base_url().FRONTEND.'Login/login_process' ?>',
                       data: formData,
                       async: false,
                       cache: false,
                       contentType: false,
                       processData: false,
                       success: function(data) {
                           data = jQuery.parseJSON(data);
                           if(data.res) {
                               $.notify({message: data.msg },{type: data.res_type});
                               setTimeout(function(){
                                   window.location.href = data.last_page;
                               },2000);
                           } else {
                               $.notify({message: data.msg },{type: data.res_type});
                           }
                           jQuery(btn_class).html(btn_val);
                           $("#loginForm")[0].reset();
                       }
                   });
                   return false;
               }
           });
       });
   </script>  