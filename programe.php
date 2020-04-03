<?php include_once 'cmsadmin/config/config.php'; 
 include_once 'cmsadmin/config/database.php'; 

 $id = $_GET['programid'];
 $sql = "Select * from tb_od_program where programid=$id";
 $result = mysqli_query($link, $sql);
 $output = mysqli_fetch_assoc($result);
 
 ?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once 'public_html/includes/commonHeader.php'; ?>
    <link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css' />
    <script defer src="js/solid.js"></script>

    <script src="vendor/modernizr/modernizr.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style type="text/css">
        body,
        td,
        th {
            font-family: Dosis, sans-serif;
            font-size: 14px;
            color: #333;
        }
        
        body {
            background-color: #ddcdbd;
        }
        #more {display: none;}

    </style>
</head>

<body class="front">
    <?php include_once 'public_html/includes/sideBarContent.php'; ?>


        <div class="row">
            <div class="col-lg-12">

                <div class="header-bg" style="background-image:url(images/banner.jpg)">
                    <div id="programTitleHolder" class=" header-content">
                        <div class="main-title">
                            <h1 class="bold mb-30 a-f "><?php echo $output['programname']  ?></h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div  class="inner-slide-com-cot">
            <?php echo $output['longdescription']  ?>
                        <a href="index.html" class="btn btn-primary"> Read More >></a></p>
                </div>

                <div class="col-lg-5">
                    <div class="owl-carousel main-slides first-slides" data-plugin-options='{"items": 1, "autoPlay": true, "navigation": true}'>
                        <div class="slide-item">

                            <div class="row">

                                <div class="col-md-12">
                                    <img class="img-responsive" src="images/osho.15001.jpg" alt="">
                                </div>
                            </div>

                        </div>
                        <div class="slide-item">

                            <div class="row">

                                <div class="col-md-12">
                                    <img class="img-responsive" src="images/osho.15001.jpg" alt="">
                                </div>
                            </div>

                        </div>
                        <div class="slide-item">

                            <div class="row">

                                <div class="col-md-12">
                                    <img class="img-responsive" src="images/osho.15001.jpg" alt="">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row tpp-orgl">

            <div class="call-action2 tpp-orgl1">

                <div class="col-md-9">
                    <div class="content">
                        <h1>Future <span class="text-colortwo">Intake </span> </h1>
                    </div>

                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive">
                    <form id="contact-form" action="#" method="POST" novalidate="novalidate">
                        <table class="table">

                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Venue</th>
                                    <th>Conducting Aachrya</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">

                                            Monday, 2 March 2020
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">

                                            Murthal
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">

                                            Bade Baba
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="submit" value="Book Your Seat" class="btn btn-primary" data-loading-text="Loading...">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="form-group">Monday, 8 March 2020</span></td>
                                    <td><span class="form-group">Murthal</span></td>
                                    <td><span class="form-group">Bade Baba</span></td>
                                    <td><span class="form-group"><input type="submit" value="Book Your Seat" class="btn btn-primary" data-loading-text="Loading..."></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <?php include_once 'public_html/includes/footerPage.php'; ?>
        <?php include_once 'public_html/includes/footerScript.php'; ?>

    <script src="vendor/jquery/jquery.js"></script>
    <script src="vendor/bootstrap/bootstrap.js"></script>
    <script src="vendor/jquery.validation/jquery.validation.js"></script>
    <script src="vendor/owlcarousel/owl.carousel.js"></script>
    <script src="vendor/flexslider/jquery.flexslider-min.js"></script>
    <script src="vendor/countdown/countdown.min.js"></script>
    <script src="vendor/chosen/chosen.jquery.min.js"></script>
    <script src="vendor/pricefilter/jquery.pricefilter.js"></script>
    <script src="vendor/masonry/imagesloaded.pkgd.min.js"></script>
    <script src="vendor/masonry/masonry.pkgd.min.js"></script>
    <script src="vendor/uikit/uikit.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
    <script src="assets/script/libs/mustache.min.js"></script>
    <script src="assets/script/js/headerProgramCategory.js"></script>
    <script src="assets/script/js/program.js"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="js/theme.js"></script>

    <!-- Style Switcher -->
    <script type="text/javascript" src="style-switcher/js/switcher.js"></script>
    <script src='js/SidebarNav.min.js' type='text/javascript'></script>
    <script>
        $('.sidebar-menu').SidebarNav()
    </script>
    <script type="text/javascript"></script>
    </body>
</html>