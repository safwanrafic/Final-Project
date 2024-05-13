function isValid(form) {

    let review = form.review.value;
    
    let flag = true;

    document.getElementById("reviewError").innerHTML = "";

    if (review === "") {
        document.getElementById("reviewError").innerHTML = "Review can not be empty.<br>";
        flag = false;
    }

    return flag;

}