function checkName(){
    var name = document.getElementById("name").value;
            const nameregex = /^[A-Za-z]{1,}\s[A-Za-z]{1,}$/;
            let Fname = nameregex.exec(name);
            if(name == null || name == ""){
                document.getElementById("alertName").innerHTML = "Please input your name";
                document.getElementById("ForSubmitName").value="0";
            }else if(Fname == null){
                document.getElementById("alertName").innerHTML = "Incorrect name please retry again";
                document.getElementById("ForSubmitName").value="0";
            }else{
                document.getElementById("alertName").innerHTML = "";
                document.getElementById("ForSubmitName").value="1";
            }
}

function chcekSSN(){
    var ssn = document.getElementById("ssn").value;
    if(ssn.length == 13){
        var sum = 0;
        for(var i=0;i<12;i++){
            sum += parseFloat(ssn.charAt(i))*(13-i);
            if((11-sum%11)%10!=parseFloat(ssn.charAt(12))){
                document.getElementById("alertSSN").innerHTML = "Incorrect Identification number or Passport number";
                document.getElementById("ForSubmitSSN").value="0";
            }else{
                document.getElementById("alertSSN").innerHTML = "";
                document.getElementById("ForSubmitSSN").value="1";
            }
        }
    }else if(ssn == ""){
        document.getElementById("alertSSN").innerHTML = "Please input your Identification number or Passport number";
        document.getElementById("ForSubmitSSN").value="0";
    }else{
        const regexSSN = /^[A-Z]{1,2}[0-9]{6}/;
        let passport =regexSSN.exec(ssn);
        if(passport == null){
            document.getElementById("alertSSN").innerHTML = "Incorrect Identification number or Passport number";
            document.getElementById("ForSubmitSSN").value="0";
        }else{
            document.getElementById("alertSSN").innerHTML = "";
            document.getElementById("ForSubmitSSN").value="1";
        }
    }
}

function CheckImage(){
    var CimgSSN = document.getElementById("SSNimage").value;
    if(CimgSSN == null || CimgSSN == ""){
    document.getElementById("alertImgSSN").innerHTML = "Please choose your Image Identification number/Passport number to upload";
    document.getElementById("ForSubmitImg").value="0";
}else{
    document.getElementById("alertImgSSN").innerHTML = "";
    document.getElementById("ForSubmitImg").value="1";
}
}

function checkPassword(){
    let regex = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*_)(?=.*\-).{16,}/;
    var pass = document.getElementById("password").value;
    console.log("test");
    if(!pass.match(regex)){
        document.getElementById("blank").innerHTML = "Please Input Password 16 character in A-Z,a-z,0-9,_,-" ;
        document.getElementById("ForSubmitPass").value="0";
    }else if(pass == ""){
        document.getElementById("blank").innerHTML = "Please Input Password" ;
        document.getElementById("ForSubmitPass").value="0";
    }else{
         document.getElementById("blank").innerHTML = "";
        document.getElementById("ForSubmitPass").value="1";
    }
}

function checkMatchpass(){
    var pass = document.getElementById("password").value;
    var Cpass = document.getElementById("Conpassword").value;
    if(pass != Cpass){
       document.getElementById("blank1").innerHTML = "Confirm password don't match password";
        document.getElementById("ForSubmitcPass").value="0";
    }else{
         document.getElementById("blank1").innerHTML = "";
        document.getElementById("ForSubmitcPass").value="1";
    }
}

function checkBirthdate(){
    var date = document.getElementById("birthdate").value;
    if(date == "" || date == null){
        document.getElementById("b").innerHTML = "Please Select your birthdate";
        document.getElementById("ForSubmitDate").value="0";    
    }else{
    var d = date.split("-");
    var year = parseInt(d[0]);
    var month = parseInt(d[1]);
    var day = parseInt(d[2]);
    var full = new Date();
    
    var year1 = full.getFullYear() - year;
    var month1 = full.getMonth()+1 - month;
    var day1 = full.getDate() - day;
    console.log("day: "+day1);
    console.log("month: "+month1);
    console.log("year: "+year1);
    if(year1 > 20){
          document.getElementById("b").innerHTML = "";
          document.getElementById("ForSubmitDate").value="1";
    }
    else if(year1 == 20){
            if((day1 <= 0 || day1 >= 0) && month1 < 0){
                 console.log("if year = 20");
                 document.getElementById("b").innerHTML = "Your age must greater than 20 years old";
                 document.getElementById("ForSubmitDate").value="0";                           
            }else if((day1 <= 0 || day1 >= 0) && month1 >= 0){
            document.getElementById("b").innerHTML = "";
            document.getElementById("ForSubmitDate").value="1"; 
            }
    }
    else{
         document.getElementById("b").innerHTML = "Your age must greater than 20 years old";
         document.getElementById("ForSubmitDate").value="0";
    }
    }
}

function checkQ1(){
    var q1 = document.getElementById("sel1").value;
    console.log(q1);
    if(q1 == null || q1 == ""){
        document.getElementById("alertQ1").innerHTML = "Please Select Question";
        document.getElementById("ForSubmitQ1").value="0";
    }else{
        document.getElementById("alertQ1").innerHTML = "";
        document.getElementById("ForSubmitQ1").value="1";
    }
}

function checkAns1(){
    var ans1 = document.getElementById("Ans1").value;
    if(ans1 == null || ans1 == ""){
        document.getElementById("alertAns1").innerHTML = "Please input your answer";
        document.getElementById("ForSubmitAns1").value="0";
    }else{
        document.getElementById("alertAns1").innerHTML = "";
        document.getElementById("ForSubmitAns1").value="1";
    }
}

function checkQ2(){
    var q2 = document.getElementById("sel2").value;
    console.log(q2);
    if(q2 == null || q2 == ""){
        document.getElementById("alertQ2").innerHTML = "Please Select Question";
        document.getElementById("ForSubmitQ2").value="0";
    }else{
        document.getElementById("alertQ2").innerHTML = "";
        document.getElementById("ForSubmitQ2").value="1";
    }
}

function checkAns2(){
    var ans2 = document.getElementById("Ans2").value;
    if(ans2 == null || ans2 == ""){
        document.getElementById("alertAns2").innerHTML = "Please input your answer";
        document.getElementById("ForSubmitAns2").value="0";
    }else{
        document.getElementById("alertAns2").innerHTML = "";
        document.getElementById("ForSubmitAns2").value="1";
    }
}

function checkQ3(){
    var q3 = document.getElementById("sel3").value;
    if(q3 == null || q3 == ""){
        document.getElementById("alertQ3").innerHTML = "Please Select Question";
        document.getElementById("ForSubmitQ3").value="0";
    }else{
        document.getElementById("alertQ3").innerHTML = "";
        document.getElementById("ForSubmitQ3").value="1";
    }
}

function checkAns3(){
    var ans3 = document.getElementById("Ans3").value;
    if(ans3 == null || ans3 == ""){
        document.getElementById("alertAns3").innerHTML = "Please input your answer";
        document.getElementById("ForSubmitAns3").value="0";
    }else{
        document.getElementById("alertAns3").innerHTML = "";
        document.getElementById("ForSubmitAns3").value="1";
    }
}

function checkPolicy(){
    var checkBox = document.getElementById("policy");
    if(checkBox.checked == false){
         document.getElementById("ForSubmitPolicy").value="0";
         document.getElementById("alertPolicy").innerHTML = "Please accept policy";
    }else{
        document.getElementById("alertPolicy").innerHTML = "";
        document.getElementById("ForSubmitPolicy").value="1";
    }
}