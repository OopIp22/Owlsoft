<?php
    $username = $_POST["username"];
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Free Bootstrap Themes by 365Bootstrap dot com - Free Responsive Html5 Templates">
  <meta name="author" content="https://www.365bootstrap.com">
  <title>ชุมชนคนรักสวยรักงาม</title>
  <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/modal.css">
  <!-- Owl Carousel Assets -->
  <link href="owl-carousel/owl.carousel.css" rel="stylesheet">
  <link href="owl-carousel/owl.theme.css" rel="stylesheet">
  <!-- Custom Fonts -->
  <link rel="stylesheet" href="font-awesome-4.4.0/css/font-awesome.min.css" type="text/css">
  <!-- jQuery and Modernizr-->
  <script src="js/jquery-2.1.1.js"></script>
  <!-- Core JavaScript Files -->
  <script src="js/bootstrap.min.js"></script>
  <!-- Google reCaptcha -->
  <script src='https://www.google.com/recaptcha/api.js'></script>
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"> 
 <script src="js/CheckblankReset.js"></script>
 <script src="js/checkReset.js"></script>
 <script src="js/ajaxForgetpass.js"></script>
    <script>
        function makeaction(){
            document.getElementById('btn_submit').disabled = false;  
        }
         <?php
        if (isset($_GET["error"])){
            echo "window.onload = function(){
            $('#signin').trigger('click')
            }";
        }
            ?>
        
     /////////////////Check Password///////////////////////
        function checkPassword(){
            let regex = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*_)(?=.*\-).{16,}/;
            var pass = document.getElementById("newpassword").value;
            if(!pass.match(regex)){
                document.getElementById("blank").innerHTML = "Please Input Password in A-Z,a-z,0-9,_,-" ;
                document.getElementById("checkpass").value = "0";
            }else if(pass == ""){
                document.getElementById("blank").innerHTML = "Please Input Password" ;
                document.getElementById("checkpass").value = "0";
            }else{
                 document.getElementById("blank").innerHTML = " ";
                 document.getElementById("checkpass").value = "1";
            }
        }
        ////////////////////////////////////////////////////////
        //////////////////Check ConfirmPass/////////////////////////
        function checkMatchpass(){
            var pass = document.getElementById("newpassword").value;
            var Cpass = document.getElementById("conpassword").value;
            if(Cpass== ""){
                document.getElementById("blank1").innerHTML = "Please Input Confirm Password" ;
                document.getElementById("checkcon").value = "0";
            }
            if(pass!= Cpass){
               document.getElementById("blank1").innerHTML = "Comfirm password don't match password"; 
               document.getElementById("checkcon").value = "0";
            }else{
                 document.getElementById("blank1").innerHTML = " ";
                 document.getElementById("checkcon").value = "1";
            }
        }
        ////////////////////////////////////////////////////////   
    </script>
    <style>
            *{
            font-family: 'Kanit', sans-serif;
                }
        
        .dropdown-menu {
        min-width: 0px;
        }
        #rightpanel a{
            font-size:24px;
            color: white;
        }
        
          #rightpanel a:hover{
            font-size:24px;
            color: #3a2822;
        }
            
    </style>

</head>

<body>
    <header style="margin:20px;">
   <div class="container">
       <div class="col-md-10">
             <img src="beauty-logo.png" height="100px" width="100px">
            <div class="logo" style="display:inline; color:white;"><span style="font-size:50px;">ชุมชนคนรักสวยรักงาม</span></div>
       </div>
    <div class="col-md-2" id="rightpanel">
       <?php
        if (isset($_SESSION["username"])) {
            echo "<a href='#' style='float:right;'>สวัสดี คุณ".$_SESSION["username"]."</a><br>";
            echo "<a href='logout.php' style='float:right;'>Sign Out</a>";
        }else{
            echo "<a href='#' id='signin' style='float:right;' data-toggle='modal' data-target='#login-modal'>Sign In</a><br>";
            echo "<a href='register.php' style='float:right;'>Register</a>";
        }
            ?>
       </div>
       <!----------------------------------Sign modal---------------------------------->
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Sign in</h1><br>
				  <form action="checkLogin.php" method="post">
                      <?php
                      if (isset($_GET["error"])){
                          echo "<div style='color: red;'>Username หรือ Password ไม่ถูกต้องกรุณากรอกใหม่อีกครั้ง</div>";
                      }
                      ?>
					<input type="text" name="username" placeholder="Username">
					<input type="password" name="pass" placeholder="Password">
					<input type="submit" id="btn_submit" name="login" class="login loginmodal-submit" value="Sign in" disabled>
				  </form>
					
				 <div class="login-help info">
                 <a href="#" onclick="checkForget()" id="forgetPass">Forgot Password</a>
                 <input type="hidden" id="forget" value="0" style="display:none;">
				  </div>
                     <div class="g-recaptcha" data-callback="makeaction" data-sitekey="6LfUIk0UAAAAANcI5VnU7DPsj9rUm-g9fSB0hgSK"></div>
				</div>
			</div>
           
		  </div>
        
        <!-------------------------------------------------------------------------------->
    </div>    
        
  </header>
  <nav id="menu" class="navbar container" style="background-color:#AEE0A4;">
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav float-left">
        <li>
          <div class="dropdown show">


   <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" href="index.php" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Home
  </a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="index.php">News &amp Announcement</a>
                </li>
              
            </ul>
        </div>
 
</div>
            
        </li>
          <li>
           <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Knowledge resources
              </a>
          </li>
           <li>
           <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Events
              </a>
          </li>
           <li>
           <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               About us
              </a>
          </li>
    
      </ul>
 
    </div>
  </nav>
  <!-- Header -->
  <!-- /////////////////////////////////////////Content -->
  <div id="page-content" class="single-page container">
    <div class="row">
      <div id="main-content" class="col-md-12">
        <div class="box" style="padding:100px 60px 40px 350px; height:800px;">
            
            <form action="updatePass.php" method="post" onsubmit="return checkReset()">
                <div class="form-group row">
                    <label style="font-size:25px; font-weight:bold;" class="col-md-8">Please insert your new password.</label><br><br>
                    <div class="col-md-8">
                        New password<br>
                        <div style="color:red" id="blank"></div>
                        <input class="form-control" type="password" id="newpassword" name="newpassword" onchange="checkPassword()">
                        <input type="hidden" id="checkpass" value="0" style="display:none;">
                        
                        Confirm password<br>
                        <div style="color:red" id="blank1"></div>
                       <input class="form-control" type="password" id="conpassword" onchange="checkMatchpass()">
                       <input type="hidden" id="checkcon" value="0" style="display:none;">
                        
                    </div>
                </div>
                <input type="hidden" value="<?php echo $username; ?>" id=username style="display:none;" name="username">
                <button type="submit" class="btn btn-default" id="resetBtn" style="background-color:#AEE0A4; color:white;">Reset</button>
            </form>

      </div>
  
    </div>
  </div>
  <footer style="background-color:#3a2822" >
    <div class="copy-right">
      <p>© Copyright
        <br>Contact : admin@kkumail.com </p>
    </div>
  </footer>
  <!-- Footer -->
  <!-- JS -->
  <script src="owl-carousel/owl.carousel.js"></script>
  <script>
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
        autoPlay: 3000,
        items : 5,
        itemsDesktop : [1199,4],
        itemsDesktopSmall : [979,4]
      });

    });
  </script>
 
</body>

</html>