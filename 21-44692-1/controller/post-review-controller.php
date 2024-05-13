<?php

    require_once('../model/review-model.php');

    $bookID = $_GET['id'];
    $userID = $_COOKIE['id'];
    $review = $_POST['review'];

    if(empty($review)){

        header('location:../view/book-page.php?err=empty&id='.$bookID);
        exit;

    }

    $status = postReview($bookID, $userID, $review);
    if($status) header('location:../view/book-page.php?success=posted&id='.$bookID);

?>