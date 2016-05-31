var interval ;
var Width=50;
function showEyeTest(){
	$('#testo-shikimin-span').on("click",function(){
		var text = '<div id="einsteinMonroBackground"></div><div id="einsteinMonro" style=""><div style="width:80vw;height:70vh;"><img width="50" id="einsteinMonroImage" src="einsteinMonro.jpg"style="display:block;"></img></div><div id="einsteinMonroButtons"><span id="einsteinMonroStart">Start</span><span id="einsteinMonroStop" style="display:none"> Stop </span></div><div id="einsteinMonroResultSpan"><span id="einsteinMonroResult">Shtypni butonin Stop kur ne ekran te shfaqet Albert Einstein.</span></div></div>';
		$('body').append(text);
		document.getElementById("einsteinMonroBackground").addEventListener('click',function(){
		$('#einsteinMonroBackground').remove();
		$('#einsteinMonro').remove();
		clearInterval(interval);
		Width=50;
});
$('#einsteinMonroStart').click(function(){
	clearInterval(interval);
	einsteinMonro();
	$('#einsteinMonroStart').hide();
	$('#einsteinMonroStop').show();
});
$('#einsteinMonroStop').click(function(){
	$('#einsteinMonroStop').hide();
	$('#einsteinMonroStart').show();
	if (Width<80) {
		$('#einsteinMonroResult').html('Ju keni probleme me shikimin. Konsultohuni sa me pare me mjekun tuaj');
	}
	else if (Width>150) {
		$('#einsteinMonroResult').html('Ju keni probleme me shikimin. Konsultohuni sa me pare me mjekun tuaj');
	}
	else{
		$('#einsteinMonroResult').html('Ju nuk keni probleme me shikimin.');
	}
	clearInterval(interval);
	Width=50;
});
});
}
function einsteinMonro (){

		interval = setInterval(function(){
			$('#einsteinMonroImage').attr("width",Width);
			Width+=1;
		if (Width>300) {
			clearInterval(interval);
			Width=50;		
		}
		},50);
}
$(document).ready(function(){
	showEyeTest();
});