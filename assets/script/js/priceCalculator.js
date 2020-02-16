function selectedFeatureCheck(){
	var addOnPrice = $('#messagePlanAddOnCostId').text();
}

function calculatePrice(addOnCost){
	var priceLevelId = $(".pricingTabHolder.selectedCls .priceLabelCls").attr('id');
	var price = $('#'+priceLevelId).text();
	var studentCount = $('#numberOfStudent').val();
	var addOnPrice = 0;
	/*var addOnPrice = $('#'+planObj.studCountFieldId).val();*/
	price = parseInt(price)>0 ? parseInt(price):0;
	addOnPrice = parseInt(addOnPrice)>0 ? parseInt(addOnPrice):0;
	studentCount = parseInt(studentCount)>0 ? parseInt(studentCount):0;
	var totalCost = parseInt((price+addOnPrice)*studentCount);
	if(parseInt(addOnCost) > 0){
		totalCost = totalCost + parseInt(addOnCost);
	}
	$('#priceTotal').text(totalCost);
}

function handlerCalculatePrice(){
	var addOnCost = reCalculateAddOnsPrice();
	calculatePrice(addOnCost);
}

function calculatePriceObj(){
	var id= this.id;
	var price = $('#planBasicCostId').text();
	var addOnPrice = $('#messagePlanAddOnCostId').text();
	var studentCount = $('#messageStudentCount').val();
	price = parseInt(price)>0 ? parseInt(price):0;
	addOnPrice = parseInt(addOnPrice)>0 ? parseInt(addOnPrice):0;
	studentCount = parseInt(studentCount)>0 ? parseInt(studentCount):0;
	var totalCost = parseInt((price+addOnPrice)*studentCount);
	$('#basicItemCost').text(totalCost);
}

function calculateFeaturesAddOnsPrice(){
/*	var planType = this.id.split("_")[0];
	var planObj= {};
	var planDetails = getFieldMap();
	planObj = planDetails[planType];
	var messageAddOnsCost = calculateAddOnsPrice(planObj)
	$('#'+planObj.addOnCostFieldId).text(messageAddOnsCost);
	calculatePrice(planObj);*/
}

function calculateAddOnsPrice(planObj){
	var addOnsCost = 0;
	var checkboxName = planObj.checkboxName;
	$('input.featureChangeHandler[name="'+checkboxName+'"]').each(function () {
		if(this.checked){
			var id = this.id.split('_')[1];
			var featureCost = $('#featureCostId_'+id).text();
			featureCost = parseInt(featureCost) > 0 ? parseInt(featureCost) :0;
			addOnsCost+=parseInt(featureCost);
		}
	});
	return addOnsCost;
}

function getFieldMap(){
	var planDetails = {
		'xtudyMessageFeature' : {'checkboxName' : "xtudyMessage", 'addOnCostFieldId' : "messagePlanAddOnCostId", 'studCountFieldId':"xtudyMessageStudentCount", 'planCostId':"xtudyMessageCurrentCost","totalCostFieldId":"xtudyMessageTotalItemCost" },
		'xtudyConnectFeature' : {'checkboxName' : "xtudyConnect", 'addOnCostFieldId' : "connectPlanAddOnCostId", 'studCountFieldId':"xtudyConnectStudentCount", 'planCostId':"xtudyConnectCurrentCost","totalCostFieldId":"xtudyCustomTotalItemCost" },
		'xtudyERPFeature' : {'checkboxName' : "xtudyEnterprise", 'addOnCostFieldId' : "enterpisePlanAddOnCostId", 'studCountFieldId':"xtudyErpStudentCount", 'planCostId':"xtudyErpCurrentCost","totalCostFieldId":"xtudyErpTotalItemCost" },
		'xtudyCustomizeFeature' : {'checkboxName' : "xtudyCustomizePlan", 'addOnCostFieldId' : "customizePlanAddOnCostId", 'studCountFieldId':"xtudyCustomStudentCount", 'planCostId':"xtudyCustomCurrentCost","totalCostFieldId":"xtudyCustomTotalItemCost" }
	}
	return planDetails;
}

function setInitialParameter(){
	$('#incrementStudentCount').on('click', handlerIncrementCart);			
	$('#decrementStudentCount').on('click', handlerDecrementCart);
	$("input[name='paymentType']").on('click', handlerPriceChange);
}

function handlerIncrementCart(){
	$('#numberOfStudent').val(parseInt($('#numberOfStudent').val())+1);
	handlerCalculatePrice()
}

function handlerDecrementCart(){
	if(parseInt($('#numberOfStudent').val()) > 0){
		$('#numberOfStudent').val(parseInt($('#numberOfStudent').val())-1);
		handlerCalculatePrice()
	}
}

function handlerPriceChange(){
    var radioValue = $("input[name='paymentType']:checked").val();
    if(radioValue === 'quaterly'){
		$('#rupeePerStudent_message').text('27');
		$('#rupeePerStudent_connect').text('54');
		$('#rupeePerStudent_erp').text('81');
    }else if(radioValue === 'yearly'){
		$('#rupeePerStudent_message').text('94');
		$('#rupeePerStudent_connect').text('188');
		$('#rupeePerStudent_erp').text('162');
    }else{
		$('#rupeePerStudent_message').text('10');
		$('#rupeePerStudent_connect').text('20');
		$('#rupeePerStudent_erp').text('30');
    }
    handlerCalculatePrice()
};


