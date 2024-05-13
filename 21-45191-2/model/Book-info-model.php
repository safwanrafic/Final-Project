<?php

    require_once('database.php');

    $row;

    function addbook($bookname, $bookDescription, $writer, $catagories, $comment, $role){

        $con = dbConnection();
        $sql = $con -> prepare ("insert into BookInfo values('', ?, ?, ?, ?, ?, ?)");
        $sql -> bind_param("ssssssss", $bookname, $bookDescription, $writer, $catagories, $comment, $role);

        if($sql -> execute()) return true;
        else return false;
        
    }
    
    function bookInfo($id){

        $con=dbConnection();
        $sql="select* from BookInfo where BookID='$id'";

        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);

        return $row;
        
    }

    function updateBookInfo($id, $bookname, $writer, $bookDescription){

        $con = dbConnection();
        $sql = $con -> prepare ("update BookInfo set bookname = ?, bookDescription =?, writer =?, where bookID = ?");
        $sql -> bind_param("sssss", $bookname, $bookDescription, $writer, $id);

        if($sql -> execute()===true) return true;
        else return false; 
        
    }


?>