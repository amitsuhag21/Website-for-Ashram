var planData = {};

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
	callFaqData(); 
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
	loadMasterData();
	loadProgramData();
	loadExploreMore();
}

function loadMasterData(){
/*	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	        var response = xhttp.responseText;
	        planData = JSON.parse(response);*/
	        renderPlans(masterdetails);
/*	    }
	};
	xhttp.open("GET", "../php/PackageController.php", true);
	xhttp.send();*/
}

function renderPlans(renderData){
	var fragment = $(templates).filter('#mastercontent').html();
	var languageCode = window.localStorage.languageCode ?window.localStorage.languageCode : "en" ;
	for(var key=0; key <6 ; key++){
		$('#itemContentHolder'+key).empty();    
		$('#itemContentHolder'+key).append(Mustache.render(fragment, renderData[languageCode]));
	}
}

function loadExploreMore(){
	var fragment = $(templates).filter('#indexExploreMoreContent').html();
	var languageCode = window.localStorage.languageCode ?window.localStorage.languageCode : "en" ;
	$('#indexExploreMore').empty();    
	$('#indexExploreMore').append(Mustache.render(fragment, exploredetails[languageCode]));
}

function loadProgramData(){
/*	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	        var response = xhttp.responseText;
	        planData = JSON.parse(response);*/
	        renderProgramPlans(programdetails);
/*	    }
	};
	xhttp.open("GET", "../php/PackageController.php", true);
	xhttp.send();*/
}

function renderProgramPlans(renderData){
	var fragment = $(templates).filter('#programContent').html();
	var languageCode = window.localStorage.languageCode ?window.localStorage.languageCode : "en" ;
	for(var key=0; key <4 ; key++){
		$('#programContentHolder'+key).empty();    
		$('#programContentHolder'+key).append(Mustache.render(fragment, renderData[key][languageCode]));
	}
}

var exploredetails = { "en":{
			"exploreTitle":"Welcome to ",
			"exploreName":" Our Programs",
			"masterLink":"programe.html",
			"fottertext":"Explor More"
		},
		"hi":{
			"exploreTitle":"आपका स्वागत है ",
			"exploreName":" हमारे कार्यक्रमों",
			"masterLink":"programe.html",
			"fottertext":"और ज्यादा खोजें"
		}	
} 

var masterdetails = { "en":{
			"mastereTitle" : "Know the Masters",
			"content" : "I Am A Threat - Certainly ! If you dont understand what I am saying, I am a threat, certainly. But if they understand what I am saying, they will rejoice, there is no threat. In fact, I want to make these people contemporaries.",
			"fotterLink" : "master.html",
			"masterLink" : "master.html",
			"fottertext" :"Know More"
		},
		"hi":{
			"mastereTitle" : "मास्टर्स को जानें",
			"content" : "आई एम ए थ्रेट - निश्चित रूप से! यदि आप यह नहीं समझते हैं कि मैं क्या कह रहा हूं, तो मैं एक खतरा हूं। लेकिन अगर वे समझते हैं कि मैं क्या कह रहा हूं, तो वे आनन्दित होंगे, कोई खतरा नहीं है। वास्तव में, मैं इन लोगों को समकालीन बनाना चाहता हूं",
			"fotterLink" : "master.html",
			"masterLink" : "master.html",
			"fottertext" :"अधिक जानिए"
		}	
} 

var programdetails = [{ "en":{
			"programTitle" : "Samadhi Program",
			"content" : "Based on Divine Sound, Light, Breathing, Energyy in which a seeker learns to live in harmony with the Divine Sound, Light, Breathing, Energyy",
			"fotterLink" : "programe.html",
			"masterLink" : "programe.html",
			"fottertext" :"Know More"
		},
		"hi":{
			"programTitle" : "समाधि कार्यक्रम",
			"content" : "दिव्य ध्वनि, प्रकाश, श्वास, ऊर्जा पर आधारित है जिसमें एक साधक दिव्य ध्वनि, प्रकाश, श्वास, ऊर्जा के साथ सद्भाव में रहना सीखता है",
			"fotterLink" : "programe.html",
			"masterLink" : "programe.html",
			"fottertext" :"अधिक जानिए"
		}	
},
{ "en":{
			"programTitle" : "Pragya Program",
			"content" : "For Happy Living in outside world Pragya programs have been designed and are being conducted on regular basis which are essential  at some point.",
			"fotterLink" : "programe.html",
			"masterLink" : "programe.html",
			"fottertext" :"Know More"
		},
		"hi":{
			"programTitle" : "प्रज्ञा कार्यक्रम",
			"content" : "बाहरी दुनिया में हैप्पी लिविंग के लिए प्रज्ञा कार्यक्रमों को डिजाइन किया गया है और नियमित रूप से संचालित किया जा रहा है जो कुछ बिंदु पर आवश्यक हैं।",
			"fotterLink" : "programe.html",
			"masterLink" : "programe.html",
			"fottertext" :"अधिक जानिए"
		}	
} ,
{ "en":{
			"programTitle" : "Health Program",
			"content" : "Based on modern developments in health management and ancient spiritual wisdom Kayakalpam programs are regularly conducted by Oshodhara.",
			"fotterLink" : "programe.html",
			"masterLink" : "programe.html",
			"fottertext" :"Know More"
		},
		"hi":{
			"programTitle" : "स्वास्थ्य कार्यक्रम",
			"content" : "स्वास्थ्य प्रबंधन और प्राचीन आध्यात्मिक ज्ञान में आधुनिक विकास पर आधारित कायाकल्प कार्यक्रम नियमित रूप से ओशोधारा द्वारा संचालित किए जाते हैं।",
			"fotterLink" : "programe.html",
			"masterLink" : "programe.html",
			"fottertext" :"अधिक जानिए"
		}	
} ,{ "en":{
			"programTitle" : "Sumiran Program",
			"content" : "This is conducted in total silence in which seekers learn to be grounded in Cosmic Bliss. Jeevan Pragya and Moksha Pragya before Anand Sumiran",
			"fotterLink" : "programe.html",
			"masterLink" : "programe.html",
			"fottertext" :"Know More"
		},
		"hi":{
			"programTitle" : "सुमिरन कार्यक्रम",
			"content" : "यह कुल मौन में आयोजित किया जाता है जिसमें साधक ब्रह्मांडीय आनंद में पारंगत होना सीखते हैं। आनंद सुमिरन से पहले जीवन प्रज्ञा और मोक्ष प्रज्ञा",
			"fotterLink" : "programe.html",
			"masterLink" : "programe.html",
			"fottertext" :"अधिक जानिए"
		}	
} ] 