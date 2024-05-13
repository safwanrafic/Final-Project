<?php

    require_once('database.php');

    function getAllBooks(){

        $con = dbConnection();
        $sql = "select * from BookInfo";

        $result = mysqli_query($con, $sql);

        return $result;

    }

    function getBookInfo($id){

        $con = dbConnection();
        $sql = "select * from BookInfo where BookID='$id'";

        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);

        return $row;
        
    }

    function searchBooks($title){
 
        $con = dbConnection();
        $sql = "select * from bookinfo where booktitle like '%{$title}%';";
 
        $result = mysqli_query($con,$sql);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

?>