var xml;
function CheckUser(){
  var username = document.getElementById("username").value;
//    var username = "owl";
    xml = new XMLHttpRequest();
    xml.onreadystatechange = Checknow;
    var url="checkUsername.php?username="+username;
    xml.open("GET", url);
    xml.send();
    
}
function Checknow() {
    if (xml.readyState == 4 && xml.status == 200) {
        console.log(xml.responseText);
        if(xml.responseText == "fail"){
            console.log("fail");
            document.getElementById("alertCheckUser").innerHTML = "Username have been registed. Please retry.";
        }else{
            console.log("pass");
             document.getElementById("alertCheckUser").innerHTML = "";
            document.getElementById("ForSubmitUsername").value="1";
        }
//     document.getElementById("demo").innerHTML = this.responseText;
    }
  
}