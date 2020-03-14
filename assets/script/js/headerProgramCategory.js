var categoryData = {};
var headerTemplates = "";

function loadCategory(){
  debugger;
  callfragmentText_HPC(); 
  loadHeaderProgramCategoryData();
}

function eventListener(){
  $('#languageSelector').on('change', setLangaugeCode);
}
//variable should be unique through out the application, like this page is common for all page
function setLangaugeCode(){
  window.localStorage.languageCode = $('#languageSelector').val();
}

function callfragmentText_HPC(){
  
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          headerTemplates = xhttp.responseText;
      }
  };
  xhttp.open("GET", "public_html/fragments/headerCategoryFragment.html", true);
  xhttp.send();
}

function loadHeaderProgramCategoryData(){
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          let proCatResponse = xhttp.responseText;
          categoryData = JSON.parse(proCatResponse);
          loadProgramCategoryData();
      }else{

      }
  };
  xhttp.open("POST", "php/api/controller/ProgramCategoryController.php", true);
  xhttp.send();
}

function loadProgramCategoryData(){
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          let catProResponse = xhttp.responseText;
          catProResponse = JSON.parse(catProResponse);
          if(catProResponse && catProResponse.length  > 0){
              renderProgramData_HPC(catProResponse);
          }
      }else{

      }
  };
  xhttp.open("POST", "php/api/controller/ProgramController.php", true);
  xhttp.send();
}

function renderProgramData_HPC(programListCateData){
  var categoryfragment = $(headerTemplates).filter('#categoryContent').html();
  var progfragment = $(headerTemplates).filter('#programListContent').html();
  var languageCode = window.localStorage.languageCode ?window.localStorage.languageCode : "en" ;
  $('#programCategoryHolder').empty();    
  for(var keyCat in categoryData){
    if(categoryData[keyCat]['language']=languageCode){
      $('#programCategoryHolder').append(Mustache.render(categoryfragment, categoryData[keyCat]));
      $('#programListHolder_'+categoryData[keyCat].categoryid).empty();    
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