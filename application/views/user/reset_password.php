    <div class="slider-se bradscarm-se">
        <div class="container">
        <!-- <img src="<?php echo FRONTENDPATH ?>images/slider-background.png"> -->
            <div class="search-box-po">
                <div class="search-box">
                    <h1>Reset Password</h1>
                    <p>You can set new password.</p>                
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
            
            
                    <form id="resetPasswordForm" name="resetPasswordForm" method="post" action="javascript:;">                        
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="password" placeholder="New Password">
                        </div>
                        <div class="form-group">
                            <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password">
                        </div>
                        <input type="hidden" name="ForgotString" class="form-control" id="ForgotString" value="<?= $string ?>">                
                        <div class="form-group">
                            <button type="submit" class="btn btn-deep-orange nav-link blue-btn">Reset Password</button>
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

    <script type="text/javascript">
        $(document).ready(function(){

            $("#resetPasswordForm").validate({
                rules: {
                    password: { required:true },
                    confirm_password: { required:true, equalTo: "#password" },
                },
                messages: {
                    password: { required: "Please Enter Password" },
                    confirm_password: { required: "Please re-enter password" },
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
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url().FRONTEND.'Login/reset_pass' ?>',
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
                                    window.location.href = url_redirect;
                                },2000);
                            } else {
                                $.notify({message: data.msg },{type: data.res_type});
                            }
                            $("#resetPasswordForm")[0].reset();
                        }
                    });
                    return false;
                }
            });
        });
    </script>