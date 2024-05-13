<?php 

    require_once('../model/user-info-model.php');

    function sanitize($data){

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;

    }

    $fullname = sanitize($_POST['fullname']);
    $email = sanitize($_POST['email']);
    $phone = sanitize($_POST['phone']);
    $securityQuestion = sanitize($_POST['securityq']);
    $securityQuestionAnswer = sanitize($_POST['securityqa']);
    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);
    $cpassword = sanitize($_POST['cpassword']);
    $role = "Delivery Man";

    if(empty($fullname)){
        header('location:../View/signup.php?err=fullnameEmpty'); 
        exit();
    }
    if(empty($phone)){
        header('location:../View/signup.php?err=phoneEmpty'); 
        exit();
    }
    if(empty($email)){
        header('location:../View/signup.php?err=emailEmpty'); 
        exit();
    }
    if(empty($username)){
        header('location:../View/signup.php?err=usernameEmpty'); 
        exit();
    }
    if(empty($password)){
        header('location:../View/signup.php?err=passwordEmpty'); 
        exit();
    }
    if(empty($cpassword)){
        header('location:../View/signup.php?err=cpasswordEmpty'); 
        exit();
    }
    if(empty($securityQuestion)){
        header('location:../View/signup.php?err=securityQuestionEmpty'); 
        exit();
    }
    if(empty($securityQuestionAnswer)){
        header('location:../View/signup.php?err=securityQuestionAnswerEmpty'); 
        exit();
    }

    $namepart = explode(' ', $fullname);
    if(count($namepart) < 2) {
        header('location:../View/signup.php?err=fullnameInvalid'); 
        exit();
    }
    if(!preg_match("/^[a-zA-Z-' ]*$/",$fullname)) {
        header('location:../View/signup.php?err=fullnameInvalid'); 
        exit();
    }
    if($phone[0] == "0" && $phone[1] == "1") {}
    else{
        header('location:../View/signup.php?err=phoneInvalid'); 
        exit();
    }
    if(is_numeric($phone)){
        if(strlen($phone)==11){}
        else {
            header('location:../View/signup.php?err=phoneInvalid'); 
            exit();
        }
    }
    else {
        header('location:../View/signup.php?err=phoneInvalid'); 
        exit();
    }
    

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header('location:../View/signup.php?err=emailInvalid'); 
        exit();
    }
    if(uniqueEmail($email)==false){
        header('location:../View/signup.php?err=emailExists'); 
        exit();
    }
    if (!preg_match("/^[a-zA-Z-']*$/", $username)){
        header('location:../View/signup.php?err=usernameInvalid'); 
        exit();
    } 

    if (strlen($password) < 8){
        header('location:../View/signup.php?err=passwordInvalid'); 
        exit();
    }
    if ($password != $cpassword){
        header('location:../View/signup.php?err=passwordMismatch'); 
        exit();
    }
    
    
    $status = signup($fullname, $phone, $email, $username, $password, $securityQuestion, $securityQuestionAnswer, $role);
    if($status) header('location:../view/login.php?success=created');

?>