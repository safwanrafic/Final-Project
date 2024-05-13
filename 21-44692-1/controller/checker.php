<?php
include('../model/user-info-model.php');


$email = $_POST['email'];
if(isExistUser($email)) echo 'true';
else echo 'false';
    
?>