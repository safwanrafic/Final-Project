<?php

$error_msg = '';

if (isset($_GET['err'])) {

  $err_msg = $_GET['err'];
  
  switch ($err_msg) {
    case 'notFound': {
        $error_msg = "Email does not exist in our database.";
        break;
      }
      case 'accessDenied': {
        $error_msg = "Please provide an email first.";
        break;
      }
    case 'empty': {
        $error_msg = "Email can not be empty.";
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
    <link rel="stylesheet" href="css/style.css"/>
    <script src="js/forgot-password.js"></script>
    <title>Forgot Password</title>
</head>
<body>
<br>&nbsp;&nbsp;&nbsp;<a href="sign-in.php">< Back</a><br><br><br><br><br><br>
    <table width="25%" border="0" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
                <form method="post" action="../Controller/forgot-password-controller.php" novalidate autocomplete="off" onsubmit="return isValid(this);">
                    <h2>Enter your email address to continue</h2> <br><br>
                    <div><span>Email</span></div>
                    <input type="email" name="email" size="43px">
                    <?php if (strlen($error_msg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $error_msg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="emailError"></font><br>
                    <button name="submit">Continue</button>
                </form>
            </td>
        </tr>
    </table>

</body>
</html>