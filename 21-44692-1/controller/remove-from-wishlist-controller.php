<?php

    require_once('../model/wishlist-model.php');

    if(isset($_GET['id'])){

        removeFromWishlist($_GET['id']);
        header('location:../view/wishlist.php');
        
    }

?>
