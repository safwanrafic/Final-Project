<?php

$error_msg = '';

if (isset($_GET['err'])) {

  $err_msg = $_GET['err'];
  
  switch ($err_msg) {
    case 'mismatch': {
        $error_msg = "Wrong username or password.";
        break;
      }
    case 'empty': {
        $error_msg = "Field(s) can not be empty.";
        break;
      }
    case 'unauthorized': {
        $error_msg = "You need to sign in first.";
        break;
      }
  }
}

$success_msg = '';

if (isset($_GET['success'])) {

  $s_msg = $_GET['success'];

  switch ($s_msg) {
    case 'created': {
        $success_msg = "Account creation successful. Please sign in.";
        break;
      }
    case 'changed': {
        $success_msg = "Password change successful. Please sign in.";
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
    <script src="js/sign-in.js"></script>
    <title>Sign In</title>
</head>
<body>
    <br><br><br>
    <center><h2>X bookstore</h2> </center>
  
    <br><br><br>
    <table width="21%" border="0" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
                <form method="post" action="../controller/sign-in-controller.php" novalidate autocomplete="off" onsubmit= "return isValid(this);">
                    <div><span>Email</span></div>
                    <input type="email" name="email" id="email" size="43px" onkeyup="checkEmail()">
                    <br><font color="red" id="emailError"></font><br>
                    <div><span>Password</span></div>
                    <input type="password" name="password" id="password" size="43px">
                    <br><font color="red" id="passwordError"></font><br>
                    <div align="right">
                        <a href="forgot-password.php">Forgot Password?</a>
                        <h1><h3 align=right></h3><a href="sign-up.php">Don't have an account?</a></h1>
                    </div>
                    <?php if (strlen($error_msg) > 0) { ?>
                        <br>
                        <font color="red" align="center"><?= $error_msg ?></font>
                        <br><br>
                    <?php } ?>
                    <?php if (strlen($success_msg) > 0) { ?>
                        <br>
                        <font color="green" align="center"><?= $success_msg ?></font>
                        <br><br>
                    <?php } ?>
                    <br><br>
                    <center><button size="25px" name="submit">Sign In</button></center>
                    </form>
            </td>
        </tr>
    </table>

</body>
</html>