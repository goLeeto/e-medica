<?php 
session_start();
if(!isset($_SESSION["sess_user"])){

	header("Location: index.php");

}else {
	require("functions.php");
	
	$usersData = getUserData($_SESSION["sess_user"]);
	$user_notification = getUserNotification($_SESSION["sess_user"]);
?>


<!DOCTYPE HTML>
<html>
	<head>
	<meta charset='utf-8' />
<script type="text/javascript" src="includes/jquery-1.7.1.min.js"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyAZGrqpxtNLhMqcP8e0FmbHaWDJAUfsQvo&callback=initialize"></script>
<script>
function submitChat(){
 if(form1.msg.value == '' ){
  alert('ALL FIELDS ARE MANDATORY!!!!');
  return;
 }
 var uname ='<?php echo $_SESSION["sess_user"];?>;';
 var msg = form1.msg.value;
 var xmlhttp = new XMLHttpRequest();
 
 xmlhttp.onreadystatechange = function(){
 if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
  document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
 
           }
 
 }
 xmlhttp.open('GET','insert.php?uname='+uname+ '&msg='+msg, true);
 xmlhttp.send();
 
 
}
$(document).ready(function(e){
 $.ajaxSetup({cache:false});
 setInterval(function(){$('#chatlogs').load('logs.php');}, 2000);
 setInterval(function(){$('#user_notification').load('njoftime.php');},4000);
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
});
</script>
		<title>Sliding Tabbed Panels</title>
		<link type="text/css" rel="stylesheet" href="includes/sliding_panels.css" />
		<script type="text/javascript" src="includes/sliding_panels.js"></script>

		

	</head>
	<body>

	<div id="body_div">










<div class="sp1">

			<div class="panel_container1">
				<div class="panels1">
					<div class="panel1">
						<div class="panel_content1">
							<!--profili-->
							<div id="prof" >
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



<a href="logout.php"><button style="cursor:pointer" class="logout_button">Log Out</button></a>



<div id="logo"></div>





		
		<!-- Begin - Sliding Tabbed Panels -->
		<div class="sp">

			<div class="tabs">



<ul>
  <li>Profili</li>
  <li>Diagnostifikime</li>
  <li>Mesazhe</li>
  <li>Njoftime</li>
</ul>






				
			</div>
			<div id="shiriti"></div>
			<div id="sh_color"></div>
			




			<div class="panel_container">
				<div class="panels">
					<div class="panel">
						<div class="panel_content">
							<!--profili-->
							<div id="background1"></div>
							<div id="personale">
								<div id="title_personale"><div id="titulli_personale">Te dhenat Personale</div></div>
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
								    <td>Grupi i Gjakut</td>
								    <td><?php echo $usersData['grupi_gjakut'] ?></td>		
								  </tr>
								  <tr>
								    <td>Adresa</td>
								    <td><?php echo $usersData['adresa'] ?></td>		
								  </tr>
								  <tr>
								    <td>Doktori i familjes</td>
								    <td><?php echo $usersData['doktori_familjes'] ?></td>		
								  </tr>
								</table>
							</div>
							<div id="mjekesore">
								<div id="title_mjekesore"><div id="titulli_mjekesore">Te dhenat Mjekesore</div></div>
								<?php include 'te_dhenat_mjeksore.php'; ?>
							</div>
							
						</div>
					</div>
					<!--djagnostifikime-->
					<div class="panel">
					<div id="background2"></div>
						<div class="panel_content">
						<div id="diag">
							<table id="djag_tabel" border="1" align="center" style="width:80%; ">
								<tr >
									<td style="width 50%;">
										<table align="center">
											<tr>
												<td colspan="2" align="center">
												<script type="text/javascript">
												function tensioni()
												{
												var shsistolike = parseInt(document.getElementById("shsistolike").value);
												var shdiastolike = parseInt(document.getElementById("shdiastolike").value);
												if (shsistolike<=50 && shdiastolike<= 33)
												document.getElementById("rezultat_hipertension").innerHTML="Vlera shume te uleta te tensionit. Grada III. Ju keni nevoje urgjente per kontroll mjeksore";
												else if (shsistolike<=60 && shdiastolike<= 40)
												document.getElementById("rezultat_hipertension").innerHTML="Vlera shume te uleta te tensionit. Grada II. Ju keni nevoje per kontroll mjeksore. Kontaktoni mjekun sa me shpejt te jete e mundur";
												else if (shsistolike<=90 && shdiastolike<= 60)
												document.getElementById("rezultat_hipertension").innerHTML="Vlera te uleta te tensionit. Grada I. Ju keni nevoje per kontroll mjeksore";
												else if (shsistolike<=120 && shdiastolike<= 80)
												document.getElementById("rezultat_hipertension").innerHTML="Vlera e tensionit tuaj eshte ne nivel optimal";
												else if (shsistolike<=139 && shdiastolike<= 89)
												document.getElementById("rezultat_hipertension").innerHTML="Prehipertension. Konsultohuni me mjekun tuaj nqs tensioni rritet";
												else if (shsistolike<=159 && shdiastolike<= 99)
												document.getElementById("rezultat_hipertension").innerHTML="Hipertension Grada I. Ju duhet te vizitoheni patjeter te mjeku juaj";
												else if (shsistolike>= 160 && shdiastolike>= 100)
												document.getElementById("rezultat_hipertension").innerHTML="Hipertension Grada II. Ju keni nevoje per kontroll mjeksore urgjent";
												}

												</script>
													Hipertension
												</td>
											</tr>
											<tr>
												<td>
													Vlera e larte:
												</td>
												<td>
													<input type="text" id="shsistolike">
												</td>
											</tr>
											<tr>
												<td>
													Vlera e ulet:
												</td>
												<td>
													<input type="text" id="shdiastolike">
												</td>
											</tr>
											<tr>
												<td colspan="2">
													<label id="rezultat_hipertension"> Rez:  </label>
												</td>
											</tr>
											<tr>
												<td colspan="2" align="center">
													<button type="button" id="llogarit_hipertension" onclick="tensioni()"> Llogarit Hipertension</button>
												</td>
											</tr>
										</table>
										
							
									</td>
									<td style="width:50%">
										<table align="center">
											<tr>
												<td colspan="2" align="center">
													BMI
													<script type="text/javascript">
												function bmi() {
												var gjatesia =parseFloat(document.getElementById("gjatesia").value);
												var pesha = parseFloat(document.getElementById("pesha").value);
												var bmi1 = pesha/(gjatesia*gjatesia);
												var bmi = parseInt(bmi1);
												if (parseInt(document.getElementById("mosha").value)<24)
												{if(bmi<19)
												document.getElementById("rezultat_bmi").innerHTML="Ju jeni nen peshe. BMI juaj duhet te jete19-24. BMI juaj eshte: "+ bmi;
												else if (bmi>24)
												document.getElementById("rezultat_bmi").innerHTML="Ju jeni mbi peshe. BMI juaj duhet te jete19-24. BMI juaj eshte: "+ bmi;
												else
												document.getElementById("rezultat_bmi").innerHTML="Ju jeni brenda normave ideale te peshes. BMI juaj eshte: "+ bmi;
												}
												if (parseInt(document.getElementById("mosha").value)>25 && parseInt(document.getElementById("mosha").value)<34 )
												{if(bmi<20)
												document.getElementById("rezultat_bmi").innerHTML="Ju jeni nen peshe. BMI juaj duhet te jete20-25. BMI juaj eshte: "+ bmi;
												else if (bmi>25)
												document.getElementById("rezultat_bmi").innerHTML="Ju jeni mbi peshe. BMI juaj duhet te jete 20-25. BMI juaj eshte: "+ bmi;
												else
												document.getElementById("rezultat_bmi").innerHTML="Ju jeni brenda normave ideale te peshes. BMI juaj eshte: "+ bmi;
												}
												if (parseInt(document.getElementById("mosha").value)<35 && parseInt(document.getElementById("mosha").value)>44)
												{if(bmi<21)
												document.getElementById("rezultat_bmi").innerHTML="Ju jeni nen peshe. BMI juaj duhet te jete 21-26. BMI juaj eshte: "+ bmi;
												else if (bmi>26)
												document.getElementById("rezultat_bmi").innerHTML="Ju jeni mbi peshe. BMI juaj duhet te jete 21-26. BMI juaj eshte: "+ bmi;
												else
												document.getElementById("rezultat_bmi").innerHTML="Ju jeni brenda normave ideale te peshes. BMI juaj eshte: "+ bmi;
												}
												if (parseInt(document.getElementById("mosha").value)>45 && parseInt(document.getElementById("mosha").value)<54)
												{if(bmi<22)
												document.getElementById("rezultat_bmi").innerHTML="Ju jeni nen peshe. BMI juaj duhet te jete 22-27. BMI juaj eshte: "+ bmi;
												else if (bmi>27)
												document.getElementById("rezultat_bmi").innerHTML="Ju jeni mbi peshe. BMI juaj duhet te jete 22-27. BMI juaj eshte: "+ bmi;
												else
												document.getElementById("rezultat_bmi").innerHTML="Ju jeni brenda normave ideale te peshes. BMI juaj eshte: "+ bmi;
												}
												if (parseInt(document.getElementById("mosha").value)>55 && parseInt(document.getElementById("mosha").value)<64)
												{if(bmi<23)
												document.getElementById("rezultat_bmi").innerHTML="Ju jeni nen peshe. BMI juaj duhet te jete 23-28. BMI juaj eshte: "+ bmi;
												else if (bmi>28)
												document.getElementById("rezultat_bmi").innerHTML="Ju jeni mbi peshe. BMI juaj duhet te jete 23-28. BMI juaj eshte: "+ bmi;
												else
												document.getElementById("rezultat_bmi").innerHTML="Ju jeni brenda normave ideale te peshes. BMI juaj eshte: "+ bmi;
												}
												if (parseInt(document.getElementById("mosha").value)>65)
												{if(bmi<24)
												document.getElementById("rezultat_bmi").innerHTML="Ju jeni nen peshe. BMI juaj duhet te jete 24-29. BMI juaj eshte: "+ bmi;
												else if (bmi>29)
												document.getElementById("rezultat_bmi").innerHTML="Ju jeni mbi peshe. BMI juaj duhet te jete 24-29. BMI juaj eshte: "+ bmi;
												else
												document.getElementById("rezultat_bmi").innerHTML="Ju jeni brenda normave ideale te peshes. BMI juaj eshte: "+ bmi;
												}
												
												}
													</script>
												</td>
											</tr>
											<tr>
												<td>
													Pesha (KG):
												</td>
												<td>
													<input type="text" id="pesha">
												</td>
											</tr>
											<tr>
												<td>
													Gjatesia (M):
												</td>
												<td>
													<input type="text" id="gjatesia">
												</td>
											</tr>
											<tr>
											<td>Mosha:</td>
												<td>
													<input type="text" id="mosha">
												</td>
											</tr>
											<tr>
												<td colspan="2">
													<label id="rezultat_bmi"> </label>
												</td>
											</tr>
											<tr>
												<td colspan="2" align="center">
													<button type="button" value="Llogarit BMI" id="llogarit_bmi" onclick="bmi()"> Llogarit BMI</button>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							</div>
						</div>
					</div>
					<!--mesazhet-->

					<div class="panel">
					<div id="background3"></div>
						<div class="panel_content">

						<div id="mesazhe_foto"><div id="mesazhe_titulli">Mesazhet</div></div>
						<div id="messages">
							
							<div id="chatlogs"> 

									Duke ngarkuar biseden...
									</div>
								<form name = "form1">
									Your Message: <br />
									<textarea id="mesagetext" name= "msg" rows="2" cols="40"></textarea><br />
									<a href= "#"  onclick= "submitChat()" class= "button">Send</a><br /><br />
								</form>
									
								</div>





					
							
						</div>
					</div>
					<!--njoftime-->
					<div class="panel">
						<div class="panel_content">
							<div id="notifications">
							<div id="njoftime_foto"><div id="njoftime_titulli">Njoftimet</div></div>
								<div id="user_notification" style="width: 30%;display: inline-block;float: left;">
									<div><?php include 'njoftime.php'; ?></div>
								</div>
						
								<div id="map-container" style="position:relative; float:right;min-width: 500px; max-width :500px; min-height: 500px; max-height: 500px;display: inline-block;">
									<div id="map"style="min-width: 400px; max-width :400px; min-height: 400px; max-height: 400px;"></div>
    								<p><b>Address</b>: <span id="address"></span></p>
    								<p id="error"></p>
    								<script>
      function writeAddressName(latLng) {
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({
          "location": latLng
        },
        function(results, status) {
          if (status == google.maps.GeocoderStatus.OK)
            document.getElementById("address").innerHTML = results[0].formatted_address;
          else
            document.getElementById("error").innerHTML += "Nuk arritem te gjejme vendodhjen tuaj!" + "<br />";
        });
      }

      function geolocationSuccess(position) {
        var userLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        
        writeAddressName(userLatLng);

        var myOptions = {
          zoom : 16,
          center : userLatLng,
          mapTypeId : google.maps.MapTypeId.ROADMAP
        };
        
        var mapObject = new google.maps.Map(document.getElementById("map"), myOptions);
        
        new google.maps.Marker({
          map: mapObject,
          position: userLatLng
        });
        
      }

      function geolocationError(positionError) {
        document.getElementById("error").innerHTML += "Error: " + positionError.message + "<br />";
      }

      function geolocateUser() {
        
        if (navigator.geolocation)
        {
          var positionOptions = {
            enableHighAccuracy: true,
            timeout: 10 * 1000 // 10 seconds
          };
          navigator.geolocation.getCurrentPosition(geolocationSuccess, geolocationError, positionOptions);
        }
        else
          document.getElementById("error").innerHTML += "Your browser doesn't support the Geolocation API";
      }

      window.onload = geolocateUser;
    </script>
								</div>

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