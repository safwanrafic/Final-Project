<?php

    require_once('database.php');


    function createOrder($userID, $address, $bill, $orderDate){

        $con = dbConnection();
        $sql = "insert into OrderInfo values('', '{$userID}' ,'{$address}' , {$bill}, '{$orderDate}')";

        if(mysqli_query($con, $sql)) return true;
        else return false;
        
    }

    function getOrderHistory($id){

        $con = dbConnection();
        $sql = "select * from OrderInfo where UserID = '{$id}';";
    
        $result = mysqli_query($con,$sql);
        return $result;

    }

?>