<?php

    require_once('../model/cart-model.php'); 

    $id = $_COOKIE['id'];


    $error_msg = '';

    if (isset($_GET['err'])) {

    $err_msg = $_GET['err'];

    switch ($err_msg) {
        case 'empty': {
            $error_msg = "Please enter your password first.";
            break;
        }
        case 'mismatch': {
            $error_msg = "Wrong password.";
            break;
        }
    }
    }

    $success_msg = '';

    if (isset($_GET['success'])) {

    $s_msg = $_GET['success'];

    switch ($s_msg) {
        case 'confirmed': {
            $success_msg = "Your order has been confirmed.";
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
    <script src="js/confirm-order.js"></script>
    <title>Confirm Order</title>
</head>
<body>
<br>&nbsp;&nbsp;&nbsp;<a href="cart.php">< Back</a><br><br><br><br><center><h2>Confirm Order</h2></center>
    <table width="35%" border="0" cellspacing="0" cellpadding="25" align="center">
        <tr>
        <td>
            <b>Total Bill : </b><?php echo getTotalBill($id); ?>
            <br><br>
            <form method="post" action="../controller/confirm-order-controller.php" onsubmit="return isValid(this);">
            Address <br>
            <input type="address" name="address" id="address"> <br><font color="red" id="addressError"></font><br><br>
            Enter Your Password To Confirm Order <br><br>
            <input type="password" name="password" id="password">
            <?php if (strlen($error_msg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $error_msg ?></font>
                    <?php } ?>
            <?php if (strlen($success_msg) > 0) { ?>
                        <br><br>
                        <font color="green" align="center"><?= $success_msg ?></font>
                    <?php } ?>
            <br><font color="red" id="passwordError"></font><br><br>
            <button>Confirm Order</button>
            </form>
        </td>
        </tr>
    </table>
</body>
</html>