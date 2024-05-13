<?php

    session_start();
    if(!isset($_SESSION['login'])) header('location:sign-in.php?err=unauthorized');

    require_once('../model/book-info-model.php');
    require_once('../model/user-info-model.php');
    require_once('../model/review-model.php');

    $bookInfo = getBookInfo($_GET['id']);
    $result = getAllReviews($_GET['id']);
    $userInfo = userInfo($_COOKIE['id']);

    $error_msg = '';

    if (isset($_GET['err'])) {

    $err_msg = $_GET['err'];

    switch ($err_msg) {
        case 'empty': {
            $error_msg = "Please type something first.";
            break;
        }
    }
    }

    $success_msg = '';

    if (isset($_GET['success'])) {

    $s_msg = $_GET['success'];

    switch ($s_msg) {
        case 'posted': {
            $success_msg = "Review posted.";
            break;
        }
    }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/book-page.js"></script>
    <title>Book Page</title>
</head>
<body>
<br>&nbsp;&nbsp;&nbsp;<a href="user-home.php">< Back</a>
    <table border="0" cellspacing="50" cellpading="50" width="100%" align="center">
        <tr>
            <td>
                <p align="right"><a href="../controller/add-to-wishlist-controller.php?id=<?php echo $bookInfo["BookID"] ?>">Add to Wishlist</a></p>
                <p align="right"><a href="../controller/add-to-cart-controller.php?id=<?php echo $bookInfo["BookID"] ?>">Add to Cart</a></p>
                <b>Book Title:</b> <?php echo $bookInfo["BookTitle"] ?> <br><br>
                <b>Author:</b> <?php echo $bookInfo["Author"] ?> <br><br>
                <b>Price:</b> <?php echo $bookInfo["Price"] ?> <br><br><br>
                <?php echo $bookInfo["Content"] ?>
            </td>
        </tr>
    </table>
    <br><br>
    <table border="0" cellspacing="50" cellpading="50" width="100%" align="center">
        <tr>
            <td>Reviews</td>
        </tr>
        <tr>
        <td>
            <?php 
                if(mysqli_num_rows($result)>0){
                    while($w=mysqli_fetch_assoc($result)){
                        $uid=$w['UserID'];
                        $rid=$w['ReviewID'];
                        $user = userInfo($uid);
                        $name = $user["Username"];
                        $review=$w['Review'];
                        echo "<b>{$name} : </b>
                        {$review}<br>" ?><?php
                        if($_COOKIE['id'] == $uid){
                            echo "<br><a href=\"../controller/delete-review-controller.php?rid={$rid}&id={$_COOKIE['id']}\">Delete Review</a><br><br>";
                        }
                        echo "<br>";
                    }
                }
            ?>
            <br>
            <form method="post" action="../controller/post-review-controller.php?id=<?php echo $_GET['id']; ?>"  onsubmit="return isValid(this);">
            <textarea rows="10" cols="53" name="review" id="review"></textarea><br><font color="red" id="reviewError"></font><br>
            <input type="submit" value="Post Review">
            </form>
            <?php if (strlen($error_msg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $error_msg ?></font>
                        <br>
                    <?php } ?>
            <?php if (strlen($success_msg) > 0) { ?>
                        <br><br>
                        <font color="green" align="center"><?= $success_msg ?></font>
                        <br>
                    <?php } ?>
        </td>
        </tr>
    </table>
</body>
</html>