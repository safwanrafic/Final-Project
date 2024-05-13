<?php

    require_once('../model/cart-model.php');
    require_once('../model/book-info-model.php');

    $bookID = $_GET['id'];
    $userID = $_COOKIE['id'];
    $row = getBookInfo($bookID);
    $price = $row['Price'];

    $status = addToCart($bookID, $userID, $price);
    if($status){

        header('location:../view/cart.php');

    } 

?>