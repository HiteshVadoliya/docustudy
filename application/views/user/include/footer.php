<?php
$CI =& get_instance();
$social = $CI->common->get_one_row("doc_social_media"); 
?>
<footer class="padding-50">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="<?= LOGOPATH.getSiteSetting('FrontEnd_Logo'); ?>">
            </div>
            <div class="col-md-3">
                <h3>Company</h3>
                <ul>
                    <li> <a href="<?= base_url('about'); ?>">About us</a></li>
                    <li> <a href="#">Jobs</a></li>
                    <li> <a href="#">Blog</a></li>
                    <li> <a href="#">Partners</a></li>
                    <li> <a href="#">Dutch Website</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h3>Contact & Help</h3>
                <ul>
                    <li> <a href="<?= base_url('faq'); ?>">Frequently asked questions </a></li>
                    <li><a href="<?= base_url('contact'); ?>"> Contact</a></li>
                </ul>
                <h3>Legal</h3>
                <ul>
                    <li> <a href="<?= base_url('terms'); ?>"> Terms</a></li>
                    <li> <a href="<?= base_url('privacy-policy'); ?>"> Privacy policy</a></li>
                    <li> <a href="<?= base_url('cookie-statement'); ?>"> Cookie Statement</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <div class="social-se">
                    <h3>Social</h3>
                    <?php if(isset($social['facebook']) && !empty($social['facebook'])) {
                        ?>
                        <a href="<?= $social['facebook']; ?>"><i class="fab fa-facebook-f"></i> </a>
                        <?php
                    }
                    ?>
                    <?php if(isset($social['twitter']) && !empty($social['twitter'])) {
                        ?>
                        <a href="<?= $social['twitter']; ?>"><i class="fab fa-twitter"></i> </a>
                        <?php
                    }
                    ?>
                    <?php if(isset($social['instagram']) && !empty($social['instagram'])) {
                        ?>
                        <a href="<?= $social['instagram']; ?>"><i class="fab fa-instagram"></i> </a>
                        <?php
                    }
                    ?>
                    <?php if(isset($social['linkedin']) && !empty($social['linkedin'])) {
                        ?>
                        <a href="<?= $social['linkedin']; ?>"><i class="fab fa-linkedin-in"></i> </a>
                        <?php
                    }
                    ?>
                    <h3>Get the App</h3>
                    <img src="<?php echo FRONTENDPATH ?>images/app.png">
                    <img src="<?php echo FRONTENDPATH ?>images/apple.png">
                </div>
            </div>                    
        </div>
    </div>
</footer>

<!-- 
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" id="loginForm" name="loginForm" enctype="multipart/form-data">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form ">
                        <input type="email" id="email" name="email" class="form-control validate" placeholder="email">
                    </div>
                    <div class="md-form ">
                        <input type="password" id="password" name="password" class="form-control validate" placeholder="password" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-deep-orange nav-link blue-btn">Sign in</button>
                </div>
                <div class="modal-body mx-3">
                    <a class="forgotpass" href="javascript:;">Forgot password</a>
                </div>
            </form>
        </div>
    </div>
</div>
-->

<!-- 
<div class="modal fade" id="modalForgotForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" id="forgotForm" name="forgotForm" enctype="multipart/form-data">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Forgot Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form ">
                        <input type="email" id="email_forgot" name="email_forgot" class="form-control validate" placeholder="email">
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-deep-orange nav-link blue-btn">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
 -->


<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" id="registrationForm" name="registrationForm" enctype="multipart/form-data">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Sign up</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form ">
                    <input type="text" id="fname" name="fname" class="form-control validate" placeholder="first name">
                </div>
                <div class="md-form ">
                    <input type="text" id="lname" name="lname" class="form-control validate" placeholder="last name">
                </div>
                <div class="md-form ">
                    <input type="email" id="email" name="email" class="form-control validate" placeholder="email">
                </div>
                <div class="md-form ">
                    <input type="password" id="password" name="password" class="form-control validate" placeholder="password" autocomplete="off">
                </div>
                <div class="md-form ">
                    <input type="text" id="phone" name="phone" class="form-control validate" placeholder="phone">
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" class="btn btn-deep-orange nav-link blue-btn">Sign up</button>
            </div>
            </form>
        </div>
    </div>
</div>


<script>

    $(document).ready(function(){

        $("#registrationForm").validate({
            rules: {
                fname: { required:true },
                lname: { required:true },
                phone: { required:true },
                email: { required:true,email:true },
                password: { required:true },
            },
            messages: {
                fname: { required: "Please Enter First Name" },
                lname: { required: "Please Enter Last Name" },
                phone: { required: "Please Enter Phone Number" },
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
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url().FRONTEND.'Login/register' ?>',
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        data = jQuery.parseJSON(data);
                        $("#modalRegisterForm").modal("hide");
                        if(data.res) {
                            $.notify({message: data.msg },{type: data.res_type});
                        } else {
                            $.notify({message: data.msg },{type: data.res_type});
                        }
                        $("#registrationForm")[0].reset();
                    }
                });
                return false;
            }
        });
    });
</script>

<?php 
if(isset($_SESSION['FAIL'])) {
   ?>
   <script type="text/javascript">
      $.notify({message: '<?php echo $_SESSION['FAIL']; ?>' },{type: 'danger'});
   </script>
   <?php
   unset($_SESSION['FAIL']);
}
if(isset($_SESSION['SUCCESS'])) {
   ?>
   <script type="text/javascript">
      $.notify({message: '<?php echo $_SESSION['SUCCESS']; ?>' },{type: 'success'});
   </script>
   <?php
   unset($_SESSION['SUCCESS']);
}
?>