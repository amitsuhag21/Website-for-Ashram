var masterData = {};
var templates = "";

$(document).ready(function() {
  $('#masterHeaderView').addClass('active');
  loadCategory()
  callFragmentText();
  if(!window.localStorage.languageCode){
    window.localStorage.languageCode = 'en';
  }else{
    $('#languageSelector').val(window.localStorage.languageCode);
  }
  var url  = window.location.href 
  url = url.split("?")[1];
  var mast = url.split("=")[1];
  $('#masterImageHolder_'+mast).removeClass('displayNone')
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
  var masterAccordfragment = $(templates).filter('#masterAccordionContent').html();
  var languageCode = window.localStorage.languageCode ?window.localStorage.languageCode : "en" ;
  var rendered = false;
  for(var key in renderData){
    if(renderData[key]['language']=languageCode && rendered == false){
      $('#masterTitleHolder').empty();    
      var masterData = renderData[key].longdescription;
      masterData = masterData.split('<p>**********</p>');
      var masterArr=[];
      for(var mkket in masterData){
        if(mkket==0){
           renderData[key].longdescription = masterData[mkket];
        }else{
          var marObj = masterData[mkket].split("<p>##########</p>")
          var temObj = {};
          temObj.label = mkket;
          temObj.masterTopicHeader = marObj[0];
          temObj.masterDetails = marObj[1];
          masterArr.push(temObj);
        }
      }
      $('#masterTitleHolder').append(Mustache.render(titlefragment, renderData[key]));
      $('#masterDetailHolder').empty();    
      $('#masterDetailHolder').append(Mustache.render(descfragment, renderData[key]));     
      $('#masterLongDesc_'+renderData[key].guruid).html(renderData[key].longdescription);
      rendered = true;
    }
    $('#masterAccordionHolder').empty();    
    for(var dateKey in masterArr){
      $('#masterAccordionHolder').append(Mustache.render(masterAccordfragment, masterArr[dateKey])); 
      $('#masterTopic_'+masterArr[dateKey].label).html(masterArr[dateKey].masterTopicHeader);
      $('#masterDetails_'+masterArr[dateKey].label).html(masterArr[dateKey].masterDetails);


    }
  }
}