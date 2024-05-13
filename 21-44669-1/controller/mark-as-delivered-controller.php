<?php

    require_once('../model/order-info-model.php');

    if(isset($_GET['id'])){

        markAsDelivered($_GET['id']);
        header('location:../view/delivery-man-home.php');
        
    }

?>
