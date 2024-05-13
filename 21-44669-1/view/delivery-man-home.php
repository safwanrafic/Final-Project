<?php

    session_start();
    if(!isset($_SESSION['login'])) header('location:login.php?err=unauthorized');

    require_once('../model/order-info-model.php');

    $result = getAllPendingOrders();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css"/>
    <title>Delivery Man Home</title>
</head>
<body>
    <table border=0 cellspacing=0 cellpadding=5 width=100%>
        <tr>
            <td align="left">
                <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;<a href="view-profile.php">View Profile</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;<a href="notification.php">Notification</a>
                </p>
            </td>
            
            <td align="right">
                <p><a href="../controller/logout-controller.php">Logout</a>&nbsp;&nbsp;&nbsp;&nbsp;</p>
            </td>
        </tr>
    </table>
    <?php 
        if(mysqli_num_rows($result)>0){
        echo"<table width=\"70%\" border=\"1\" cellspacing=\"0\" cellpadding=\"15\" align=\"center\">
        <tr>
            <td colspan=2 align=center>
                Pending Orders
            </td>
            <br>
        </tr>";
            while($w=mysqli_fetch_assoc($result)){
                $orderID=$w['OrderID'];
                $username=$w['Username'];
                $location=$w['Location'];
                $orderDate=$w['OrderDate'];
                echo "    
                <tr>
                    <td>$username has placed a new order on $orderDate. Location: $location.</td> 
                    <td><a href='../controller/mark-as-delivered-controller.php?id=$orderID'>Mark as delivered</a></td>       
                </tr>";
            }
        echo "</table>";
        }else{
            echo"<table width=\"70%\" border=\"1\" cellspacing=\"0\" cellpadding=\"15\" align=\"center\">
            <tr>
                <td align=center>
                Pending Orders
                </td>
                <br>
            </tr>
            <tr>
                <td align=\"center\">No pending orders.</td>
            </tr>";
        }
    ?>
</body>
</html>