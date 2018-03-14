<?php
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
  <title>Beauty Community</title>
  <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
  <!-- Owl Carousel Assets -->
  <link href="owl-carousel/owl.carousel.css" rel="stylesheet">
  <link href="owl-carousel/owl.theme.css" rel="stylesheet">
  <!-- Custom CSS -->
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
    
    
    <style>
        ul li a{
            color:white;
            font-weight: bold;
           
        }
        *{
	       font-family: 'Kanit', sans-serif;
        }
    </style>
</head>
    

<body>
  <nav id="menu" class="navbar" style="background-color:#AEE0A4;" style="margin:0 !important; padding:0 !important;">
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav float-left">
       <li>
           <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Home
              </a>
          </li>
          <li>
           <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Manage
              </a>
          </li>
           <li>
           <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                News & Announcement
              </a>
          </li>
           <li>
           <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Manage User
              </a>
          </li>
    
      </ul>
 
    </div>
  </nav>
    <div style="background-color:white; height:900px;">
    
    </div>
  
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
    });
});
  </script>
 
</body>

</html>