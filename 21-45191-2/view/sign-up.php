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
    <link rel="stylesheet" href="css/style.css"/>
    <title>Sign Up</title>
</head>
<body>
<!--action="../controller/sign-up-controller.php"-->
<br>&nbsp;&nbsp;&nbsp;<a href="sign-in.php">< Back</a><br><br><br>
    <table width="21%" border="0" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
                <form id="signUpForm">
                    <div><span>Fullname</span></div>
                    <input type="text" name="fullname" size="43px" placeholder="Please enter your full name">
                    <?php if (strlen($fullnameMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $fullnameMsg ?></font>
                    <?php } ?>
                    <br><br>
                    <div><span>Phone</span></div>
                    <input type="text" name="phone" size="43px" placeholder="Please enter your phone number">
                    <?php if (strlen($phoneMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $phoneMsg ?></font>
                    <?php } ?>
                    <br><br>
                    <div><span>Email</span></div>
                    <input type="email" name="email" size="43px" placeholder="Please enter your email">
                    <?php if (strlen($emailMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $emailMsg ?></font>
                    <?php } ?>
                    <br><br>
                    <div><span>Username</span></div>
                    <input type="text" name="username" size="43px" placeholder="Please enter your username">
                    <?php if (strlen($usernameMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $usernameMsg ?></font>
                    <?php } ?>
                    <br><br>
                    <div><span>Password</span></div>
                    <input type="password" name="password" size="43px" placeholder="Please enter a password">
                    <?php if (strlen($passwordMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $passwordMsg ?></font>
                    <?php } ?>
                    <br><br>
                    <div><span>Confirm Password</span></div>
                    <input type="password" name="cpassword" size="43px" placeholder="Please re-enter your password">
                    <?php if (strlen($cpasswordMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $cpasswordMsg ?></font>
                    <?php } ?>
                    <br><br>
                    <div><span>Security Question</span> &nbsp;&nbsp;&nbsp;</div>
                    <select name="securityq" width=800px>
                        <option disabled selected hidden value="Not Selected">Pick a Question</option>
                        <option value="What is your favourite color?">What is your favourite color?</option>
                        <option value="What is the name of your high school best friend?">What is the name of your high school best friend?</option>
                        <option value="What is your childhood nickname?">What is your childhood nickname?</option>
                    </select>
                    <?php if (strlen($securityQuestionMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $securityQuestionMsg ?></font>
                    <?php } ?>
                    <br><br>
                    <div><span>Answer</span></div>
                    <input type="text" name="securityqa" size="43px" placeholder="Please enter your answer">
                    <?php if (strlen($securityQuestionAnswerMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $securityQuestionAnswerMsg ?></font>
                    <?php } ?>
                    <br><br>
                    <input type="submit" name="submit" value="Sign Up">
                </form>
            </td>
        </tr>
    </table>
<Script>
  document.getElementById('signUpForm').addEventListener('submit', function(e) {
    e.preventDefault();
    var form = new FormData(this);

    if(form.get('fullname').length === 0) {
      alert('Fullname can not be empty.');
      return;
    }
    
    if(form.get('phone').length === 0) {
      alert('Phone number can not be empty.');
      return;
    }

    if(form.get('email').length === 0) {
      alert('Email can not be empty.');
      return;
    }

    if(form.get('securityq') === 'Not Selected') {
      alert('Choose a security question.');
      return;
    }

    if(form.get('securityqa').length === 0) {
      alert('Choose an answer.');
      return;
    }

    if(form.get('username').length === 0) {
      alert('Username can not be empty.');
      return;
    }

    if(form.get('password').length === 0) {
      alert('Password can not be empty.');
      return;
    }

    if(form.get('cpassword').length === 0) {
      alert('Confirm password can not be empty.');
      return;
    }

    if(form.get('password') !== form.get('cpassword')) {
      alert('Passwords do not match.');
      return;
    }

    if(form.get('securityq') === 'Not Selected') {
      alert('Choose a security question.');
      return;
    }

    if(form.get('securityqa').length === 0) {
      alert('Choose an answer.');
      return;
    }

    let names = form.get('fullname').split(' ');    

    //console.log(names);
    if(names.length<2){
      alert('Fullname is not valid.');
      return;
    }

    if(!/^[a-zA-Z-' ]*$/.test(form.get('fullname'))){
      alert('Fullname is not valid.');
      return;
    }

    if(form.get('phone')[0] !== "0" || form.get('phone')[1] !== "1" || form.get('phone').length !== 11 || form.get('phone').match(/\D/)){
      alert('Phone number is not valid.');
      return;
    }

    let email = form.get('email');

    if(!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)){
      alert('Email is not valid.');
      return;
    }

    if(!/^[a-zA-Z-' ]*$/.test(form.get('username'))){
      alert('Username is not valid.');
      return;
    }

    if(form.get('password').length < 8){
      alert('Password is not valid.');
      return;
    }

    fetch('../controller/sign-up-controller.php', {
      method: 'POST',
      body: form,
      redirect: 'follow'
    }).then(response => {
      console.log(response);
      if(response.redirected) {

        window.location.href = response.url;
      }
    });
  });
</Script>
  
</body>
</html>