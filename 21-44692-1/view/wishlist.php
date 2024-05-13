<?php

    session_start();
    if(!isset($_SESSION['login'])) header('location:sign-in.php?err=unauthorized');

    require_once('../model/wishlist-model.php');
    require_once('../model/book-info-model.php');

    $result = getWishlist($_COOKIE["id"]);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
</head>
<body>
<br>&nbsp;&nbsp;&nbsp;<a href="user-home.php">< Back</a><br><center><h2>Wishlist</h2></center><br>
    <?php 
        if(mysqli_num_rows($result)>0){
        echo"<table width=\"70%\" border=\"1\" cellspacing=\"0\" cellpadding=\"15\" align=\"center\">
        <tr>
            <td>
                Book Title
            </td>
            <td>
                Author
            </td>
            <td>
                Action
            </td>
            <br>
        </tr>";
            while($w=mysqli_fetch_assoc($result)){
                $id=$w['WishlistID'];
                $bookID=$w['BookID'];
                $bookInfo=getBookInfo($bookID);
                $title=$bookInfo['BookTitle'];
                $author=$bookInfo['Author'];
                echo "    
                <tr><td>$title</td>
                <td>$author</td>
                <td><a href=\"../controller/remove-from-wishlist-controller.php?id={$id}\">Remove from Wishlist</a></td>          
                </tr>";
            }
        }else{
            echo"<table width=\"70%\" border=\"1\" cellspacing=\"0\" cellpadding=\"15\" align=\"center\">
            <tr>
                <td>
                    Book Title
                </td>
                <td>
                    Author
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
</body>
</html>