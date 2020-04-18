var planData = {};

$(document).ready(function() {
	$('#indexHeaderView').addClass('active');
	window.localStorage.clear();
	loadCategory();
	if(!window.localStorage.languageCode){
		window.localStorage.languageCode = 'en';
	}else{
		$('#languageSelector').val(window.localStorage.languageCode);
	}
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
			"masterLink":"schedule.php",
			"fottertext":"Explore More"
		},
		"hi":{
			"exploreTitle":"आपका स्वागत है ",
			"exploreName":" हमारे कार्यक्रमों",
			"masterLink":"schedule.php",
			"fottertext":"और ज्यादा खोजें"
		}	
} 

var masterdetails = { "en":{
			"mastereTitle" : "Know the Masters",
			"content" : "I Am A Threat - Certainly ! If you dont understand what I am saying, I am a threat, certainly. But if they understand what I am saying, they will rejoice, there is no threat. In fact, I want to make these people contemporaries.",
			"fotterLink" : "master.html",
			"imageName" : "sumiran.jpg",			
			"masterLink" : "master.html",
			"fottertext" :"Know More"
		},
		"hi":{
			"mastereTitle" : "मास्टर्स को जानें",
			"content" : "आई एम ए थ्रेट - निश्चित रूप से! यदि आप यह नहीं समझते हैं कि मैं क्या कह रहा हूं, तो मैं एक खतरा हूं। लेकिन अगर वे समझते हैं कि मैं क्या कह रहा हूं, तो वे आनन्दित होंगे, कोई खतरा नहीं है। वास्तव में, मैं इन लोगों को समकालीन बनाना चाहता हूं",
			"fotterLink" : "master.html",
			"imageName" : "sumiran.jpg",
			"masterLink" : "master.html",
			"fottertext" :"अधिक जानिए"
		}	
} 

var programdetails = [{ "en":{
			"programTitle" : "Samadhi Programs",
			"content" : "Give yourself a fresh start with our Samadhi programs where you can embark a beautiful spiritual journey by building a heightened state of awareness within you. It eventually leads you to the path of self-transformation.",
			"fotterLink" : "programe.php?programid=1",
			"masterLink" : "programe.php?programid=1",
			"imageName" : "Samadhi.jpg",
			"fottertext" :"Know More"
		},
		"hi":{
			"programTitle" : "समाधि कार्यक्रम",
			"content" : "अपने आप को हमारे समाधि कार्यक्रमों से एक नई शुरुआत दें जहां आप एक सुंदर आध्यात्मिक अवतार ले सकते हैं आप के भीतर जागरूकता की एक बढ़ राज्य का निर्माण करके यात्रा। यह अंततः आपको मार्ग की ओर ले जाता है आत्म परिवर्तन का।",
			"fotterLink" : "programe.php?programid=1",
			"masterLink" : "programe.php?programid=1",
			"imageName" : "Samadhi.jpg",
			"fottertext" :"अधिक जानिए"
		}	
},
{ "en":{
			"programTitle" : "Pragya Programs",
			"content" : "Reconnect with your roots and find the secret within you by joining our unique segment of pragya programs. These are specially designed to unlock your emotional blockage and enable you to enjoy the present.",
			"fotterLink" : "programe.php?programid=100",
			"masterLink" : "programe.php?programid=100",
			"imageName" : "pragya.png",
			"fottertext" :"Know More"
		},
		"hi":{
			"programTitle" : "प्रज्ञा कार्यक्रम",
			"content" : "अपनी जड़ों के साथ फिर से कनेक्ट करें और प्रज्ञा के हमारे अनूठे सेगमेंट में शामिल होकर अपने भीतर के रहस्य को खोजें कार्यक्रम। ये विशेष रूप से आपके भावनात्मक रुकावट को अनलॉक करने और आपको आनंद लेने के लिए सक्षम करने के लिए डिज़ाइन किए गए हैं वर्तमान।",
			"fotterLink" : "programe.php?programid=100",
			"masterLink" : "programe.php?programid=100",
			"imageName" : "pragya.png",
			"fottertext" :"अधिक जानिए"
		}	
} ,
{ "en":{
			"programTitle" : "Health Programs",
			"content" : "Priorities your health first before it’s too late! Our health programs are designed to encourage a healthy lifestyle that leads to promote your well-being.",
			"fotterLink" : "programe.php?programid=60",
			"masterLink" : "programe.php?programid=60",
			"imageName" : "health.jpg",
			"fottertext" :"Know More"
		},
		"hi":{
			"programTitle" : "स्वास्थ्य कार्यक्रम",
			"content" : "बहुत देर होने से पहले अपने स्वास्थ्य को प्राथमिकता दें! हमारे स्वास्थ्य कार्यक्रमों को प्रोत्साहित करने के लिए डिज़ाइन किया गया है स्वस्थ जीवन शैली जो आपकी भलाई को बढ़ावा देती है।",
			"fotterLink" : "programe.php?programid=60",
			"imageName" : "health.jpg",
			"masterLink" : "programe.php?programid=60",
			"fottertext" :"अधिक जानिए"
		}	
} ,{ "en":{
			"programTitle" : "Sumiran Programs",
			"content" : "The higher level of spiritual journey starts with devotion, when one enters in this stage they gets to experience the liveliness of this universe that is way beyond to the enlightenment.",
			"fotterLink" : "programe.php?programid=15",
			"imageName" : "sumiran.jpg",
			"masterLink" : "programe.php?programid=15",
			"fottertext" :"Know More"
		},
		"hi":{
			"programTitle" : "सुमिरन कार्यक्रम",
			"content" : "आध्यात्मिक यात्रा का उच्चतर स्तर भक्ति से शुरू होता है, जब कोई इस अवस्था में प्रवेश करता है तो वे उससे जुड़ जाते हैं इस ब्रह्माण्ड की जीविका का अनुभव करें जो आत्मज्ञान से परे है।",
			"fotterLink" : "programe.php?programid=15",
			"imageName" : "sumiran.jpg",
			"masterLink" : "programe.php?programid=15",
			"fottertext" :"अधिक जानिए"
		}	
} ] 

//https://www.jssor.com/skins/bullet/bullet-skin-035-black.slider/=skin