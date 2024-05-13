function isValid(form) {

    let answer = form.answer.value;
    let password = form.password.value;
    let cpassword = form.cpassword.value;
    
    let flag = true;

    document.getElementById("answerError").innerHTML = "";
    document.getElementById("passwordError").innerHTML = "";
    document.getElementById("cpasswordError").innerHTML = "";


    if (answer === "") {
        document.getElementById("answerError").innerHTML = "Please enter your answer.<br>";
        flag = false;
    }

    if (password === "") {
        document.getElementById("passwordError").innerHTML = "Please enter your password.<br>";
        flag = false;
    }

    if (cpassword === "") {
        document.getElementById("cpasswordError").innerHTML = "Please re enter your password.<br>";
        flag = false;
    }

    return flag;

}