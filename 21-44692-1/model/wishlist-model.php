<?php

    require_once('database.php');

    function addToWishlist($bookID, $userID){

        $con = dbConnection();
        $sql = $con -> prepare ("insert into Wishlist values('', ?, ?)");
        $sql -> bind_param("ss", $bookID, $userID);

        if($sql -> execute()) return true;
        else return false;
        
    }

    function getWishlist($id){

        $con = dbConnection();
        $sql = "select * from Wishlist where UserID='$id'";

        $result = mysqli_query($con,$sql);

        return $result;
        
    }

    function removeFromWishlist($id){

        $con = dbConnection();
        $sql = "delete from Wishlist where WishlistID = '$id'";

        $result = mysqli_query($con,$sql);

        return $result;
        
    }

?>