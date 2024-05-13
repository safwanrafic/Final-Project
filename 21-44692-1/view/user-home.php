<?php

    session_start();
    if(!isset($_SESSION['login'])) header('location:sign-in.php?err=unauthorized');

    require_once('../model/user-info-model.php');
    require_once('../model/book-info-model.php');

    $result = getAllBooks();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css"/>
    <script src="js/user-home.js"></script>
    <title>User</title>
</head>
<body>
    <table border=0 cellspacing=50 cellpading=5 width=100% align="center">
        <tr>
            <td>
            <table border=1 cellspacing=0 cellpading=5 width=60% align="left">
                <tr>
                    <td align="left">
                        <ul>
                            <li><a href="view-profile.php">View Profile</a></li>
                            <li><a href="edit-profile-info.php">Edit Profile Info</a></li>
                            <li><a href="change-account-password.php">Change Password</a></li>
                            <li><a href="wishlist.php">Wishlist</a></li>
                            <li><a href="cart.php">Cart</a></li>
                            <li><a href="order-history.php">Order History</a></li>
                            <li><a href="../controller/logout-controller.php">Logout</a></li>
                        </ul>
                    </td>
                </tr>
            </table>
            </td>
            <td>
            <center><input type="text" id="search" placeholder="Search..." size=60 onkeyup="searchBooks()"></center>
            <center><h2>List of Books</h2></center>
                <table width="100%" border="1" cellspacing="0" cellpadding="15" align="center" id="book-table">
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
            <?php 
                if(mysqli_num_rows($result)>0){
                    while($w=mysqli_fetch_assoc($result)){
                        $bookID=$w['BookID'];
                        $title=$w['BookTitle'];
                        $author=$w['Author'];
                        echo "
                        <tr><td>$title</td>
                        <td>$author</td>
                        <td><a href=\"book-page.php?id={$bookID}\">Read Online</a></td>          
                        </tr>";
                    }
                }else{
                    echo"
                    <tr>
                        <td align=\"center\" colspan=\"3\">No books available at this moment</td>
                    </tr>
                    </table>";
                }
            ?>
            </td>
        </tr>
    </table>
    
</body>
</html>