function isValid(form) {

    let address = form.address.value;
    let password = form.password.value;
    
    let flag = true;

    document.getElementById("addressError").innerHTML = "";
    document.getElementById("passwordError").innerHTML = "";


    if (address === "") {
        document.getElementById("addressError").innerHTML = "Please enter your address.<br>";
        flag = false;
    }

    if (password === "") {
        document.getElementById("passwordError").innerHTML = "Please enter your password.<br>";
        flag = false;
    }

    return flag;

}