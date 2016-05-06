<?php 
session_start();
if(!isset($_SESSION["sess_user"])){

	header("Location: signin.php");

}else {
	require("functions.php");
	$usersData = getUserData($_SESSION["sess_user"]);
	$user_notification = getUserNotification($_SESSION["sess_user"]);
?>


<!DOCTYPE HTML>
<html>
	<head>
	<meta charset='utf-8' />
<link href='fullcalendar.css' rel='stylesheet' />
<link href='fullcalendar.print.css' rel='stylesheet' media='print' />
<script type="text/javascript" src="includes/jquery-1.7.1.min.js"></script>
<script src='lib/moment.min.js'></script>
<script src='fullcalendar.min.js'></script>
<script>
$(document).ready(function() {

	
		
  			
		$('#search_pacient').click(function(){
			closePopup();
		});

		
	 
	 $('#results').on("click","div.article",function() {
    $('.article').removeClass('current');
    $(this).children('.description').toggle();
    $(this).addClass('current');
  	});


$('#results').on("click",".shto", function(){
			var id = $(this).attr('id');
			$.post('shto.php',{shto:id},
			function(data){
				$('#results').html(data);
			
			$.post('getListePacientesh.php',{shto:id},
			function(data){
				$('#liste_pacientesh').html(data);
			});
			});
			
			$('#search_pacient').val("");
			$('#checkbox').attr('checked', false);

			

		});

$('#axhenda').on("click",function(){
	if ($('#axhenda').val().localeCompare("Shfaq te gjithe axhenden")==0) {
		$.post('getAxhende.php',{checked:1}, function(data){
			$('#getaxhenda').html(data);
			$('#axhenda').val("Shfaq axhenden per sot");
		});
	};
	if ($('#axhenda').val().localeCompare("Shfaq axhenden per sot")==0) {
		$.post('getAxhende.php',{checked:0}, function(data){
			$('#getaxhenda').html(data);
			$('#axhenda').val("Shfaq te gjithe axhenden");
		});
	};	

});

$('#results').on("click",".fshi", function(){
			
			var id = $(this).attr('id');
			$.post('shto.php',{fshi:id},
			function(data){
				$('#results').html(data);
				$.post('getListePacientesh.php',{fshi1:id},
			function(data){
				$('#liste_pacientesh').html(data);
			});
			
			$('#search_pacient').val("");
			$('#checkbox').attr('checked', false);

			

		});


			});
		

$('#results').on("click",".open_profile", function(){
			var id = $(this).attr('id');
			$.post('openProfile.php',{user_id:id},
			function(data){
				$('#liste_popup').html(data);
			});
			openPopup();
			$('#search_pacient').val("");
			$('.article').hide();
		});


	$('#liste_pacientesh').on('click','.li_pacient li', function(){
		var id = $(this).attr('id');
		

		$.post('openProfile.php',{user_id:id},
			function(data){
				$('#liste_popup').html(data);
			});
		openPopup();
		
});
			$('#submitShtoDiagnose').on('click',function(){
		var diagnosa=document.getElementById("shtodiagnoseText").value;
		var id= $('#pacient_info').attr('class');
	$.post('shtoDiagnose.php',{diagnosa:diagnosa,id:id},function(data){
		$('#liste_popup').html(data);
		closePopup1();
		$.post('openProfile.php',{user_id:id},
			function(data){
				$('#liste_popup').html(data);
			});
		openPopup1();
		$('#shtodiagnoseText').val("");
	});
	});
			setInterval(function(){
			var name = <?php echo $_SESSION['sess_user']; ?>;
	$('#liste_mes').load('getListePacienteshMesazhet.php',{user:name});},2000);
	
	$('#liste_mes').on('click', '.li_mesazhe li',function(){
		$('#chatlogs').removeClass(id);
		$(this).removeClass('palexuar');

		var id = $(this).attr('id');
		$.post('lex.php',{id:id}, function(){
			
		});
		$('#chatlogs').load('logs.php',{id:id});
		$('#chatlogs').addClass(id);
		$('#messages').show();

		$.post('logs.php',{id:id},function(){
		$.ajaxSetup({cache:false});
		setInterval(function(){
			id = $('#chatlogs').attr('class');			
			$('#chatlogs').load('logs.php',{id:id});}, 2000);
			
		});
		$('#chatlogs').stop().animate({
  scrollTop: $("#chatlogs")[0].scrollHeight
}, 500);
	});

$(document).keypress(function(e) {
    if(e.which == 13) {
        $('#chatlogs').stop().animate({
  scrollTop: $("#chatlogs")[0].scrollHeight
}, 800);
				if(form1.msg.value === '' ){
  					alert('Nuk mund te dergoni mesazh bosh');
  				return;
 				}
 			var uname ='<?php echo $_SESSION["sess_user"];?>;';
 			var msg = form1.msg.value;
 			var xmlhttp = new XMLHttpRequest();
 			var id = $('#chatlogs').attr('class');
 			xmlhttp.onreadystatechange = function(){
 			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
  			document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
 		
           }
           $('#mesagetext').val("");
 
 };
 xmlhttp.open('GET','insert.php?uname='+uname+ '&msg='+msg+ '&id='+id, true);
 xmlhttp.send();
    }
});
	$('.button').click(function(){
		$('#chatlogs').stop().animate({
  scrollTop: $("#chatlogs")[0].scrollHeight
}, 500);
				if(form1.msg.value === '' ){
  					alert('Nuk mund te dergoni mesazh bosh');
  				return;
 				}
 			var uname ='<?php echo $_SESSION["sess_user"];?>;';
 			var msg = form1.msg.value;
 			var xmlhttp = new XMLHttpRequest();
 			var id = $('#chatlogs').attr('class');
 			xmlhttp.onreadystatechange = function(){
 			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
  			document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
 		
           }
           $('#mesagetext').val("");
 
 };
 xmlhttp.open('GET','insert.php?uname='+uname+ '&msg='+msg+ '&id='+id, true);
 xmlhttp.send();
			});
	
	$('#close').on('click', function(){
		closePopup();
	});



$('#mesage_results').on("click",".mesage_pacient", function(){
			$('#chatlogs').removeClass(id);
			$(this).removeClass('palexuar');
			var id = $(this).attr('id');
			

		$.post('lex.php',{id:id}, function(){
			
		});
		$('#chatlogs').load('logs.php',{id:id});
		$('#chatlogs').addClass(id);
		$('#messages').show();
		$.post('logs.php',{id:id},function(){
		$.ajaxSetup({cache:false});
		setInterval(function(){
			id = $('#chatlogs').attr('class');			
			$('#chatlogs').load('logs.php',{id:id});}, 2000);
			
		});
		$('#chatlogs').stop().animate({
  scrollTop: $("#chatlogs")[0].scrollHeight
}, 800);


			$('#messages').show();
			$('#chatlogs').addClass(id);
			$('#search_pacient_mesage').val("");
			$('.mesage_pacient').hide();

		});
		
		
		$("#njoftime_result").on("click", ".njoftime_pacient", function(){
			var id=$(this).attr("id");

			$(".shtonjoftim").show();
			$(".shtonjoftim").attr("id",id);
			$('#search_pacient_njoftime').val("");
			$('.njoftime_pacient').hide();

		});

		$("#shtonjoftimbutton").click(function(){
			var id=$(".shtonjoftim").attr("id");
			var titullinjoftimit=$("#titullinjoftimit").val();
			var permbajtjanjoftimit = $('#permbajtjanjoftimit').val();
			var data = $('#datanjoftimit').val();
			var time= $('#oranjoftimit').val();
			
			$.post('shtonjoftim.php',{id:id, titullinjoftimit:titullinjoftimit,permbajtjanjoftimit:permbajtjanjoftimit,data:data,time:time},function(data){

			});
			$('#feedback_njoftim').html("Njoftimi u shtua me sukses");
			setTimeout(function(){
				$('#feedback_njoftim').html("");
			},2000);
			$("#titullinjoftimit").val("");
			$('#permbajtjanjoftimit').val("");
			$('#datanjoftimit').val("");
			$('.shtonjoftim').hide();

		});






















	});

function openPopup(){
	$("#liste_popup").fadeIn();
	$("#close_button").fadeIn();
	$("#shtodiagnoseTextArea").fadeIn();
	updatePopup();
}

function closePopup(){
	$("#liste_popup").fadeOut();
	$("#close_button").fadeOut();
	$("#shtodiagnoseTextArea").fadeOut();
}

function openPopup1(){
	$("#liste_popup").show();
	$("#close_button").show();
	$("#shtodiagnoseTextArea").show();
	updatePopup();
}

function closePopup1(){
	$("#liste_popup").hide();
	$("#close_button").hide();
	$("#shtodiagnoseTextArea").hide();
}
function updatePopup(){
	$popupContent = $("#liste_popup");
	var top = "10px"; 
	
	var left = "50px";
	$popupContent.css({
		'top' : top,
		'left' : left
	});
}

</script>
<script>

function getStates(value){
		var cid= "checkbox";
		var checked = $("input[@id="+ cid+"]:checked").length;
			
        $.post("getStates.php",{partialState:value,checked:checked},function(data){
            $("#results").html(data);
        });
    }

function getStatesMes(value){
        $.post("getStatesMes.php",{partialState:value},function(data){
            $("#mesage_results").html(data);
        });
   } 
function getStatesNjoftime(value){
        $.post("getStatesNjoftime.php",{partialState:value},function(data){
            $("#njoftime_result").html(data);
        });
   } 

</script>
		<title>Sliding Tabbed Panels</title>
		<link type="text/css" rel="stylesheet" href="includes/sliding_panels.css" />
		<script type="text/javascript" src="includes/sliding_panels.js"></script>

	</head>
	<body>

	<div id="body_div">


<div id="sound"></div>


<div class="sp1">

			<div class="panel_container1">
				<div class="panels1">
					<div class="panel1">
						<div class="panel_content1">
							<!--profili-->
							<div id="prof">
								<div id="header_image"></div>
							</div>
							
							
						</div>
					</div>
					<!--djagnostifikime-->
					<div class="panel1">
						<div class="panel_content1">
							<div id="djag">
								<div id="header_image"></div>
							</div>
							
						</div>
					</div>
					<!--mesazhet-->
					<div class="panel1">
						<div class="panel_content1">
							
							<div id="msg1">
								<div id="header_image"></div>
							</div>
						</div>
					</div>
					<!--njoftime-->
					<div class="panel1">
						<div class="panel_content1">
							<div id="njof">
								<div id="header_image"></div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>



<a href="../logout.php"><button style="cursor:pointer" class="logout_button">Log Out</button></a>










<div id="logo"></div>
		
		<!-- Begin - Sliding Tabbed Panels -->
		<div class="sp">

			<div class="tabs">



<ul>
  <li>Profili</li>
  <li>Pacient</li>
  <li>Mesazhe</li>
  <li>Njoftime</li>
</ul>






				
			</div>
			<div id="shiriti">
			
			</div>
			<div id="sh_color"></div>
			




			<div class="panel_container">
				<div class="panels">
					<div class="panel">
						<div class="panel_content">
							<!--profili-->
							<div id="personale">
								<div id="title_personale"><div id="personale_titulli">Te dhenat Personale</div></div>
								<table id = "personal_table">
								  <tr>
								    <td>Emri</td>
								    <td><?php echo $usersData['emri'] ?></td>		
								  </tr>
								  <tr>
								    <td>Mbiemri</td>
								    <td><?php echo $usersData['mbiemri'] ?></td>		
								  </tr>
								  <tr>
								    <td>Ditelindja</td>
								    <td><?php echo $usersData['ditelindja'] ?></td>		
								  </tr>
								  <tr>
								    <td>Gjinia</td>
								    <td><?php echo $usersData['gjinia'] ?></td>		
								  </tr>
								  <tr>
								    <td>Adresa</td>
								    <td><?php echo $usersData['adresa'] ?></td>		
								  </tr>
								 <tr>
								 	<td>
								 		Nr Licenses
								 	</td>
								 	<td>
								 		<?php echo $usersData['username']; ?>
								 	</td>
								 </tr>
								</table>
							</div>
							<div id="mjekesore"> 
							<div id="title_axhenda">
							<div id="axhenda_titulli">Axhenda</div>
							</div>
								<div class="axhenda_buton"><input type="button" id="axhenda" value="Shfaq te gjithe axhenden"></div>
								<div id="getaxhenda">
									<?php include 'getAxhende.php'; ?>
								</div>
								<div id="axhenda_ditore">	
								</div>
							</div>
							
						</div>
					</div>
					<!--pacient-->
					<div class="panel">
						<div class="panel_content">
						<div id= "axhendadiv" class="checkbox">Kerko ne te gjithe listen<input type="checkbox" id="checkbox"></div>	
						<div id="liste_pacientesh" >
						<?php include 'getListePacientesh.php'; ?>
						</div>
						
							<div id="liste_popup">
								
							</div>
							<div id='close_button'><button id='close'>Close</button></div>
							<input type="text" id="search_pacient" placeholder="Search..." onkeyup="getStates(this.value)">
							<div id= "pacient_list">
							<div id="results"></div>
							</div>
							<div id="shtodiagnoseTextArea">
								<p>Shto Diagnose</p>
								<input type="text" id="shtodiagnoseText" />
								<button id="submitShtoDiagnose">Shto</button>
							</div>
							
						</div>
					</div>
					<!--mesazhet-->
					<div class="panel">
						<div class="panel_content">
						<div id="bmesazhet">
						<div id="liste_mes">
							
										<?php include 'getListePacienteshMesazhet.php'; ?>
								
						</div>
						<input type="text" id="search_pacient_mesage" placeholder="Search..." onkeyup="getStatesMes(this.value)">
							<div id="mesage_results">
								
							</div>
							
							<div id="messages">
							
							<div id="chatlogs"> 

									Duke ngarkuar biseden...
									</div>
								<form name = "form1">
									Your Message: <br />
									<textarea id="mesagetext" name= "msg" rows="2" cols="40"></textarea><br />
									<a href= "#" class= "button">Send</a><br /><br />
								</form>
									
								</div>
							
						</div>
					</div>
					</div>
					<!--njoftime-->
					<div class="panel">
						<div class="panel_content">
							<div id="notifications">
							<div id="njoftime_foto"><div id="njoftime_text">Shto njoftime</div></div>
								<div id="user_notification">
									<input type="text" id="search_pacient_njoftime" placeholder="Search..." onkeyup="getStatesNjoftime(this.value)">
									<div id="njoftime_result"> </div>
									<div class="shtonjoftim">
								<form>
									<table border="1" style="background-color:#fff;">
										<tr><td>Titulli: </td><td><input type="text" placeholder="Titulli..." id="titullinjoftimit" /></td></tr>
										<tr><td>Permbajtja: </td><td><textarea placeholder="Pershkrimi..." id="permbajtjanjoftimit" rows="3" cols="40"></textarea> </td></tr>
										<tr><td>Data:</td><td> <input type="date" id="datanjoftimit" /></td></tr>
										<tr><td> Ora:</td><td> <input type="time" id="oranjoftimit" /> </td></tr>
										<tr><td></td><td><input type="button" value="shto" id="shtonjoftimbutton"/></td></tr>
									</table>
								</form>
							</div>
								</div>
							</div>

								<div id="feedback_njoftim">
							
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- End - Sliding Tabbed Panels -->
		

</div>
	</body>
</html>
<?php
}
?>