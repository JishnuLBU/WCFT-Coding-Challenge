<?php
require_once '../controllers/AdminController.php';

if (isset($_GET['firstName'])) { 
    $controller = new AdminController();
    $patients = $controller->getAllPatients($_GET['firstName']);
    echo json_encode($patients);
}
?>
