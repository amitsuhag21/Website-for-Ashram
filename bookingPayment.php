<!DOCTYPE html>
<html>

<head>
  <?php include_once 'public_html/includes/commonHeader.php'; ?>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> </head>
  <meta name="viewport" content="width=device-width">

  <body class="front">
    <?php include_once 'public_html/includes/sideBarContent.php'; ?>
    <div class="row">
     <div class="col-lg-12">
      <div class="header-bg" style="background-image:url(images/banner.jpg)">
        <div class=" header-content">
          <div class="main-title">
            <h1 class="bold mb-30 a-f ">Online Dhyan Samadhi 5-14 May 2020</h1>
          </div>
        </div>
      </div>  

    </div>
  </div>  
  <div class="row">
    <div class="form-mgr">
      <div class="col-md-12 col-sm-12 animate fadeInRight">
                    <div class="row">
                        <form role="form" action="esendmail1.php" method="post" class="m-t-40 customForm" novalidate>
                            <div class="form-group clearfix scheduleFormGroup">
                                <div class="col-md-6">
                                    <span class="titleLabel">Program</span>
                                    <div class="controls customInputDiv">
                                        <input id="bookNow_programName_{{programid}}_{{scheduleid}}" name="programName" required class="form-control customInput" value="{{programname}} {{eligibility}}" disabled="true">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <span class="titleLabel">Location</span>
                                    <div class="controls customInputDiv">
                                        <input id="bookNow_programLocation_{{programid}}_{{scheduleid}}" name="programName" required class="form-control customInput" value="Online" disabled="true">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group clearfix scheduleFormGroup">

                                <div class="col-md-6 required-field">
                                    <span class="titleLabel">Start Date</span>
                                    <div class="controls customInputDiv">
                                        <input id="bookNow_StartDate_{{programid}}_{{scheduleid}}" placeholder="Program Category"  name="start date" required class="form-control customInput" value="{{start_date}}" disabled="true">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <span class="titleLabel">End Date</span>
                                    <div class="controls customInputDiv">
                                        <input id="bookNow_EndDate_{{programid}}_{{scheduleid}}" placeholder="Program Category"  name="programName" required class="form-control customInput" value="{{end_date}}" disabled="true">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group clearfix scheduleFormGroup">

                                <div class="col-md-6 required-field">
                                    <span class="titleLabel">Participant Name</span>
                                    <div class="controls customInputDiv">
                                        <input id="bookNow_userName_{{programid}}_{{scheduleid}}" placeholder="Participant Name"  name="userName" required class="form-control customInput">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <span class="titleLabel">Dairy Number</span>
                                    <div class="controls customInputDiv">
                                        <input id="bookNow_dairyNumber_{{programid}}_{{scheduleid}}" placeholder="Dairy Number" type="number" name="dairyNumber" required class="form-control customInput">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group clearfix scheduleFormGroup">

                                <div class="col-md-6 required-field">
                                    <span class="titleLabel">Phone Number</span>
                                    <div class="controls customInputDiv">
                                        <input id="bookNow_phoneNumber_{{programid}}_{{scheduleid}}" type="number" placeholder="Phone Number"  name="phoneNumber" required class="form-control customInput">
                                    </div>
                                </div>

                                <div class="col-md-6 required-field">
                                    <span class="titleLabel">EmailID</span>
                                    <div class="controls customInputDiv">
                                        <input id="bookNow_emailId_{{programid}}_{{scheduleid}}" placeholder="EmailID" type="email" name="emailId" required class="form-control customInput">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group clearfix scheduleFormGroup">
                                <div class="col-md-6">
                                    <span class="titleLabel">State</span>
                                    <div class="controls customInputDiv">
                                        <input id="bookNow_userState_{{programid}}_{{scheduleid}}" type="text" placeholder="State"  name="State" required class="form-control customInput">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <span class="titleLabel">City</span>
                                    <div class="controls customInputDiv">
                                        <input id="bookNow_city_{{programid}}_{{scheduleid}}" placeholder="City" type="city" name="city" required class="form-control customInput">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group clearfix scheduleFormGroup">
                                <div class="col-md-6">
                                    <span class="titleLabel">Graduate Program</span>
                                    <div class="controls customInputDiv">
                                        <input id="bookNow_GraduationLevel_{{programid}}_{{scheduleid}}" type="text" placeholder="Graguated Program"  name="graduationLevel"  class="form-control customInput">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <span class="titleLabel">Payment Receipt</span>
                                    <div class="controls customInputDiv">
                                        <input id="bookNow_paymentRecipt_{{programid}}_{{scheduleid}}" placeholder="Payment receipt" type="file" name="paymentReceipt"  class="form-control customInput">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group clearfix scheduleFormGroup">
                                <div class="col-md-6">
                                    <span class="titleLabel">Bank Name</span>
                                    <div class="controls customInputDiv">
                                        <input id="bookNow_BankName_{{programid}}_{{scheduleid}}" type="text" placeholder="Bank Name"  name="bankName" class="form-control customInput">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <span class="titleLabel">Transfer Type</span>
                                    <div class="controls customInputDiv">
                                        <input id="bookNow_TransferType_{{programid}}_{{scheduleid}}" type="text" placeholder="Transfer Type"  name="transferType" class="form-control customInput">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group clearfix scheduleFormGroup">
                                <div class="col-md-6">
                                    <span class="titleLabel">Transaction Id</span>
                                    <div class="controls customInputDiv">
                                        <input id="bookNow_TransactionId_{{programid}}_{{scheduleid}}" type="text" placeholder="Transaction Id"  name="transactionId" class="form-control customInput">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <span class="titleLabel">Comments</span>
                                    <div class="controls customInputDiv">
                                        <input id="bookNow_Comments_{{programid}}_{{scheduleid}}" type="text" placeholder="Comments"  name="comments" class="form-control customInput">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="text-xs-right">
                                    <button id="rzpPaymentButton" ids="bookOnlineButton_{{programid}}_{{scheduleid}}" type="button" class="btn myButton" data-text="Submit">Submit</button> 
                                    <button id="cancelOnlineButton_{{programid}}_{{scheduleid}}" type="button" class="btn myButton" data-dismiss="modal" data-text="Reset">Cancel</button>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </form>
                    </div>
                        </div>
                      </div>
                    </div>
                    <?php include_once 'public_html/includes/footerPage.php'; ?>
                    <?php include_once 'public_html/includes/footerScript.php';?>
                    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                    <script src="assets/script/js/bookingPayment.js"></script>

                  </body>

                  </html>