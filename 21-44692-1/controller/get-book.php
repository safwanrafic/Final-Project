<?php 
    require('../model/book-info-model.php');

    if(isset($_GET['title'])){
        $result =  searchBooks($_GET['title']);
        echo json_encode($result);
    }

?>