<?php $CI =& get_instance();
if(isset($result) && !empty($result)) {
    foreach ($result as $key => $value) {
        $download_ulr = base_url(IMG_DOC.$value['image']);
    	?>
        <div class="list-sc">
            <a href="<?php echo $download_ulr; ?>"> <img src="<?php echo FRONTENDPATH ?>images/document.png"></a>
            <h4><?= $value['title']; ?></h4>
            <!-- <div class="fav-icon"><i class="fa fa-heart"></i></div> -->
            <h6 class=""><a href="<?= $download_ulr ?>">Download</a></h6>
            <div class="view-bor">
                <a href="<?php echo base_url().'document/'.$value["uri"] ?>">View</a>
            </div>
            <?php if($value['status'] == 0) { ?>
            <div class="badge badge-warning">Under Review</div>
            <?php } ?>
        </div>
    <?php
    }
} else {
    ?>
    <div class="list-sc">
        <center>No Uploads found</center>
    </div>
    <?php
}
?>
<div class="container">
<div class="pull-right" id='paginationdownload'><?php echo $page_link ?></div>
</div>
<script type="text/javascript">

$('#paginationdownload').on('click','a',function(e){
    e.preventDefault(); 
    var pageno = $(this).attr('data-ci-pagination-page');
    my_download(pageno);
});

</script>