<?php

    require_once('database.php');

    function getAllReviews($id){

        $con=  dbConnection();
        $sql = $con -> prepare ("select * from Review where BookID = ?");
        $sql -> bind_param("i", $id);
        $sql->execute();

        $result = $sql -> get_result();
        
        return $result;
        
    }

    function postReview($bookID, $userID, $review){

        $con = dbConnection();
        $sql = $con -> prepare ("insert into Review values('', ? ,? ,?)");
        $sql -> bind_param("sss", $bookID, $userID, $review);

        if($sql->execute()) return true;
        else return false;
        
    }

    function deleteReview($id){

        $con = dbConnection();
        $sql = $con -> prepare ("delete from Review where ReviewID = ?");
        $sql -> bind_param("i", $id);
             
        if($sql->execute()) return true;
        else return false; 

    }


?>