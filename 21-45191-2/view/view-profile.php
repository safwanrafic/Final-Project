<?php

    session_start();
    if(!isset($_SESSION['login'])) header('location:sign-in.php?err=unauthorized');
    
    require_once('../model/user-info-model.php'); 

    $id = $_COOKIE['id'];
    $row = userInfo($id);
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css"/>
    <title>View Profile</title>
</head>
<body>
<br>&nbsp;&nbsp;&nbsp;<a href="user-home.php">< Back</a><br><br><br><br><br>
    <table width="21%" border="0" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <?php

                echo "<td>
                    Fullname:  <br> {$row['Fullname']} <br><br>
                    Username:  <br> {$row['Username']} <br><br>
                    Phone:     <br> {$row['Phone']} <br><br>
                    Email:     <br> {$row['Email']} <br>
                </td>";

            ?>
        </tr>
    </table>
    <br><br>
</body>
</html>