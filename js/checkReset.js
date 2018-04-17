function checkReset(){
    var status = false;
    var checkPass = document.getElementById("checkpass").value;
    var checkCP = document.getElementById("checkcon").value;
    console.log(checkPass+"r"+checkCP);
    if(checkPass == "1" && checkCP == "1"){
        status = true;
        return status;
    }else{
        status = false;
        return status;
    }
}