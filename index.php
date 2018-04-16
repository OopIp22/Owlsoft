<?php
    session_start();
    include "connect.php";
    
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
            function make_query($pdo)
            {
             $result = $pdo->query("SELECT beauty_community.news_id,topic,imgNO,imgName FROM beauty_community,img_news 
                                    WHERE beauty_community.news_id = img_news.news_id  ORDER BY news_id DESC");
             return $result;
            }
                function make_slides($pdo)
            {
             $output = '';
             $count = 0;
             $result = make_query($pdo);
            $id = 0;
             while($row = $result->fetch())
             {
                 if($id != $row["news_id"]){
              if($count == 0)
              {
               $output .= '<div class="item active" style="height: 400px;">';
              }
              else
              {
               $output .= '<div class="item" style="height: 400px;">';
              }
              
              $output .= "
               <a href='content.php?news_id=".$row["news_id"]."'><img src='News/".$row["imgName"]."' alt='".$row["topic"]."' /></a>
               <div class='carousel-caption' style='font-size:28px;'>".$row["topic"]."
                          </div>
              </div>
              ";
                   $count = $count + 1;  
                 }
                  $id = $row["news_id"];
              if($count == 5){
                  break;
              }
             }
             return $output;
            }


?>
<!DOCTYPE html>
<html>

<head>
  <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"> 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Free Bootstrap Themes by 365Bootstrap dot com - Free Responsive Html5 Templates">
  <meta name="author" content="https://www.365bootstrap.com">
  <title>ชุมชนคนรักสวยรักงาม</title>
  <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
  <!-- Owl Carousel Assets -->
  <link href="owl-carousel/owl.carousel.css" rel="stylesheet">
  <link href="owl-carousel/owl.theme.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/modal.css">
  <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  <!-- Custom Fonts -->
  <link rel="stylesheet" href="font-awesome-4.4.0/css/font-awesome.min.css" type="text/css">
  <!-- jQuery and Modernizr-->
  <script src="js/jquery-2.1.1.js"></script>
  <!-- Core JavaScript Files -->
  <script src="js/bootstrap.min.js"></script>
  <!-- Google reCaptcha -->
  <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="js/ajaxForgetpass.js"></script>
    <script src="js/checkLinkForget.js"></script>
<script>
       // function makeaction(){
       //     document.getElementById('btn_submit').disabled = false;  
       // }
    <?php
        if (isset($_GET["error"])){
    echo "window.onload = function(){
    $('#signin').trigger('click')
    }";
        }
            ?>

    </script>
    <style>
   #myList li{ display:none;
}
#loadMore {
    color:green;
    cursor:pointer;
}
#loadMore:hover {
    color:black;
}
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
 <header style="margin-top:20px;">
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
					<h1>Sign In</h1><br>
				  <form action="checkLogin.php" method="post">
                      <?php
                      if (isset($_GET["error"])){
                          echo "<div style='color: red;'>Username หรือ Password ไม่ถูกต้องกรุณากรอกใหม่อีกครั้ง</div>";
                      }
                      ?>
                      <div style='color: red;' id="alert"></div>
					<input type="text" name="username" placeholder="Username" id="username">
					<input type="password" name="pass" placeholder="Password" id="pass">
					<input type="submit" id="btn_submit" name="login" class="login loginmodal-submit" value="Sign In">
				  </form>
					
				  <div class="login-help info">
					<a href="#" onclick="checkForget()">Forgot Password</a>
          <input type="hidden" id="forget" value="0" style="display:none;">
				  </div>
                     
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
  <div class="featured container">
    <div class="row">
      <div class="col-sm-12">
        <!-- Carousel -->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="5000">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            <li data-target="#carousel-example-generic" data-slide-to="4"></li>
          </ol>
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
               <?php echo make_slides($pdo); ?>
          </div>
          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
          <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
        </div>
        <!-- /carousel -->
      </div>
      
    </div>
  </div>
  <!-- /////////////////////////////////////////Content -->
  <div id="page-content" class="index-page container">
    <div class="row">
      <div id="main-content">
        <!-- background not working -->
        <div class="col-md-12">
          <div class="box">
            <div class="box-header header-post">
              <h2 style="height:30px;">News &amp; Announcement</h2>
            </div>
            <div class="box-content">
              <div class="row">
                <div class="col-md-12">
                  <div class="post wrap-vid">
                    <div class="wrapper">
                      
                        <?php
                echo "<ul id='myList'>";
               $result = $pdo->query("SELECT news_id,topic,date FROM beauty_community ORDER BY news_id DESC");
               while($row = $result->fetch()){
                   echo "<li>";
                   echo "<h5 class='vid-name'>";
                   echo "<a href='content.php?news_id=".$row["news_id"]."'>".$row["topic"]."</a>";
                   echo "</h5>";
                   echo "<div class='info'>";
                   echo "<h6> ";
                   echo "<a href='#'> </a>";
                  
                   echo "</li>";
               }
                        echo "</ul>";
               ?>       
                    <div id="loadMore">more</div>
                    </div>
                  </div>
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box"></div>
        </div>
      </div>
      <div id="sidebar">
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
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
      $("#owl-demo-1").owlCarousel({
        autoPlay: 3000,
        items : 1,
        itemsDesktop : [1199,1],
        itemsDesktopSmall : [400,1]
      });
	  $("#owl-demo-2").owlCarousel({
        autoPlay: 3000,
        items : 3,
        
      });
    });
  </script>
  <script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
  <script type="text/javascript" src="js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
  <script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
    $(document).ready(function () {
    size_li = $("#myList li").size();
    x=10;
    $('#myList li:lt('+x+')').show();
    $('#loadMore').click(function () {
        x= (x+10 < size_li) ? x+10 : size_li;
        $('#myList li:lt('+x+')').slideDown();
    if ($('#myList li').length == $('#myList li:visible').length) {
            $('#loadMore').hide();
        }
    });
    
});
  </script>
 
</body>

</html>