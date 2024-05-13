<?php

require_once('../model/user-info-model.php');

session_start();


    $mail = $_SESSION['mail'];
    $row = getUserByMail($mail); 
    $id = $row['UserID'];
    $answer = $_POST['answer'];
    $canswer = $row['SecurityQuestionAnswer'];
    
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if(empty($_POST['answer'])){
        header('location:../view/change-password.php?err=empty');
        exit();
    }

    if($answer != $canswer){
        header('location:../view/change-password.php?err=answerError');
        exit();
    }

    if(strlen($password)<8){
        header('location:../view/change-password.php?err=invalid');
        exit();
    }

    if($password!=$cpassword){
        header('location:../view/change-password.php?err=mismatch');
        exit();
    }

    else{
        if(changePassword($id, $password) === true){
            header('location:../view/sign-in.php?success=changed');
            exit();
        }
    }
    

?>