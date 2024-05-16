<?php
require_once '../controllers/AdminController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $data = $_POST; 
    $controller = new AdminController();
    $response = $controller->updatePatient($data);
    echo json_encode(['status' => 'success', 'msg' => $response]);
}
?>