var planData = {};
$(document).ready(function(){
debugger;	
	callFaqData(); 
});



function callFaqData(){
	var fragment = '';
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	        templates = xhttp.responseText;
	        loadInitialData();
	    }
	};
	xhttp.open("GET", "public_html/fragments/programFragment.html", true);
	xhttp.send();
}

function loadInitialData(){
	loadPlansData();
}
$(window).bind('hashchange', function() {
    loadPlansData();
});

function loadPlansData(){
/*	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	        var response = xhttp.responseText;
	        planData = JSON.parse(response);*/
	        renderPlans(samadhi);
/*	    }
	};
	xhttp.open("GET", "../php/PackageController.php", true);
	xhttp.send();*/
}

function renderPlans(faqData){
	$('#fragmentholder_program').empty();
	var fragment = $(templates).filter('#programContent').html();
  var url = window.location.href
  url = url.split('#')
  var key = 0;
  if(url.length>1 && url[1]!=""){
    key = url[1];
  }	
	$('#fragmentholder_program').append(Mustache.render(fragment, faqData[key]));
	var $owl = $('.owl-carousel').owlCarousel({
	    items: 1,
	    loop:true
	});

	$owl.trigger('refresh.owl.carousel');
}
var  samadhi = [
    {
      "od_pg_index": "0",
      "od_pg_pre_index": "1",
      "od_pg_next_index": "2",
      "od_pg_name": "Aanad Pragra  (MEDITATIVE LIVING)",
      "od_pg_desc":" It consists of two parts - AnandPragya or Blissful Living and Vipassana Samadhi or Divine Living.Each program is of three days’ duration. Foreign students are allowed to enter directly into Divine Living program.1A. AnandPragya or Blissful Living Awareness is based on Eightfold path of Lord Buddha and solves most of the problems related to stress, relationship and boredom.\n 1B. Vipassana Samadhi or Divine Livingis a unique blend of Vipassana of Lord Buddha and Ajapa of Santmat, the two main paths of enlightenment, through all the ages. This can be done only after attending AnandPragya.\nDivineLiving Program or Vipassana Samadhi teaches how to live in Total Awareness, enjoy aloneness and be free from boredom of loneliness.",
      "od_pg_image": ["img/program/dhyanSamadhi_03.jpg","img/program/dhyanSamadhi_02.jpg"]
    },
    {
      "od_pg_index": "1",
      "od_pg_next_index": "2",
      "od_pg_pre_index": "0",
      "od_pg_name": "DHYAN SAMADHI  (MEDITATIVE LIVING)",
      "od_pg_desc":" It consists of two parts - AnandPragya or Blissful Living and Vipassana Samadhi or Divine Living.Each program is of three days’ duration. Foreign students are allowed to enter directly into Divine Living program.1A. AnandPragya or Blissful Living Awareness is based on Eightfold path of Lord Buddha and solves most of the problems related to stress, relationship and boredom.\n 1B. Vipassana Samadhi or Divine Livingis a unique blend of Vipassana of Lord Buddha and Ajapa of Santmat, the two main paths of enlightenment, through all the ages. This can be done only after attending AnandPragya.\nDivineLiving Program or Vipassana Samadhi teaches how to live in Total Awareness, enjoy aloneness and be free from boredom of loneliness.",
      "od_pg_image": ["img/program/dhyanSamadhi_03.jpg","img/program/dhyanSamadhi_01.jpg","img/program/dhyanSamadhi_02.jpg"]
    },
    {
      "od_pg_index": "2",
      "od_pg_next_index": "0",
      "od_pg_pre_index": "1",
      "od_pg_name": "SURATI SAMADHI  (DIVINE SOUND MEDITATION)",
      "od_pg_desc":" It is based on Divine Sound Awareness. It is open only to Dhyan Samadhi graduates, who have been initiated into Neo-Sannyas, the First Initiation. This program teaches how to live in harmony with Divine Sound. It would be advisable that you come for 12 days and complete a Dhyan Samadhi Group, followed by Surati Samadhi Group, which means first and second level groups in one stretch. What you will get in 12 days, you may not possibly get even in 12 years of meditations.",
      "od_pg_image": ["img/program/dhyanSamadhi_03.jpg","img/program/dhyanSamadhi_01.jpg"]
    }
  ]