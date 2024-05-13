<?php

$fullnameMsg = $emailMsg = $phoneMsg =  $securityQuestionMsg =  $usernameMsg = $securityQuestionAnswerMsg = $passwordMsg =  $cpasswordMsg =  '';

if (isset($_GET['err'])) {

  $err_msg = $_GET['err'];
  
  switch ($err_msg) {
    case 'fullnameEmpty': {
        $fullnameMsg = "Fullname can not be empty.";
        break;
      }
    case 'phoneEmpty': {
        $phoneMsg = "Phone number can not be empty.";
        break;
      }
    case 'emailEmpty': {
        $emailMsg = "Email can not be empty.";
        break;
      }
    case 'securityQuestionEmpty': {
        $securityQuestionMsg = "Choose a security question.";
        break;
      }
    case 'securityQuestionAnswerEmpty': {
        $securityQuestionAnswerMsg = "Choose an answer.";
        break;
      }
    case 'usernameEmpty': {
        $usernameMsg = "Username can not be empty.";
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
    case 'fullnameInvalid': {
        $fullnameMsg = "Fullname is not valid.";
        break;
      }
    case 'phoneInvalid': {
        $phoneMsg = "Phone number is not valid.";
        break;
      }
    case 'emailInvalid': {
        $emailMsg = "Email is not valid.";
        break;
      }
    case 'emailExists': {
        $emailMsg = "Email already exists.";
        break;
      }
    case 'usernameInvalid': {
        $usernameMsg = "Username is not valid.";
        break;
      }
    case 'passwordInvalid': {
        $passwordMsg = "Password is not valid.";
        break;
      }
    case 'passwordMismatch': {
        $cpasswordMsg = "Passwords do not match.";
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
    <script src="javascript/script.js"></script>
    <title>Sign Up</title>
</head>
<body>
<br><br><br><br><br><br><br><br>
    <table width="21%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
                <form method="post" action="../controller/signup-controller.php" onsubmit="return isValid(this);">
                    <div><span>Fullname</span></div>
                    <input type="text" name="fullname" id="fullname" size="43px">
                    <?php if (strlen($fullnameMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $fullnameMsg ?></font>
                    <?php } ?>
                    <br><font color="red" id="fullnameError"></font><br>
                    <div><span>Phone</span></div>
                    <input type="text" name="phone" id="phone" size="43px">
                    <?php if (strlen($phoneMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $phoneMsg ?></font>
                    <?php } ?>
                    <br><font color="red" id="phoneError"></font><br>
                    <div><span>Email</span></div>
                    <input type="email" name="email" id="email" size="43px">
                    <?php if (strlen($emailMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $emailMsg ?></font>
                    <?php } ?>
                    <br><font color="red" id="emailError"></font><br>
                    <div><span>Username</span></div>
                    <input type="text" name="username" id="username" size="43px">
                    <?php if (strlen($usernameMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $usernameMsg ?></font>
                    <?php } ?>
                    <br><font color="red" id="usernameError"></font><br>
                    <div><span>Password</span></div>
                    <input type="password" name="password" id="password" size="43px">
                    <?php if (strlen($passwordMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $passwordMsg ?></font>
                    <?php } ?>
                    <br><font color="red" id="passwordError"></font><br>
                    <div><span>Confirm Password</span></div>
                    <input type="password" name="cpassword" id="cpassword" size="43px">
                    <?php if (strlen($cpasswordMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $cpasswordMsg ?></font>
                    <?php } ?>
                    <br><font color="red" id="confirmPasswordError"></font><br>
                    <div><span>Security Question</span> &nbsp;&nbsp;&nbsp;<font color="red">[ For Password Recovery ]</font></div>
                    <select name="securityq" id="securityq" width=800px>
                        <option disabled selected hidden value="Not Selected">Pick a Question</option>
                        <option value="What is the name of your first pet?">What is the name of your first pet?</option>
                        <option value="What is the name of your Webtech faculty?">What is the name of your Webtech faculty?</option>
                        <option value="What is your childhood nickname?">What is your childhood nickname?</option>
                    </select>
                    <?php if (strlen($securityQuestionMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $securityQuestionMsg ?></font>
                    <?php } ?>
                    <br><font color="red" id="securityQuestionError"></font><br>
                    <div><span>Answer</span></div>
                    <input type="text" name="securityqa" id="securityqa" size="43px">
                    <?php if (strlen($securityQuestionAnswerMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $securityQuestionAnswerMsg ?></font>
                    <?php } ?>
                    <br><font color="red" id="securityQuestionAnswerError"></font><br>
                    <a href=button><button class="btn search">Create Account</button></a>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>