var masterData = {};
var templates = "";

$(document).ready(function() {
  debugger;
    loadCategory()
  callFragmentText();
  if(!window.localStorage.languageCode){
    window.localStorage.languageCode = 'en';
  }else{
    $('#languageSelector').val(window.localStorage.languageCode);
  }
  var url  = window.location.href 
  url = url.split("?")[1];
  if(url){      
      loadMasterData(url);
  }else{
    url ="programid=1"
    loadMasterData(url);
  }
  eventListener();
});

function eventListener(){
  $('#languageSelector').on('change', setLangaugeCode);
}

function setLangaugeCode(){
  window.localStorage.languageCode = $('#languageSelector').val();
  loadInitialData();
}

function callFragmentText(){
  var fragment = '';
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          templates = xhttp.responseText;
      }
  };
  xhttp.open("GET", "public_html/fragments/masterFragment.html", true);
  xhttp.send();
}


function loadMasterData(urldata){
  urldata = urldata.split("=")
  var xhttp = new XMLHttpRequest();
  let fd  = new FormData();
  fd.append('masterid', urldata[1])
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          var response = xhttp.responseText;
          masterData = JSON.parse(response);
          renderProgramData(masterData);
      }else{

      }
  };
  xhttp.open("POST", "php/api/controller/MasterController.php", true);
  xhttp.send(fd);
}

function renderProgramData(renderData){
  var titlefragment = $(templates).filter('#masterTitleContent').html();
  var descfragment = $(templates).filter('#masterDetailContent').html();
  var languageCode = window.localStorage.languageCode ?window.localStorage.languageCode : "en" ;
  var rendered = false;
  for(var key in renderData){
    if(renderData[key]['language']=languageCode && rendered == false){
      $('#masterTitleHolder').empty();    
      $('#masterTitleHolder').append(Mustache.render(titlefragment, renderData[key]));
      $('#masterDetailHolder').empty();    
      $('#masterDetailHolder').append(Mustache.render(descfragment, renderData[key]));     
      rendered = true;
    }
  }
}