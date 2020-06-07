var programData_PPG = {};
var templates_PPG = "";

$(document).ready(function() {
    $('#programHeaderView').addClass('active');
    loadCategory()

    var urlParams = new URLSearchParams(window.location.search);
    var categoryItem = urlParams.get('categoryIndex');
    var programItem = urlParams.get('programIndex');
    $('#programCateView_' + categoryItem).addClass('active');
    $('#programNameView_' +programItem+"_" +categoryItem).addClass('active');
    if (!window.localStorage.languageCode) {
        window.localStorage.languageCode = 'en';
    } else {
        $('#languageSelector').val(window.localStorage.languageCode);
    }
    callFragmentText_PPG();
    if (programItem) {
        loadProgramData_PPG(programItem);
    } else {
        loadProgramData_PPG("1");
    }
    eventListener();
});

function eventListener() {
    $('#languageSelector').on('change', setLangaugeCode);
}

function setLangaugeCode() {
    window.localStorage.languageCode = $('#languageSelector').val();
}

function callFragmentText_PPG() {
    if (window.localStorage.templates_PPG) {
        templates_PPG = window.localStorage.templates_PPG;
    } else {
        let fragment = '';
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                templates_PPG = xhttp.responseText;
                window.localStorage.templates_PPG = templates_PPG;
            }
        };
        xhttp.open("GET", "public_html/fragments/programFragment.html", true);
        xhttp.send();
    }
}

function loadProgramData_PPG(urldata) {
    var xhttp = new XMLHttpRequest();
    let fd = new FormData();
    fd.append('programid', urldata)
    fd.append('programList', urldata)
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = xhttp.responseText;
            programData_PPG = JSON.parse(response);
            renderProgramData_PPG(programData_PPG['programData']);
            renderProgramIntake(programData_PPG);
        } else {

        }
    };
    xhttp.open("POST", "php/api/controller/ProgramController.php", true);
    xhttp.send(fd);
}

function renderProgramData_PPG(renderData) {
    var titlefragment = $(templates_PPG).filter('#programTitleContent').html();
    var descfragment = $(templates_PPG).filter('#programDetailContent').html();
    var languageCode = window.localStorage.languageCode ? window.localStorage.languageCode : "en";

/*    if (renderData[0]['language'] = languageCode) {*/
        $('#programTitleHolder').empty();
        $('#programTitleHolder').append(Mustache.render(titlefragment, renderData[0]));
        $('#programDetailHolder').empty();
        $('#programDetailHolder').append(Mustache.render(descfragment, renderData[0]));
        $('#programLongDiscription_' + renderData[0].programid).html(renderData[0].longdescription);
    //}
}

function renderProgramIntake(programListData) {
    renderData = programListData['programList'];
    var progListfragment = $(templates_PPG).find('#programListContent').html();
    var scheduleModalfragment = $(templates_PPG).filter('#programListModalContent').html();
    var proBokNowModalfragment = $(templates_PPG).filter('#proBookNowModalContent').html();


    var languageCode = window.localStorage.languageCode ? window.localStorage.languageCode : "en";
    $('#programIntakeHolder').empty();
    $('#programModal').empty();
    $('#bookNowModal').empty();
    for (var key in renderData) {
        if (key < 6) {
            if (renderData[key].programid < 30) {
                renderData[key].programLevel = renderData[key].programid;
            } else {
                renderData[key].programLevel = "Pragya"
            }
            renderData[key].bookingStart_date = moment(renderData[key].start_date).format('DD MMM');
            renderData[key].start_date = moment(renderData[key].start_date).format('DD MMM, YYYY');
            renderData[key].end_date = moment(renderData[key].end_date).format('DD MMM, YYYY');
            renderData[key].locationData = scheuleLocationData[renderData[key].dhyankendraid]
            renderData[key].programData = programListData['programData'][0];
            $('#programIntakeHolder').append(Mustache.render(progListfragment, renderData[key]));
            $('#programModal').append(Mustache.render(scheduleModalfragment, renderData[key]));
            $('#bookNowModal').append(Mustache.render(proBokNowModalfragment, renderData[key]));
            $('#bookNow_' + renderData[key].programid + "_" + renderData[key].scheduleid).off('click');
            $('#bookNow_' + renderData[key].programid + "_" + renderData[key].scheduleid).on('click', handlerProBookProgram);
        } else {
            return;
        }
    }
}


function handlerProBookProgram(id) {
    var id = this.id;
    id = id.replace("bookNow_", "")
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
                    $('#bookProgModel_' + id).modal('hide');
                    $('.modal-backdrop').remove();
                    callProgramBooking(data);
                }
            }
        });
    } else {
        data.paymentRecipt = uploadedFileURLResponse;
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
                renderScheduleData(scheduleData);
            } else {

            }
        } else {

        }
    };
    xhttp.open("POST", "php/api/controller/BookingController.php", true);
    xhttp.send(bookfd);
}