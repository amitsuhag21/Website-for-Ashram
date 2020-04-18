var planData = {};

$(document).ready(function() {
	$('#aboutUsHeaderView').addClass('active');
	loadCategory()
	if(!window.localStorage.languageCode){
		window.localStorage.languageCode = 'en';
	}else{
		$('#languageSelector').val(window.localStorage.languageCode);
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

function callFaqData(){
	var fragment = '';
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	        templates = xhttp.responseText;
	        loadInitialData();
	    }
	};
	xhttp.open("GET", "public_html/fragments/indexFragment.html", true);
	xhttp.send();
}

function loadInitialData(){
	
}


