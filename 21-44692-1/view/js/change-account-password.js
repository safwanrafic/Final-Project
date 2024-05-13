function isValid(form) {

    let prevpassword = form.prevpassword.value;
    let password = form.password.value;
    let cpassword = form.cpassword.value;
    
    let flag = true;

    document.getElementById("prevpasswordError").innerHTML = "";
    document.getElementById("passwordError").innerHTML = "";
    document.getElementById("cpasswordError").innerHTML = "";


    if (prevpassword === "") {
        document.getElementById("prevpasswordError").innerHTML = "Incorrect password.<br>";
        flag = false;
    }

    if (password === "") {
        document.getElementById("passwordError").innerHTML = "Please enter a new password.<br>";
        flag = false;
    }

    if (cpassword === "") {
        document.getElementById("cpasswordError").innerHTML = "Please re enter your password.<br>";
        flag = false;
    }

    return flag;

}