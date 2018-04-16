var xmlHttp;

function checkForget(){
    xmlHttp = new XMLHttpRequest();
    var username = document.getElementById("username").value;
    var url = "checkForgetpass.php?username="+username;
    xmlHttp.open("GET", url);
    xmlHttp.onreadystatechange = getStatus;
    xmlHttp.send();
}

function getStatus(){
    var username = document.getElementById("username").value;
    if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
        if(xmlHttp.responseText == "pass"){
           console.log("pass");
           document.getElementById("alert").innerHTML = "";
           document.getElementById("forget").value = "1";
        }else if(xmlHttp.responseText == "fail"){
             document.getElementById("alert").innerHTML = "กรุณากรอก username ที่ถูกต้อง";
             document.getElementById("forget").value = "0";
        }else{
            document.getElementById("alert").innerHTML = "กรุณากรอก username";
            document.getElementById("forget").value = "0";
        }
        console.log(document.getElementById("forget").value);
    }
    if(document.getElementById("forget").value = "1"){
        window.location.href = "question.php?username=" + username;
    }
}