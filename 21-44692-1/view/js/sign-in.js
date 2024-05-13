function isValid(form) {

    let email = form.email.value;
    let password = form.password.value;

    let flag = true;

    document.getElementById("emailError").innerHTML = "";
    document.getElementById("passwordError").innerHTML = "";

    if (email === "") {
        document.getElementById("emailError").innerHTML = "Please enter your email address.<br>";
        flag = false;
    }

    if (password === "") {
        document.getElementById("passwordError").innerHTML = "Please enter a password.<br>";
        flag = false;
    }

    return flag;

}


function checkEmail(){
    let email = document.getElementById('email').value;
    if(email.length == 0) {
        document.getElementById('emailError').innerHTML = "";
        return;
    }
    
    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../controller/checker.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('email='+email);

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText == 'false'){
                document.getElementById('emailError').innerHTML = "User not found";
            }
            else{
                document.getElementById('emailError').innerHTML = "";
            }
        }
    }
}
