function changeSelectedCount(){
	var id = this.id.split('_');
	if(id.length >0){		
			if(id[0] === "addOnFeaturePlus"){
				$('#addOnFeatureCount_'+id[1]).val(parseInt($('#addOnFeatureCount_'+id[1]).val())+1);
				handlerCalculatePrice();
			}else{
				if(parseInt($('#addOnFeatureCount_'+id[1]).val()) > 0){					
					$('#addOnFeatureCount_'+id[1]).val(parseInt($('#addOnFeatureCount_'+id[1]).val())-1);
					handlerCalculatePrice();
				}
			}
	} 
}

function reCalculateAddOnsPrice(){
	var addOnsCost = 0;
	$(".addOnChangeHandler").each(function() {
	    var inputId = this.id.split('_');
	    var itemCount = parseInt($(this).val());
	    var itemPrice = parseInt($('#addOnFeatureCost_'+inputId[1]).text());
	    if(parseInt(itemPrice) > 0  && parseInt(itemCount) > 0){
	    	var finalcost = parseInt(itemCount) * parseInt(itemPrice);
	    	addOnsCost += parseInt(finalcost);
	    }
	});
	return addOnsCost;
}