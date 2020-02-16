var planData = {};
$(document).ready(function(){	
	
	$('.slider').slick({
	  autoplay:true,
	  autoplaySpeed:1500,
	  arrows:true,
	  prevArrow:'<button type="button" class="slick-prev"></button>',
	  nextArrow:'<button type="button" class="slick-next"></button>',
	  centerMode:true,
	  slidesToShow:3,
	  slidesToScroll:1
	});	
	$('#displayAddonsCustomize').on('click', handleAddOnShowShide);
	$('#addToCartStaterBtn').on('click', handleAddToCart);
	setTimeout(function(){ 
		setInitialParameter();
		callFeatreAndPlan(); 
	}, 3000);
	$('.sltBtn').on('click', planSelected);	
	$('.pricingTabHolder').on('click', handlerAddSelected);
});

function handlerAddSelected(){
	var id = this.id;
	$('.pricingTabHolder').removeClass('selectedCls')
	$('#'+id).addClass('selectedCls')
	handlerCalculatePrice();
}

function handleAddOnShowShide(){
	if($('#customizeAddOns').hasClass('displayNone')){
		$('#customizeAddOns').removeClass('displayNone');
	}
	else{
		$('#customizeAddOns').addClass('displayNone');
	}
}

function callFeatreAndPlan(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	        var response = xhttp.responseText;
	        pricingData = JSON.parse(response);
	        getFragment(pricingData);
	    }
	};
	xhttp.open("GET", "../php/FeatureController.php", true);
	xhttp.send();
}
var templates ;
function getFragment(pricingData) {
	var fragment = '';
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	        templates = xhttp.responseText;
	        loadInitialData(pricingData);
	    }
	};
	xhttp.open("GET", "../fragments/demoFragment.html", true);
	xhttp.send();
}

function loadInitialData(pricingData){
	loadPlansData();
	loadPricingTable(pricingData);
}

function loadPlansData(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	        var response = xhttp.responseText;
	        planData = JSON.parse(response);
	        renderPlans(planData);
	    }
	};
	xhttp.open("GET", "../php/PackageController.php", true);
	xhttp.send();
}

function renderPlans(planData){
	$('#plansHolder').empty();
	var fragment = $(templates).filter('#planFragment').html();
	for(var key in planData){
		$('#plansHolder').append(Mustache.render(fragment, planData[key]));
	}
	$('.changeHandler').change(handlerCalculatePrice);
}

function loadPricingTable(pricingData){
	var fragment = $(templates).filter('#demoFragmnet').html();
	var addOnFeature = $(templates).filter('#addOnFeature').html();
	var featureListItem = $(templates).filter('#featureListItem').html();

	for(var key in pricingData){
		var renderObj = pricingData[key];
		if(renderObj.planName ==="service"){
			$('#addOnFragmentHolder').append(Mustache.render(addOnFeature, renderObj));
		}else if(renderObj.planName ==="message"){
			$('#planFeatureList_message').append(Mustache.render(featureListItem, renderObj));

		}
		else if(renderObj.planName ==="connect"){
			$('#planFeatureList_connect').append(Mustache.render(featureListItem, renderObj));
			
		}
		else{
			$('#planProperties').empty();			
			$('#planFeatureList_erp').append(Mustache.render(featureListItem, renderObj));
		}
	}	
	$('.clickListenerCls').on('click', changeSelectedCount);
	$('.addOnChangeHandler').on('change', handlerCalculatePrice);
    $('.featureChangeHandler').change(calculateFeaturesAddOnsPrice);
}

function planSelected(){
	var id = this.id;
	if ($('#'+id).hasClass('selectedBtn')){
		$('#'+id).removeClass('selectedBtn');
		$('#'+id).addClass('unSltdBtn')
		$('#'+id+"_Txt").text("Select");
	}else{
		$('.sltBtn > span').text('Select');
		$('.sltBtn').removeClass('selectedBtn');
		$('.sltBtn').addClass('unSltdBtn');
		$('#'+id).removeClass('unSltdBtn')
		$('#'+id).addClass('selectedBtn')
		$('#'+id+"_Txt").text("Selected");
	}
}

function handleAddToCart(){

}