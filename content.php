<?php
    include "connect.php";
     $news_id = $_GET['news_id'];
    $result = $pdo->query("SELECT beauty_community.news_id,topic,news_detail,imgName,date FROM beauty_community,img_news WHERE beauty_community.news_id = '$news_id' AND beauty_community.news_id = img_news.news_id");
    $next = $news_id +1;
    $previous = $news_id -1;
    

    $date = date('Y-m-d');
    function DateThai($date)
	       {
                $strYear = date("Y",strtotime($date))+543;
                $strMonth= date("n",strtotime($date));
                $strDay= date("j",strtotime($date));
                $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                $strMonthThai=$strMonthCut[$strMonth];
                return "$strDay $strMonthThai $strYear";
	       }
$row = $result->fetch();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Free Bootstrap Themes by 365Bootstrap dot com - Free Responsive Html5 Templates">
  <meta name="author" content="https://www.365bootstrap.com">
  <title>Post Detail</title>
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
    <script>
        function makeaction(){
            document.getElementById('btn_submit').disabled = false;  
        }
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
            <div class="logo" style="display:inline; color:white;"><span style="font-size:50px;">Beauty Community</span></div>
       </div>
    <div class="col-md-2" id="rightpanel">
       <?php
        if (isset($_SESSION["username"])) {
            echo "<a href='#' style='float:right;'>สวัสดี คุณ".$_SESSION["username"]."</a><br>";
            echo "<a href='logout.php' style='float:right;'>Logout</a>";
        }else{
            echo "<a href='#' style='float:right;' data-toggle='modal' data-target='#login-modal'>Sign in</a><br>";
            echo "<a href='#' style='float:right;'>Register</a>";
        }
            ?>
       </div>
       <!----------------------------------Sign modal---------------------------------->
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Sign in</h1><br>
				  <form>
					<input type="text" name="user" placeholder="Username">
					<input type="password" name="pass" placeholder="Password">
					<input type="submit" id="btn_submit" name="login" class="login loginmodal-submit" value="Sign in" disabled>
				  </form>
					
				  <div class="login-help info">
					<a href="#">Register</a> - <a href="#">Forgot Password</a>
				  </div>
                     <div class="g-recaptcha" data-callback="makeaction" data-sitekey="6Lc3oUwUAAAAAOCSkSybN7_kMHFVbzflx-ysw4Ek"></div>
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
                <li><a href="#">News &amp Announcement</a>
                </li>
              
            </ul>
        </div>
 
</div>
            
        </li>
          <li>
           <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Knowledge sources
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
        <div class="box">
          <h4><?=$row["topic"]; ?></h4>
            <?php echo DateThai($row["date"]); ?>
          <p style="margin-top: 20px"><?=$row["news_detail"]; ?></p>
            <div class="wrap-vid">
            <?php 
                 $result = $pdo->query("SELECT beauty_community.news_id,imgName FROM beauty_community,img_news WHERE beauty_community.news_id = '$news_id' AND beauty_community.news_id = img_news.news_id");
                while($row = $result->fetch()){
            echo "<img src='News/".$row["imgName"]."' height='100px' width='100%' class='float-left'><br><br>";
                } 
                ?>
                </div>
            <div>
                <?php
                echo "<a href='content.php?news_id=".$previous."' style='float:left;'>Previous</a>";
                echo "<a href='content.php?news_id=".$next."' style='float:right;'>Next</a>";
          
                ?>
            </div>
        </div>
        <div class="box"></div>
      </div>
  
    </div>
  </div>
  <footer style="background-color:#3a2822">
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