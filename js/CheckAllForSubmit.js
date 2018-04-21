function CheckAll(){
    var status = false;
    console.log("Working");
    checkBlankRegis();
    var fullname = document.getElementById("ForSubmitName").value;
    var ssn = document.getElementById("ForSubmitSSN").value;
    var img = document.getElementById("ForSubmitImg").value;
    var username = document.getElementById("ForSubmitUsername").value;
    var password = document.getElementById("ForSubmitPass").value;
    var Cpassword = document.getElementById("ForSubmitcPass").value;
    var date = document.getElementById("ForSubmitDate").value;
    var q1 = document.getElementById("ForSubmitQ1").value;
    var ans1 = document.getElementById("ForSubmitAns1").value;
    var q2 = document.getElementById("ForSubmitQ2").value;
    var ans2 = document.getElementById("ForSubmitAns2").value;
    var q3 = document.getElementById("ForSubmitQ3").value;
    var ans3 = document.getElementById("ForSubmitAns3").value;
    var email = document.getElementById("ForSubmitEmail").value;
    var accecpt = document.getElementById("policy").checked;
    
    console.log("fullname :"+fullname+"ssn :"+ssn+"img :"+img+"username :"+username+"password :"+password+"Cpassword :"+Cpassword+"date :"+date+"q1"+q1+"ans1"+ans1+"q2"+q2+"ans2"+ans2+"q3"+q3+"ans3"+ans3+"email :"+email+"accept"+accecpt);
     if (fullname == "1" && ssn  == "1" && img  == "1" && username  == "1" && password == "1" && Cpassword == "1" && date  == "1" && q1 == "1" && ans1 == "1" && q2 == "1" && ans2 == "1" && q3 == "1" && ans3 == "1" && email == "1" && accecpt == true){
         status=true;
        }else{
        status=false;
        }
        return status;
    
}
