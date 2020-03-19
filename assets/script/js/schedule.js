var planProgramData = {};
var scheduleTemplates = "";

$(document).ready(function() {
	debugger;
	loadCategory()
	if(!window.localStorage.languageCode){
		window.localStorage.languageCode = 'en';
	}else{
		$('#languageSelector').val(window.localStorage.languageCode);
	}
	callScheduleFragment(); 
	resetSearchField();
	eventListener();
	venueAutoComplete();
	programCategoryAutoComplete();
	programAutoComplete();
});

function eventListener(){
	$('#languageSelector').on('change', setLangaugeCode);
	$('#searchSchedule_SPG').on('click', handlerSearchSchedule);
	$('#resetSchedule_SPG').on('click', resetSearchField);
	if(!window.localStorage.venueAutoResponse){
         loadVenueData_SPG();
	}
	$( "#startDate_SPG" ).datepicker();
	$( "#endDate_SPG" ).datepicker();
}

function programCategoryAutoComplete(){
	$(function() {
        $( "#programCate_SPG" ).autocomplete({
           source:function(request, response){
        		$("#programCate_SPG").attr("categoryid", '');
				if(window.localStorage.proCatResponse){
					var sourceCate = JSON.parse(window.localStorage.proCatResponse);
					sourceCate = JSON.parse(sourceCate);
					var proCatResponse = [];
					for(var labelkey in sourceCate){
						let labelObj = {}
						labelObj.label = sourceCate[labelkey].categoryname;
						labelObj.value = sourceCate[labelkey].categoryid;
						proCatResponse.push(labelObj);
					}
					response(proCatResponse);
				}
           	},
           	select: function( event, ui ) {
	            $( "#programCate_SPG" ).val( ui.item.label); //ui.item is your object from the array
	            $( "#programCate_SPG" ).attr("categoryid",  ui.item.value); //ui.item is your object from the array
	            return false;
	        }

        });
     });
}

function programAutoComplete(){
	$(function() {
        $( "#programNameAuto_SPG" ).autocomplete({
           source:function(request, response){
           	$("#programNameAuto_SPG").attr("programid", '');
				if(window.localStorage.catProResponse){
					var programAC = JSON.parse(window.localStorage.catProResponse);
					programAC = JSON.parse(programAC);
					var proAutoResponse = [];
					let selectedCategory = $("#programCate_SPG").attr("categoryid")
					for(var proAutokey in programAC){
						if(!selectedCategory|| programAC[proAutokey].categoryid.indexOf(selectedCategory)>-1){
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
           	select: function( event, ui ) {
	            $( "#programNameAuto_SPG" ).val( ui.item.label); //ui.item is your object from the array
	            $( "#programNameAuto_SPG" ).attr("programid",  ui.item.value); //ui.item is your object from the array
	            return false;
	        }

        });
     });
}

function venueAutoComplete(){
	$(function() {
        $("#venueNameAuto_SPG").autocomplete({
           	source:function(request, response){
           		$("#venueNameAuto_SPG").attr("venueId", '');
				if(window.localStorage.venueSchResponse){
					var venueAC = JSON.parse(window.localStorage.venueSchResponse);
					venueAC = JSON.parse(venueAC);
					var venueAutoResponse = [];
					
					for(var venueAutokey in venueAC){						
						let labelObj = {}
						labelObj.label = venueAC[venueAutokey].dhyankendraname;
						labelObj.value = venueAC[venueAutokey].dhyankendraid;
						venueAutoResponse.push(labelObj);							
					}
					response(venueAutoResponse);
				}
           	},
           	select: function( event, ui ) {
	            $("#venueNameAuto_SPG").val( ui.item.label); //ui.item is your object from the array
	            $("#venueNameAuto_SPG").attr("venueId",  ui.item.value); //ui.item is your object from the array
	            return false;
	        }

        });
     });
}

function loadVenueData_SPG(){
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          let venueSchResponse = xhttp.responseText;
          window.localStorage.venueSchResponse =  JSON.stringify(venueSchResponse);
      }else{

      }
  };
  xhttp.open("POST", "php/api/controller/CenterController.php", true);
  xhttp.send();
}


function setProgramName(){
	var programName_SPG = JSON.parse(window.localStorage.catProResponse);
	programName_SPG = JSON.parse(programName_SPG);
	for(var pronameAutokey in programName_SPG){
		planProgramData[programName_SPG[pronameAutokey].programid] = programName_SPG[pronameAutokey];
	}
}

function setLangaugeCode(){
	window.localStorage.languageCode = $('#languageSelector').val();
	loadInitialData();
}

function resetSearchField(){
	$('#programCate_SPG').val('');
	$('#programNameAuto_SPG').val('');
	$('#venueNameAuto_SPG').val('');
	$('#startDate_SPG').val('');
	$('#endDate_SPG').val('');
	$('#programCate_SPG').attr("categoryid",'');
	$('#programNameAuto_SPG').attr("programid",'');
	$('#venueNameAuto_SPG').attr("venueId",'');
	loadScheduleListData();
}


function handlerSearchSchedule(){
	var serchInput = {}
	serchInput.categoryid =  $('#programCate_SPG').attr("categoryid");
	serchInput.programid =  $('#programNameAuto_SPG').attr("programid");
	serchInput.venueId =  $('#venueNameAuto_SPG').attr("venueId");
	serchInput.startDate =  $('#startDate_SPG').val();
	if(serchInput.startDate){
		serchInput.startDate = moment(serchInput.startDate).format('YYYY-MM-DD');
	}
	serchInput.endDate =  $('#endDate_SPG').val();
	if(serchInput.endDate){
		serchInput.endDate = moment(serchInput.endDate).format('YYYY-MM-DD');
	}
	loadScheduleListData(serchInput);

}

function callScheduleFragment(){
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

function loadInitialData(){	
	loadScheduleListData();
	setProgramName();
}

function loadScheduleListData(searchdata){
  var xhttp = new XMLHttpRequest();
  let fd  = new FormData();
  if(searchdata){
  	for(var key in searchdata){
  		if(searchdata[key]){
			fd.append(key, searchdata[key]);
  		}
  	}
  	if(fd.has.length > 0){
		fd.append("search", "byFilter");
  	}
  }

  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          var response = xhttp.responseText;
          var scheduleData = JSON.parse(response);
          //programData = response;
          if(scheduleData){
          	renderScheduleData(scheduleData);
          }else{
          	
          }
      }else{

      }
  };
  xhttp.open("POST", "php/api/controller/ScheduleController.php", true);
  xhttp.send(fd);
}


function renderScheduleData(renderData){
  var schedulefragment = $(scheduleTemplates).filter('#programScheduleContent').html();
  var languageCode = window.localStorage.languageCode ?window.localStorage.languageCode : "en" ;
  $('#programScheduleHolder').empty();    
  for(var key in renderData){
  	renderData[key].start_date = moment(renderData[key].start_date).format('DD MMM, YYYY');
  	renderData[key].end_date = moment(renderData[key].end_date).format('DD MMM, YYYY');
  	renderData[key].programData =  planProgramData[renderData[key].programid]
    if(renderData[key]['language']=languageCode){
      $('#programScheduleHolder').append(Mustache.render(schedulefragment, renderData[key]));
    }
  }
}