var xmlHttp;

function checkMember(){
    xmlHttp = new XMLHttpRequest();
    var name = document.getElementById("name").value;
    var ssn = document.getElementById("ssn").value;
    var bdate = document.getElementById("birthdate").value;
    var url = "checkNameMember.php?name="+name+"&ssn="+ssn+"&bdate="+bdate;
    xmlHttp.open("GET", url);
    xmlHttp.onreadystatechange = getStatus;
    xmlHttp.send();
}

function getStatus(){
    if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
        if(xmlHttp.responseText == "fail"){
            console.log("fail");
         document.getElementById("alertR").innerHTML = "You have reigsted.";  
             document.getElementById("ForSubmitName").value="0";
        }else{
            console.log("pass");
             document.getElementById("alertR").innerHTML = "";  
            document.getElementById("ForSubmitName").value="1";
        }
    }
}