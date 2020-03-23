    <div class="slider-se bradscarm-se">
        <div class="container">
            <div class="search-box-po">
                <div class="search-box">
                    <h1>Profile <span> 
                        <div class="rewardbg"> 
                            <i class="fa fa-trophy" aria-hidden="true"></i> <?=$total_reward?> </span>
                        </div> 
                    </h1>                    
                </div>
            </div>
        </div>
    </div>


    <div class="padding-70">
        <div class="container">

            <div class="row">
                <div class="col-md-3">
                    <div class="left-side-bar">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-Profile-tab" data-toggle="pill" href="#v-pills-Profile" role="tab" aria-controls="v-pills-Profile" aria-selected="true">Profile</a>

                                <a class="nav-link" id="v-pills-my-upload-tab" data-toggle="pill" href="#v-pills-my-upload" role="tab" aria-controls="v-pills-my-upload" aria-selected="false">My Uploads</a>

                                <a class="nav-link" id="v-pills-my-download-tab" data-toggle="pill" href="#v-pills-my-download" role="tab" aria-controls="v-pills-my-download" aria-selected="false">My Download</a>

                                <a class="nav-link" id="v-pills-my-favorite-tab" data-toggle="pill" href="#v-pills-my-favorite" role="tab" aria-controls="v-pills-my-favorite" aria-selected="false">My Wishlist</a>

                                <a class="nav-link" id="v-pills-my-review-tab" data-toggle="pill" href="#v-pills-my-review" role="tab" aria-controls="v-pills-my-review" aria-selected="false">My Review</a>

                                <a class="nav-link" id="v-pills-c-pass-tab" data-toggle="pill" href="#v-pills-c-pass" role="tab" aria-controls="v-pills-c-pass" aria-selected="false">Change password</a>
                                <!-- <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-Profile" role="tabpanel" aria-labelledby="v-pills-Profile-tab">
                            <div class="comman-title">
                                <h3>Edit Your Details</h3>
                            </div>
                            <div class="user-details">                                
                                <form method="post" id="frm_profile" name="frm_profile" enctype="multipart/form-data" method="post">
                                    <div class="row">
                                        <div class="form-group col-md-6">                           
                                            <input type="text" id="lname" name="fname" class="form-control validate" placeholder="first name" value="<?= $profile['fname'] ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" id="lname" name="lname" class="form-control validate" placeholder="last name" value="<?= $profile['lname'] ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="email" id="email" name="email" class="form-control validate" placeholder="email" autocomplete="off" value="<?= $profile['email'] ?>">
                                        </div>
                                        <div class="form-group col-md-6">                                        
                                            <input type="text" id="phone" name="phone" class="form-control validate" placeholder="phone" value="<?= $profile['phone'] ?>">
                                        </div>
                                        <!-- <div class="form-group col-md-12">
                                            <textarea  class="form-control" placeholder="Details"></textarea>
                                        </div> -->
                                    </div>  
                                    <button type="submit" class="btn  blue-btn animation_button">Save</button>                                                            
                                </form>
                            </div>
                            <!-- <div class="row">
                                <div class="col-md-4">
                                    <div class="user-profile">
                                        <img src="<?php echo FRONTENDPATH ?>images/img4.jpg">
                                        <div class="user-profile-edit">
                                            <a href="#"><i class="fa fa-pen"></i></a>
                                        </div>
                                    </div>
                                    <div class="user-name text-center">
                                        <h3>User Name</h3>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="user-details">

                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="tab-pane fade" id="v-pills-c-pass" role="tabpanel" aria-labelledby="v-pills-c-pass-tab">
                            <div class="comman-title">
                                <h3>Change Your Password</h3>
                            </div>                            
                            <form id="frm_password" name="frm_password" method="post" action="javascript:;" method="post">                                                        
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Old Password">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="password" name="new_password" class="form-control" id="new_password" placeholder="New Password">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password">
                                    </div>                                
                                </div>
                                <div class="">
                                    <button type="submit" class="btn blue-btn animation_button_pass ">Change Password</button>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="v-pills-my-upload" role="tabpanel" aria-labelledby="v-pills-my-upload-tab">
                            <div class="fav-se">
                                <div class="comman-title">
                                    <h3>My Uploads</h3>
                                </div>
                                <div id="uploads-results">
                                    
                                    <div class="list-sc">
                                        <img src="<?php echo FRONTENDPATH ?>images/document.png">
                                        <h4>Management Accounting</h4>
                                        <div class="fav-icon"><i class="fa fa-heart"></i></div>
                                        <div  class="view-bor">
                                            <a href="javascript:;">View</a>
                                        </div>
                                    </div>
                                    <div class="list-sc">
                                        <img src="<?php echo FRONTENDPATH ?>images/document.png">
                                        <h4>Financial Institutions</h4>
                                        <div class="fav-icon"><i class="fa fa-heart"></i></div>
                                        <div  class="view-bor">
                                            <a href="javascript:;">View</a>
                                        </div>
                                    </div>
                                    <div class="list-sc">
                                        <img src="<?php echo FRONTENDPATH ?>images/document.png">
                                        <h4>Financial Reporting</h4>
                                        <div class="fav-icon"><i class="fa fa-heart"></i></div>
                                        <div  class="view-bor">
                                            <a href="javascript:;">View</a>
                                        </div>
                                    </div>
                                    <div class="list-sc">
                                        <img src="<?php echo FRONTENDPATH ?>images/document.png">
                                        <h4>Company Accounting</h4>
                                        <div class="fav-icon"><i class="fa fa-heart"></i></div>
                                        <div  class="view-bor">
                                            <a href="javascript:;">View</a>
                                        </div>
                                    </div>
                                    <div class="list-sc">
                                        <img src="<?php echo FRONTENDPATH ?>images/document.png">
                                        <h4>Business Law</h4>
                                        <div class="fav-icon"><i class="fa fa-heart"></i></div>
                                        <div  class="view-bor">
                                            <a href="javascript:;">View</a>
                                        </div>
                                    </div>                                
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-my-download" role="tabpanel" aria-labelledby="v-pills-my-download-tab">
                            <div class="fav-se">
                                <div class="comman-title">
                                    <h3>My Download</h3>
                                </div>
                                <div id="download-results"></div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-my-favorite" role="tabpanel" aria-labelledby="v-pills-my-favorite-tab">
                            <div class="fav-se">
                                <div class="comman-title">
                                    <h3>My Wishlist</h3>
                                </div>
                                <div id="wishlist-results">                                       
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-my-review" role="tabpanel" aria-labelledby="v-pills-my-review-tab">
                            <div class="fav-se">
                                <div class="comman-title">
                                    <h3>My Review</h3>
                                </div>
                                <div id="review-results">                                                                    
                                </div>
                            </div>
                        </div>
                      <!-- <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div> -->
                    </div>

                </div>
            </div>
            
        </div>        
    </div>

    <script>

        $(document).ready(function(){
            
            
            my_uploads();
            my_download();
            get_wishlist_documents();
            get_reviews();
            /* profile */
            $("#frm_profile").validate({
                rules: {
                    fname: { required:true },
                    lname: { required:true },
                    email: { required:true,email:true },
                    phone: { required:true, number:true },
                },
                messages: {
                    fname: { required: "Please enter first name" },
                    lname: { required: "Please enter last name" },
                    email: { required: "Please enter email" },
                    phone: { required: "Please enter phone" },
                },
                errorElement: "span",
                errorPlacement: function ( error, element ) {
                    error.addClass("text-danger");
                    if (element.prop( "type" ) === "checkbox") {
                        error.insertAfter(element.parent( "label") );
                    } else {
                        error.insertAfter(element);
                        //error.insertAfter(element.parent());
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                },
                unhighlight: function (element, errorClass, validClass) {
                },
                submitHandler: function (form) {
                    var formData = new FormData($(form)[0]);
                    
                    let btn_class = ".animation_button";
                    var btn_val = jQuery(btn_class).html();
                    var new_btn_val = btn_val + '<i class="fa fa-spinner fa-spin"></i>';
                    jQuery(btn_class).html(new_btn_val);

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url().FRONTEND.'Profile/profile_update' ?>',
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
                        }
                    });
                    return false;
                }
            });
            /* profile */

            /* password */
            $("#frm_password").validate({
                rules: {
                    password: { required:true },
                    new_password: { required:true },
                    confirm_password: { required:true,equalTo: "#new_password"},
                    
                },
                messages: {
                    password: { required: "Please enter current password" },
                    new_password: { required: "Please enter new password" },
                    confirm_password: { required: "Please enter confirm password" },
                },
                errorElement: "span",
                errorPlacement: function ( error, element ) {
                    error.addClass("text-danger");
                    if (element.prop( "type" ) === "checkbox") {
                        error.insertAfter(element.parent( "label") );
                    } else {
                        error.insertAfter(element);
                        //error.insertAfter(element.parent());
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                },
                unhighlight: function (element, errorClass, validClass) {
                },
                submitHandler: function (form) {
                    var formData = new FormData($(form)[0]);
                    
                    let btn_class = ".animation_button_pass";
                    var btn_val = jQuery(btn_class).html();
                    var new_btn_val = btn_val + '<i class="fa fa-spinner fa-spin"></i>';
                    jQuery(btn_class).html(new_btn_val);

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url().FRONTEND.'Profile/password_update' ?>',
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
                            jQuery("#frm_password")[0].reset();
                        }
                    });
                    return false;
                }
            });
            /* password */
        });

        /* get my uploads */
        function my_uploads($page = '')
        {
            url = '<?php echo base_url(FRONTEND.'Profile/my_uploads/') ?>'+$page;
            
            // load_ajex_loader('<?= ADMINPATH.'images/ajax-loader.gif'; ?>','Loading Please Wait...');
            //load_ajex_loader('<?= ASSETPATH.'images/loader.svg'; ?>','Loading Please Wait...');
            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'html',
                data: {},
                success: function(response) {
                    $('#uploads-results').html(response);
                    $('html,body').animate({                    
                         scrollTop: $('#uploads-results').offset().top - 100
                    });
                }
            });
        }
        /* get my uploads */


        /* get my download */
        function my_download($page = '')
        {
            url = '<?php echo base_url(FRONTEND.'Profile/my_download/') ?>'+$page;
            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'html',
                data: {},
                success: function(response) {
                    $('#download-results').html(response);
                    $('html,body').animate({                    
                         scrollTop: $('#download-results').offset().top - 100
                    });
                }
            });
        }
        /* get my download */


        /* Start : Use for Wishlist page */
        function get_wishlist_documents($page = '')
        {
            url = '<?php echo base_url(FRONTEND.'Profile/get_wishlist_documents/') ?>'+$page;
            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'html',
                data: {},
                success: function(response) {
                    $('#wishlist-results').html(response);
                    $('html,body').animate({                    
                         scrollTop: $('#wishlist-results').offset().top - 100
                    });
                }
            });
        }

        $(document).on('click','.addToCompare',function(){
             $(this).addClass('removeToCompare');
             $(this).removeClass('addToCompare');
             $(this).text('Remove from Compare list');
             compare($(this).attr('id'));
             

        })
        $(document).on('click','.removeToCompare',function(){
             $(this).addClass('addToCompare');
             $(this).removeClass('removeToCompare');
             $(this).text('Add To Compare');
             remove_compare_doc($(this).attr('id'));
             
        })


        function compare(id)
        {   

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url().FRONTEND.'Document/doc_compare' ?>',
                dataType: 'html',
                data: {id:id},
                success: function(response) {
                    data = jQuery.parseJSON(response);
                    $.notify({message: data.msg },{type: data.res_type});
                }
            });
        }
        function remove_compare_doc(id)
        {   

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url().FRONTEND.'Document/remove_compare_doc' ?>',
                dataType: 'html',
                data: {id:id},
                success: function(response) {
                    data = jQuery.parseJSON(response);
                    $.notify({message: data.msg },{type: data.res_type});
                }
            });
        }

        $(document).on('click','.add_to_fav',function(){
             add_to_fav($(this).attr('data-id'),$(this));
        });

        function add_to_fav(id,thisclass)
        {   
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url().FRONTEND.'Profile/add_to_fav/' ?>',
                dataType: 'html',
                data: {id:id},
                success: function(response) {
                    data = jQuery.parseJSON(response);
                    $.notify({message: data.msg },{type: data.res_type});
                    if(data.type == 'add'){
                        $(thisclass).addClass('isliked');
                    }else{
                        $(thisclass).removeClass('isliked');
                    }

                }
            });
        }
        /* End : Use for Wishlist page */


        /* Start : My Review l */
        function get_reviews($page = '')
        {
            url = '<?php echo base_url(FRONTEND.'Profile/get_reviews/') ?>'+$page;
            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'html',
                data: {},
                success: function(response) {
                    $('#review-results').html(response);
                    $('html,body').animate({                    
                         scrollTop: $('#review-results').offset().top - 100
                    });
                }
            });
        }


    
        jQuery('.rating-symbol:nth-child(1)').hover(function() {
            jQuery('.review.angry').css({
                'opacity': '1',
                'visibility': 'visible',
            });
        }, function() {
            jQuery('.review.angry').css({
                'opacity': '0',
                'visibility': 'hidden',
            });
        });
        jQuery('.rating-symbol:nth-child(2)').hover(function() {
            jQuery('.review.cry').css({
                'opacity': '1',
                'visibility': 'visible',
            });
        }, function() {
            jQuery('.review.cry').css({
                'opacity': '0',
                'visibility': 'hidden',
            });
        });
        jQuery('.rating-symbol:nth-child(3)').hover(function() {
            jQuery('.review.sleeping').css({
                'opacity': '1',
                'visibility': 'visible',
            });
        }, function() {
            jQuery('.review.sleeping').css({
                'opacity': '0',
                'visibility': 'hidden',
            });
        });
        jQuery('.rating-symbol:nth-child(4)').hover(function() {
            jQuery('.review.smily').css({
                'opacity': '1',
                'visibility': 'visible',
            });
        }, function() {
            jQuery('.review.smily').css({
                'opacity': '0',
                'visibility': 'hidden',
            });
        });
        jQuery('.rating-symbol:nth-child(5)').hover(function() {
            jQuery('.review.cool').css({
                'opacity': '1',
                'visibility': 'visible',
            });
        }, function() {
            jQuery('.review.cool').css({
                'opacity': '0',
                'visibility': 'hidden',
            });
        });

        var rtngSym = jQuery('.rating-symbol');
        var rtngTip = jQuery('input.rating-tooltip');
        myArr = ['angry','cry','sleeping','smily','cool']

        jQuery('.rating-symbol:first-of-type').hover(function() {
            jQuery('.rating-symbol:first-of-type .rating-symbol-foreground svg').css('color', '#de9147');
            /**/
            onHoverStar('.rating-symbol:first-of-type');
            /**/
        }, function() {
            /**/
            overHoverStar();
            // outHoverStar('.rating-symbol:first-of-type');
            /**/
        });
        jQuery('.rating-symbol:nth-of-type(2)').hover(function() {
            jQuery('.rating-symbol:first-of-type .rating-symbol-foreground svg').css('color', '#de9147');
            jQuery('.rating-symbol:nth-of-type(2) .rating-symbol-foreground svg').css('color', '#de9147');
            /**/
            onHoverStar('.rating-symbol:first-of-type');
            onHoverStar('.rating-symbol:nth-of-type(2)');
            /**/
        }, function() {
            /**/
            overHoverStar();
            /**/
        });
        jQuery('.rating-symbol:nth-of-type(3)').hover(function() {
            jQuery('.rating-symbol:first-of-type .rating-symbol-foreground svg').css('color', '#dec435');
            jQuery('.rating-symbol:nth-of-type(2) .rating-symbol-foreground svg').css('color', '#dec435');
            jQuery('.rating-symbol:nth-of-type(3) .rating-symbol-foreground svg').css('color', '#dec435');
            /**/
            onHoverStar('.rating-symbol:first-of-type');
            onHoverStar('.rating-symbol:nth-of-type(2)');
            onHoverStar('.rating-symbol:nth-of-type(3)');
            /**/
        }, function() {
            /**/
            overHoverStar();
            /**/
        });
        jQuery('.rating-symbol:nth-of-type(4)').hover(function() {
            jQuery('.rating-symbol:first-of-type .rating-symbol-foreground svg').css('color', '#c5de35');
            jQuery('.rating-symbol:nth-of-type(2) .rating-symbol-foreground svg').css('color', '#c5de35');
            jQuery('.rating-symbol:nth-of-type(3) .rating-symbol-foreground svg').css('color', '#c5de35');
            jQuery('.rating-symbol:nth-of-type(4) .rating-symbol-foreground svg').css('color', '#c5de35');
            /**/
            onHoverStar('.rating-symbol:first-of-type');
            onHoverStar('.rating-symbol:nth-of-type(2)');
            onHoverStar('.rating-symbol:nth-of-type(3)');
            onHoverStar('.rating-symbol:nth-of-type(4)');
            /**/
        }, function() {
            /**/
            overHoverStar();
            /**/
        });
        jQuery('.rating-symbol:nth-of-type(5)').hover(function() {
            jQuery('.rating-symbol:first-of-type .rating-symbol-foreground svg').css('color', '#73cf42');
            jQuery('.rating-symbol:nth-of-type(2) .rating-symbol-foreground svg').css('color', '#73cf42');
            jQuery('.rating-symbol:nth-of-type(3) .rating-symbol-foreground svg').css('color', '#73cf42');
            jQuery('.rating-symbol:nth-of-type(4) .rating-symbol-foreground svg').css('color', '#73cf42');
            jQuery('.rating-symbol:nth-of-type(5) .rating-symbol-foreground svg').css('color', '#73cf42');
            /**/
            onHoverStar('.rating-symbol:first-of-type');
            onHoverStar('.rating-symbol:nth-of-type(2)');
            onHoverStar('.rating-symbol:nth-of-type(3)');
            onHoverStar('.rating-symbol:nth-of-type(4)');
            onHoverStar('.rating-symbol:nth-of-type(5)');
            /**/
        }, function() {
            /**/
            overHoverStar();
            /**/
        });
        rtngSym.on('click', function(event) {
            event.preventDefault();
            position = $(".rating-symbol").index(this);
            $('input.rating-tooltip').val(position+1);

            var thsVal  = jQuery('input.rating-tooltip').val();

            //alert(thsVal);
            if (thsVal == 1) {
                jQuery('.review.angry').addClass('visible');
                jQuery('.rating-symbol:first-of-type').addClass('angry');
                jQuery('.rating-symbol').removeClass('cry');
                jQuery('.rating-symbol').removeClass('sleeping');
                jQuery('.rating-symbol').removeClass('smily');
                jQuery('.rating-symbol').removeClass('cool');
                /**/
                onHoverStar('.rating-symbol:first-of-type');
                jQuery('.rating-symbol').removeClass('myClass');
                jQuery('.rating-symbol:first-of-type').addClass('myClass');
                /**/
            }else{
                jQuery('.review.angry').removeClass('visible');
            };

            if (thsVal == 2) {
                jQuery('.review.cry').addClass('visible');
                jQuery('.rating-symbol:first-of-type').addClass('cry');
                jQuery('.rating-symbol:nth-of-type(2)').addClass('cry');
                jQuery('.rating-symbol').removeClass('angry');
                jQuery('.rating-symbol').removeClass('sleeping');
                jQuery('.rating-symbol').removeClass('smily');
                jQuery('.rating-symbol').removeClass('cool');
                /**/
                onHoverStar('.rating-symbol:first-of-type');
                onHoverStar('.rating-symbol:nth-of-type(2)');
                jQuery('.rating-symbol').removeClass('myClass');
                jQuery('.rating-symbol:first-of-type').addClass('myClass');
                jQuery('.rating-symbol:nth-of-type(2)').addClass('myClass');
                /**/
            }else{
                jQuery('.review.cry').removeClass('visible');
            };

            if (thsVal == 3) {
                jQuery('.review.sleeping').addClass('visible');
                jQuery('.rating-symbol:first-of-type').addClass('sleeping');
                jQuery('.rating-symbol:nth-of-type(2)').addClass('sleeping');
                jQuery('.rating-symbol:nth-of-type(3)').addClass('sleeping');
                jQuery('.rating-symbol').removeClass('angry');
                jQuery('.rating-symbol').removeClass('cry');
                jQuery('.rating-symbol').removeClass('smily');
                jQuery('.rating-symbol').removeClass('cool');
                /**/
                onHoverStar('.rating-symbol:first-of-type');
                onHoverStar('.rating-symbol:nth-of-type(2)');
                onHoverStar('.rating-symbol:nth-of-type(3)');
                jQuery('.rating-symbol').removeClass('myClass');
                jQuery('.rating-symbol:first-of-type').addClass('myClass');
                jQuery('.rating-symbol:nth-of-type(2)').addClass('myClass');
                jQuery('.rating-symbol:nth-of-type(3)').addClass('myClass');
                /**/
            }else{
                jQuery('.review.sleeping').removeClass('visible');
            };

            if (thsVal == 4) {
                jQuery('.review.smily').addClass('visible');
                jQuery('.rating-symbol:first-of-type').addClass('smily');
                jQuery('.rating-symbol:nth-of-type(2)').addClass('smily');
                jQuery('.rating-symbol:nth-of-type(3)').addClass('smily');
                jQuery('.rating-symbol:nth-of-type(4)').addClass('smily');
                jQuery('.rating-symbol').removeClass('angry');
                jQuery('.rating-symbol').removeClass('cry');
                jQuery('.rating-symbol').removeClass('sleeping');
                jQuery('.rating-symbol').removeClass('cool');
                /**/
                onHoverStar('.rating-symbol:first-of-type');
                onHoverStar('.rating-symbol:nth-of-type(2)');
                onHoverStar('.rating-symbol:nth-of-type(3)');
                onHoverStar('.rating-symbol:nth-of-type(4)');
                jQuery('.rating-symbol').removeClass('myClass');
                jQuery('.rating-symbol:first-of-type').addClass('myClass');
                jQuery('.rating-symbol:nth-of-type(2)').addClass('myClass');
                jQuery('.rating-symbol:nth-of-type(3)').addClass('myClass');
                jQuery('.rating-symbol:nth-of-type(4)').addClass('myClass');
                /**/
            }else{
                jQuery('.review.smily').removeClass('visible');
            };

            if (thsVal == 5) {
                jQuery('.review.cool').addClass('visible');
                jQuery('.rating-symbol:first-of-type').addClass('cool');
                jQuery('.rating-symbol:nth-of-type(2)').addClass('cool');
                jQuery('.rating-symbol:nth-of-type(3)').addClass('cool');
                jQuery('.rating-symbol:nth-of-type(4)').addClass('cool');
                jQuery('.rating-symbol:nth-of-type(5)').addClass('cool');
                jQuery('.rating-symbol').removeClass('angry');
                jQuery('.rating-symbol').removeClass('cry');
                jQuery('.rating-symbol').removeClass('sleeping');
                jQuery('.rating-symbol').removeClass('smily');
                /**/
                onHoverStar('.rating-symbol:first-of-type');
                onHoverStar('.rating-symbol:nth-of-type(2)');
                onHoverStar('.rating-symbol:nth-of-type(3)');
                onHoverStar('.rating-symbol:nth-of-type(4)');
                onHoverStar('.rating-symbol:nth-of-type(5)');
                jQuery('.rating-symbol').removeClass('myClass');
                jQuery('.rating-symbol:first-of-type').addClass('myClass');
                jQuery('.rating-symbol:nth-of-type(2)').addClass('myClass');
                jQuery('.rating-symbol:nth-of-type(3)').addClass('myClass');
                jQuery('.rating-symbol:nth-of-type(4)').addClass('myClass');
                jQuery('.rating-symbol:nth-of-type(5)').addClass('myClass');
                /**/
            }else{
                jQuery('.review.cool').removeClass('visible');
            };

        });

        /* End : My Review */


    </script>

