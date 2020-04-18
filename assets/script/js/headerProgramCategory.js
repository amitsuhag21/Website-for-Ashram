var categoryData = {};
var headerTemplates = "";
var scheuleLocationData = {};

function loadCategory() {
    $('.sidebar-menu').SidebarNav()
    callfragmentText_HPC();
    if (!window.localStorage.venueAutoResponse) {
        loadVenueData_SPG();
    }
}

function callfragmentText_HPC() {
    if(window.localStorage.headerTemplates ){
        headerTemplates = window.localStorage.headerTemplates;
        loadHeaderProgramCategoryData();
    }else{
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                headerTemplates = xhttp.responseText;
                window.localStorage.headerTemplates = headerTemplates;
                loadHeaderProgramCategoryData();
            }
        };
        xhttp.open("GET", "public_html/fragments/headerCategoryFragment.html", true);
        xhttp.send();
    }
}

function loadHeaderProgramCategoryData() {
  if(window.localStorage.proCatResponse ){
      let proCatResponse = JSON.parse(window.localStorage.proCatResponse) ;
      categoryData = JSON.parse(proCatResponse);
      loadProgramCategoryData();
  }else{
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let proCatResponse = xhttp.responseText;
            window.localStorage.proCatResponse = JSON.stringify(proCatResponse);
            categoryData = JSON.parse(proCatResponse);
            loadProgramCategoryData();
        } else {

        }
    };
    xhttp.open("POST", "php/api/controller/ProgramCategoryController.php", true);
    xhttp.send();
  }
}

function loadProgramCategoryData() {
    renderCategoryData_HPC();
    loadProgramData_HPC();
}

function loadProgramData_HPC() {
    if(window.localStorage.catProResponse){
        let catProResponse = JSON.parse(window.localStorage.catProResponse) ;
        catProResponse = JSON.parse(catProResponse);
        if (catProResponse && catProResponse.length > 0) {
            renderProgramData_HPC(catProResponse);
        }
    }else{
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let catProResponse = xhttp.responseText;
                window.localStorage.catProResponse = JSON.stringify(catProResponse);
                catProResponse = JSON.parse(catProResponse);
                if (catProResponse && catProResponse.length > 0) {
                    renderProgramData_HPC(catProResponse);
                }
            } else {

            }
        };
        xhttp.open("POST", "php/api/controller/ProgramController.php", true);
        xhttp.send();
    }
}


function renderCategoryData_HPC() {
    var categoryfragment = $(headerTemplates).filter('#categoryContent').html();
    //var languageCode = window.localStorage.languageCode ? window.localStorage.languageCode : "en";
    $('#programCategoryHolder').empty();
    for (var keyCat in categoryData) {
       // if (categoryData[keyCat]['language'] = languageCode) {
            $('#programCategoryHolder').append(Mustache.render(categoryfragment, categoryData[keyCat]));
            $('#programListHolder_' + categoryData[keyCat].categoryid).empty();
       // }
    }
}
function renderProgramData_HPC(programListCateData) {
    var progfragment = $(headerTemplates).filter('#programListContent').html();
    var languageCode = window.localStorage.languageCode ? window.localStorage.languageCode : "en";

    for (var pgkey in programListCateData) {
        var list = programListCateData[pgkey].categoryid;
        list = list.split(",");
        for (var d in list) {
            if (list[d] === '2' || list[d] === '3') {
                programListCateData[pgkey].customlabel = "label"
                if (programListCateData[pgkey].programid < 10) {
                    programListCateData[pgkey].customCounter = '0' + programListCateData[pgkey].programid;
                } else {
                    programListCateData[pgkey].customCounter = programListCateData[pgkey].programid;
                }
            }
            $('#programListHolder_' + list[d]).append(Mustache.render(progfragment, programListCateData[pgkey]));
        }
    }
}

function setLocationName() {
    if (window.localStorage.venueSchResponse) {
        scheuleLocationData_SPG = JSON.parse(window.localStorage.venueSchResponse);
        scheuleLocationData_SPG = JSON.parse(scheuleLocationData_SPG);
        for (var lockey in scheuleLocationData_SPG) {
            scheuleLocationData[scheuleLocationData_SPG[lockey].dhyankendraid] = scheuleLocationData_SPG[lockey];
        }
    }else{
      loadVenueData_SPG();
    }
}


function loadVenueData_SPG() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let venueSchResponse = xhttp.responseText;
            window.localStorage.venueSchResponse = JSON.stringify(venueSchResponse);
            setLocationName();
        } else {

        }
    };
    xhttp.open("POST", "php/api/controller/CenterController.php", true);
    xhttp.send();
}