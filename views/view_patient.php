<?php
require_once '../controllers/AdminController.php';

if (isset($_GET['id'])) { 
    $controller = new AdminController();
    $data['patient'] = $controller->getPatientById($_GET['id']);
    
    $data['patientQA'] = $controller->getPatientQAById($_GET['id']);
    echo json_encode($data);
    
}
?>
