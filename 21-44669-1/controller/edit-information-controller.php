<?php 

    require_once('../model/user-info-model.php');

    function sanitize($data){

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;

    }

    $id = $_COOKIE['id'];
    $row=  userInfo($id);

    $fullname = sanitize($_POST['fullname']);
    $email = sanitize($_POST['email']);
    $phone = sanitize($_POST['phone']);
    $username = sanitize($_POST['username']);

    if(empty($fullname)){
        header('location:../view/edit-information.php?err=fullnameEmpty'); 
        exit();
    }
    if(empty($phone)){
        header('location:../view/edit-information.php?err=phoneEmpty'); 
        exit();
    }
    if(empty($email)){
        header('location:../view/edit-information.php?err=emailEmpty'); 
        exit();
    }
    if(empty($username)){
        header('location:../view/edit-information.php?err=usernameEmpty'); 
        exit();
    }

    $namepart = explode(' ', $fullname);
    if(count($namepart) < 2) {
        header('location:../view/edit-information.php?err=fullnameInvalid'); 
        exit();
    }
    if(!preg_match("/^[a-zA-Z-' ]*$/",$fullname)) {
        header('location:../view/edit-information.php?err=fullnameInvalid'); 
        exit();
    }

    if($phone[0] == "0" && $phone[1] == "1") {}
    else{
        header('location:../view/edit-information.php?err=phoneInvalid'); 
        exit();
    }
    if(is_numeric($phone)){
        if(strlen($phone)==11){}
        else {
            header('location:../view/edit-information.php?err=phoneInvalid'); 
            exit();
        }
    }
    else {
        header('location:../view/edit-information.php?err=phoneInvalid'); 
        exit();
    }
    

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header('location:../view/edit-information.php?err=emailInvalid'); 
        exit();
    }
    if($email != $row['Email'] && uniqueEmail($email)==false){
        header('location:../view/edit-information.php?err=emailExists'); 
        exit();
    }
    if (!preg_match("/^[a-zA-Z-']*$/", $username)){
        header('location:../view/edit-information.php?err=usernameInvalid'); 
        exit();
    }
    
    
    if(updateUserInfo($id, $fullname, $email, $phone, $username) === true){
        header('location:../view/edit-information.php?success=changed'); 
        exit();
    }


?>