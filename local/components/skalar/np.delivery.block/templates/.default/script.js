(function($) {
	$(function() {
		$('#loc_var').styler({
			selectSearch: true
		});
	});
})(jQuery);
$(document).ready(function(){
	$("#loc_var-styler").hide();
	var userCity = "",
		userLocID = $("input[name=loc_id]").val(),
		userNPWareHouse = "не указано"
	;
	$('body')
		.on("change", "#loc_var", chooseCityFromList)
		.on("keyup", "#city_select", getCity)
		.on("click",".jq-selectbox__dropdown ul li", chooseNasPunkt) // выбор населенного пункта из списка
		.on('click' , '.city-box ul li a, .city-box ul li span.city-element, #delivery-cities span a, #delivery-cities span span', chooseCityInPopup)

	;
});
function chooseCityFromList(){
	var opt = $("#loc_var option:selected").val();
	var pos = opt.indexOf(" ");
	var location = opt.substr(0,pos);
	userLocID = $(this).attr("data-locid");
	$("#city_select").val(location);
	$(this).slideUp("slow");
	$("#loc_var-styler").slideUp("slow");
}
function limitHeightDropList(){
	$("#npost_wares div.jq-selectbox__dropdown ul").css("height","200px");
	$("#npost_wares div.jq-selectbox__dropdown ul").css("overflow-y","scroll");
}
function chooseCityInPopup(){
	var $this = $(this),
		city = $this.text();
	$('#city_select').val(city);
	$('.city-click').text(city);
	console.log(222);
	console.log(city);
	console.log($('.city-click').text());
	getNewPost();
	if($('.city-click').text() == 'ХарьковХарьков'){
		$('.pickup').show();
	} else {
		$('.pickup').hide();
	}
	return false;
}
function chooseNasPunkt(){
	if(typeof $(this).parents("#loc_var-styler").attr("id") != "undefined"){
		var opt = $(this).text();
		var pos = opt.indexOf(" ");
		var location = opt.substr(0,pos);
		userLocID = $(this).attr("data-locid");
		$("#city_select").val(location);
		$('.city-click').text(location);
		if($('.city-click').text() == 'ХарьковХарьков'){
			$('.pickup').show();
		} else {
			$('.pickup').hide();
		}
		console.log(111);
		getNewPost();
	}
}
function getCity(){
	var txt = $(this).val();
	if(txt.length>=2){
		$.ajax({
			url: "/local/ajax/getCity.php",
			type: "POST",
			data:{
				select: {
					1 : "CODE",
					2 : "TYPE_ID",
					VALUE : "ID",
					DISPLAY : "NAME.NAME"
				},
				additionals:{
					1 : "PATH"
				},
				filter:{
					'=PHRASE' : txt,
					'=NAME.LANGUAGE_ID' : "ru"
				},
				version: "2",
				PAGE_SIZE : "",
				PAGE : ""
			},
			dataType: "json",
			success: function (response) {
				$("#loc_var").empty();
				var opts = "";
				for(var i=0; i<response.data.ITEMS.length; i++){
					opts = opts+"<option data-locid='"+response.data.ITEMS[i].VALUE+"'>"+
					response.data.ITEMS[i].DISPLAY+" "+
					//response.data.ETC.PATH_ITEMS[response.data.ITEMS[i].PATH[0]].DISPLAY+" "+
					//response.data.ETC.PATH_ITEMS[response.data.ITEMS[i].PATH[1]].DISPLAY+
					"</option>";
				}
				$("#loc_var").append(opts);
				$("#loc_var").trigger("refresh");
				$("#loc_var-styler").show();
				$("#loc_var-styler div.jq-selectbox__dropdown ul").css("height","200px");
				$("#loc_var-styler div.jq-selectbox__dropdown ul").css("overflow-y","scroll");
				$("#loc_var-styler div.jq-selectbox__select").hide();
				$("#loc_var-styler div.jq-selectbox__dropdown").show();
			}
		});
	}
	else {
		$("#loc_var-styler").hide();
	}
}
function chooseCityFromList(){
	var opt = $("#loc_var option:selected").val();
	var pos = opt.indexOf(" ");
	var location = opt.substr(0,pos);
	userLocID = $(this).attr("data-locid");
	$("#city_select").val(location);
	$(this).slideUp("slow");
	$("#loc_var-styler").slideUp("slow");
}
function getNewPost(){
	var city = $(".city-click").first().text();
	var productId = $("body").find(".colm.delivery").data('product-id');
	console.log(333);
	$.ajax({
		url: "/local/ajax/np_data.php",
		type: "POST",
		data:{
			NP_AJAX: 'Y',
			CITY: city,
			ELEMENT_ID: productId
		},
		//dataType: "json",
		success: function (response) {
			console.log("script dd");
			$('.colm.delivery').replaceWith(response);
		}
	});
}
function capitalizeFirstLetter(string) {
	return string.charAt(0).toUpperCase() + string.slice(1);
}