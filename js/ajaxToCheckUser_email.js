var xml;
function CheckUser(){
  var username = document.getElementById("username").value;
  if(username == ""){
    document.getElementById("alertCheckUser").innerHTML = "Please Input Username";
    document.getElementById("ForSubmitUsername").value="0";
    console.log(document.getElementById("ForSubmitUsername").value);
  }else{
    document.getElementById("alertCheckUser").innerHTML = "";
    xml = new XMLHttpRequest();
    xml.onreadystatechange = Checknow;
    var url="checkUsername.php?username="+username;
    xml.open("GET", url);
    xml.send();
  }
    }

function Checknow() {
    if (xml.readyState == 4 && xml.status == 200) {
        console.log(xml.responseText);
        if(xml.responseText == "fail"){
            console.log("fail");
            document.getElementById("alertCheckUser").innerHTML = "Username have been registered. Please retry.";
        }else{
             document.getElementById("alertCheckUser").innerHTML = "";
            document.getElementById("ForSubmitUsername").value="1";
            console.log("pass"+document.getElementById("ForSubmitUsername").value);
        }
//     document.getElementById("demo").innerHTML = this.responseText;
    }
  
}

var xml1;
function CheckEmail(){
  var email = document.getElementById("email").value;
   const regexEmail = /[^@\s]+@[^@\s]+\.[^@\s]+/g;
   let mEmail =regexEmail.exec(email);
   if(email == null || email == ""){
       document.getElementById("alertEmail").innerHTML = "Please input your Email";
       document.getElementById("ForSubmitEmail").value="0";
   }
   else if(mEmail == null){
       document.getElementById("alertEmail").innerHTML = "Example : example@email.com";
       document.getElementById("ForSubmitEmail").value="0";
   }else{
    xml1 = new XMLHttpRequest();
    xml1.onreadystatechange = Checknow1;
    var url="checkEmail.php?email="+email;
    xml1.open("GET", url);
    xml1.send();
    }
}

function Checknow1() {
    if (xml1.readyState == 4 && xml1.status == 200) {
        console.log(xml1.responseText);
        if(xml1.responseText == "fail"){
            console.log("fail");
            document.getElementById("alertEmail").innerHTML = "Email have been registered. Please retry.";
        }else{
            console.log("pass");
            document.getElementById("alertEmail").innerHTML = "";
            document.getElementById("ForSubmitEmail").value="1";
        }
    }
  
}
