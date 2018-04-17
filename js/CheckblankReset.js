
function checkBlank(){
    var newpassword = document.getElementById("newpassword").value;
    console.log(newpassword);
    if(newpassword == ""){
        document.getElementById("blank").innerHTML = "Please input new password";
        document.getElementById("checkpass").value = "0";
    }else{
        document.getElementById("blank").innerHTML = "";
    }
console.log(document.getElementById("checkpass").value);
}
