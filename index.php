<?php 
        include'connect.inc.php';

        if(isset($_POST["sign_in"])){
            $user = mysqli_real_escape_string($conn,$_POST['username1']);
            $pass = md5($_POST['password1']);
            $query = mysqli_query($conn,"SELECT * FROM users WHERE username='".$user."' AND password='".$pass."'");

            $numrows=mysqli_num_rows($query);
            if($numrows!=0){
                while($row=mysqli_fetch_assoc($query)){
                    $dbusername=$row['username'];
                    $dbpass=$row['Password'];
                    $doktor=$row['doktori_familjes'];
                    $kategoria= $row['kategoria'];
                }

                if($user == $dbusername && $pass==$dbpass){
                    session_start();
                    $_SESSION['sess_user']=$user;
                  

                    if($kategoria=="pacient"){
                          $_SESSION['doktori']=$doktor;
                    	header("Location: home.php");
                	}else if($kategoria=="doktor"){
                		header("Location: doktor/home.php");
                	}else if($kategoria=="admin"){
                		header("Location: admin/home.php");
                	}
                }
            }else {
            
                
                
            }
        } else if(isset($_POST["sign_up"])){
            $user = $_POST['username'];
            $pass = md5($_POST['password_reg']);
            $emri = $_POST['first_name'];
            $mbiemri = $_POST['last_name'];
            $gjinia = $_POST['gjinia'];
            $adresa = $_POST['adresa'];
            $query = mysqli_query($conn,"SELECT * FROM users WHERE username='".$user."'");

            $numrows=mysqli_num_rows($query);
            if($numrows==0){
                
                $kategoria;
                if (strlen($user)==10)
                {
                    $kategoria="pacient";

                }else if(strlen($user)==15){
                    $kategoria = "doktor";
                }else if(strlen($user)==5){
                    $kategoria = "admin";
                }

                    $sql="INSERT INTO users(username,Emri,Mbiemri,password,adresa,gjinia,kategoria) VALUES ('$user','$emri', '$mbiemri', '$pass' , '$adresa' , '$gjinia' , '$kategoria')";
                
                $result=mysqli_query($conn,$sql);

                if($result){
                    session_start();
                    $_SESSION['sess_user']=$user;
                    if($kategoria=="doktor"){
                    header("Location: doktor/home.php");
                    }else if($kategoria=="pacient"){
                        $_SESSION['doktori']=$doktor;
                    	header("Location:home.php");
                    }else if($kategoria=="admin"){
                    	header("Location:admin/home.php");
                    }

                } else {
                    echo "error";
                 }
             
            }
        }
    ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="popup.css">

<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">

    function getStates(value){
        $.post("getStates.php",{partialState:value},function(data){
            $("#results").html(data);
        });
    }
     function slide(){
         var currentSlide = $('.active-slide');
                var nextSlide = currentSlide.next();

                

                if(nextSlide.length === 0) {
                  nextSlide = $('.slide').first();
                  
                }
                
                currentSlide.fadeOut(600).removeClass('active-slide');
                nextSlide.fadeIn(600).addClass('active-slide');
                setTimeout(function(){
                    slide();
                },4000);
    }
</script>
    <script type="text/javascript">
 $(document).ready(function(){

$("#submit_sign_up").attr('disabled', 'disabled');
$("#submit_sign_up").css("cursor","default");


  $('#results').on("click","div.article",function() {
    $('.article').removeClass('current');
    $(this).children('.description').toggle();
    $(this).addClass('current');
  });

  $('#password1').on("focus",function(){
     $('#password1').keyup(function(){
        var pass = form1.password1.value;
        
                   $.post('password.php',{ username: form1.username1.value, pass:pass},
            function(result){

                if(result==0){
                 $("#sign_in_submit").attr('disabled', 'disabled');
                $("#sign_in_submit").css("cursor","default");
                $('#pass_feedback').html('Password i gabuar!').show();
                $("#password1").css("outline-color", "red");
                    $("#password1").css("border-color", "red");
                
            }


            else{
               $('#pass_feedback').hide();
               $("#sign_in_submit").removeAttr('disabled', 'disabled');
                $("#sign_in_submit").css("cursor","pointer");
                $("#password1").css("outline-color", "green");
                    $("#password1").css("border-color", "green");
            }


            });
});
  });
             $('#username_input').bind("keyup focusout", function (){
            
            $.post('username.php',{ username: form.username.value},
            function(result){
            
                if(result==1){
                    $("#username_input").css("outline-color", "red");
                    $("#username_input").css("border-color", "red");
                $('#feedback').html('Kjo llogari ekziston').show();
                $("#submit_sign_up").attr('disabled', 'disabled');
                $("#submit_sign_up").css("cursor","default");
            }


            else{

                if( $('#username_input').val().length !=5 && $('#username_input').val().length !=10  && $('#username_input').val().length !=15){
                    $("#username_input").css("outline-color", "red");
                    $("#username_input").css("border-color", "red");
                    $('#feedback').html('ID jo e plote').show();
                    $("#submit_sign_up").attr('disabled', 'disabled');
                    $("#submit_sign_up").css("cursor","default");
                }else {

                $('#feedback').html('').show();
                $("#username_input").css("outline-color", "green");
                $("#username_input").css("border-color", "green");
                $("#submit_sign_up").removeAttr('disabled', 'disabled');
                $("#submit_sign_up").css("cursor","pointer");
            }
            }


            });
        
        });










     $('#username1').bind("keyup focusout", function (){
            
            $.post('username.php',{ username: form1.username1.value},
            function(result){
            
                if(result==0){
                    $("#username1").css("outline-color", "red");
                    $("#username1").css("border-color", "red");
                $('#feedback1').html('Kjo llogari nuk ekziston').show();
                $("#sign_in_submit").attr('disabled', 'disabled');
                $("#sign_in_submit").css("cursor","default");
            }


            else{
                if( $('#username1').val().length<1){
                    $("#username1").css("outline-color", "red");
                    $("#username1").css("border-color", "red");
                    $('#feedback1').html('ID jo e plote').show();
                    $("#sign_in_submit").attr('disabled', 'disabled');
                    $("#sign_in_submit").css("cursor","default");
                }else{
                $('#feedback1').html('').show();
                $("#username1").css("outline-color", "green");
                $("#username1").css("border-color", "green");
                $("#sign_in_submit").removeAttr('disabled', 'disabled');
                $("#sign_in_submit").css("cursor","pointer");
            }
            }


            });
        
        });

            $('#regfname').bind("keyup focusout", function(){

                var name=$('#regfname').val().length;
                if (name<3) {   
                $('#regfname').css("outline-color", "red");
                $("#regfname").css("border-color", "red");
                $('#efeedback').html('Plotesojeni emrin e plote');
                $("#submit_sign_up").attr('disabled', 'disabled');
                $("#submit_sign_up").css("cursor","default");
                }
                else {
                    $('#efeedback').html('').show();
                    $('#regfname').css("outline-color", "green");
                    $("#regfname").css("border-color", "green");
                    $("#submit_sign_up").removeAttr('disabled', 'disabled');
                    $("#submit_sign_up").css("cursor","pointer");
                }


            });

                $('#reglname').bind("keyup focusout", function(){

                var name=$('#reglname').val().length;
                if (name<3) {   
                $('#reglname').css("outline-color", "red");
                $("#reglname").css("border-color", "red");
                $('#mfeedback').html('Plotesojeni mbiemrin e plote');
                $("#submit_sign_up").attr('disabled', 'disabled');
                $("#submit_sign_up").css("cursor","default");
                }
                else {
                    $('#mfeedback').html('').show();
                    $('#reglname').css("outline-color", "green");
                    $("#reglname").css("border-color", "green");
                    $("#submit_sign_up").removeAttr('disabled', 'disabled');
                    $("#submit_sign_up").css("cursor","pointer");
                }


            });


                $('#regadresa').bind("keyup focusout", function(){

                var name=$('#regadresa').val().length;
                if (name<3) {   
                $('#regadresa').css("outline-color", "red");
                $("#regadresa").css("border-color", "red");
                $('#afeedback').html('Plotesojeni adresen e plote');
                $("#submit_sign_up").attr('disabled', 'disabled');
                $("#submit_sign_up").css("cursor","default");
                }
                else {
                    $('#afeedback').html('').show();
                    $('#regadresa').css("outline-color", "green");
                    $("#regadresa").css("border-color", "green");
                    $("#submit_sign_up").removeAttr('disabled', 'disabled');
                    $("#submit_sign_up").css("cursor","pointer");
                }


            });


$('#reggjinia').bind("keyup focusout", function(){

                var name=$('#reggjinia').val().length;
                if (name!=1) {   
                $('#reggjinia').css("outline-color", "red");
                $("#reggjinia").css("border-color", "red");
                $('#gfeedback').html('Plotesojeni gjinine ne formatin M/F');
                $("#submit_sign_up").attr('disabled', 'disabled');
                $("#submit_sign_up").css("cursor","default");
                }
                else {
                    $('#gfeedback').html('').show();
                    $('#reggjinia').css("outline-color", "green");
                    $("#reggjinia").css("border-color", "green");
                    $("#submit_sign_up").removeAttr('disabled', 'disabled');
                    $("#submit_sign_up").css("cursor","pointer");
                }


            });


             $('#password_register').bind("keyup focusout", function (){
             var pass= $('#password_register').val().length;
            if(pass<6){
                $("#password_register").css("outline-color", "red");
                $("#password_register").css("border-color", "red");
                $('#pfeedback').html('Passwod i shkurter');
                $("#submit_sign_up").attr('disabled', 'disabled');
                $("#submit_sign_up").css("cursor","default");

            }else {
                $('#pfeedback').html('');
                $("#password_register").css("outline-color", "green");
                $("#password_register").css("border-color", "green");
                $("#submit_sign_up").removeAttr('disabled', 'disabled');
                $("#submit_sign_up").css("cursor","pointer");

            }

            });

            $('#retype_password_register').bind("keyup focusout", function (){
            var pass= $('#password_register').val().length;
            var pass1 = $('#retype_password_register').val().length;
            if(pass1==0){
                $("#retype_password_register").css("outline-color", "red");
                $("#retype_password_register").css("border-color", "red");
                $('#p1feedback').html('Plotesoni fushen');
                $("#submit_sign_up").attr('disabled', 'disabled');
                $("#submit_sign_up").css("cursor","default");

            }
            else if (pass1!=pass) {
                $("#retype_password_register").css("outline-color", "red");
                $("#retype_password_register").css("border-color", "red");
                $('#p1feedback').html('Passwordi nuk perputhet');
                $("#submit_sign_up").attr('disabled', 'disabled');
                $("#submit_sign_up").css("cursor","default");
            }else{
                $('#p1feedback').html('');
                $("#retype_password_register").css("outline-color", "green");
                $("#retype_password_register").css("border-color", "green");
                $("#submit_sign_up").removeAttr('disabled', 'disabled');
                $("#submit_sign_up").css("cursor","pointer");
            }

            });

    setTimeout(function() {
               slide();
              },4000);
   
    });
    </script>
</head>
<body background="testt2.png" style="background-color:#EDE7F6;">
<input class="input" id="edison" type="button" value="Sign In" />
<!-- Headeri statik -->

<div id= "edi">
<a href="#"><div id="portokalli"><p id="kutia"><i class='fa fa-heartbeat' aria-hidden='true'></i>E-medica</p></div></a><a href="#medica"><div id="blu"><p id="kutia"><i class='fa fa-question-circle' aria-hidden='true'></i>Cfare eshte ?</p></div></a><a href="#section2"><div id="kafe"><p id="kutia"><i class='fa fa-plus-square' aria-hidden='true'></i>Si ta perdorim</p></div></a><a href="#interesante_div"><div id="portokalli1"><p id="kutia"><i class='fa fa-ambulance' aria-hidden='true'></i>Te vecanta</p></div></a>
</div>
<!--Fundi i header-->

<div id="logo"></div>
 
<div class="box">
  <div class="container-1">
      
      <input type="text" id="search" placeholder="Search..." onkeyup="getStates(this.value)">
  </div>
  <div id="semundje_list">
      <div id ="results"></div>
  </div>

</div>
 <div id="body_div">

  <div id="slide">
    
   <div class="slider">

      <div class="slide active-slide">
        
          
            
           
              <img src="img1.jpg" width="1000px" height="400px">
               
      </div>

      <div class="slide">
      
         
              <img src="img3.jpg" width="1000px" height="400px">
            
            
               
      </div> 

      <div class="slide">

              <img src="img4.jpg" width="1000px" height="400px">     
      </div> 


      <div class="slide">
       
              <img src="img5.jpg" width="1000px" height="400px">
                
      </div> 

    </div>
</div>


<!--Sign in-->

<div id="wrapper">
    <div>
        
        <form name="form1" action="" method="post">
            <fieldset>
                
                <div>
                    <input type="text" name = "username1" id="username1" placeholder="username" autofocus="autofocus"/>
                </div>
                <div class="feedback_login" id="feedback1">
            
                </div>
                <div>
                    <input type="password" id="password1" name="password1" placeholder="Password"/>
                </div>
                   <div id="pass_feedback" class="feedback_login" ></div>
                <input type="submit" id="sign_in_submit" name="sign_in" value="Sign In"/>
                Dont have an account? Create one!
                
            </fieldset>    
        </form>
  

    </div>
    <div>
        <input id="sign_up" type="button" value="Sign Up" />
    </div>
</div>      
    <!--sign up-->
<div id="wrapper1">
        <div>
        
        <form name ="form" action=""  method="post">
                <fieldset>
                
                <div>
                    <input type="text" name="first_name" id="regfname" placeholder="Emri" autofocus="autofocus"/>
                </div>
                <div class="feedback_login" id="efeedback"></div>
                <div>
                    <input type="text"  id="reglname" name="last_name" placeholder="Mbiemri"/>
                </div>
                <div class="feedback_login" id="mfeedback"></div>
                
                    
                <input type="text" name = "username" id="username_input" placeholder="Numri i ID"/>
                          <div class="feedback_login" id="feedback"></div>
               
                <div>
                    <input type="password" name="password_reg" id="password_register" placeholder="Password"/>
                </div>
                <div class="feedback_login" id="pfeedback"></div>

                <div>
                    <input type="password" id="retype_password_register" placeholder="Retype Password"/>
                </div>
                <div class="feedback_login" id="p1feedback"></div>
                <div>
                    <input type="text" id="regadresa" name="adresa" placeholder="Adresa"/>
                </div>
                <div class="feedback_login" id="afeedback"></div>
                 <div>
                    <input type="text" id="reggjinia" name="gjinia" placeholder="Gjinia M/F"/>
                </div>

                <div class="feedback_login" id="gfeedback"></div>
   
                   
                <input type="submit" id="submit_sign_up" name="sign_up" value="Sign Up"/>
      
            </fieldset>    
        </form>

    </div>
    

    <div>
        <input id="sign_in" type="button" value="Sign in" />
    </div>
</div>
<div id="medica"></div>
<div id="e-medica_div"></div>

<div id="e-medica">
    <div id="titulli">Cfare eshte E-medica</div>
</div>
<div id="pershkrimi"><pre>           E-medica eshte nje sistem online mjeksor i cli ben te mundur 
qe doktori te ...E-medica eshte nje sistem online mjeksor i cli ben te 
mundur qe doktori te ...E-medica eshte nje sistem online mjeksor i cli 
ben te mundur qe doktori te ...E-medica eshte nje sistem online mjeksor 
i cli ben te mundur qe doktori te ...
</pre>
</div>
<div id="kubat">
</div>
<div id="how-to_div"></div>
<div id="section2"></div>
<div id="how-to">
    <div id="titulli1">Si ta Perdorim</div>
</div>
<div id="pershkrimi1"><pre>E-medica eshte nje sistem online mjeksor i cli ben te mundur 
qe doktori te ...E-medica eshte nje sistem online mjeksor i cli ben te 
mundur qe doktori te ...E-medica eshte nje sistem online mjeksor i cli 
ben te mundur qe doktori te ...E-medica eshte nje sistem online mjeksor 
i cli ben te mundur qe doktori te ...</pre></div>

<div id="interesante_div">
</div>
<div id="shirit123"></div>
<div id="interesante">
    <div id="foooter1_text"><pre>
    E-medica ju ofron sherbimin
    e diagnostifikimit te disa
    semundjeve nga te cilat mund
    te vuani online dhe ne kohe
    reale pavarsisht ku ndodheni.</pre></div>
    <div id="foooter2_text"><pre>
    E-medica ju ofron sherbimin
    e kartes mjeksore online ne
    te cilen do te ruhen te gjitha
    te dhenat tuaja mjeksore .</pre></div>
    <div id="foooter3_text"><pre>
    E-medica ju ofron sherbimin
    kontaktimit te mjekut tuaj 
    te familjes ne kohe reale 
    per cdo shqetesim qe mund
    te keni.</pre></div>
    <div id="interesante1" class="footer"></div>
    <div id="interesante2" class="footer"><div><pre></pre></div></div>
    <div id="interesante3" class="footer"><div><pre></pre></div></div>
</div>

</div>



<!-- background -->
<div id="overlay-bg"></div>
    <script src="jquery.min.js"></script>
    <script src="popup.js"></script>



</body>
</html>