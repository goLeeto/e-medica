$(document).ready(function(){
	$("#edison").click(function(e) {
		openPopup();
	});
	$("#sign_up").click(function(e) {
		closePopup();
		openPopup1();
	});
	$("#sign_in").click(function(e) {
		closePopup1();
		openPopup();
	});


	$("#overlay-bg").click(function(e) {
		closePopup();
		closePopup1();
		$("#overlay-bg").fadeOut('slow');
	});
	$(window).resize(function(){
		updatePopup();
			});

	$(window).resize(function(){
		updatePopup1();
			});


});
function openPopup(){
	$("#wrapper").fadeIn();
	$("#overlay-bg").fadeIn('fast');
	updatePopup();
}
function closePopup(){
	$("#sign_up").prop("disabled", false);
	$("#wrapper").fadeOut();

}
function updatePopup(){
	$popupContent = $("#wrapper");
	var top = "50px"; 
	
	var left = ($(window).width() - $popupContent.outerWidth()) / 2; 
	$popupContent.css({
		'top' : top,
		'left' : left
	});
}

function openPopup1(){
	updatePopup1();
	$("#wrapper1").fadeIn();
	$("#overlay-bg").fadeIn();
	updatePopup1();
}
function closePopup1(){
	$("#sign_in").prop("disabled", false);
	$("#wrapper1").fadeOut();

}
function updatePopup1(){
	$popupContent = $("#wrapper1");
	var top = "20px"; 
	
	var left = (($(window).width() - $popupContent.outerWidth())) / 2; 
	$popupContent.css({
		'top' : top,
		'left' : left
	});
}

