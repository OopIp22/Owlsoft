<?php
    include "connect.php";
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
  <script src="js/CheckAllForSubmit.js"></script>
  <script src="js/AjaxToCheckUser.js"></script>
  <script src="js/ajaxCheckMember.js"></script>
  <script src="js/ajaxForgetpass.js"></script>
  <!-- Google reCaptcha -->
  <script src='https://www.google.com/recaptcha/api.js'></script>
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"> 
    <script>
        function makeaction(){
            document.getElementById('btn_submit').disabled = false;  
        }
        /////////////////Check Name///////////////////////
        function checkName(){
            var name = document.getElementById("name").value;
            const nameregex = /^[A-Za-z]{1,}\s[A-Za-z]{1,}$/;
            let Fname = nameregex.exec(name);
            if(name == null || name == ""){
                document.getElementById("alertName").innerHTML = "Please input your name";
                document.getElementById("ForSubmitName").value="0";
            }else if(Fname == null){
                document.getElementById("alertName").innerHTML = "Incorrect your name";
                document.getElementById("ForSubmitName").value="0";
            }else{
                document.getElementById("alertName").innerHTML = "";
                document.getElementById("ForSubmitName").value="1";
            }
        }
        /////////////////Check Identification///////////////////////
        function checkSsn(){
            var CheckSnn = document.getElementById("ssn").value;
//            var Checksub=document.getElementById("ForSubmitSSN").value;
            console.log(document.getElementById("ForSubmitSSN").value);
            const CCssn = CheckSnn;
            const regexSSN = /[0-9]{13}|^[A-Z]{1,2}[0-9]{6}/;
            let mSSN =regexSSN.exec(CCssn);
            if(CheckSnn == null || CheckSnn == ""){
                document.getElementById("alertSSN").innerHTML = "Please input your Identification number or Passport number";
                document.getElementById("ForSubmitSSN").value="0";
            }else if(mSSN == null){
                document.getElementById("alertSSN").innerHTML = "Incorrect Identification number or Passport number";
                  document.getElementById("ForSubmitSSN").value="0";
            }else{
                document.getElementById("alertSSN").innerHTML = "";
                document.getElementById("ForSubmitSSN").value="1";
            }
                
        }
        ////////////////////Check Upload Image/////////////////
        function CheckImage(){
            var CimgSSN = document.getElementById("SSNimage").value;
            if(CimgSSN == null || CimgSSN == ""){
            document.getElementById("alertImgSSN").innerHTML = "Please choose your Image Identification number/Passport number to upload";
            document.getElementById("ForSubmitImg").value="0";
        }else{
            document.getElementById("alertImgSSN").innerHTML = "";
            document.getElementById("ForSubmitImg").value="1";
        }
        }
        ////////////////////Check username/////////////////
        function checkNullUsername(){
            var username = document.getElementById("username").value;
            if(username == null || username == ""){
            document.getElementById("alertCheckUser").innerHTML = "Please Input Username";
            document.getElementById("ForSubmitUsername").value="0";
        }
        }
        //////////////////////////////////////////////////////
        /////////////////Check Password///////////////////////
        function checkPassword(){
            let regex = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*_)(?=.*\-).{16,}/;
            var pass = document.getElementById("password").value;
            console.log("test");
            if(!pass.match(regex)){
                document.getElementById("blank").innerHTML = "Please Input Password in A-Z,a-z,0-9,_,-" ;
                document.getElementById("ForSubmitPass").value="0";
            }else{
                 document.getElementById("blank").innerHTML = "";
                document.getElementById("ForSubmitPass").value="1";
            }
        }
        ////////////////////////////////////////////////////////
        //////////////////Check ConfirmPass/////////////////////////
        function checkMatchpass(){
            var pass = document.getElementById("password").value;
            var Cpass = document.getElementById("Conpassword").value;
            if(!pass.match(Cpass)){
               document.getElementById("blank1").innerHTML = "Comfirm password don't match password";
                document.getElementById("ForSubmitcPass").value="0";
            }else{
                 document.getElementById("blank1").innerHTML = "";
                document.getElementById("ForSubmitcPass").value="1";
            }
        }
        ////////////////////////////////////////////////////////
        /////////////////////Check Birthdate/////////////////////
        function checkBirthdate(){
                var date = document.getElementById("birthdate").value;
                var d = date.split("-");
                var year = parseInt(d[0]);
                var month = parseInt(d[1]);
                var day = parseInt(d[2]);
                var full = new Date();
                
                var year1 = full.getFullYear() - year;
                var month1 = full.getMonth()+1 - month;
                var day1 = full.getDate() - day;
                console.log("day: "+day1);
                console.log("month: "+month1);
                console.log("year: "+year1);
                if(year1 > 20){
                      document.getElementById("b").innerHTML = "";
                      document.getElementById("ForSubmitDate").value="1";
                }
                else if(year1 == 20){
                        if((day1 <= 0 || day1 >= 0) && month1 < 0){
                             console.log("if year = 20");
                             document.getElementById("b").innerHTML = "Your age must greater than 20 years old";
                             document.getElementById("ForSubmitDate").value="0";                           
                        }else if((day1 <= 0 || day1 >= 0) && month1 >= 0){
                        document.getElementById("b").innerHTML = "";
                        document.getElementById("ForSubmitDate").value="1"; 
                        }
                }
                else{
                     document.getElementById("b").innerHTML = "Your age must greater than 20 years old";
                     document.getElementById("ForSubmitDate").value="0";
                }
                    console.log(document.getElementById("ForSubmitDate").value);
        }
        //////////////////////Check Q1////////////////////////
        function checkQ1(){
            var q1 = document.getElementById("sel1").value;
            console.log(q1);
            if(q1 == null || q1 == ""){
                document.getElementById("alertQ1").innerHTML = "Please Select Question";
                document.getElementById("ForSubmitQ1").value="0";
            }else{
                document.getElementById("alertQ1").innerHTML = "";
                document.getElementById("ForSubmitQ1").value="1";
            }
        }
        //////////////////////Check Ans1///////////////////////////
        function checkAns1(){
            var ans1 = document.getElementById("Ans1").value;
            if(ans1 == null || ans1 == ""){
                document.getElementById("alertAns1").innerHTML = "Please input your answer";
                document.getElementById("ForSubmitAns1").value="0";
            }else{
                document.getElementById("alertAns1").innerHTML = "";
                document.getElementById("ForSubmitAns1").value="1";
            }
        }
        //////////////////////Check Q2////////////////////////
        function checkQ2(){
            var q2 = document.getElementById("sel2").value;
            console.log(q2);
            if(q2 == null || q2 == ""){
                document.getElementById("alertQ2").innerHTML = "Please Select Question";
                document.getElementById("ForSubmitQ2").value="0";
            }else{
                document.getElementById("alertQ2").innerHTML = "";
                document.getElementById("ForSubmitQ2").value="1";
            }
        }
        //////////////////////Check Ans2///////////////////////////
        function checkAns2(){
            var ans2 = document.getElementById("Ans2").value;
            if(ans2 == null || ans2 == ""){
                document.getElementById("alertAns2").innerHTML = "Please input your answer";
                document.getElementById("ForSubmitAns2").value="0";
            }else{
                document.getElementById("alertAns2").innerHTML = "";
                document.getElementById("ForSubmitAns2").value="1";
            }
        }
        ///////////////////////Check Q2////////////////////////
        function checkQ3(){
            var q3 = document.getElementById("sel3").value;
            if(q3 == null || q3 == ""){
                document.getElementById("alertQ3").innerHTML = "Please Select Question";
                document.getElementById("ForSubmitQ3").value="0";
            }else{
                document.getElementById("alertQ3").innerHTML = "";
                document.getElementById("ForSubmitQ3").value="1";
            }
        }
        //////////////////////Check Ans2///////////////////////////
        function checkAns3(){
            var ans3 = document.getElementById("Ans3").value;
            if(ans3 == null || ans3 == ""){
                document.getElementById("alertAns3").innerHTML = "Please input your answer";
                document.getElementById("ForSubmitAns3").value="0";
            }else{
                document.getElementById("alertAns3").innerHTML = "";
                document.getElementById("ForSubmitAns3").value="1";
            }
        }
        ///////////////////////Email////////////////////////////////
        function checkEmail(){
             var Cemail = document.getElementById("email").value;
            const CCemail = Cemail;
            const regexEmail = /[^@\s]+@[^@\s]+\.[^@\s]+/g;
            let mEmail =regexEmail.exec(CCemail);
            if(Cemail == null || Cemail == ""){
                document.getElementById("alertEmail").innerHTML = "Please input your Email";
                document.getElementById("ForSubmitEmail").value="0";
            }
            else if(mEmail == null){
                document.getElementById("alertEmail").innerHTML = "Example : example@email.com";
                document.getElementById("ForSubmitEmail").value="0";
            }else{
                document.getElementById("alertEmail").innerHTML = "";
                document.getElementById("ForSubmitEmail").value="1";
            }
        }
        ////////////////////////Policy///////////////////////////
        function checkPolicy(){
            var checkBox = document.getElementById("policy");
            if(checkBox.checked == false){
                 document.getElementById("ForSubmitPolicy").value="0";
                 document.getElementById("alertPolicy").innerHTML = "Please accept policy";
            }else{
                document.getElementById("alertPolicy").innerHTML = "";
                document.getElementById("ForSubmitPolicy").value="1";
            }
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
            <div class="logo" style="display:inline; color:white;"><span style="font-size:50px;">ชุมชนคนรักสวยรักงาม</span></div>
       </div>
    <div class="col-md-2" id="rightpanel">
      
           <a href='#' id='signin' style='float:right;' data-toggle='modal' data-target='#login-modal'>Sign In</a><br>
            <a href='#' style='float:right;'>Register</a>
     
       </div>
       <!----------------------------------Sign modal---------------------------------->
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Sign in</h1><br>
				  <form action="checkLogin.php" method="post" >
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
        <div class="box" style="padding:40px 60px 40px 60px;">
            <!----------------------------------------------------------REGISTER--------------------------------------------->
            <h3>Registration</h3>
            <form action="insert_register.php" method="post" enctype="multipart/form-data" onsubmit="return CheckAll()">
            <div id="alertAll" style="color:red;"></div>
            <div id="alertR" style="color:red;"></div>
            <div class="form-group row">
                <label class="col-2 col-form-label">First Name - Last Name</label>
                <input type="text" id="ForSubmitName" value="0" style="display:none;">
              <div class="col-10">
                  <div id="alertName" style="color:red;"></div>
                <input class="form-control" type="text" id="name" name="name" onchange="checkName()">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-2 col-form-label">Identification card/Passport ID</label>
                <input type="text" id="ForSubmitSSN" value="0" style="display:none;">
                
              <div class="col-10">
                  <div id="alertSSN" style="color:red;"></div>
                <input class="form-control" type="text" id="ssn" name="ssn" onchange="checkSsn()">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-2 col-form-label">Upload (Copy of Identification card or Passport ID)</label>
                   <input type="text" id="ForSubmitImg" value="0" style="display:none;">         
                <div class="col-10">
                    <div id="alertImgSSN" style="color:red;"></div>
                <input class="" type="file" name="SSNimage" id="SSNimage" accept="image/jpeg, image/jpg" onchange="CheckImage()">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-2 col-form-label">Username</label>
                <input type="text" id="ForSubmitUsername" value="0" style="display:none;">
              <div class="col-10">
                  <div id="alertCheckUser" style="color:red;" ></div>
                <input class="form-control" type="text" id="username" onkeyup="CheckUser()" onchange="checkNullUsername()" name="username" >
              </div>
            </div>
            <div class="form-group row">
              <label class="col-2 col-form-label">Password</label>
                <input type="text" id="ForSubmitPass" value="0" style="display:none;">
              <div class="col-10">
                  <div id="blank" style="color:red;" ></div>
                <input class="form-control" type="password" id="password" name="password" onchange="checkPassword()" >
              </div>
            </div>
            <div class="form-group row">
              <label class="col-2 col-form-label">Confirm Password</label>
                <input type="text" id="ForSubmitcPass" value="0" style="display:none;">
              <div class="col-10">
                   <div id="blank1" style="color:red;"></div>
                <input class="form-control" type="password" id="Conpassword" onchange="checkMatchpass()" >
              </div>
            </div>
           
            <div class="form-group row">
              <label for="example-date-input" class="col-2 col-form-label">Birthdate</label>
                    <input type="text" id="ForSubmitDate" value="0" style="display:none;">
              <div class="col-10">
                <div id="b" style="color:red;"></div>
                <input class="form-control" type="date" id="birthdate" name="Birthdate" onchange="checkBirthdate()">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-2 col-form-label">Question 1</label>
                <div id="alertQ1" style="color:red;"></div>
                <input type="text" id="ForSubmitQ1" value="0" style="display:none;">
                  <select class="form-control" id="sel1" name="Q1" onchange="checkQ1()">
                    <option value="">---------Please Select-----------</option>
                    <option value="What is your fisrt pet's name?">What is your fisrt pet's name?</option>
                    <option value="Where is your hometown?">Where is your hometown?</option>
                    <option value="What is your neighbour name?">What is your neighbour name?</option>
                    <option value="Where is your fisrt school?">Where is your fisrt school?</option>
                  </select>
                </div>
            <div class="form-group row">
            <label class="col-2 col-form-label">Answer 1</label>
                <input type="text" id="ForSubmitAns1" value="0" style="display:none;">
            <div class="col-10">
                <div id="alertAns1" style="color:red;"></div>
                <input class="form-control" type="text" id="Ans1" name="Ans1" onkeyup="checkAns1()">
              </div>
            </div>
        <div class="form-group row">
              <label class="col-2 col-form-label">Question 2</label>
                 <div id="alertQ2" style="color:red;"></div>
                <input type="text" id="ForSubmitQ2" value="0" style="display:none;">
                  <select class="form-control" id="sel2" name="Q2" onchange="checkQ2()">
                    <option value="">---------Please Select-----------</option>
                    <option value="What is your mother favourite color?">What is your mother favourite color?</option>
                    <option value="Where is your father office?">Where is your father office?</option>
                    <option value="What is your favourite food?">What is your favourite food?</option>
                    <option value="What is your favourite game?">What is your favourite game?</option>
                  </select>
                </div>
            <div class="form-group row">
            <label class="col-2 col-form-label">Answer 2</label>
                <input type="text" id="ForSubmitAns2" value="0" style="display:none;">
            <div class="col-10">
                <div id="alertAns2" style="color:red;"></div>
                <input class="form-control" type="text" id="Ans2" name="Ans2" onkeyup="checkAns2()">
              </div>
            </div>
        <div class="form-group row">
              <label class="col-2 col-form-label">Question 3</label>
                <div id="alertQ3" style="color:red;"></div>
                <input type="text" id="ForSubmitQ3" value="0" style="display:none;">
                  <select class="form-control" id="sel3" name="Q3" onchange="checkQ3()">
                      <option value="">---------Please Select-----------</option>
                    <option value="What is your favourite cosmetic brand?">What is your favourite cosmetic brand?</option>
                    <option value="Where is your first date?">Where is your first date?</option>
                    <option value="What is your bestfriend name?">What is your bestfriend name?</option>
                    <option value="Where is your favourite place at school?">Where is your favourite place at school?</option>
                  </select>
                </div>
            <div class="form-group row">
            <label class="col-2 col-form-label">Answer 3</label>
                <input type="text" id="ForSubmitAns3" value="0" style="display:none;">
            <div class="col-10">
                 <div id="alertAns3" style="color:red;"></div>
                <input class="form-control" type="text" id="Ans3" name="Ans3" onkeyup="checkAns3()">
              </div>
            </div>        
            
                
            <div class="form-group row">
              <label for="example-password-input" class="col-2 col-form-label">Email</label>
                <input type="text" id="ForSubmitEmail" value="0" style="display:none;">
              <div class="col-10">
                   <div id="alertEmail" style="color:red;"></div>
                <input class="form-control" type="email" id="email" name="email" onchange="checkEmail()">
              </div>
            </div>
                
            <div class="form-group row">
            <label class="form-check-label">
              <input type="text" id="ForSubmitPolicy" value="0" style="display:none;">  
              <input type="checkbox" class="form-check-input" id="policy" >
              
              I agree to the <a href="#" data-toggle='modal' data-target='#term-modal'>term of service.</a>
                 
            </div>
                
                
        <div class="modal fade" id="term-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div style="background-color:white; width:800px; padding:50px; margin-left:auto; margin-right:auto;">
                    <h2 style="text-align: center;">TERMS AND CONDITIONS</h2><ol><li><strong>Introduction</strong></li></ol><p>These Website Standard Terms and Conditions written on this webpage shall manage your use of this website. These Terms will be applied fully and affect to your use of this Website. By using this Website, you agreed to accept all terms and conditions written in here. You must not use this Website if you disagree with any of these Website Standard Terms and Conditions.</p><p>Minors or people below 20 years old are not allowed to use this Website.</p><ol start="2"><li><strong>Intellectual Property Rights</strong></li></ol><p>Other than the content you own, under these Terms, Owlsoft enterprise and/or its licensors own all the intellectual property rights and materials contained in this Website.</p><p>You are granted limited license only for purposes of viewing the material contained on this Website.</p><ol start="3"><li><strong>Restrictions</strong></li></ol><p>You are specifically restricted from all of the following</p><ul><li>publishing any Website material in any other media;</li><li>selling, sublicensing and/or otherwise commercializing any Website material;</li><li>publicly performing and/or showing any Website material;</li><li>using this Website in any way that is or may be damaging to this Website;</li><li>using this Website in any way that impacts user access to this Website;</li><li>using this Website contrary to applicable laws and regulations, or in any way may cause harm to the Website, or to any person or business entity;</li><li>engaging in any data mining, data harvesting, data extracting or any other similar activity in relation to this Website;</li><li>using this Website to engage in any advertising or marketing.</li></ul><p>Certain areas of this Website are restricted from being access by you and Owlsoft enterprise may further restrict access by you to any areas of this Website, at any time, in absolute discretion. Any user ID and password you may have for this Website are confidential and you must maintain confidentiality as well.</p><ol start="4"><li><strong>Your Content</strong></li></ol><p>In these Website Standard Terms and Conditions, “Your Content” shall mean any audio, video text, images or other material you choose to display on this Website. By displaying Your Content, you grant Owlsoft enterprise a non-exclusive, worldwide irrevocable, sub licensable license to use, reproduce, adapt, publish, translate and distribute it in any and all media.</p><p>Your Content must be your own and must not be invading any third-party’s rights. Owlsoft enterprise reserves the right to remove any of Your Content from this Website at any time without notice.</p><ol start="5"><li><strong>No warranties</strong></li></ol><p>This Website is provided “as is,” with all faults, and Owlsoft enterprise express no representations or warranties, of any kind related to this Website or the materials contained on this Website. Also, nothing contained on this Website shall be interpreted as advising you.</p><ol start="6"><li><strong>Limitation of liability</strong></li></ol><p>In no event shall Owlsoft enterprise, nor any of its officers, directors and employees, shall be held liable for anything arising out of or in any way connected with your use of this Website whether such liability is under contract. &nbsp;Owlsoft enterprise, including its officers, directors and employees shall not be held liable for any indirect, consequential or special liability arising out of or in any way related to your use of this Website.</p><ol start="7"><li><strong>Indemnification</strong></li></ol><p>You hereby indemnify to the fullest extent Owlsoft enterprise from and against any and/or all liabilities, costs, demands, causes of action, damages and expenses arising in any way related to your breach of any of the provisions of these Terms.</p><ol start="8"><li><strong>Severability</strong></li></ol><p>If any provision of these Terms is found to be invalid under any applicable law, such provisions shall be deleted without affecting the remaining provisions herein.</p><ol start="9"><li><strong>Variation of Terms</strong></li></ol><p>Owlsoft enterprise is permitted to revise these Terms at any time as it sees fit, and by using this Website you are expected to review these Terms on a regular basis.</p><ol start="10"><li><strong>Assignment</strong></li></ol><p>The Owlsoft enterprise is allowed to assign, transfer, and subcontract its rights and/or obligations under these Terms without any notification. However, you are not allowed to assign, transfer, or subcontract any of your rights and/or obligations under these Terms.</p><ol start="11"><li><strong>Entire Agreement</strong></li></ol><p>These Terms constitute the entire agreement between Owlsoft enterprise and you in relation to your use of this Website, and supersede all prior agreements and understandings.</p><ol start="12"><li><strong>Governing Law &amp; Jurisdiction</strong></li></ol><p>These Terms will be governed by and interpreted in accordance with the laws of the State of KhonKaen, and you submit to the non-exclusive jurisdiction of the state and federal courts located in KhonKaen for the resolution of any disputes.</p>

                    
                    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close" style="background-color:#AEE0A4; color:white; width: 20%; margin-left: 40%;
margin-right: 40%"><a href="index.php" style="color:white;">OK</a></button>
                    


				</div>
			</div>
           
		  </div>
                
                
                
            <!---------------------------------------term of service-------------------------------------------->    
            
               
                
                
            <!---------------------------------------End term of service-------------------------------------------->    
                
                
                
                
            </label><br>
                <div id="alertPolicy" style="color:red;"></div>
                <button type="submit" class="btn btn-default" style="background-color:#AEE0A4; color:white;" id="Registerbtn"  onclick="checkMember()">Register</button>
                
            </div>
            
                
            
                
                
                
          
            </form>
         <!------------------------------------------------------END REGISTER------------------------------------------------> 
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