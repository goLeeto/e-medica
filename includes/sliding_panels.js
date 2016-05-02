

var panelWidth = 0;
var startPanel = 1;

$(document).ready(function() {

	
	$('.sp .tabs').css('display','block');
	$('.sp .panel_container .panel').css({'position':'absolute', 'height':'400px'});
	$('.sp .panel_container .panels').css({'position':'absolute', 'top':'0px'});

	$('.sp1 .panel_container1 .panel1').css({'position':'absolute', 'height':'700px'});
	$('.sp1 .panel_container1 .panels1').css({'position':'absolute', 'top':'0px'});
	
	window.panelWidth = $('.sp').width();	
	window.panelWidth = $('.sp1').width();
	
	/* Position the panels */
	$('.panel_container .panel').each(function(index){
		$(this).css({'width':window.panelWidth+'px','left':(index*window.panelWidth)});
		$('.sp .panels').css('width',(index+1)*window.panelWidth+'px');
	});


	$('.panel_container1 .panel1').each(function(index){
		$(this).css({'width':window.panelWidth+'px','left':(index*window.panelWidth)});
		$('.sp1 .panels1').css('width',(index+1)*window.panelWidth+'px');
	});
	
	
	$('.sp .tabs li').each(function(){
		$(this).on('click', function(){
			changePanels( $(this).index() );
		});
		$(this).mouseover(function(){

			if($(this).index()==0){
			$('#sh_color').animate({"margin-left":"500px","width":"115px"},250);
			}else if($(this).index()==1){
			$('#sh_color').animate({"margin-left":"615px","width":"228px"},250);
		 }else if($(this).index()==2){
			$('#sh_color').animate({"margin-left":"843px","width":"150px"},250);
		 	} else if($(this).index()==3){
			$('#sh_color').animate({"margin-left":"993px","width":"132px"},250);
		}
		});
		$(this).mouseleave(function(){
			


		});
	});

	
	$('.sp .tabs li:nth-child('+window.startPanel+')').trigger('click');


	
});


function changePanels(newIndex){
	
	var newPanelPosition = ( window.panelWidth * newIndex ) * -1;
	var newPanelHeight = "650px";
	
	var newPanelHeight1 = "850px";
	$('.sp .tabs li').removeClass('selected');
	$('.sp .tabs li:nth-child('+(newIndex+1)+')').addClass('selected');

	$('.sp .panels').animate({left:newPanelPosition},2000);
	$('.sp .panel_container').animate({height:newPanelHeight},0);
	$('.sp1 .panels1').animate({left:newPanelPosition},2000);
	$('.sp1 .panel_container1').animate({height:newPanelHeight1},0);




}
