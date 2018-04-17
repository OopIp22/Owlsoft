var ansFalse = 0;
var xmlHttp;
function checkAnswer(){
    var status = false;
    var result1 = document.getElementById("result1").value;
    var result2 = document.getElementById("result2").value;
    var result3 = document.getElementById("result3").value;
    console.log(result1+"r"+result2+"r"+result3);
    if(result1 == "1" && result2 == "1" && result3 == "1"){
        document.getElementById("alertAns").innerHTML = "";
        status = true;
    }else{
        document.getElementById("alertAns").innerHTML = "Please answer the question correctly.";
        status = false;
        ansFalse=ansFalse+1;
    }
    if(ansFalse >= 3){
        disableMember();
        showModal();
        document.getElementById("submitAns").disabled = true;
    }
    console.log(ansFalse);
    return status;
}

function disableMember(){
    xmlHttp = new XMLHttpRequest();
    var username = document.getElementById("username").value;
    var url = "disableMember.php?username="+username;
    xmlHttp.open("GET", url);
    xmlHttp.onreadystatechange = getStatus;
    xmlHttp.send();
}

function getStatus(){
    if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
        if(xmlHttp.responseText == "0"){
           console.log("disable");
        }
    }
}

function showModal(){
    $('#myModal').modal('show');
}
