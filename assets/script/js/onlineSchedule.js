var planProgramData = {};
var scheduleOnlineTemplates = "";

$(document).ready(function() {
    $('#scheduleHeaderView').addClass('active');
    $('#onlineScheduleListView').addClass('active');
    loadCategory()
    if (!window.localStorage.languageCode) {
        window.localStorage.languageCode = 'en';
    } else {
        $('#languageSelector').val(window.localStorage.languageCode);
    }
    callScheduleFragment();
    resetSearchOnlineField();
    eventListenerOnline();
    programAutoOnlineComplete();
});

function eventListenerOnline() {
    $('#languageSelector').on('change', setLangaugeCode);
    $('#searchOnlineSchedule').on('click', handlerSearchOnlineSchedule);
    $('#resetOnlineSchedule').on('click', resetSearchOnlineField);
    if (!window.localStorage.venueAutoResponse) {
        loadVenueData_SPG();
    }
}

function programAutoOnlineComplete() {
    $(function() {
        $("#programNameOnline").autocomplete({
            source: function(request, response) {
                $("#programNameOnline").attr("programid", '');
                if (window.localStorage.catProResponse) {
                    var programAC = JSON.parse(window.localStorage.catProResponse);
                    programAC = JSON.parse(programAC);
                    var proAutoResponse = [];
                    let selectedCategory = $("#programCate_SPG").attr("categoryid")
                    for (var proAutokey in programAC) {
                        if (!selectedCategory || programAC[proAutokey].categoryid.indexOf(selectedCategory) > -1) {
                            let labelObj = {}
                            labelObj.label = programAC[proAutokey].programname;
                            labelObj.value = programAC[proAutokey].programid;
                            proAutoResponse.push(labelObj);
                        }
                        planProgramData[programAC[proAutokey].programid] = programAC[proAutokey];
                    }
                    response(proAutoResponse);
                }
            },
            select: function(event, ui) {
                $("#programNameOnline").val(ui.item.label); //ui.item is your object from the array
                $("#programNameOnline").attr("programid", ui.item.value); //ui.item is your object from the array
                return false;
            }

        });
    });
}

function setProgramName() {
/*	if(window.localStorage.catProResponse){		
	    var programName_SPG = JSON.parse(window.localStorage.catProResponse);
	    programName_SPG = JSON.parse(programName_SPG);
	    for (var pronameAutokey in programName_SPG) {
	        planProgramData[programName_SPG[pronameAutokey].programid] = programName_SPG[pronameAutokey];
	    }
	}*/
}

function setLangaugeCode() {
    window.localStorage.languageCode = $('#languageSelector').val();
    loadInitialData();
}

function resetSearchOnlineField() {
    $('#programNameOnline').val('');
    $('#startDate_Online').val('');
    $('#endDate_Online').val('');
    $('#programNameOnline').attr("programid", '');
    loadScheduleOnlineListData();
}


function handlerSearchOnlineSchedule() {
    var serchInput = {} 
    serchInput.programid = $('#programNameOnline').attr("programid");
    serchInput.startDate = $('#startDate_Online').val();
    if (serchInput.startDate) {
        serchInput.startDate = moment(serchInput.startDate).format('YYYY-MM-DD');
    }
    serchInput.endDate = $('#endDate_Online').val();
    if (serchInput.endDate) {
        serchInput.endDate = moment(serchInput.endDate).format('YYYY-MM-DD');
    }
    loadScheduleOnlineListData(serchInput);
}

function callScheduleFragment() {
    var fragment = '';
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            scheduleOnlineTemplates = xhttp.responseText;
        }
    };
    xhttp.open("GET", "public_html/fragments/onlineScheduleFragment.html", true);
    xhttp.send();
}

function loadScheduleOnlineListData(searchdata) {
    var xhttp = new XMLHttpRequest();
    let fd = new FormData();
    if (searchdata) {
        for (var key in searchdata) {
            if (searchdata[key]) {
                fd.append(key, searchdata[key]);
            }
        }
        fd.append("searchView", "OnlineSearch");
    }else{
        fd.append("searchView", "Online");
    }

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = xhttp.responseText;
            response = response.replace(/0000-00-00/gi, "")
            response = response.replace(/0000-00-00/gi, "")
            var scheduleData = JSON.parse(response);
            if (scheduleData) {
                renderOnlineScheduleData(scheduleData);
            } else {

            }
        } else {

        }
    };
    xhttp.open("POST", "php/api/controller/ScheduleViewController.php", true);
    xhttp.send(fd);
}


function renderOnlineScheduleData(renderData) {
    var scheduleOnlineFragment = $(scheduleOnlineTemplates).filter('#programScheduleOnlineContent').html();
    var bookNowModalfragment = $(scheduleOnlineTemplates).filter('#bookOnlineModalContent').html();
    var scheduleModalfragment = $(scheduleOnlineTemplates).filter('#progOnlineSchModalContent').html();

    var languageCode = window.localStorage.languageCode ? window.localStorage.languageCode : "en";
    $('#programOnlineScheduleHolder').empty();
    $('#myOnlineModal').empty();
    $('#proOnlineBookingHolder').empty();
    for (var key in renderData) {
        if(renderData[key].session3 && renderData[key].session3.length >3 ){
            renderData[key].isSamadhi = "Samadhi";
            renderData[key].bookingStart_date2 = moment(renderData[key].start_date2).format('DD MMM');
            renderData[key].start_date2 = moment(renderData[key].start_date2).format('DD MMM, YYYY');
            renderData[key].end_date2 = moment(renderData[key].end_date2).format('DD MMM, YYYY');    
        }        
        renderData[key].bookingStart_date = moment(renderData[key].start_date).format('DD MMM');
        renderData[key].start_date = moment(renderData[key].start_date).format('DD MMM, YYYY');
        renderData[key].end_date = moment(renderData[key].end_date).format('DD MMM, YYYY');    
        $('#programOnlineScheduleHolder').append(Mustache.render(scheduleOnlineFragment, renderData[key]));
        $('#myOnlineModal').append(Mustache.render(scheduleModalfragment, renderData[key]));
        $('#proOnlineBookingHolder').append(Mustache.render(bookNowModalfragment, renderData[key]));
        $('#bookOnlineButton_' + renderData[key].programid + "_" + renderData[key].scheduleid).off('click');
        $('#bookOnlineButton_' + renderData[key].programid + "_" + renderData[key].scheduleid).on('click', handlerBookProgram);
    }
}

function handlerClearBookingForm(id){
    $('#bookNow_programName_' + id).val()
    $('#bookNow_programLocation_' + id).val()
    $('#bookNow_StartDate_' + id).val()
    $('#bookNow_EndDate_' + id).val()
    $('#bookNow_userName_' + id).val()
    $('#bookNow_dairyNumber_' + id).val()
    $('#bookNow_userState' + id).val()
    $('#bookNow_Comments_' + id).val()
    $('#bookNow_city' + id).val()
    $('#bookNow_phoneNumber_' + id).val()
    $('#bookNow_emailId_' + id).val()
    $('#bookNow_GraduationLevel_' + id).val()
    $('#bookNow_paymentRecipt_' + id).val()
}

function handlerBookProgram(id) {
    var id = this.id;
    id = id.replace("bookOnlineButton_", "")
    var data = {};
    var proAndSchId = id.split("_");
    data.programId = proAndSchId[0];
    data.scheduleId = proAndSchId[1];
    data.programName = $('#bookNow_programName_' + id).val();
    data.programName = $('#bookNow_programName_' + id).val();
    data.programLocation = $('#bookNow_programLocation_' + id).val();
    data.StartDate = moment($('#bookNow_StartDate_' + id).val()).format('YYYY-MM-DD');
    data.EndDate = moment($('#bookNow_EndDate_' + id).val()).format('YYYY-MM-DD');
    data.userName = $('#bookNow_userName_' + id).val();
    data.bankName = $('#bookNow_BankName_' + id).val();
    data.transferType = $('#bookNow_TransferType_' + id).val();
    data.transactionId = $('#bookNow_TransactionId_' + id).val();
    data.comments = $('#bookNow_Comments_' + id).val();

    if (!data.userName) {
        alert("Please enter your name !")
        return
    }
    data.dairyNumber = $('#bookNow_dairyNumber_' + id).val();
    data.userState = $('#bookNow_userState' + id).val();
    data.city = $('#bookNow_city' + id).val();
    data.phoneNumber = $('#bookNow_phoneNumber_' + id).val();
    if (!data.phoneNumber) {
        alert("Please enter your Phone Number !")
        return
    }
    data.emailId = $('#bookNow_emailId_' + id).val();
    if (!data.emailId) {
        alert("Please enter your emailId !")
        return
    }
    data.GraduationLevel = $('#bookNow_GraduationLevel_' + id).val();



    var file_data = $('#bookNow_paymentRecipt_' + id).prop('files')[0];
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