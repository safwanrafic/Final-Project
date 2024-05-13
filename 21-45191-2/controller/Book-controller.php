<?php 

    require_once('../model/user-info-model.php');

    function sanitize($data){

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;

    }

    $bookname = sanitize($_POST['bookname']);
    $catagories = sanitize($_POST['catagories']);
    $comment = sanitize($_POST['comment']);
    $writer = sanitize($_POST['writer']);
    $bookDescription = sanitize($_POST['writer']);
    $role = "Content writer";

    if(empty($bookname)){
        header('location:../View/Book.php?err=booknameEmpty'); 
        exit();
    }
    
    if(empty($writer)){
        header('location:../View/Book.php?err=writerEmpty'); 
        exit();
    }
    if(empty($bookDescription)){
        header('location:../View/Book.php?err=writerEmpty'); 
        exit();
    }
    if(empty($catagories)){
        header('location:../View/Book.php?err=catagoriesEmpty'); 
        exit();
    }
    if(empty($comment)){
        header('location:../View/Book.php?err=commentEmpty'); 
        exit();
    }

    $namepart = explode(' ', $bookname);
    if(count($namepart) < 2) {
        header('location:../View/Book.php?err=booknameInvalid'); 
        exit();
    }
    if(!preg_match("/^[a-zA-Z-' ]*$/",$bookname)) {
        header('location:../View/Book.php?err=booknameInvalid'); 
        exit();
    }
    
    if (!preg_match("/^[a-zA-Z-']*$/", $writer)){
        header('location:../View/Book.php?err=writerInvalid'); 
        exit();
    }
    if (!preg_match("/^[a-zA-Z-']*$/",$bookDescription)){
        header('location:../View/Book.php?err=writerInvalid'); 
        exit();
    } 

    $status = signup($bookname, $writer, $bookDescription, $catagories, $comment, $role);
    if($status) header('location:../view/sign-in.php?success=created');

?>