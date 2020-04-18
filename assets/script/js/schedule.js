var planProgramData = {};
var scheduleTemplates = "";

$(document).ready(function() {
    $('#scheduleHeaderView').addClass('active');
    loadCategory()
    if (!window.localStorage.languageCode) {
        window.localStorage.languageCode = 'en';
    } else {
        $('#languageSelector').val(window.localStorage.languageCode);
    }
    callScheduleFragment();
    resetSearchField();
    eventListener();
    venueAutoComplete();
    programCategoryAutoComplete();
    programAutoComplete();
});

function eventListener() {
    $('#languageSelector').on('change', setLangaugeCode);
    $('#searchSchedule_SPG').on('click', handlerSearchSchedule);
    $('#resetSchedule_SPG').on('click', resetSearchField);
    if (!window.localStorage.venueAutoResponse) {
        loadVenueData_SPG();
    }
}

function programCategoryAutoComplete() {
    $(function() {
        $("#programCate_SPG").autocomplete({
            source: function(request, response) {
                $("#programCate_SPG").attr("categoryid", '');
                if (window.localStorage.proCatResponse) {
                    var sourceCate = JSON.parse(window.localStorage.proCatResponse);
                    sourceCate = JSON.parse(sourceCate);
                    var proCatResponse = [];
                    for (var labelkey in sourceCate) {
                        let labelObj = {}
                        labelObj.label = sourceCate[labelkey].categoryname;
                        labelObj.value = sourceCate[labelkey].categoryid;
                        proCatResponse.push(labelObj);
                    }
                    response(proCatResponse);
                }
            },
            select: function(event, ui) {
                $("#programCate_SPG").val(ui.item.label); //ui.item is your object from the array
                $("#programCate_SPG").attr("categoryid", ui.item.value); //ui.item is your object from the array
                return false;
            }

        });
        $("#startDate_SPG").datepicker();
        $("#endDate_SPG").datepicker();
    });
}

function programAutoComplete() {
    $(function() {
        $("#programNameAuto_SPG").autocomplete({
            source: function(request, response) {
                $("#programNameAuto_SPG").attr("programid", '');
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
                $("#programNameAuto_SPG").val(ui.item.label); //ui.item is your object from the array
                $("#programNameAuto_SPG").attr("programid", ui.item.value); //ui.item is your object from the array
                return false;
            }

        });
    });
}

function venueAutoComplete() {
    $(function() {
        $("#venueNameAuto_SPG").autocomplete({
            source: function(request, response) {
                $("#venueNameAuto_SPG").attr("venueId", '');
                if (window.localStorage.venueSchResponse) {
                    var venueAC = JSON.parse(window.localStorage.venueSchResponse);
                    venueAC = JSON.parse(venueAC);
                    var venueAutoResponse = [];

                    for (var venueAutokey in venueAC) {
                        let labelObj = {}
                        labelObj.label = venueAC[venueAutokey].dhyankendraname;
                        labelObj.value = venueAC[venueAutokey].dhyankendraid;
                        venueAutoResponse.push(labelObj);
                    }
                    response(venueAutoResponse);
                }
            },
            select: function(event, ui) {
                $("#venueNameAuto_SPG").val(ui.item.label); //ui.item is your object from the array
                $("#venueNameAuto_SPG").attr("venueId", ui.item.value); //ui.item is your object from the array
                return false;
            }

        });
    });
}


function setProgramName() {
	if(window.localStorage.catProResponse){		
	    var programName_SPG = JSON.parse(window.localStorage.catProResponse);
	    programName_SPG = JSON.parse(programName_SPG);
	    for (var pronameAutokey in programName_SPG) {
	        planProgramData[programName_SPG[pronameAutokey].programid] = programName_SPG[pronameAutokey];
	    }
	}
}

function setLangaugeCode() {
    window.localStorage.languageCode = $('#languageSelector').val();
    loadInitialData();
}

function resetSearchField() {
    $('#programCate_SPG').val('');
    $('#programNameAuto_SPG').val('');
    $('#venueNameAuto_SPG').val('');
    $('#startDate_SPG').val('');
    $('#endDate_SPG').val('');
    $('#programCate_SPG').attr("categoryid", '');
    $('#programNameAuto_SPG').attr("programid", '');
    $('#venueNameAuto_SPG').attr("venueId", '');
    loadScheduleListData();
}


function handlerSearchSchedule() {
    var serchInput = {}
    serchInput.categoryid = $('#programCate_SPG').attr("categoryid");
    serchInput.programid = $('#programNameAuto_SPG').attr("programid");
    serchInput.venueId = $('#venueNameAuto_SPG').attr("venueId");
    serchInput.startDate = $('#startDate_SPG').val();
    if (serchInput.startDate) {
        serchInput.startDate = moment(serchInput.startDate).format('YYYY-MM-DD');
    }
    serchInput.endDate = $('#endDate_SPG').val();
    if (serchInput.endDate) {
        serchInput.endDate = moment(serchInput.endDate).format('YYYY-MM-DD');
    }
    loadScheduleListData(serchInput);

}

function callScheduleFragment() {
    var fragment = '';
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            scheduleTemplates = xhttp.responseText;
            loadInitialData();
        }
    };
    xhttp.open("GET", "public_html/fragments/scheduleFragment.html", true);
    xhttp.send();
}

function loadInitialData() {
    loadScheduleListData();
    setProgramName();
}

function loadScheduleListData(searchdata) {
    var xhttp = new XMLHttpRequest();
    let fd = new FormData();
    if (searchdata) {
        for (var key in searchdata) {
            if (searchdata[key]) {
                fd.append(key, searchdata[key]);
            }
        }
        if (fd.has.length > 0) {
            fd.append("search", "byFilter");
        }
    }

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = xhttp.responseText;
            var scheduleData = JSON.parse(response);
            //programData = response;
            if (scheduleData) {
                renderScheduleData(scheduleData);
            } else {

            }
        } else {

        }
    };
    xhttp.open("POST", "php/api/controller/ScheduleController.php", true);
    xhttp.send(fd);
}


function renderScheduleData(renderData) {
    var schedulefragment = $(scheduleTemplates).find('#programScheduleContent').html();
    var bookNowModalfragment = $(scheduleTemplates).filter('#bookNowModalContent').html();
    var scheduleModalfragment = $(headerTemplates).filter('#programScheduleModalContent').html();

    var languageCode = window.localStorage.languageCode ? window.localStorage.languageCode : "en";
    $('#programScheduleHolder').empty();
    $('#myModal').empty();
    $('#proBookingModalHolder').empty();
    for (var key in renderData) {
        renderData[key].start_date = moment(renderData[key].start_date).format('DD MMM');
        renderData[key].bookingStart_date = moment(renderData[key].start_date).format('DD MMM, YYYY');
        renderData[key].end_date = moment(renderData[key].end_date).format('DD MMM, YYYY');
        renderData[key].programData = planProgramData[renderData[key].programid]
        renderData[key].locationData = scheuleLocationData[renderData[key].dhyankendraid]

        if (renderData[key]['language'] = languageCode) {
            $('#programScheduleHolder').append(Mustache.render(schedulefragment, renderData[key]));
            $('#myModal').append(Mustache.render(scheduleModalfragment, renderData[key]));
            $('#proBookingModalHolder').append(Mustache.render(bookNowModalfragment, renderData[key]));
            $('#bookNow_' + renderData[key].programid + "_" + renderData[key].scheduleid).off('click');
            $('#bookNow_' + renderData[key].programid + "_" + renderData[key].scheduleid).on('click', handlerBookProgram);
        }
    }
}

function handlerBookProgram(id) {
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
                    $('#bookNowModal_' + id).modal('hide');
                    $('.modal-backdrop').remove();
                    callProgramBooking(data);
                }
            }
        });
    } else {
        id
        alert('Please upload payment receipt');
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