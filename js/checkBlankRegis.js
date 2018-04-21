function checkBlankRegis(){
    var name = document.getElementById("name").value;
    var ssn = document.getElementById("ssn").value;
    var username = document.getElementById("username").value;
    var CimgSSN = document.getElementById("SSNimage").value;
    var pass = document.getElementById("password").value;
    var date = document.getElementById("birthdate").value;
    var q1 = document.getElementById("sel1").value;
    var q2 = document.getElementById("sel2").value;
    var q3 = document.getElementById("sel3").value;
    var ans1 = document.getElementById("Ans1").value;
    var ans2 = document.getElementById("Ans2").value;
    var ans3 = document.getElementById("Ans3").value;
    var email = document.getElementById("email").value;

    if(name == ""){
        document.getElementById("alertName").innerHTML = "Please input your name";
        document.getElementById("ForSubmitName").value="0";
    }

    if(ssn == ""){
        document.getElementById("alertSSN").innerHTML = "Please input your Identification number or Passport number";
        document.getElementById("ForSubmitSSN").value="0";
    }

    if(username == ""){
        document.getElementById("alertCheckUser").innerHTML = "Please Input Username";
        document.getElementById("ForSubmitUsername").value="0";
    }

    if(CimgSSN == "" || CimgSSN == null){
        document.getElementById("alertImgSSN").innerHTML = "Please choose your Image Identification number/Passport number to upload";
        document.getElementById("ForSubmitImg").value="0";
    }

    if(pass == ""){
        document.getElementById("blank").innerHTML = "Please Input Password" ;
        document.getElementById("ForSubmitPass").value="0";
    }

    if(date == "" || date == null){
        document.getElementById("b").innerHTML = "Please Select your birthdate";
        document.getElementById("ForSubmitDate").value="0";  
    }

    if(q1 == ""){
        document.getElementById("alertQ1").innerHTML = "Please Select Question";
        document.getElementById("ForSubmitQ1").value="0";
    }

    if(q2 == ""){
        document.getElementById("alertQ2").innerHTML = "Please Select Question";
        document.getElementById("ForSubmitQ2").value="0";
    }

    if(q3 == ""){
        document.getElementById("alertQ3").innerHTML = "Please Select Question";
        document.getElementById("ForSubmitQ3").value="0";
    }

    if(ans1 == ""){
        document.getElementById("alertAns1").innerHTML = "Please input your answer";
        document.getElementById("ForSubmitAns1").value="0";
    }

    if(ans2 == ""){
        document.getElementById("alertAns2").innerHTML = "Please input your answer";
        document.getElementById("ForSubmitAns2").value="0";
    }

    if(ans3 == ""){
        document.getElementById("alertAns3").innerHTML = "Please input your answer";
        document.getElementById("ForSubmitAns3").value="0";
    }

    if(email == ""){
        document.getElementById("alertEmail").innerHTML = "Please input your Email";
        document.getElementById("ForSubmitEmail").value="0";
    }
}