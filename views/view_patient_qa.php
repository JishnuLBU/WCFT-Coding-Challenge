<?php
require_once '../controllers/AdminController.php';

if (isset($_GET['id'])) { 
    $controller = new AdminController();
    $patient = $controller->getPatientQAById($_GET['patientId']);
    $patient='abc';
    echo json_encode($patient);
}
?>
