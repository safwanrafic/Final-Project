<?php

    session_start();
    if(!isset($_SESSION['login'])) header('location:sign-in.php?err=unauthorized');

    require_once('../model/order-info-model.php');

    $result = getOrderHistory($_COOKIE["id"]);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
</head>
<body>
<br>&nbsp;&nbsp;&nbsp;<a href="user-home.php">< Back</a><br><center><h2>Order History</h2></center><br>
    <?php 
        if(mysqli_num_rows($result)>0){
        echo"<table width=\"70%\" border=\"1\" cellspacing=\"0\" cellpadding=\"15\" align=\"center\">
        <tr>
            <td>
                Order ID
            </td>
            <td>
                Amount
            </td>
            <td>
                Date
            </td>
            <br>
        </tr>";
            while($w=mysqli_fetch_assoc($result)){
                $id=$w['OrderInfoID'];
                $bill=$w['Bill'];
                $date=$w['OrderDate'];
                echo "    
                <tr><td>$id</td>
                <td>$bill</td>
                <td>$date</td>          
                </tr>";
            }
        }else{
            echo"<table width=\"70%\" border=\"1\" cellspacing=\"0\" cellpadding=\"15\" align=\"center\">
            <tr>
            <td>
                Order ID
            </td>
            <td>
                Amount
            </td>
            <td>
                Date
            </td>
                <br>
            </tr>
            <tr>
                <td align=\"center\" colspan=\"3\">No order history.</td>
            </tr>";
        }
    ?>
</body>
</html>