<?php

    require_once('database.php');

    function getAllNotifications(){

        $con = dbConnection();
        $sql = "select * from Notification";

        $result = mysqli_query($con,$sql);

        return $result;

    }

    function clearNotifications(){

        $con = dbConnection();
        $sql = "delete from Notification";

        $result = mysqli_query($con,$sql);

        return $result;

    }


?>