<?php

    session_start();
    if(!isset($_SESSION['login'])) header('location:login.php?err=unauthorized');
    
    require_once('../model/user-info-model.php'); 

    $id = $_COOKIE['id'];
    $row = userInfo($id);
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css"/>
    <title>View Information</title>
</head>
<body>
    <table border=0 cellspacing=0 cellpadding=5 width=100%>
        <tr>
            <td>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;<a href="view-profile.php">View Profile</a></p>
            </td>
            <td align="right">
            <p><a href="../controller/logout-controller.php">Logout&nbsp;</a></p>
            </td>
        </tr>
    </table>
    <table width="21%" border="1" cellspacing="0" cellpadding="25" align="center">
      
    <br><br>  <tr>
            <?php

                echo "<td>
                    Fullname : {$row['Fullname']} <br><br>
                    Username  : {$row['Username']} <br><br>
                    Phone     : {$row['Phone']} <br><br>
                    Email     : {$row['Email']} <br>
                </td>";

            ?>
        </tr>
    </table>
    <br><br><center><a href="edit-information.php">Edit Information</a></center>
</body>
</html>