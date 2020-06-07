

$(document).ready(function() {
	$('#mainSearchBtn').on('click', handlerMainSearch);
	$('#mainSearchInput').on('change', handlerMainSearchReset);
	$('#mainSearchInput').keypress(function(event){
	    var keycode = (event.keyCode ? event.keyCode : event.which);
	    if(keycode == '13'){
	    	event.preventDefault();
	       handlerMainSearch(); 
	    }
	});
	$('#searchMainDialog').on('click', function(e){
		  e.stopPropagation();
		});
		$('#content').on('click', function(e){
		  	mainSearchReset()
		});
	handlerMainSearchReset();
});

function handlerMainSearch(){
	var data = $('#mainSearchInput').val(); 
	if(data.length > 0){
		callSerachApi(data);
	}
}


function mainSearchReset(){
	$('#mainSearchInput').val(''); 
	$('#programListData').empty();    
		$('#programCategoryHolder').empty();   	
	$('#searchMainDialog').css("display", "none");
}

function handlerMainSearchReset(){
	var data = $('#mainSearchInput').val(); 
	if(data <1){
		$('#programListData').empty();    
  		$('#programCategoryHolder').empty();   	
		$('#searchMainDialog').css("display", "none");
	}
}


function callSerachApi(searchData){
	let fd  = new FormData();
	fd.append('searchKey',searchData);
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	  if (this.readyState == 4 && this.status == 200) {
	      var response = xhttp.responseText;
	      searchData_SePG = JSON.parse(response);
	      renderSearchData_SePG(searchData_SePG);
	  }else{

	  }
	};
	xhttp.open("POST", "php/api/controller/SearchController.php", true);
	xhttp.send(fd);
}


function renderSearchData_SePG(loaddata){
	$('#searchMainDialog').css("display", "block");
	var searchfragment = $(headerTemplates).filter('#searchItemContent').html();
  	$('#programListData').empty();    
  	$('#locationListData').empty();   
  	searchData = loaddata['programData']; 
  	if(searchData.length >0){
  		
  		$('#progSearchListDiv').removeClass('displayNone');
		for(var serKey in searchData){
			$('#programListData').append(Mustache.render(searchfragment, searchData[serKey]));
		}  		
  	}else{
  		$('#progSearchListDiv').addClass('displayNone');
  		
  	}

  	searchData = loaddata['centerData']; 
  	if(searchData.length >0){
  		$('#centerSearchListDiv').removeClass('displayNone');
		for(var serKey in searchData){
			$('#locationListData').append(Mustache.render(searchfragment, searchData[serKey]));
		}
	}else{
  		$('#centerSearchListDiv').addClass('displayNone');
	}
}

//" [{"0":"1","scheduleid":"1","1":"40","programid":"40","2":"1","dhyankendraid":"1","3":"0","level":"0","4":"2020-03-22","start_date":"2020-03-22","5":"2020-03-22","end_date":"2020-03-22","6":"0","duration":"0","7":"","eligibility":"","8":"Sadguru","guidelines":"Sadguru","9":"Anubhutiji,  Sahibaji, Madanji","comments":"Anubhutiji,  Sahibaji, Madanji","10":"en","language":"en","11":"1","status":"1"},{"0":"2","scheduleid":"2","1":"9","programid":"9","2":"1","dhyankendraid":"1","3":"9","level":"9","4":"2020-03-23","start_date":"2020-03-23","5":"2020-03-28","end_date":"2020-03-28","6":"0","duration":"0","7":"","eligibility":"","8":"Prabhakarji","guidelines":"Prabhakarji","9":" Gyanamritji, Phuharji","comments":" Gyanamritji, Phuharji","10":"en","language":"en","11":"1","status":"1"},{"0":"3","scheduleid":"3","1":"100","programid":"100","2":"1","dhyankendraid":"1","3":"0","level":"0","4":"2020-03-23","start_date":"2020-03-23","5":"2020-03-25","end_date":"2020-03-25","6":"0","duration":"0","7":"","eligibility":"","8":"Jalilji","guidelines":"Jalilji","9":"Hinaji","comments":"Hinaji","10":"en","language":"en","11":"1","status":"1"},{"0":"171","scheduleid":"171","1":"0","programid":"0","2":"2","dhyankendraid":"2","3":"1","level":"1","4":"2020-03-23","start_date":"2020-03-23","5":"2020-03-28","end_date":"2020-03-28","6":"0","duration":"0","7":"","eligibility":"","8":"Sadguru","guidelines":"Sadguru","9":"Indrajitji","comments":"Indrajitji","10":"en","language":"en","11":"1","status":"1"},{"0":"172","scheduleid":"172","1":"5","programid":"5","2":"2","dhyankendraid":"2","3":"5","level":"5","4":"2020-03-23","start_date":"2020-03-23","5":"2020-03-28","end_date":"2020-03-28","6":"0","duration":"0","7":"23-28","eligibility":"23-28","8":"Sadguru","guidelines":"Sadguru","9":"Gopalji, Ramanandji","comments":"Gopalji, Ramanandji","10":"en","language":"en","11":"1","status":"1"},{"0":"173","scheduleid":"173","1":"8","programid":"8","2":"2","dhyankendraid":"2","3":"8","level":"8","4":"2020-03-23","start_date":"2020-03-23","5":"2020-03-28","end_date":"2020-03-28","6":"0","duration":"0","7":"23-28","eligibility":"23-28","8":"Sadguru","guidelines":"Sadguru","9":" Mastanaji, Amitji","comments":" Mastanaji, Amitji","10":"en","language":"en","11":"1","status":"1"},{"0":"4","scheduleid":"4","1":"101","programid":"101","2":"1","dhyankendraid":"1","3":"0","level":"0","4":"2020-03-26","start_date":"2020-03-26","5":"2020-03-28","end_date":"2020-03-28","6":"0","duration":"0","7":"","eligibility":"","8":"Shuklaji","guidelines":"Shuklaji","9":"Hinaji, Vasundharaji","comments":"Hinaji, Vasundharaji","10":"en","language":"en","11":"1","status":"1"},{"0":"5","scheduleid":"5","1":"12","programid":"12","2":"1","dhyankendraid":"1","3":"12","level":"12","4":"2020-03-30","start_date":"2020-03-30","5":"2020-04-04","end_date":"2020-04-04","6":"0","duration":"0","7":"","eligibility":"","8":"Sadguru","guidelines":"Sadguru","9":"Prabhakarji, Ekantaji","comments":"Prabhakarji, Ekantaji","10":"en","language":"en","11":"1","status":"1"},{"0":"6","scheduleid":"6","1":"64","programid":"64","2":"1","dhyankendraid":"1","3":"0","level":"0","4":"2020-03-30","start_date":"2020-03-30","5":"2020-04-04","end_date":"2020-04-04","6":"0","duration":"0","7":"","eligibility":"","8":"Namanji","guidelines":"Namanji","9":"Team","comments":"Team","10":"en","language":"en","11":"1","status":"1"},{"0":"7","scheduleid":"7","1":"17","programid":"17","2":"1","dhyankendraid":"1","3":"17","level":"17","4":"2020-04-06","start_date":"2020-04-06","5":"2020-04-11","end_date":"2020-04-11","6":"0","duration":"0","7":"","eligibility":"","8":"Sadguru","guidelines":"Sadguru","9":" Chetanji, Prabhakarji","comments":" Chetanji, Prabhakarji","10":"en","language":"en","11":"1","status":"1"},{"0":"8","scheduleid":"8","1":"1","programid":"1","2":"1","dhyankendraid":"1","3":"1","level":"1","4":"2020-04-06","start_date":"2020-04-06","5":"2020-04-11","end_date":"2020-04-11","6":"0","duration":"0","7":"","eligibility":"","8":"Sadguru","guidelines":"Sadguru","9":"Gopalji, Anubhutiji","comments":"Gopalji, Anubhutiji","10":"en","language":"en","11":"1","status":"1"},{"0":"235","scheduleid":"235","1":"1","programid":"1","2":"144","dhyankendraid":"144","3":"1","level":"1","4":"2020-04-06","start_date":"2020-04-06","5":"2020-04-11","end_date":"2020-04-11","6":"6","duration":"6","7":"Sadguru","eligibility":"Sadguru","8":"<p>Osho Amit<\/p>\r\n","guidelines":"<p>Osho Amit<\/p>\r\n","9":"<p>Osho Anutosh<\/p>\r\n","comments":"<p>Osho Anutosh<\/p>\r\n","10":"en","language":"en","11":"1","status":"1"},{"0":"9","scheduleid":"9","1":"40","programid":"40","2":"1","dhyankendraid":"1","3":"0","level":"0","4":"2020-04-12","start_date":"2020-04-12","5":"2020-04-12","end_date":"2020-04-12","6":"0","duration":"0","7":"","eligibility":"","8":"Sadguru","guidelines":"Sadguru","9":"Anubhutiji,  Sahibaji, Madanji","comments":"Anubhutiji,  Sahibaji, Madanji","10":"en","language":"en","11":"1","status":"1"},{"0":"174","scheduleid":"1"