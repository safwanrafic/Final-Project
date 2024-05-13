<?php

function dbConnection(){

    $conn = mysqli_connect('localhost', 'root', '', 'OnlineBookStoreManagementSystem');
    return $conn;
    
}

?>