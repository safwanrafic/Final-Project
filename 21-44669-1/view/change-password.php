<?php
require_once('../model/user-info-model.php');
session_start();
if(!isset($_SESSION['mail'])) header('location:forgot-password.php?err=accessDenied');
$row = getUserByMail($_SESSION['mail']);
$securityQuestion = $row['SecurityQuestion'];
$error_msg = '';

if (isset($_GET['err'])) {

  $err_msg = $_GET['err'];
  
  switch ($err_msg) {
    case 'empty': {
        $error_msg = "Enter an answer first.";
        break;
      }
    case 'answerError': {
        $error_msg = "Incorrect answer please try again.";
        break;
      }
    case 'invalid': {
        $error_msg = "Password is invalid.";
        break;
      }
    case 'mismatch': {
        $error_msg = "Passwords do not match.";
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
    <link rel="stylesheet" href="css/styles.css"/>
    <title>Change Password</title>
</head>
<body>
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    <table width="21%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
                <form method="post" action="../controller/change-password-controller.php" novalidate autocomplete="off">
                    <br>
                    <p>Answer this following question correctly in order to change your password.</p> <br><br>
                    <?php echo $securityQuestion; ?>
                    <br><br>
                    <div><span>Answer</span></div>
                    <input type="text" name="answer" size="43px">
                    <br><br>
                    <div><span>New Password</span></div>
                    <input type="password" name="password" size="43px">
                    <br><br>
                    <div><span>Confirm New Password</span></div>
                    <input type="password" name="cpassword" size="43px">
                    <?php if (strlen($error_msg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $error_msg ?></font>
                    <?php } ?>
                    <br><br>
                    <button name="submit">Change Password</button>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>