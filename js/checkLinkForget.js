function checkLinkForget(){
    checkForget();
    var forget = document.getElementById("forget").value;
    var status = false;
   
    if(forget == "1"){
        status = true;
        return status;
    }else{
        return status;
    }

    
}