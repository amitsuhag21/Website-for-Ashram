<!DOCTYPE html>
<html>

<head>

    <?php include_once 'public_html/includes/commonHeader.php'; ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href='assets/css/custom/schedule.css' media='all' rel='stylesheet' type='text/css' />
</head>

<body class="front">
    <?php include_once 'public_html/includes/sideBarContent.php'; ?>
        <div class="row">
            <div class="col-lg-12">

                <div class="header-bg" style="background-image:url(images/banner.jpg)">
                    <div class=" header-content">
                        <div class="main-title">
                            <h1 class="bold mb-30 a-f ">Schedule</h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="form-mgr clearfix searchHolder">
                <div class="col-md-12 col-sm-12 animate fadeInRight">
                    <form role="form" action="esendmail1.php" method="post" class="m-t-40" novalidate>
                        <div class="form-group clearfix scheduleFormGroup">

                            <div class="col-md-4">
                                <span class="titleLabel">Program Category </span>
                                <div class="controls">
                                    <input name="programCate_SPG" id="programCate_SPG" placeholder="Program Category" required class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <span class="titleLabel">Program  </span>
                                <div class="controls customInputDiv">
                                   <input name="programNameAuto_SPG" id="programNameAuto_SPG" placeholder="Program Name" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <span class="titleLabel">Venue  </span>
                                <div class="controls customInputDiv">
                                    <input name="venueNameAuto_SPG" id="venueNameAuto_SPG" placeholder="Venue Name" required class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="form-group clearfix scheduleFormGroup">
                            <div class="col-md-4">

                                <span class="titleLabel">State  </span>
                                <div class="controls customInputDiv">
                                    <select name="ss" id="ss" required class="form-control">
                                        <option value="">Select an Option</option>
                                        <option value="AP">Andhra Pradesh</option>
                                        <option value="AR">Arunachal Prades</option>
                                        <option value="AS">Assam</option>
                                        <option value="BR">Bihar</option>
                                        <option value="CT">Chhattisgarh</option>
                                        <option value="GA">Goa</option>
                                        <option value="GJ">Gujarat</option>
                                        <option value="HR">Haryana</option>
                                        <option value="HP">Himachal Prades</option>
                                        <option value="JK">Jammu & Kashmir</option>
                                        <option value="JH">Jharkhand</option>
                                        <option value="KA">Karnataka</option>
                                        <option value="KL">Kerala</option>
                                        <option value="MP">Madhya Pradesh</option>
                                        <option value="MH">Maharashtra</option>
                                        <option value="MN">Manipur</option>
                                        <option value="ML">Meghalaya</option>
                                        <option value="MZ">Mizoram</option>
                                        <option value="NL">Nagaland</option>
                                        <option value="OR">Odisha</option>
                                        <option value="PB">Punjab</option>
                                        <option value="RJ">Rajasthan</option>
                                        <option value="SK">Sikkim</option>
                                        <option value="TN">Tamil Nadu</option>
                                        <option value="TR">Tripura</option>
                                        <option value="UK">Uttarakhand</option>
                                        <option value="UP">Uttar Pradesh</option>
                                        <option value 3WB">West Bengal</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <span class="titleLabel">Start Date  </span>
                                <div class="controls customInputDiv">
                                    <input id="startDate_SPG" type="name" name="name" class="form-control" required placeholder="Start date" data-validation-required-message="This field is required"> 
                                </div>
                            </div>

                            <div class="col-md-4">
                                <span class="titleLabel">End Date  </span>
                                <div class="controls customInputDiv">
                                    <input id="endDate_SPG" type="name" name="name" class="form-control" required placeholder="End date" data-validation-required-message="This field is required"> 
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="text-xs-right">
                                <button id="searchSchedule_SPG" type="button" class="btn myButton" data-text="Submit">Search</button>
                                <button id="resetSchedule_SPG" type="button" class="btn myButton btn-inverse" data-text="Reset">Reset</button>
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
                                    <th class="scheduleTableHeader" width="20%">Program</th>
                                    <th class="scheduleTableHeader" width="18%">Location</th>
                                    <th class="scheduleTableHeader" width="20%">Date</th>
                                    <th class="scheduleTableHeader" width="24%">Acharya</th>
                                    <th class="scheduleTableHeader" width="18%">
                                        <span id="viewButton"  class="pull-left">View</span>
                                        <span id="bookButton" class="pull-right">Book</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="programScheduleHolder">

                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
<!--         <div class="pagination-wrap">
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
        </div> -->
    <?php include_once 'public_html/includes/footerPage.php'; ?>
    <div id="myModal">
        
    </div>
    <div id="proBookingModalHolder">
        
    </div>
    
    <?php include_once 'public_html/includes/footerScript.php'; ?>
    <?php include_once 'public_html/includes/footerScript.php';?>
    <script src="assets/script/libs/jquery-ui.min.js"></script>
    <script src="assets/script/js/schedule.js"></script>
    </body>

</html>
