<?php
require_once '../controllers/AdminController.php';
if (isset($_POST['firstName'])) { 
    $controller = new AdminController();
    $patients= $controller->getAllPatients($_POST['firstName']);
    echo json_encode($patients);
}
?>
