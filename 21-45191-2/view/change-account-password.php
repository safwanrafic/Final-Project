<?php
session_start();
if(!isset($_SESSION['login'])) header('location:sign-in.php?err=unauthorized');
    require_once('../Model/user-info-model.php');    
  
    $id = $_COOKIE['id'];
    $row = userInfo($id);

    $prevpasswordMsg = $passwordMsg = $cpasswordMsg = '';

    if (isset($_GET['err'])) {

    $err_msg = $_GET['err'];
    
    switch ($err_msg) {
        case 'prevpasswordEmpty': {
            $prevpasswordMsg = "Previous password can not be empty.";
            break;
        }
        case 'passwordEmpty': {
            $passwordMsg = "Password can not be empty.";
            break;
        }
        case 'cpasswordEmpty': {
            $cpasswordMsg = "Confirm password can not be empty.";
            break;
        }
        case 'passwordError': {
            $prevpasswordMsg = "Incorrect password.";
            break;
        }
        case 'invalid': {
            $passwordMsg = "Invalid password.";
            break;
        }
        case 'mismatch': {
            $cpasswordMsg = "Passwords do not match.";
            break;
        }
    }
    }

$success_msg = '';

if (isset($_GET['success'])) {

  $s_msg = $_GET['success'];

  switch ($s_msg) {
    case 'updated': {
        $success_msg = "Password successfully updated.";
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
    <title>Update Password</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<br>&nbsp;&nbsp;&nbsp;<a href="user-home.php">< Back</a><br><br><br><br><br>
    <table width="23%" border="0" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
                <form method="post" action="../controller/change-account-password-controller.php" novalidate autocomplete="off">
                    <h2>Update Password</h2>
                    <br><br>
                    Previous Password
                    <input type="password" name="prevpassword" size="43px">
                    <?php if (strlen($prevpasswordMsg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $prevpasswordMsg ?></font>
                    <?php } ?>
                    <br><br>
                    New Password
                    <input type="password" name="password" size="43px">
                    <?php if (strlen($passwordMsg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $passwordMsg ?></font>
                    <?php } ?>
                    <br><br>
                    Confirm New Password
                    <input type="password" name="cpassword" size="43px">
                    <?php if (strlen($cpasswordMsg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $cpasswordMsg ?></font>
                    <?php } ?>
                    <?php if (strlen($success_msg) > 0) { ?>
                        <br><br>
                        <font color="green" align="center"><?= $success_msg ?></font>
                    <?php } ?>
                    <br><br>
                    <button name="submit">Change Password</button>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>