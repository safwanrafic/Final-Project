<?php

require_once '../htmlval/controller/controller.php';


$action = isset($_GET['action']) ? $_GET['action'] : 'login';

handleAction($action);

?>