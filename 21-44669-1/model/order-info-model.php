<?php

    require_once('database.php');

    function getAllPendingOrders(){

        $con = dbConnection();
        $sql = "select * from OrderInfo where Status='Pending'";

        $result = mysqli_query($con,$sql);

        return $result;

    }

    function markAsDelivered($id){

        $con=dbConnection();
        $sql = $con -> prepare ("update OrderInfo set Status = 'Delivered' where OrderID = ?");
        $sql -> bind_param("s", $id);

        if($sql -> execute()===true) return true;
        else return false; 
        
    }

?>