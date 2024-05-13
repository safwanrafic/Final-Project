<?php

    session_start();
    //if(!isset($_SESSION['login'])) header('location:login.php?err=unauthorized');

    require_once('../model/user-info-model.php');
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css"/>
    <title>User</title>
</head>
<body>
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br><a href="view-profile.php">View Profile</a><br>
    <br><a href="edit-profile-info.php">Edit Profile Info</a><br>
    <br><a href="change-account-password.php">Change Password</a><br>
    <br><a href="../controller/logout-controller.php">Logout</a><br>
</body>
</html>