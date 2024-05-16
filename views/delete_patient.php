<?php
require_once '../controllers/AdminController.php';
if (isset($_POST['id'])) { 
    
    $controller = new AdminController();
    $data = $controller->deletePatientById($_POST['id']);
    
    echo json_encode($data);
    
}
?>
