<?php

    session_start();
    if(!isset($_SESSION['login'])) header('location:sign-in.php?err=unauthorized');

    require_once('../model/cart-model.php');
    require_once('../model/book-info-model.php');

    $result = cartInfo($_COOKIE["id"]);
    $flag = 0;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
<br>&nbsp;&nbsp;&nbsp;<a href="user-home.php">< Back</a><br><center><h2>Cart</h2></center><br>
    <?php 
        if(mysqli_num_rows($result)>0){
        echo"<table width=\"70%\" border=\"1\" cellspacing=\"0\" cellpadding=\"15\" align=\"center\">
        <tr>
            <td>
                Book Title
            </td>
            <td>
                Price
            </td>
            <td>
                Action
            </td>
            <br>
        </tr>";
            while($w=mysqli_fetch_assoc($result)){
                $id=$w['CartID'];
                $bookID=$w['BookID'];
                $bookInfo=getBookInfo($bookID);
                $title=$bookInfo['BookTitle'];
                $price=$bookInfo['Price'];
                echo "    
                <tr><td>$title</td>
                <td>$price</td>
                <td><a href=\"../controller/remove-from-cart-controller.php?id={$id}\">Remove from Cart</a></td>          
                </tr>";
            }
        }else{
            $flag = 1;
            echo"<table width=\"70%\" border=\"1\" cellspacing=\"0\" cellpadding=\"15\" align=\"center\">
            <tr>
                <td>
                    Book Title
                </td>
                <td>
                    Price
                </td>
                <td>
                    Action
                </td>
                <br>
            </tr>
            <tr>
                <td align=\"center\" colspan=\"3\">No books available at this moment</td>
            </tr>";
        }
    ?>
    </table>
    <br><br>
    <center><?php if($flag == 0) echo "<a href=\"confirm-order.php\">Confirm Order</a>"; ?></center>
</body>
</html>