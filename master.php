<!DOCTYPE html>
<html>

<head>

    <?php include_once 'public_html/includes/commonHeader.php'; ?>
    <link rel='stylesheet' href='assets/css/custom/master.css' media='all' type='text/css'/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body class="front">
    <?php include_once 'public_html/includes/sideBarContent.php'; ?>
        <div class="row">
            <div class="col-lg-12">

                <div class="header-bg" style="background-image:url(images/banner.jpg)">
                    <!-- Gradient overlay -->
                    <div class=" header-content">
                        <div id="masterTitleHolder" class="main-title">
                            <h1 class="bold mb-30 a-f "></h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="inner-slide-com-cot clearfix">
                <div id="masterDetailHolder" class="col-lg-12">
                </div>

            </div>
        </div>
        <div class="row">
            <div id="masterAccordionHolder" class="panel-group">

            </div>
        </div>

        <div class="row tpp-orgl">
            <div class="call-action2 tpp-orgl1">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="bg-r3">

                    <h1 class="event-text-h icon-heading-1"><strong>Photo Gallery   </strong></h1>
                </div>
            </div>
            <div id="masterImageHolder_1"  class="col-lg-12 contentWhiteBG">
                <div class="owl-carousel multi-slides"  data-big="3" data-lightbox="gallery" data-plugin-options='{"items": 4, "singleItem": false, "itemsDesktop": 4, "pagination": false, "navigation": true}'>
                   

                        <?php 
                              $i=0;
                              include('function.php');
                              $cars = array("", "1586675503", "1586675431", "1586687342", "1586687578");
                              $id = $cars[$_REQUEST['masterid']];
                              $resultcat=mysqli_query($con,"Select * from  `td_od_photos` where parentFolderId = $id order by id desc ");
                               if ($resultcat || mysqli_num_rows($resultcat) > 0) {
                              while($row=mysqli_fetch_array($resultcat))
                                  {
                                  $i++;
                        ?>                        
                            <div class="col-md-12">
                                <div class="thumb-item">
                                    <div class="thumb-item-img">
                                        <a href="../cmsadmin/<?php echo $row['path']; ?>" data-lightbox="gallery-item" class="btn-detail">
                                            <img class="img-responsive" src="../cmsadmin/<?php echo $row['path']; ?>" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } }?> 
                </div>
            </div>
        </div>

        <?php include_once 'public_html/includes/footerPage.php'; ?>
        <?php include_once 'public_html/includes/footerScript.php';?>
        <script src="assets/script/js/master.js"></script>
    </body>
</html>