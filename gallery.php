<!DOCTYPE html>
<html>

<head>
    <?php include_once 'public_html/includes/commonHeader.php'; ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body class="front">
    <?php include_once 'public_html/includes/sideBarContent.php'; ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="header-bg" style="background-image:url(images/banner.jpg)">
                <!-- Gradient overlay -->
                <div class=" header-content">
                    <div class="main-title">
                        <h1 class="bold mb-30 a-f ">Gallery  <span class="color"></span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="call-action2">
        <div class="row">
            <div class="col-md-9 programTitleDiv">
                <div class="titleContent">
                    <?php $headerName=a rray( '1586719665'=>'Sadguru Osho Siddharth Aulia', '1586712318' => 'Param Guru Osho','1586719267' => 'Sufi Baba Shah Qalandar', '1586719351' => 'Guru Nanak Dev','1587894961' => 'Oshodhara Nanak Dham', '1587916779' => 'Oshodhara Anand Dham','1587917258' => 'Oshodhara Sahajanand Dham'); $folderid = $_REQUEST['folderid']; ?>
                    <h1><span class="text-colortwo"><?php echo $headerName[$folderid]; ?> </span> </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php include( 'function.php'); $folderid=$ _REQUEST[ 'folderid']; $resultcat=mysqli_query($con, "Select * from  `tb_od_folder` where parentFolderId = $folderid order by id desc "); if ($resultcat && mysqli_num_rows($resultcat)>0) { while($row=mysqli_fetch_array($resultcat)) { ?>
        <div class="col-lg-12">
            <div class="bg-r3">
                <h1 class="event-text-h icon-heading-1"><strong><?php echo $row['foldername']; ?></strong></h1>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="owl-carousel multi-slides" data-big="3" data-lightbox="gallery" data-plugin-options='{"items": 4, "singleItem": false, "itemsDesktop": 4, "pagination": false, "navigation": true}'>
                <?php $photoId=$ row[ 'folderId']; $resultPhoto=mysqli_query($con, "Select * from  `td_od_photos` where parentFolderId = $photoId order by id desc "); if ($resultPhoto || mysqli_num_rows($resultPhoto)>0) { while($photoRow=mysqli_fetch_array($resultPhoto)) { ?>
                <div class="col-md-12">
                    <div class="thumb-item">
                        <div class="thumb-item-img gallery"> <a href="../cmsadmin/<?php echo $photoRow['path']; ?>" data-lightbox="gallery-item" class="btn-detail">
                                        <img class="img-responsive" src="../cmsadmin/<?php echo $photoRow['path']; ?>" alt="">
                                    </a>
                        </div>
                    </div>
                </div>
                <?php } }?>
            </div>
        </div>
        <?php } }?>
    </div>
    <?php include_once 'public_html/includes/footerPage.php'; ?>
    <?php include_once 'public_html/includes/footerScript.php';?>
    <script src="assets/script/js/gallery.js"></script>
</body>

</html>