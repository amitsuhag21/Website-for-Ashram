var planProgramData = {};
var bookingTemplates = "";

$(document).ready(function() {
    $('#scheduleHeaderView').addClass('active');
    $('#onlineScheduleListView').addClass('active');
    loadCategory()
    var urlParams = new URLSearchParams(window.location.search);
    var scheduleid = urlParams.get('scheduleid');
    var programid = urlParams.get('programid');
    if (!window.localStorage.languageCode) {
        window.localStorage.languageCode = 'en';
    } else {
        $('#languageSelector').val(window.localStorage.languageCode);
    }
    callBookingFragment();
    eventListenerOnline();
    loadScheduleData(scheduleid);
});

function eventListenerOnline() {
    $('#languageSelector').on('change', setLangaugeCode);
}


function setLangaugeCode() {
    window.localStorage.languageCode = $('#languageSelector').val();
}

function callBookingFragment() {
    var fragment = '';
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            bookingTemplates = xhttp.responseText;
        }
    };
    xhttp.open("GET", "public_html/fragments/bookingFragment.html", true);
    xhttp.send();
}

function loadScheduleData(searchdata) {
    var xhttp = new XMLHttpRequest();
    let fd = new FormData();
    if (searchdata) {
        fd.append("searchById", searchdata);
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var response = xhttp.responseText;
                response = response.replace(/0000-00-00/gi, "")
                response = response.replace(/0000-00-00/gi, "")
                var scheduleData = JSON.parse(response);
                if (scheduleData) {
                    renderBookingData(scheduleData);
                } else {

                }
            } else {

            }
        };
        xhttp.open("POST", "php/api/controller/ScheduleViewController.php", true);
        xhttp.send(fd);
    }else{
        fd.append("searchById", searchdata);
    }
}


function renderBookingData(renderData) {
    var bookingDetailForm = $(bookingTemplates).filter('#bookingDetailsFragment').html();
    var bookingPageTitle = $(bookingTemplates).filter('#bookingPageTitleFragment').html();
    $('#bookingDetailsFragmentHolder').empty();
    $('#bookingPageTitleFragmentHolder').empty();
    var key = 0;
    if(renderData[key].session3 && renderData[key].session3.length >3 ){
        renderData[key].isSamadhi = "Samadhi";
        renderData[key].bookingStart_date2 = moment(renderData[key].start_date2).format('DD MMM');
        renderData[key].start_date2 = moment(renderData[key].start_date2).format('DD MMM, YYYY');
        renderData[key].end_date2 = moment(renderData[key].end_date2).format('DD MMM, YYYY');    
    }        
    renderData[key].bookingStart_date = moment(renderData[key].start_date).format('DD MMM');
    renderData[key].start_date = moment(renderData[key].start_date).format('DD MMM, YYYY');
    renderData[key].end_date = moment(renderData[key].end_date).format('DD MMM, YYYY');    
    $('#bookingDetailsFragmentHolder').append(Mustache.render(bookingDetailForm, renderData[key]));
    $('#bookingPageTitleFragmentHolder').append(Mustache.render(bookingPageTitle, renderData[key]));
    $('#bookOfflineButton_' + renderData[key].programid + "_" + renderData[key].scheduleid).off('click');
    $('#paymentViaRazorPay_' + renderData[key].programid + "_" + renderData[key].scheduleid).off('click');
    $('#bookOfflineButton_' + renderData[key].programid + "_" + renderData[key].scheduleid).on('click', handlerBookProgram);
    $('#paymentViaRazorPay_' + renderData[key].programid + "_" + renderData[key].scheduleid).on('click', handlerCreateOrderProgram);

}

function handlerClearBookingForm(id){
    $('#booking_programName_' + id).val()
    $('#booking_programLocation_' + id).val()
    $('#booking_StartDate_' + id).val()
    $('#booking_EndDate_' + id).val()
    $('#booking_userName_' + id).val()
    $('#booking_dairyNumber_' + id).val()
    $('#booking_userState' + id).val()
    $('#booking_Comments_' + id).val()
    $('#booking_city' + id).val()
    $('#booking_phoneNumber_' + id).val()
    $('#booking_emailId_' + id).val()
    $('#booking_GraduationLevel_' + id).val()
    $('#booking_paymentRecipt_' + id).val()
}



function handlerCreateOrderProgram(id) {
    var id = this.id;
    var proAndSchId = id.split("_");
    scheduleIndex = id.replace("paymentViaRazorPay_", "")
    var data = {};
    data.programId = proAndSchId[1];
    data.scheduleId = proAndSchId[2];
    data.programName = $('#booking_programName_' + scheduleIndex).val();
    data.programLocation = $('#booking_programLocation_' + scheduleIndex).val();
    data.StartDate = moment($('#booking_StartDate_' + scheduleIndex).val()).format('YYYY-MM-DD');
    data.EndDate = moment($('#booking_EndDate_' + id).val()).format('YYYY-MM-DD');
    data.userName = $('#booking_userName_' + scheduleIndex).val();
    data.bankName = $('#booking_BankName_' + scheduleIndex).val();
    data.transferType = $('#booking_TransferType_' + scheduleIndex).val();
    data.transactionId = $('#booking_TransactionId_' + scheduleIndex).val();
    data.comments = $('#booking_Comments_' + scheduleIndex).val();

    if (!data.userName) {
        alert("Please enter your name !")
        return
    }
    data.dairyNumber = $('#booking_dairyNumber_' + scheduleIndex).val();
    data.userState = $('#booking_userState' + scheduleIndex).val();
    data.city = $('#booking_city' + scheduleIndex).val();
    data.phoneNumber = $('#booking_phoneNumber_' + scheduleIndex).val();
/*    if (!data.phoneNumber) {
        alert("Please enter your Phone Number !")
        return
    }*/
    data.emailId = $('#booking_emailId_' + scheduleIndex).val();
/*    if (!data.emailId) {
        alert("Please enter your emailId !")
        return
    }*/
    data.GraduationLevel = $('#booking_GraduationLevel_' + scheduleIndex).val();
    callCreateBookingOrder(data);
}

function callCreateBookingOrder(bookingData) {

    var xhttp = new XMLHttpRequest();
    let bookfd = new FormData();
    if (bookingData) {
        for (var bkey in bookingData) {
            if (bookingData[bkey]) {
                bookfd.append(bkey, bookingData[bkey]);
            }
        }
        if (bookfd.has.length > 0) {
            bookfd.append("createOrder", "createOrder");
        }
    }
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = xhttp.responseText;
            var scheduleData = JSON.parse(response);
            if (scheduleData) {
                window.localStorage.bookingData = JSON.stringify(bookingData);
                window.location.href = "/bookingPayment.php?orderId="+scheduleData['orderIdDetail'];
            } else {

            }
        }

    }
    xhttp.open("POST", "php/api/controller/BookingController.php", true);
    xhttp.send(bookfd);
}
function handlerBookProgram(id) {
    var id = this.id;
    id = id.replace("bookOnlineButton_", "")
    var data = {};
    var proAndSchId = id.split("_");
    data.programId = proAndSchId[0];
    data.scheduleId = proAndSchId[1];
    data.programName = $('#booking_programName_' + id).val();
    data.programName = $('#booking_programName_' + id).val();
    data.programLocation = $('#booking_programLocation_' + id).val();
    data.StartDate = moment($('#booking_StartDate_' + id).val()).format('YYYY-MM-DD');
    data.EndDate = moment($('#booking_EndDate_' + id).val()).format('YYYY-MM-DD');
    data.userName = $('#booking_userName_' + id).val();
    data.bankName = $('#booking_BankName_' + id).val();
    data.transferType = $('#booking_TransferType_' + id).val();
    data.transactionId = $('#booking_TransactionId_' + id).val();
    data.comments = $('#booking_Comments_' + id).val();

    if (!data.userName) {
        alert("Please enter your name !")
        return
    }
    data.dairyNumber = $('#booking_dairyNumber_' + id).val();
    data.userState = $('#booking_userState' + id).val();
    data.city = $('#booking_city' + id).val();
    data.phoneNumber = $('#booking_phoneNumber_' + id).val();
    if (!data.phoneNumber) {
        alert("Please enter your Phone Number !")
        return
    }
    data.emailId = $('#booking_emailId_' + id).val();
    if (!data.emailId) {
        alert("Please enter your emailId !")
        return
    }
    data.GraduationLevel = $('#booking_GraduationLevel_' + id).val();



    var file_data = $('#booking_paymentRecipt_' + id).prop('files')[0];
    var form_data = new FormData();
    if (file_data) {
        form_data.append('file', file_data);
        $.ajax({
            url: 'php/api/controller/FileUploadController.php', // point to server-side PHP script 
            dataType: 'text', // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(uploadedFileURLResponse) {
                if (uploadedFileURLResponse === "File type Not allowed") {
                    alert(uploadedFileURLResponse); // display response from the PHP script, if any
                } else {
                    data.paymentRecipt = uploadedFileURLResponse;
                    handlerClearBookingForm(id);
                    $('#openBookOnlineModal_' + id).modal('hide');
                    $('.modal-backdrop').remove();
                    callProgramBooking(data);
                }
            }
        });
    } else {
        data.paymentRecipt ="No Files uploadedFileURLResponse";
        handlerClearBookingForm(id);
        $('#openBookOnlineModal_' + id).modal('hide');
        $('.modal-backdrop').remove();
        callProgramBooking(data);
    }
}

function callProgramBooking(bookingData) {

    var xhttp = new XMLHttpRequest();
    let bookfd = new FormData();
    if (bookingData) {
        for (var bkey in bookingData) {
            if (bookingData[bkey]) {
                bookfd.append(bkey, bookingData[bkey]);
            }
        }
        if (bookfd.has.length > 0) {
            bookfd.append("bookService", "program");
        }
    }
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = xhttp.responseText;
            var scheduleData = JSON.parse(response);
            if (scheduleData) {
                window.confirm("Thanks for Booking, Your booking reference number : Ref_"+scheduleData.bookingDetail+"\n Please contact to OshoDhara reception and confirm your booking.");
            } else {
                window.confirm("Thanks for Booking, Your booking is pending,  Please contact to OshoDhara reception");
            }
        }
    };
    xhttp.open("POST", "php/api/controller/BookingController.php", true);
    xhttp.send(bookfd);
}
