<?php
    session_start();
    require_once('../model/user-info-model.php');

    if(isset($_POST['submit'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        if(strlen(trim($email)) == 0 || strlen(trim($password)) == 0){

            header('location:../view/sign-in.php?err=empty');
            return;

        }

        $status = login($email, $password);

        if($status!=false){

            $_SESSION["login"] = true;
            setcookie("id", $status['userID'], time()+99999999999, "/");
            header('location:../view/user-home.php');

        }else header('location:../view/sign-in.php?err=mismatch');
        
    }

?>