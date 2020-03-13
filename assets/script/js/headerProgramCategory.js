var categoryData = {};
var headerTemplates = "";

function loadCategory(){
  debugger;
  callFragmentText(); 
  loadHeaderProgramCategoryData();
}

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
          headerTemplates = xhttp.responseText;
      }
  };
  xhttp.open("GET", "public_html/fragments/headerCategoryFragment.html", true);
  xhttp.send();
}

function loadHeaderProgramCategoryData(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          var proCatResponse = xhttp.responseText;
          categoryData = JSON.parse(proCatResponse);
          loadProgramCategoryData();
      }else{

      }
  };
  xhttp.open("POST", "php/api/controller/ProgramCategoryController.php", true);
  xhttp.send();
}

function loadProgramCategoryData(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          var catProResponse = xhttp.responseText;
          catProResponse = JSON.parse(catProResponse);
          renderProgramData(catProResponse);
      }else{

      }
  };
  xhttp.open("POST", "php/api/controller/ProgramController.php", true);
  xhttp.send();
}

function renderProgramData(programListCateData){
  var categoryfragment = $(headerTemplates).filter('#categoryContent').html();
  var progfragment = $(headerTemplates).filter('#programListContent').html();
  var languageCode = window.localStorage.languageCode ?window.localStorage.languageCode : "en" ;
  $('#programCategoryHolder').empty();    
  for(var key in categoryData){
    if(categoryData[key]['language']=languageCode){
      $('#programCategoryHolder').append(Mustache.render(categoryfragment, categoryData[key]));
      $('#programListHolder_'+categoryData[key].categoryid).empty();    
    }
  }
  for(var pgkey in programListCateData){
      var list =  programListCateData[pgkey].categoryid;
      list = list.split(",");
      for(var d in list){
        $('#programListHolder_'+list[d]).append(Mustache.render(progfragment, programListCateData[pgkey]));     

      }

  }
}