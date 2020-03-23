<div class="slider-se bradscarm-se">
    <div class="container">
        <div class="search-box-po">
            <div class="search-box">
                <h1>Details </h1>
            </div>
        </div>
    </div>
</div>
<div class="padding-70">
    <div class="container">
        <div class="comman-title">
            <h3>School Details</h3>
        </div>
       	<div class="row">
       		<div class="col-md-5">
       			<div class="documents-icon">
                    <img src="<?php echo FRONTENDPATH ?>images/document.png">                
                    <!-- <i class="fa fa-file-alt"></i> -->                    
                    <h6 class=""><a href="javascript:;" class="downloaddoc" id="<?=$doc_detail['id']?>" data-attach="<?=base64_decode($doc_detail['image'])?>">Download</a></h6>
                </div>
       		</div>
       		<div class="col-md-7"> 
                <div class="page-deials">               
                    <h4><?=$doc_detail['title']?> <span><a href="" data-toggle="modal" data-target=".bannerformmodal" class="blue-btn"> Leave a review! </a></span></h4>               
                    <ul class="add-text-phon">	                	
    	             	<li> <i class="fa fa-envelope"></i> <?=$doc_detail['email']?></li>
    	             	<li> <i class="fa fa-phone"></i> 0123456789 </li>	             	
                    </ul> 

                 	<?=$doc_detail['description']?>
                 	<div class="clearfix"></div>
                    <br>
                    <?php                 
                    $school_arr = explode(",", $doc_detail["schools"]);
                    if(!empty($doc_detail["schools"])){
                        $school_tags = $this->db->select("s.name")->from("tbl_school s")
                               ->where_in('s.id',$school_arr)
                               ->get()->result_array(); 
                        if(!empty($school_tags)){
                            echo 'School :';
                            foreach ($school_tags as $school) {
                                echo ' <span class="badge badge-warning">'.$school['name'].'</span> ';
                            }
                        }
                    }
                    ?>

                    <div class="clearfix"></div>
                    <br>
                    <?php
                    if($this->session->userdata('compareDoc')) {

                        $compareddDocArr = $this->session->userdata('compareDoc');
                        if( in_array($doc_detail['id'], $compareddDocArr) ){
                            echo '<a href="javascript:;" class="blue-btn removeToCompare" id="'.$doc_detail["id"].'">Remove from Compare list</a>';
                        }else{
                            echo '<a href="javascript:;" class="blue-btn addToCompare" id="'.$doc_detail["id"].'">Add To Compare</a>';
                        }
                    }else{
                        echo '<a href="javascript:;" class="blue-btn addToCompare" id="'.$doc_detail["id"].'">Add To Compare</a>';
                    }
                    ?>

                 </div>
            </div>
       	</div>
    </div>
</div>



<div class="padding-70 gry-se">
	<div class="container">
		<div class="comman-title">
			<h3> <?php echo count($result_review); ?> WRITTEN REVIEWS</h3>
		</div>
        <div class="row">
            <?php foreach ($result_review as $key => $value) { ?>
            <div class="col-md-6">
                <h5 class="reviews-title"><?=$value['username']?>
                    <ul class="star-se">
                        <?php 
                        for ($i=1; $i <= $value['rating']; $i++) { 
                             ?>  
                            <span class="fas fa-star checked"></span>
                            <?php
                        }
                        ?>
                        <!-- <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span>
                        <span class="fas fa-star checked"></span> -->
                    </ul>
                </h5>
        		<?= $value['review']; ?>
            </div> 
            <?php } ?>
        </div>

 		<!-- <a href="javascript:;" class="blue-btn">Load More</a>                 -->
	</div>
</div>

<div class="padding-70 ">
	<div class="container text-center">
		<div class="comman-title">
			<h3>Upcoming Document</h3>
		</div>		 		
		<div class="row">
			<div class="col-md-4">
				<div class="documents-icon">
                    <img src="<?php echo FRONTENDPATH ?>images/document.png">                
                    <!-- <i class="fa fa-file-alt"></i> -->
                    <h4>Fine name</h3>
                    <!-- <h6 class=""><a href="#">Download</a></h6> -->
                </div>
			</div>
			<div class="col-md-4">
				<div class="documents-icon">
                    <img src="<?php echo FRONTENDPATH ?>images/document.png">                
                    <!-- <i class="fa fa-file-alt"></i> -->
                    <h4>Fine name</h3>
                    <!-- <h6 class=""><a href="#">Download</a></h6> -->
                </div>
			</div>
			<div class="col-md-4">
				<div class="documents-icon">
                    <img src="<?php echo FRONTENDPATH ?>images/document.png">                
                    <!-- <i class="fa fa-file-alt"></i> -->
                    <h4>Fine name</h3>
                    <!-- <h6 class=""><a href="#">Download</a></h6> -->
                </div>
			</div>
		</div>
	</div>
</div>


<?php 

echo $this->load->view(FRONTEND.'review_modal'); 
?>

<div class="modal fade bannerformmodal" id="checkdownload_popup" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
            <form id="reviewform" method="POST" name="reviewform">
                
                <div class="modal-content">      
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel">Download Document</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>

                    <div class="modal-body">
                        <div class="" style="    font-size: 25px;color: #28a745;"> 
                            Your Credit Score : <i class="fa fa-trophy" aria-hidden="true"></i> <span class="total_scror">0</span> </span>
                        </div> 
                        <br>
                        Click <strong>"Download Now"</strong> button below if you are ready to download document by paying 
                        <span class="" style="color: #ff0000;">
                            <i class="fa fa-trophy" aria-hidden="true"></i> 1 </span>
                        </span> credit score
                        <input type="hidden" name="docid" id="docid">
                        <input type="hidden" name="data_attach" id="data_attach">
                        <br/><br/>
                        <center><h6 style="color: red;" class="no_credit_msg"></h6></center>
                    </div>
                  
                    <div class="modal-footer">
                      <button type="button" id="reviewformBtn" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <div id="removeid"><button type="button" id="payAnddownloaddoc" class="btn blue-btn">Download Now</button></div>
                    </div>        
                </div>

            </form>
      </div>
</div>


<script type="text/javascript">
    /* Rating */
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
    /* Rating */

</script>

<script type="text/javascript">

$('#pagination').on('click','a',function(e){
    e.preventDefault(); 
    var pageno = $(this).attr('data-ci-pagination-page');
    get_documents(pageno);
});

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

/* document download */

$('.downloaddoc').click(function(){

    $("#checkdownload_popup").modal('show');
    var id = $(this).attr('id');
    var data_attach = $(this).attr('data-attach');
    $('#docid').val(id);
    
    url = '<?php echo base_url(FRONTEND.'Profile/get_download_data/') ?>';
    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        data: {type:'get',id:id},
        success: function(response) {
            if(response.total_reward > 0) {
                $(".total_scror").text(response.total_reward);
                $(".no_credit_msg").text("");
                $("#removeid").html('<button type="button" id="payAnddownloaddoc" class="btn blue-btn">Download Now</button>');
            } else {
                $("#payAnddownloaddoc").remove();
                $(".no_credit_msg").text("You don't have enought credit balance to download");
            }
            
        }
    });

})
$('#removeid').click(function(){

    $("#checkdownload_popup").modal('show');
    var id = $('#docid').val();
    url = '<?php echo base_url(FRONTEND.'Profile/pay_and_download/') ?>';
    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        data: {type:'get',id:id},
        success: function(response) {
            $.notify({message: response.msg },{type: response.res_type});
            $("#checkdownload_popup").modal('hide');
            window.location.href = response.data_attach_url;
        }
    });

})
/* document download */
</script>