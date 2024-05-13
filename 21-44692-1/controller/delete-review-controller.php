<?php

    require_once('../model/review-model.php');

    $rid = $_GET['rid'];
    $id = $_GET['id'];


    $status = deleteReview($rid);
    if($status) header('location:../view/book-page.php?id='.$id);


?>