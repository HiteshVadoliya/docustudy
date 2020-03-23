<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $pageTitle; ?></title>
    <meta charset="utf-8">
    <link rel="icon" href="<?php echo FRONTENDPATH ?>/images/favicon.png" type="images/favicon.png" sizes="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo FRONTENDPATH ?>css/bootstrap.min.css">  
    <link rel="stylesheet" href="<?php echo FRONTENDPATH ?>css/style.css">  

    <link rel="stylesheet" href="<?php echo FRONTENDPATH ?>css/all.min.css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>    
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    
    <script src="<?= FRONTENDPATH; ?>js/bootstrap-notify.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">
    <script type="text/javascript">
    let base_url = '<?= base_url() ?>';
    </script>
</head>

<body>
    
    <!-- ========== Header Start ========== -->
    <?php echo $header; ?>
    <!-- ========== Header Start ========== -->

    <!-- ========== Body Start ========== -->
    <?php echo $content_body; ?>
    <!-- ========== Body Start ========== -->    

    <!-- ========== Footer Start ========== -->
    <?php echo $footer; ?>
    <!-- ========== Footer Start ========== -->

    <script src="<?= FRONTENDPATH ?>js/bootstrap.min.js"></script>

    <script src="<?= FRONTENDPATH ?>js/all.min.js"></script>
    <script type="text/javascript">
        //$.notify({message: "Please login to purchase plan." },{type: 'danger'});
    </script>

</body>
</html>

