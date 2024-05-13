<?php

    session_start();
    if(!isset($_SESSION['login'])) header('location:login.php?err=unauthorized');

    require_once('../model/notification-model.php');

    $result = getAllNotifications();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
</head>
<body>
<br><center><h2>Notification</h2></center><br>
    <?php 
        if(mysqli_num_rows($result)>0){
        echo"<table width=\"70%\" border=\"1\" cellspacing=\"0\" cellpadding=\"15\" align=\"center\">
        <tr>
            <td align=center>
                Notifications
            </td>
            <br>
        </tr>";
            while($w=mysqli_fetch_assoc($result)){
                $notification=$w['Notification'];
                echo "    
                <tr>
                    <td>$notification</td>     
                </tr>";
            }
        echo "</table><br><br><center><a href=\"../controller/clear-all-notification-controller.php\">Clear All</a></center>";
        }else{
            echo"<table width=\"70%\" border=\"1\" cellspacing=\"0\" cellpadding=\"15\" align=\"center\">
            <tr>
                <td align=center>
                    Notifications
                </td>
                <br>
            </tr>
            <tr>
                <td align=\"center\">No notifications yet.</td>
            </tr>";
        }
    ?>
</body>
</html>