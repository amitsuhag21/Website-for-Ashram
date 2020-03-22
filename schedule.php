<!DOCTYPE html>
<html>

<head>

    <?php include_once 'public_html/includes/commonHeader.php'; ?>
    <link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css' />
    <script defer src="js/solid.js"></script>

    <!-- Head libs -->
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
    </style>
</head>

<body class="front">
    <?php include_once 'public_html/includes/sideBarContent.php'; ?>
        <div class="row">
            <div class="col-lg-12">

                <div class="header-bg" style="background-image:url(images/banner.jpg)">
                    <!-- Gradient overlay -->
                    <div class=" header-content">
                        <div class="main-title">
                            <!-- Main-title -->
                            <h1 class="bold mb-30 a-f ">Schedule</h1>
                            <!-- breadcrumbs -->

                            <!-- breadcrumbs end -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="form-mgr">
                <div class="col-md-12 col-sm-12 animate fadeInRight">
                    <form role="form" action="esendmail1.php" method="post" class="m-t-40" novalidate>
                        <div class="form-group">

                            <div class="col-md-6">

                                <h5>Program Category </h5>
                                <div class="controls">
                                    <input name="programCate_SPG" id="programCate_SPG" placeholder="Program Category" required class="form-control">

                                </div>
                            </div>

                            <div class="col-md-6">

                                <h5>Program  </h5>
                                <div class="controls">
                                   <input name="programNameAuto_SPG" id="programNameAuto_SPG" placeholder="Program Name" required class="form-control">
                                </div>
                            </div>

                        </div>

                        <div class="form-group">

                            <div class="col-md-6">

                                <h5>Venue  </h5>
                                <div class="controls">
                                    <input name="venueNameAuto_SPG" id="venueNameAuto_SPG" placeholder="Venue Name" required class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">

                                <h5>State  </h5>
                                <div class="controls">
                                    <select name="ss" id="ss" required class="form-control">
                                        <option value="">Select an Option</option>
                                        <option value="State  1">State 1</option>
                                        <option value="State  2">State 2</option>
                                        <option value="State  3">State 3</option>
                                        <option value="State  4">State 4</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                   <!-- 
                        <div class="form-group">
                            <div class="col-md-12">
                                <h5>Date  </h5>
                                <div class="controls">
                                    <div class="container22">

                                        <ul>
                                            <li>
                                                <input type="radio" id="f-option" name="selector">
                                                <label for="f-option">Show for current month</label>

                                                <div class="check"></div>
                                            </li>

                                            <li>
                                                <input type="radio" id="s-option" name="selector">
                                                <label for="s-option">Show for upcoming 3 month</label>

                                                <div class="check">
                                                    <div class="inside"></div>
                                                </div>
                                            </li>

                                            <li>
                                                <input type="radio" id="t-option" name="selector">
                                                <label for="t-option">Show for upcoming 3 month</label>

                                                <div class="check">
                                                    <div class="inside"></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <div class="col-md-6">
                                <h5>From Date  </h5>
                                <div class="controls">
                                    <input id="startDate_SPG" type="name" name="name" class="form-control" required placeholder="start date" data-validation-required-message="This field is required"> </div>

                            </div>

                            <div class="col-md-6">

                                <h5>last Date  </h5>
                                <div class="controls">
                                    <input id="endDate_SPG" type="name" name="name" class="form-control" required placeholder="end date" data-validation-required-message="This field is required"> </div>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="text-xs-right">
                                <button id="searchSchedule_SPG" type="button" class="btn btn-primary" data-text="Submit">Search</button>
                                <button id="resetSchedule_SPG" type="button" class="btn btn-inverse" data-text="Reset">Reset</button>
                                <br>
                                <br>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="row tpp-orgl ">

            <div class="col-lg-12 tpp-orgl1">
                <div class="table-responsive ">
                    <form id="contact-form" action="#" method="POST" novalidate="novalidate">
                        <table class="table table-striped ">

                            <thead class="tb-bg-text">
                                <tr>
                                    <th width="28%">Date</th>
                                    <th width="22%">Venue</th>
                                    <th width="29%">Aachrya</th>
                                    <th width="21%">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody id="programScheduleHolder">
                                <tr>
                                    <td>
                                        <table width="100%" border="0">
                                            <tr>
                                                <td><strong>Dhyan Samadhi</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Mumbai</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <div class="form-group">15 april to 20 april</div>
                                    </td>
                                    <td>
                                        <table width="100%" border="0">
                                            <tr>
                                                <td><strong>Conducted by</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Master Sadhguru</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table width="100%" border="0" cellpadding="2" cellspacing="2">
                                            <tr>
                                                <td align="right">
                                                    <input type="submit" value="BOOK MY SEAT " class="btn btn-primary" data-loading-text="Loading...">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="56" align="right" valign="bottom">
                                                    <a href="comingSoon.html" data-toggle="modal" data-target="#myModal">
                                                        <input type="submit" value="VIEW DETAILS" class="btn btn-primary" data-loading-text="Loading...">
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" border="0">
                                            <tr>
                                                <td><strong>Dhyan Samadhi</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Mumbai</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td><span class="form-group"><div class="form-group">15 april to 20 april</div> </span></td>
                                    <td>
                                        <table width="100%" border="0">
                                            <tr>
                                                <td><strong>Conducted by</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Master Sadhguru</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table width="100%" border="0" cellpadding="2" cellspacing="2">
                                            <tr>
                                                <td align="right">
                                                    <input type="submit" value="BOOK MY SEAT " class="btn btn-primary" data-loading-text="Loading...">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="56" align="right" valign="bottom">
                                                    <a href="comingSoon.html" data-toggle="modal" data-target="#myModal">
                                                        <input type="submit" value="VIEW DETAILS" class="btn btn-primary" data-loading-text="Loading...">
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" border="0">
                                            <tr>
                                                <td><strong>Dhyan Samadhi</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Mumbai</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <div class="form-group">15 april to 20 april</div>
                                    </td>
                                    <td>
                                        <table width="100%" border="0">
                                            <tr>
                                                <td><strong>Conducted by</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Master Sadhguru</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table width="100%" border="0" cellpadding="2" cellspacing="2">
                                            <tr>
                                                <td align="right">
                                                    <input type="submit" value="BOOK MY SEAT " class="btn btn-primary" data-loading-text="Loading...">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="56" align="right" valign="bottom">
                                                    <a href="comingSoon.html" data-toggle="modal" data-target="#myModal">
                                                        <input type="submit" value="VIEW DETAILS" class="btn btn-primary" data-loading-text="Loading...">
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" border="0">
                                            <tr>
                                                <td><strong>Dhyan Samadhi</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Mumbai</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td><span class="form-group"><div class="form-group">15 april to 20 april</div> </span></td>
                                    <td>
                                        <table width="100%" border="0">
                                            <tr>
                                                <td><strong>Conducted by</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Master Sadhguru</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table width="100%" border="0" cellpadding="2" cellspacing="2">
                                            <tr>
                                                <td align="right">
                                                    <input type="submit" value="BOOK MY SEAT " class="btn btn-primary" data-loading-text="Loading...">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="56" align="right" valign="bottom">
                                                    <a href="comingSoon.html" data-toggle="modal" data-target="#myModal">
                                                        <input type="submit" value="VIEW DETAILS" class="btn btn-primary" data-loading-text="Loading...">
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="pagination-wrap">
            <div class="row">
                <div class="col-xs-7">
                    <ul class="pagination">
                        <li class="active"><a href="comingSoon.html">1 <span class="sr-only">(current)</span></a></li>
                        <li><a href="comingSoon.html">2</a></li>
                        <li><a href="comingSoon.html">3</a></li>
                    </ul>
                </div>
                <div class="col-xs-5 text-right">
                    <p>Showing 1–9 of 20 results</p>
                </div>
            </div>
        </div>
    <?php include_once 'public_html/includes/footerPage.php'; ?>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"> PROGRAM : CELEBRATIONS (OSHODHARA DAY)</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 ">
                            <table class="table table-striped">
                                <tr>
                                    <td><strong>Program Categor</strong>y</td>
                                </tr>
                                <tr>
                                    <td>Sadhna</td>
                                </tr>
                                <tr>
                                    <td><strong>Program</strong></td>
                                </tr>
                                <tr>
                                    <td>Samna</td>
                                </tr>
                                <tr>
                                    <td><strong>Venue</strong></td>
                                </tr>
                                <tr>
                                    <td>kanchana nagar</td>
                                </tr>
                                <tr>
                                    <td><strong>State</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Mumbai</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Date</strong></td>
                                </tr>
                                <tr>
                                    <td>02-04-2020</td>
                                </tr>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include_once 'public_html/includes/footerScript.php'; ?>
    <script src="assets/script/libs/jquery-1.12.4.js"></script>
    <script src="assets/script/libs/jquery-ui.js"></script>
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
    <script src="assets/script/libs/moment.min.js"></script>
    <script src="assets/script/js/headerProgramCategory.js"></script>
    <script src="assets/script/js/schedule.js"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="js/theme.js"></script>

    <!-- Style Switcher -->
    <script type="text/javascript" src="style-switcher/js/switcher.js"></script>
    <script src='js/SidebarNav.min.js' type='text/javascript'></script>
    <script>
        $('.sidebar-menu').SidebarNav()
    </script>
    <script src="js/mask.init.js"></script>
    <script src="js/jquery.inputmask.bundle.min.js"></script>
    </body>

</html>
