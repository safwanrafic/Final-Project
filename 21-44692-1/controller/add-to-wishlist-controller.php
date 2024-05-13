<?php

    require_once('../model/wishlist-model.php');

    if(isset($_GET['id'])){

        addToWishlist($_GET['id'], $_COOKIE["id"]);
        header('location:../view/wishlist.php');
        
    }

?>
