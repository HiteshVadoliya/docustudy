    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <div class="slider-se">
        <div class="container">
        <!-- <img src="<?php echo FRONTENDPATH ?>images/slider-background.png"> -->
            <div class="search-box-po">
                <div class="search-box">
                    <h1>Find your study resources</h1>
                    <p>The best documents shared by your fellow students, organized in one place.</p>                
                    <div class="search-text-box">
                        <form action="<?php echo base_url('search') ?>" method="get">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <select name="schooltype" >
                                        <option value="">All</option>
                                        <option value="0">Primary</option>
                                        <option value="1">Secondary</option>
                                        <option value="2">Tertiary</option>
                                        <option value="3">Special needs</option>
                                    </select>
                                </div>
                                <input name="search" type="text" class="form-control" placeholder="Search for courses, books or documents" >
                                <div class="btn-rught">
                                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="search-history-se padding-70">
        <div class="container">
            <div class="comman-title">
                <h3>We’ve got the best study material for you</h3>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="icon-title">
                        <h4><span><i class="fa fa-search"></i></span>Most Popular Searches</h4>
                    </div>
                    <p>Organisational behaviour</p>
                    <p>Financial accounting</p>
                    <p>Management accounting</p>
                    <p>Financial accounting theory</p>
                    <p>Criminal law and procedure</p>
                    <p>Introduction to management</p>
                    <p>Human anatomy and physiology</p>
                    <p>Metabolic biochemistry</p>
                    <p>Principles of finance</p>
                    <p>Auditing and assurance services</p>
                    <p>Cell biology and genetics</p>
                </div>
                <div class="col-md-4">
                    <div class="icon-title">
                        <h4><span><i class="fa fa-book"></i></span>Most Popular Books</h4>
                    </div>
                    <p>Management Accounting</p>
                    <p>Financial Institutions Australian Torts Law</p>
                    <p>Financial Reporting</p>
                    <p>Company Accounting</p>
                    <p>Business Law</p>
                    <p>Accounting Information Systems</p>
                    <p>Clinical Exercise Physiology</p>
                    <p>Crime and Justice: A guide to criminology</p>
                    <p>Management Accounting</p>
                    <p>Data Communications and Networking</p>
                </div>
                <div class="col-md-4">
                    <div class="icon-title">
                        <h4><span><i class="fa fa-file"></i></span>Most Popular Documents</h4>
                    </div>
                    <p>ECON 1101 -Lecture notes  </p>
                    <p>Corporate Finance Solutions Manual </p>
                    <p>Summary Principles of Marketing </p>
                    <p>Exam in March 2013, Human-Computer </p>
                    <p>Exam 2012, Data Mining, questions </p>
                    <p>Revision Notes, Principles </p>
                    <p>Revision Notes, International </p>
                    <p>Law, complete</p>
                    <p>Jurisprudence Summary - Lecture notes</p>
                    <p>Law Of Trust - Lecture notes</p>
                    <p>Lecture notes Human Biosciences A, </p>
                </div>
            </div>
        </div>
        
    </div>


    <div class=" padding-70">
       <div class="container">
          <div class="comman-title">
             <h3>Submit a completed doc</h3>
             <p>Please signup / signin for earn credit.</p>
          </div>
            <form method="post" id="SubmitDocument" name="SubmitDocument" enctype="multipart/form-data">
                <div class="row">                     
                   <div class="form-group col-md-4">
                      <label>Name</label> 
                      <input type="text" id="doc_name" name="doc_name" class="form-control validate" placeholder="Name">
                   </div>
                   <div class="form-group col-md-4">
                      <label>Document Title</label> 
                      <input type="text" id="doc_title" name="doc_title" class="form-control validate" placeholder="Document title">
                   </div>
                   <div class="form-group col-md-4">
                      <label>Email</label> 
                      <input type="text" id="doc_email" name="doc_email" class="form-control validate" placeholder="Email">
                   </div>
                   <div class="form-group col-md-12">
                      <label>Description</label> 
                      <textarea class="form-control" id="doc_description" name="doc_description" rows="5" placeholder="Description" ></textarea>
                   </div>                
                   <div class="form-group col-md-12">
                        <label>Add Document</label>
                        <div class="custom-input">
                          <input type="file" class="custom-file-input" id="doc_document" name="doc_document" class="" placeholder="Document">
                          <label class="custom-file-label"></label>
                      </div>
                   </div>
                   <div class="form-group col-md-12">
                        <label>Schools</label>
                        
                            <select class="js-example-basic-multiple form-control" name="schools[]" id="schools" multiple="multiple">
                                <?php foreach ($schoollist as $key => $value): ?>                                    
                                        <option value="<?=$value['id']?>"><?=$value['name']?></option>
                                <?php endforeach ?>?>
                            </select>
                      
                   </div>
               </div>                   
                   <div class="">
                      <button type="submit" class="btn btn-deep-orange nav-link blue-btn animation_button mr-2">Submit Document</button> 
                      <a class="m-2" href="javascript:;" data-toggle="modal" data-target="#modalRegisterForm">Signup</a> |
                      <a class="m-2" href="<?= base_url('documents'); ?>" >View Document List</a>
                   </div>
               </div>
            </form>
        </div>
    </div>       


    <!-- <div class="submitdoc_withoutlogin">
            <div class="loginbtnform"><a href="<?php echo base_url('login'); ?>" class="btn btn-primary">Login To Submit Documents</a></div>
    </div> -->

    <div class="about-se padding-70">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="pro-box">
                        <div class="dorp-img">
                            <img src="<?php echo FRONTENDPATH ?>images/img.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="comman-title">
                        <h3><?= $cms['title']; ?> </h3>
                        <?= word_limiter($cms['description'],100);  ?>
                    </div>        
                    <a href="<?= base_url('about'); ?>" class="blue-btn"> View More </a>
                </div>
            </div>
        </div>
    </div>

    <div class="review-se padding-70">
        <div class="container">
            <div class="comman-title">
                <h3>Review Doc Case studies</h3>
                <p>Stories of engagement, satisfaction, and learning outcomes</p>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="pro-box">
                        <div class="dorp-img">
                            <img src="<?php echo FRONTENDPATH ?>images/img2.jpg" alt="">
                        </div>
                        <h4><a href="#">All Saints Grammar </a></h4>
                        <div class="star-se">
                            <i class="fa fa-star "></i>
                            <i class="fa fa-star "></i>
                            <i class="fa fa-star "></i>
                            <i class="fa fa-star "></i>
                            <i class="fa fa-star "></i>
                            0 reviews
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="pro-box">
                        <div class="dorp-img">
                            <img src="<?php echo FRONTENDPATH ?>images/img3.jpg" alt="">
                        </div>
                        <h4><a href="#">Test School Comparision </a></h4>
                        <div class="star-se">
                            <i class="fa fa-star "></i>
                            <i class="fa fa-star "></i>
                            <i class="fa fa-star "></i>
                            <i class="fa fa-star "></i>
                            <i class="fa fa-star "></i>
                            0 reviews
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="pro-box">
                        <div class="dorp-img">
                            <img src="<?php echo FRONTENDPATH ?>images/img4.jpg" alt="">
                        </div>
                        <h4><a href="#">Teacher Books </a></h4>
                        <div class="star-se">
                            <i class="fa fa-star "></i>
                            <i class="fa fa-star "></i>
                            <i class="fa fa-star "></i>
                            <i class="fa fa-star "></i>
                            <i class="fa fa-star "></i>
                            0 reviews
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="text-center padding-bottom-70">
        <img src="<?php echo FRONTENDPATH ?>images/doc.png">
    </div>

    <div class="blue-se">
        <div class="container">
            <div class="comman-title">
                <h3>You're in good company</h3>
                <p>Hundreds of thousands of students from around the world are already using<br> StuDocu to share their documents and improve their grades.</p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="box-box-shadow">
                        <img src="<?php echo FRONTENDPATH ?>images/Universities.png">
                        <p>12,380</p>
                        <h4>Universities</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-box-shadow">
                        <img src="<?php echo FRONTENDPATH ?>images/books.png">
                        <p>69,955</p>
                        <h4>Books</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-box-shadow">
                        <img src="<?php echo FRONTENDPATH ?>images/ExamQuestions.png">
                        <p>929,784</p>
                        <h4>Exam Questions</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="left-right-se padding-70">
         <div class="container">
            <div class="comman-title text-center" >
                <h3>Everything you need to improve your grades</h3>                
            </div>            
            <div class="left-content">
                <div class="circal-box">
                    <i class="fa fa-download"></i>
                </div>
                <h5>Free study resources</h5>
                <p>Download free study guides, summaries, exams,<br> lecture notes, assignments, solutions and much more!</p>
            </div>
            <div class="right-content">
                <div class="circal-box">
                    <i class="fa fa-bahai"></i>
                </div>
                <h5>Simply the best</h5>
                <p>All the documents have been rated by your fellow <br> students to maintain excellent quality.</p>
            </div>

            <div class="left-content">
                <div class="circal-box">
                    <i class="fa fa-bell"></i>
                </div>
                <h5>Don’t miss out!</h5>
                <p>We will keep you informed of the new documents <br> that other students have uploaded for your courses.</p>
            </div>
            <div class="right-content">
                <div class="circal-box">
                    <i class="fa fa-question-circle"></i>
                </div>
                <h5>Ask questions, get answers</h5>
                <p>Can’t figure out the answer to a question? Ask for <br>help and your fellow students will be glad to answer.</p>
            </div>

        </div>
    </div>


    <div class="find-uni-se padding-30" >
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="padding-60">
                        <div class="comman-title" >
                            <h3>Find your university</h3>                
                            <p>Just type the name of your university and start browsing your courses.</p>
                        </div>       
                        <div class="search-text-box">
                            <input type="text" class="form-control" placeholder="Type to start searching">
                            <div class="btn-rught">
                                <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-right">
                        <img src="<?php echo FRONTENDPATH ?>images/uni.png">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="app-se padding-70">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="img-left">
                        <img src="<?php echo FRONTENDPATH ?>images/desk.png">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="">
                        <div class="comman-title" >
                            <h3>Study anytime, anywhere,  on any device</h3>                
                            <p>Because your planning is not always perfect, you need to be able to study whenever, wherever. Just practice your exam one last time on  your tablet or phone while you're on the go.</p>
                            <h4>Get the App</h4>
                        </div>       
                        <img src="<?php echo FRONTENDPATH ?>images/app.png">
                        <img src="<?php echo FRONTENDPATH ?>images/apple.png">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>

        $(document).ready(function(){
            $('.js-example-basic-multiple').select2({
               placeholder: " Select School",
               allowClear: true
            });

            //$('.js-example-basic-multiple').select2();
            $("#SubmitDocument").validate({
                rules: {
                    doc_name: { required:true },
                    doc_email: { required:true, email:true },
                    doc_title: { required:true },
                    doc_description: { required:true },
                    doc_document: { required:true },
                },
                messages: {
                    doc_name: { required: "Please enter name" },
                    doc_email: { required: "Please enter email" },
                    doc_title: { required: "Please document title" },
                    doc_description: { required: "Please enter description" },
                    doc_document: { required: "Please Upload document" },
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
                        url: '<?php echo base_url().FRONTEND.'Document/doc_submit' ?>',
                        data: formData,
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            data = jQuery.parseJSON(data);
                            if(data.res) {
                                $.notify({message: data.msg },{type: data.res_type});
                                /*setTimeout(function(){
                                    window.location.href = data.last_page;
                                },2000);*/
                            } else {
                                $.notify({message: data.msg },{type: data.res_type});
                            }
                            jQuery(btn_class).html(btn_val);
                            $("#SubmitDocument")[0].reset();
                            $('.custom-file-label').html('');                            
                            $('#schools').val(null).trigger('change');
                        }
                    });
                    return false;
                }
            });
        });
    </script>
    <script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>


