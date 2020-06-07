<!DOCTYPE html>
<html>

<head>
    <?php include_once 'public_html/includes/commonHeader.php'; ?>
    <link href='assets/css/custom/program.css' media='all' rel='stylesheet' type='text/css' />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body class="front">
    <?php include_once 'public_html/includes/sideBarContent.php'; ?>


        <div class="row">
            <div class="col-lg-12">

                <div class="header-bg" style="background-image:url(images/banner.jpg)">
                    <div id="programTitleHolder" class=" header-content">
                        <div class="main-title">
                            <h1 class="bold mb-30 a-f "></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div  class="inner-slide-com-cot clearfix">
                <div id="programDetailHolder" class="col-lg-12">
                    
                </div>
            </div>
        </div>

        <div class="row tpp-orgl">

            <div class="call-action2 tpp-orgl1">

                <div class="col-md-9">
                    <div class="programHeading">
                        <h1>Future <span class="text-colortwo">Intake </span> </h1>
                    </div>

                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive">
                    <form id="contact-form" action="#" method="POST" novalidate="novalidate">
                        <table class="table table-striped">

                            <thead class="programTableHead">
                                <tr>
                                    <th class="programTableHeader">Venue</th>
                                    <th class="programTableHeader">Date</th>
                                    <th class="programTableHeader">level</th>
                                    <th class="programTableHeader">Conducting Aachrya</th>
                                    <th class="programTableHeader">
                                        <span id="viewButton"  class="pull-left">View</span>
                                        <span id="bookButton" class="pull-right">Book</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="programIntakeHolder">

                            </tbody>
                        </table>
                    </form>
                </div>
                <div id="programModal">
                    
                </div>
                <div id="bookNowModal">
                    
                </div>
            </div>
        </div>
        <?php include_once 'public_html/includes/footerPage.php'; ?>
        <?php include_once 'public_html/includes/footerScript.php'; ?>

        <script src="assets/script/js/program.js"></script>
        <script type="text/javascript"></script>
    </body>
</html>