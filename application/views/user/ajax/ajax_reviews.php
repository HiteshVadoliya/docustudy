<?php $CI =& get_instance();
if(!empty($result)){

    ?>
        
        <div class="row">
            <?php foreach ($result as $key => $value) { ?>
            <div class="col-md-12 list-sc">
                <!-- <h5 class="reviews-title"><?=$value['username']?> -->
                    <ul class="star-se">
                        <?php 
                        for ($i=1; $i <= $value['rating']; $i++) { 
                             ?>  
                            <span class="fas fa-star checked"></span>
                            <?php
                        }
                        ?>
                        <div class="btn btn-primary pull-right editreview" style="float: right;" id="<?=$value['id']?>">Edit</div>
                    </ul>
                </h5>
                <?= $value['review']; ?>
            </div> 
            <?php } ?>
        </div>

    <?php
    

}else{
    echo "<div class='alert alert-info'>No any reviews found.</div>";
}
?>
<div class="container">
<div class="pull-right" id='pagination_reviews'><?php echo $page_link ?></div>
</div>


<div class="modal fade bannerformmodal" id="reviewmodal_popup_edit" tabindex="-1" role="dialog" aria-labelledby="bannerformmodal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
            <form id="reviewform" method="POST" name="reviewform">
                
                <div class="modal-content">      
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel">Leave a Review</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                      
                        <div class="form-group">              
                            <label>How you would rate <span class="doctitle"></span> ? This rating will remain anonymous. *</label>
                            <div class="list-style-none form-review-stars">
                                <span style="cursor: pointer;">
                                    <div class="rating-symbol" style="display: inline-block; position: relative;">
                                        <div class="rating-symbol-background far fa-star fa-2x" style="visibility: visible;"></div>
                                        <div class="rating-symbol-foreground" style="display: inline-block; position: absolute; overflow: hidden; left: 0px; right: 0px; top: 0px; width: 0px;"><span class="fa fa-star fa-2x" style="color: rgb(115, 207, 66);"></span></div>
                                    </div>
                                    <div class="rating-symbol" style="display: inline-block; position: relative;">
                                        <div class="rating-symbol-background far fa-star fa-2x" style="visibility: visible;"></div>
                                        <div class="rating-symbol-foreground" style="display: inline-block; position: absolute; overflow: hidden; left: 0px; right: 0px; top: 0px; width: 0px;"><span class="fa fa-star fa-2x" style="color: rgb(115, 207, 66);"></span></div>
                                    </div>
                                    <div class="rating-symbol" style="display: inline-block; position: relative;">
                                        <div class="rating-symbol-background far fa-star fa-2x" style="visibility: visible;"></div>
                                        <div class="rating-symbol-foreground" style="display: inline-block; position: absolute; overflow: hidden; left: 0px; right: 0px; top: 0px; width: 0px;"><span class="fa fa-star fa-2x" style="color: rgb(115, 207, 66);"></span></div>
                                    </div>
                                    <div class="rating-symbol" style="display: inline-block; position: relative;">
                                        <div class="rating-symbol-background far fa-star fa-2x" style="visibility: visible;"></div>
                                        <div class="rating-symbol-foreground" style="display: inline-block; position: absolute; overflow: hidden; left: 0px; right: 0px; top: 0px; width: 0px;"><span class="fa fa-star fa-2x" style="color: rgb(115, 207, 66);"></span></div>
                                    </div>
                                    <div class="rating-symbol" style="display: inline-block; position: relative;">
                                        <div class="rating-symbol-background far fa-star fa-2x" style="visibility: visible;"></div>
                                        <div class="rating-symbol-foreground" style="display: inline-block; position: absolute; overflow: hidden; left: 0px; right: 0px; top: 0px; width: 0px;"><span class="fa fa-star fa-2x" style="color: rgb(115, 207, 66);"></span></div>
                                    </div>
                                </span>
                                <input type="hidden" name="rating"  id="rating" class="rating-tooltip" data-filled="fas fa-star fa-2x" data-empty="fa fa-star-o fa-2x" value="">
                                <input type="hidden" name="doc_id" id="doc_id" value="<?php echo  $doc_detail['id'] ?>">
                                <div class="review-emoticons">
                                    <div class="review angry"><img class="icon icons8-angry" src="<?php echo base_url().IMG_SMILY ?>angry.png" alt="angry"></div>
                                    <div class="review cry"><img class="icon icons8-crying" src="<?php echo base_url().IMG_SMILY ?>cry.png" alt="crying"></div>
                                    <div class="review sleeping"><img class="icon icons8-sleeping" src="<?php echo base_url().IMG_SMILY ?>sleeping.png" alt="sleeping"></div>
                                    <div class="review smily" style="opacity: 0; visibility: hidden;"><img class="icon icons8-smily" src="<?php echo base_url().IMG_SMILY ?>smily.png" alt="smily"></div>
                                    <div class="review cool" style="opacity: 0; visibility: hidden;"><img class="icon icons8-cool" src="<?php echo base_url().IMG_SMILY ?>cool.png" alt="cool"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">              
                            <label>Please tell us why you left this star rating. Your comment and account name will be shared with the public.</label>
                            <input id="review_commnet" type="text" class="form-control" placeholder="Review" name="review_commnet"/>
                            <input id="editid" type="hidden" name="editid"/>
                        </div>    
                 
                    </div>
                    <div class="modal-footer">
                      <button type="button" id="reviewformBtn" class="btn blue-btn">Submit</button>
                    </div>        
                </div>

            </form>
      </div>
</div>
<script type="text/javascript">

    $('#pagination_reviews').on('click','a',function(e){
        e.preventDefault(); 
        var pageno = $(this).attr('data-ci-pagination-page');
        get_reviews(pageno);
    });


    $('.editreview').click(function(){

        console.log('click edit');
        $("#reviewmodal_popup_edit").modal('show');
        var id = $(this).attr('id');
        url = '<?php echo base_url(FRONTEND.'Profile/edit_review/') ?>';
        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'json',
            data: {type:'get',id:id},
            success: function(response) {
                console.log(response);
                $("#review_commnet").val(response.data.review);
                $("#rating").val(response.data.rating);
                $("#editid").val(response.data.id);

                setTimeout(function(){ $('.rating-symbol:nth-child('+response.data.rating+')').trigger('click');   }, 1000);
            }
        });

    })


    $('#reviewformBtn').click(function(){

        var id = $("#editid").val();
        var review_commnet = $("#review_commnet").val();
        var rating = $('#rating').val();
        url = '<?php echo base_url(FRONTEND.'Profile/edit_review/') ?>';
        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'json',
            data: {
                    type:'post',
                    id:id,
                    review_commnet:review_commnet,
                    rating:rating
                  },
            success: function(response) {
                $.notify({message: response.msg },{type: response.res_type}); 
                //             
                $("#reviewmodal_popup_edit").modal('hide');
                setTimeout(function(){ get_reviews( $('#pagination_reviews li.active').find('a').text() );   }, 1000);
            }
        });

    })







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

    function onHoverStar(element)
    {
        $(element).find('.rating-symbol-background').css('visibility','hidden');
        $(element).find('.rating-symbol-foreground').css('width','auto');
    }

    function outHoverStar(element)
    {
        $(element).find('.rating-symbol-background').css('visibility','visible');
        $(element).find('.rating-symbol-foreground').css('width','0px');
    }

    function overHoverStar()
    {
        let count = 0;
        $('.rating-symbol').each(function(k,v) {
            let check = $(v).hasClass('myClass');
            if(!check) {
                outHoverStar(v);
            }
            else {
                count++;
            }
        });
        if(count > 0) {
            let myArr = { 1: '#de9147', 2: '#de9147', 3: '#dec435', 4: '#c5de35', 5: '#73cf42'}
            $('.myClass').find('.rating-symbol-foreground span').css('color', myArr[count]);
        }
    }
    /* Rating */


</script>