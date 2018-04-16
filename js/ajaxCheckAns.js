var xmlHttp;

function checkAnswer1(){
    xmlHttp = new XMLHttpRequest();
    var username = document.getElementById("username").value;
    var ans1 = document.getElementById("ans1").value;
    var url = "ans1.php?ans1="+ans1+"&username="+username;
    xmlHttp.open("GET", url);
    xmlHttp.onreadystatechange = getStatus1;
    xmlHttp.send();
}

function getStatus1(){
    if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
        if(xmlHttp.responseText == "0"){
           console.log("fail");
            document.getElementById("result1").value="0";
        }else{
            console.log("pass");
           document.getElementById("result1").value="1";
        }
    }
}

function checkAnswer2(){
    xmlHttp = new XMLHttpRequest();
    var username = document.getElementById("username").value;
    var ans2 = document.getElementById("ans2").value;
    var url = "ans2.php?ans2="+ans2+"&username="+username;
    xmlHttp.open("GET", url);
    xmlHttp.onreadystatechange = getStatus2;
    xmlHttp.send();
}

function getStatus2(){
    if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
        if(xmlHttp.responseText == "0"){
            console.log("fail");
            document.getElementById("result2").value="0";
        }else{
            console.log("pass");
            document.getElementById("result2").value = "1";
        }
    }
}

function checkAnswer3(){
    xmlHttp = new XMLHttpRequest();
    var username = document.getElementById("username").value;
    var ans3 = document.getElementById("ans3").value;
    var url = "ans3.php?ans3="+ans3+"&username="+username;
    xmlHttp.open("GET", url);
    xmlHttp.onreadystatechange = getStatus3;
    xmlHttp.send();
}

function getStatus3(){
    if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
        if(xmlHttp.responseText == "0"){
            console.log("fail");
            document.getElementById("result3").value="0";
        }else{
            console.log("pass");
             document.getElementById("result3").value="1";
        }
    }
}