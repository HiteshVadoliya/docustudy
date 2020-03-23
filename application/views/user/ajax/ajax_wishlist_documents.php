<?php $CI =& get_instance();
if(!empty($result)){
    foreach ($result as $key => $value) {
        $download_ulr = base_url(IMG_DOC.$value['image']);
    	?>
        <div class="list-sc">
            <div class="row">
                
                <div class="col-md-12">                
                    <h4><?= $value['title']; ?></h4>
                    <ul class="list-dis-list">
                        <li><span><i class="fa fa-envelope"></i></span> <?= $value['email']; ?></li>
                        <li><span><i class="fa fa-info"></i></span> 
                            <?= word_limiter($value['description'],20); ?>
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
}else{
    echo "<div class='alert alert-info'>No any wishlist found.</div>";
}
?>
<div class="container">
<div class="pull-right" id='pagination_wishlist'><?php echo $page_link ?></div>
</div>
<script type="text/javascript">

$('#pagination_wishlist').on('click','a',function(e){
    e.preventDefault(); 
    var pageno = $(this).attr('data-ci-pagination-page');
    get_wishlist_documents(pageno);
});


</script>