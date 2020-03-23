<style type="text/css">
.badge_compare_remove{
    background: #ff0000;
    color: #fff;
    width: 28px;
    float: right;
    height: 27px;
    top: 0;
    cursor: pointer;
    border-radius: 50%;
    text-align: center;
    padding: 3px 0px;
    font-size: 15px;
}
</style>
<?php

function get_compare_td($fields,$compareArr){
    
    foreach ($compareArr as $key => $value) { 
        $closeId = 'closid_'.$value['id'];
        if($fields == "title"){
        ?>    
        <td data-th="Title" class="<?=$closeId?>">
            <div class="logo-of-brand">
                <div class="badge_compare_remove" id="<?=$value['id']?>">X</div>
                <img src="<?php echo FRONTENDPATH ?>images/document.png">  
                <h3><a href="<?php echo base_url().'document/'.$value["uri"] ?>"><?=$value['title']?> </a></h3>
                
            </div>
        </td>    
        <?php }
        if($fields == "name"){ ?>
             <td data-th="title" class="<?=$closeId?>"><?=$value['name']?></td>
        <?php }


        if($fields == "email"){ ?>
             <td data-th="title" class="<?=$closeId?>"><?=$value['email']?></td>
        <?php }   

        if($fields == "description"){ ?>
             <td data-th="title" class="<?=$closeId?>"><?=  word_limiter($value['description'],50)?></td>
        <?php }


        if($fields == "rating"){ ?>
             <!-- <td data-th="title" class="<?=$closeId?>"><?=  word_limiter($value['description'],50)?></td> -->
            <td class="<?=$closeId?>">
            <ul class="star-se text-center">
             <?php 
             for ($i=0; $i < $value['ratingstart']; $i++) {  ?>
                    <span class="fa fa-star "></span>
            <?php  } ?>
                </ul>
            </td>

        <?php }  


        if($fields == "review"){ ?>
             <td data-th="title" class="<?=$closeId?>"><?=  word_limiter($value['review'],50)?></td>
        <?php }
         
    } 

}
?>
<div class="slider-se bradscarm-se">
    <div class="container">
        <div class="search-box-po">
            <div class="search-box">
                <h1>Compare List</h1>
            </div>
        </div>
    </div>
</div>
<div class="padding-70">
    <div class="container">
        

         <?php
            if(empty($compare_result)) {
            ?>
                <div class="text-center nodata">                    
                    <h4 class="alert alert-info">No Data for Compare</h4>
                </div>
            <?php
            }else{
            ?>

                <table class="rwd-table">
                    <tbody>
                        
                        <tr class="text-center">
                            <th></th>
                            <?php  get_compare_td('title',$compare_result); ?>
                        </tr>
                        <tr class="text-center">
                            <td data-th="title"><strong>Author</strong></td>
                            <?php  get_compare_td('name',$compare_result); ?>
                        </tr>
                        <tr class="text-center">
                            <td data-th="title"><strong>Email</strong></td>
                            <?php  get_compare_td('email',$compare_result); ?>
                        </tr>
                        <tr class="text-center">
                            <td data-th="title"><strong>Description</strong></td>
                            <?php  get_compare_td('description',$compare_result); ?>
                        </tr>
                        <tr class="text-center">
                            <td data-th="title"><strong>Ratings</strong></td>
                            <?php  get_compare_td('rating',$compare_result); ?>
                        </tr>
                        <tr class="text-center">
                            <td data-th="title"><strong>Review</strong></td>
                            <?php  get_compare_td('review',$compare_result); ?>
                        </tr>
                        <tr>
                        </tr>
                        
                        
                        <!-- <tr>
                        </tr>
                        <tr class="text-center">
                            <td data-th="title"><strong>Sector</strong></td>
                            <td data-th="title"></td>
                            <td data-th="title">Public, Private, Independent, Government</td>
                        </tr>
                        <tr class="text-center">
                            <td data-th="title"><strong>Gender</strong></td>
                            <td data-th="title">Coeducation</td>
                            <td data-th="title">Male</td>
                        </tr>
                        <tr class="text-center">
                            <td data-th="title"><strong>Religion</strong></td>
                            <td data-th="title">Greek Orthodox</td>
                            <td data-th="title">Religion</td>
                        </tr>
                        <tr class="text-center">
                            <td data-th="title"><strong>Students</strong></td>
                            <td data-th="title">201-500</td>
                            <td data-th="title">201-500</td>
                        </tr>
                        <tr class="text-center">
                            <td data-th="title"><strong>Type</strong></td>
                            <td data-th="title">Primary, Secondary</td>
                            <td data-th="title">Primary, Secondary, Tertiary, Special Needs</td>
                        </tr>
                        <tr class="text-center">
                            <td data-th="title"><strong>Selective</strong></td>
                            <td data-th="title">No</td>
                            <td data-th="title">Yes</td>
                        </tr>
                        <tr class="text-center">
                            <td data-th="title"><strong>Boarding / Housing</strong></td>
                            <td data-th="title">No</td>
                            <td data-th="title">No</td>
                        </tr>
                        <tr class="text-center">
                            <td data-th="title"><strong>International Students</strong></td>
                            <td data-th="title">Yes</td>
                            <td data-th="title">No</td>
                        </tr>
                        <tr class="text-center">
                            <td data-th="title"><strong>Special Needs</strong></td>
                            <td data-th="title">No</td>
                            <td data-th="title">No</td>
                        </tr>
                        <tr class="text-center">
                            <td data-th="title"><strong>Scholarships</strong></td>
                            <td data-th="title">Yes</td>
                            <td data-th="title">No</td>
                        </tr>
                        <tr class="text-center">
                            <td data-th="title"><strong>IB Diploma Programme</strong></td>
                            <td data-th="title">No</td>
                            <td data-th="title">No</td>
                        </tr>
                        <tr>
                        </tr>
                        <tr class="text-center">
                            <td data-th="title"><strong>Database Rank</strong></td>
                            <td data-th="title">0</td>
                            <td data-th="title">0</td>
                        </tr> -->

                    </tbody>
                </table>

            <?php } ?>
    </div>
</div>

<script type="text/javascript">
    
    

    $(document).on('click','.badge_compare_remove',function(){

         remove_compare_doc($(this).attr('id'));
    
    })

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
                $('.closid_'+id).remove();
            }
        });
    }

</script>
