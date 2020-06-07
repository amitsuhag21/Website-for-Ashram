<!DOCTYPE html>
<html>

<head>

    <?php include_once 'public_html/includes/commonHeader.php'; ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href='assets/css/custom/onlineSchedule.css' media='all' rel='stylesheet' type='text/css' />
</head>

<body class="front">
    <?php include_once 'public_html/includes/sideBarContent.php'; ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="header-bg" style="background-image:url(images/banner.jpg)">
                    <div class=" header-content">
                        <div class="main-title">
                            <h1 class="bold mb-30 a-f ">Online Program</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-mgr clearfix searchHolder">
                <div class="col-md-12 col-sm-12 animate fadeInRight">
                    <form role="form" class="m-t-40" novalidate>
                        <div class="form-group clearfix scheduleFormGroup">
                            <div class="col-md-4">
                                <span class="titleLabel">Program  </span>
                                <div class="controls customInputDiv controlarrow">
                                   <input name="programNameOnline" id="programNameOnline" placeholder="Program Name" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <span class="titleLabel">Start Date  </span>
                                <div class="controls customInputDiv">
                                    <input id="startDate_Online" type="name" name="name" class="form-control" required placeholder="Start date" data-validation-required-message="This field is required"> 
                                </div>
                            </div>

                            <div class="col-md-4">
                                <span class="titleLabel">End Date  </span>
                                <div class="controls customInputDiv">
                                    <input id="endDate_Online" type="name" name="name" class="form-control" required placeholder="End date" data-validation-required-message="This field is required"> 
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="text-xs-right">
                                <button id="searchOnlineSchedule" type="button" class="btn myButton" data-text="Submit">Search</button>
                                <button id="resetOnlineSchedule" type="button" class="btn myButton btn-inverse" data-text="Reset">Reset</button>
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
                    <form id="program-form" novalidate="novalidate">
                        <table class="table table-striped ">
                            <thead class="tb-bg-text">
                                <tr>
                                    <th class="scheduleTableHeader" width="14%">Program</th>
                                    <th class="scheduleTableHeader" width="14%">Date</th>
                                    <th class="scheduleTableHeader" width="10%">Morning Session</th>
                                    <th class="scheduleTableHeader" width="11%">Morning Acharya</th>
                                    <th class="scheduleTableHeader" width="10%">Evening Session</th>
                                    <th class="scheduleTableHeader" width="11%">Evening Acharya</th>
                                    <th class="scheduleTableHeader" width="10%">
                                        <div>
                                            <span id="bookButton" class="pull-left">Book</span>
                                            
                                        </div>

                                        <div>
                                            <span id="viewButton" class="pull-right">Details</span>
                                            
                                        </div>
                                    </th>

                                </tr>
                            </thead>
                        </table>
                        <div id="programOnlineScheduleHolder" class="row secheduleStrippedRowDiv">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php include_once 'public_html/includes/footerPage.php'; ?>
    <div id="myOnlineModal">
        
    </div>
    <div id="proOnlineBookingHolder">
        
    </div>
    
    <?php include_once 'public_html/includes/footerScript.php';?>
    <script src="assets/script/libs/jquery-ui.min.js"></script>
    <script src="assets/script/js/onlineSchedule.js"></script>
    </body>

</html>
