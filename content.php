<?php
    session_start();
    include "connect.php";
     $news_id = $_GET['news_id'];
    $result = $pdo->query("SELECT news_id FROM beauty_community");
    $id = 0;
    $array[] = 0;
    $thispage = 0;
    while($row = $result->fetch()){
       $array[$id] = $row["news_id"];
        $id++;
    }
    for($i=0;$i < sizeof($array);$i++){
        if($array[$i] == $news_id){
            $thispage = $i;
        }
    }
    for($j=$thispage;$j < sizeof($array);$j++){
        if($array[$j] == $news_id){
            $next = $j+1;
            $prev = $j-1;
        if($next == sizeof($array)){
            $nextp = null;
        }else{
            $nextp = $array[$next];
        }
        if($prev < 0){
            $prevp = null;
        }else{
            $prevp = $array[$prev];
        }
        }
    }

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
    <link rel="icon" href="beauty-logo.png">
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
            echo "<a href='#' style='float:right;'>Register</a>";
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
                 <a href="#" onclick="checkForget()">Forgot Password</a>
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
            <?php
            $result = $pdo->query("SELECT beauty_community.news_id,topic,news_detail,date FROM beauty_community LEFT JOIN img_news ON beauty_community.news_id = img_news.news_id WHERE beauty_community.news_id = '$news_id'");
               $row = $result->fetch();
                ?>
          <h4><?=$row["topic"]; ?></h4>
            <?php echo DateThai($row["date"]); ?>
          <p style="margin-top: 20px"><?=$row["news_detail"]; ?></p>
            <div class="wrap-vid">
            <?php 
            $result = $pdo->query("SELECT beauty_community.news_id,topic,news_detail,imgName,date FROM beauty_community LEFT JOIN img_news ON beauty_community.news_id = img_news.news_id WHERE beauty_community.news_id = '$news_id'");
                while($row = $result->fetch()){
            echo "<img src='News/".$row["imgName"]."' height='100px' width='100%' class='float-left'><br><br>";
                } 
                ?>
                </div>
            <div>
                <?php
                if($prevp != null){
                echo "<a href='content.php?news_id=".$prevp."' style='float:left;'>Previous</a>";
                }
                if($nextp != null){
                echo "<a href='content.php?news_id=".$nextp."' style='float:right;'>Next</a>";
                }
          
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