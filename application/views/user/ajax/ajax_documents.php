<?php $CI =& get_instance();
if(isset($result) && !empty($result)) {

    foreach ($result as $key => $value) {
        $download_ulr = base_url(IMG_DOC.$value['image']);
    	?>
        <div class="list-sc">
            <div class="row">
                <div class="col-md-3 text-center">
                    <div class="documentsicon">
                        <img src="<?php echo FRONTENDPATH ?>images/document.png">                
                        <!-- <i class="fa fa-file-alt"></i> -->
                        <!-- <h6 class=""><a href="<?= $download_ulr ?>">Download</a></h6> -->
                        <h6 class=""><a href="javascript:;" class="downloaddoc" id="<?=$value['id']?>" data-attach="<?=base64_decode($value['image'])?>">Download</a></h6>
                    </div>
                </div>
                <div class="col-md-9">                
                    <h4><?= $value['title']; ?></h4>
                    <ul class="list-dis-list">
                        <li><span><i class="fa fa-envelope"></i></span> <?= $value['email']; ?></li>
                        <li><span><i class="fa fa-info"></i></span> 
                            <?= word_limiter($value['description'],50); ?>
                        </li>
                    </ul>
                    <?php 
                    $wish_data = array();
                    $wish_data['wish_doc_id'] = $value['id'];
                    $this->load->view(FRONTEND.'add_to_wishlist',$wish_data);
                    ?>
                    <?php                 
                    $school_arr = explode(",", $value["schools"]);
                    if(!empty($value["schools"])){
                        $school_tags = $this->db->select("s.name,s.id")->from("tbl_school s")
                               ->where_in('s.id',$school_arr)
                               ->get()->result_array(); 
                        if(!empty($school_tags)){
                            echo 'School :';
                            foreach ($school_tags as $school) {
                                echo ' <a href="'.BASEURL_TLG.'/school/'.md5($school['id']).' " target="_blank" class="badge badge-warning">'.$school['name'].'</a> ';
                            }
                        }
                    }
                    ?>
                    
                    <div class="clearfix"></div>
                    <?php
                    if($this->session->userdata('compareDoc')) {

                        $compareddDocArr = $this->session->userdata('compareDoc');
                        if( in_array($value['id'], $compareddDocArr) ){
                            echo '<a href="javascript:;" class="blue-btn removeToCompare" id="'.$value["id"].'">Remove from Compare list</a>';
                        }else{
                            echo '<a href="javascript:;" class="blue-btn addToCompare" id="'.$value["id"].'">Add To Compare</a>';
                        }
                    }else{
                        echo '<a href="javascript:;" class="blue-btn addToCompare" id="'.$value["id"].'">Add To Compare</a>';
                    }
                    ?>

                    <a href="<?php echo base_url().'document/'.$value["uri"] ?>" class="blue-btn">View</a>
                </div>            
            </div>
        </div>
    <?php
    }

}else{ ?>
    <div class="list-sc alert alert-info">
        <center class="alert alert-info">No Record found!!!</center>
    </div>
    <?php
}
?>
<div class="container">
<div class="pull-right" id='pagination'><?php echo $page_link ?></div>
</div>



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

$(document).on('click','.add_to_fav',function(){
     //$(this).addClass('remove_to_fav');
     //$(this).removeClass('add_to_fav');
     //$(this).text('');
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
            console.log(response);
            $.notify({message: response.msg },{type: response.res_type});
            $("#checkdownload_popup").modal('hide');
            window.location.href = response.data_attach_url;
        }
    });

})
</script>