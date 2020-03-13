var planData = {};
var scheduleTemplates = "";

$(document).ready(function() {
	debugger;
	loadCategory()
	if(!window.localStorage.languageCode){
		window.localStorage.languageCode = 'en';
	}else{
		$('#languageSelector').val(window.localStorage.languageCode);
	}
    $('#sidebarCollapse').on('click', function() {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
	callScheduleFragment(); 
	resetSearchField();
	eventListener();
});

function eventListener(){
	$('#languageSelector').on('change', setLangaugeCode);
	$('#languageSelector').on('click', resetSearchField);
	$('#languageSelector').on('click', handlerSearchSchedule);
}

function setLangaugeCode(){
	window.localStorage.languageCode = $('#languageSelector').val();
	loadInitialData();
}

function resetSearchField(){
	$('#languageSelector').val('');
	$('#languageSelector').val('');
	$('#languageSelector').val('');
	$('#languageSelector').val('');
	$('#languageSelector').val('');
	$('#languageSelector').val('');
}


function handlerSearchSchedule(){
	var serchInput = {}
	serchInput.text =  $('#languageSelector').val();
	serchInput.text =  $('#languageSelector').val();
	serchInput.text =  $('#languageSelector').val();
	serchInput.text =  $('#languageSelector').val();
	serchInput.text =  $('#languageSelector').val();
	serchInput.text =  $('#languageSelector').val();
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
}

function loadScheduleListData(searchdata){
  var xhttp = new XMLHttpRequest();
  let fd  = new FormData();
  if(searchdata){
	fd.append("search", "byFilter");
  	for(var key in searchdata){
		fd.append(key, searchdata[key]);
  	}
  }

  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          var response = xhttp.responseText;
          var scheduleData = JSON.parse(response);
          //programData = response;
          renderScheduleData(scheduleData);
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
    if(renderData[key]['language']=languageCode){
      $('#programScheduleHolder').append(Mustache.render(schedulefragment, renderData[key]));
    }
  }
}