<?php
require_once '../controllers/AuthController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $data = $_POST; 
    $controller = new AuthController();
    $response = $controller->login($data);
    echo json_encode(['status' => 'success', 'msg' => $response]);
}
?> 
