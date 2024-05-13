<?php

    require_once('../model/user-info-model.php');
    require_once('../model/order-info-model.php');
    require_once('../model/cart-model.php');
            
    $id = $_COOKIE['id'];
    $row = userInfo($id);


    $password = $_POST['password'];

    if(empty($password)){
        header('location:../view/confirm-order.php?err=empty'); 
        exit();
    }

    if($password != $row['Password']){
        header('location:../view/confirm-order.php?err=mismatch'); 
        exit();
    }

    $address = $_POST['address'];
    $bill = getTotalBill($id);
    $orderDate = date("l, F jS Y");

    $status = createOrder($id, $address, $bill, $orderDate);
    if($status){

        clearCart($id);
        header('location:../view/confirm-order.php?success=confirmed');

    } 


?>