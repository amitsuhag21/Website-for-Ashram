var programData_PPG = {};
var templates_PPG = "";

$(document).ready(function() {
  debugger;
  loadCategory()
  callFragmentText_PPG();
  if(!window.localStorage.languageCode){
    window.localStorage.languageCode = 'en';
  }else{
    $('#languageSelector').val(window.localStorage.languageCode);
  }
  var url  = window.location.href 
  url = url.split("?")[1];
  if(url){      
      loadProgramData_PPG(url);
  }else{
    url ="programid=1"
    loadProgramData_PPG(url);
  }
  eventListener();
});

function eventListener(){
  $('#languageSelector').on('change', setLangaugeCode);
}

function setLangaugeCode(){
  window.localStorage.languageCode = $('#languageSelector').val();
}

function callFragmentText_PPG(){
  let fragment = '';
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          templates_PPG = xhttp.responseText;
      }
  };
  xhttp.open("GET", "public_html/fragments/programFragment.html", true);
  xhttp.send();
}


function loadProgramData_PPG(urldata){
  urldata = urldata.split("=")
  var xhttp = new XMLHttpRequest();
  let fd  = new FormData();
  fd.append('programid', urldata[1])
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          var response = xhttp.responseText;
          programData_PPG = JSON.parse(response);
          //programData = response;
          renderProgramData_PPG(programData_PPG);
      }else{

      }
  };
  xhttp.open("POST", "php/api/controller/ProgramController.php", true);
  xhttp.send(fd);
}

function renderPlans(renderData){
  var fragment = $(templates_PPG).filter('#programTitleContent').html();
  var languageCode = window.localStorage.languageCode ?window.localStorage.languageCode : "en" ;
  for(var key=0; key <6 ; key++){
    $('#itemContentHolder'+key).empty();    
    $('#itemContentHolder'+key).append(Mustache.render(fragment, renderData[languageCode]));
  }
}


function renderProgramData_PPG(renderData){
  var titlefragment = $(templates_PPG).filter('#programTitleContent').html();
  var descfragment = $(templates_PPG).filter('#programDetailContent').html();
  var languageCode = window.localStorage.languageCode ?window.localStorage.languageCode : "en" ;
  
  if(renderData[0]['language']=languageCode){
    $('#programTitleHolder').empty();    
    $('#programTitleHolder').append(Mustache.render(titlefragment, renderData[0]));
    $('#programDetailHolder').empty();    
    $('#programDetailHolder').append(Mustache.render(descfragment, renderData[0]));     
  }
}