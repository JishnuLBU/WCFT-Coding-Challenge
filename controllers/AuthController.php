<?php

require_once __DIR__ . '/../config/database.php';

class AuthController
{
    private $conn;
    public function __construct()
    {
        $this->conn = getDatabaseConnection();
    }

    public function login()
    { 
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $email = $_POST['email'];
        $password = $_POST['password'];        

        $sql = "SELECT password FROM users WHERE username = ?";
        $params = [$email];
        $stmt = sqlsrv_query($this->conn, $sql, $params);

        if ($stmt === false) {
            // Error handling for SQL query
            die(print_r(sqlsrv_errors(), true));
        }
        
        // Fetch the result
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        
        if ($row) {
            $hashedPassword = $row['password'];
        
            // Verify the password
            if (password_verify($password, $hashedPassword)) {
                // Password is correct, start a session
                 $_SESSION['email'] = $email;
                $redirect_url="admin_home.php";
                // Redirect to the dashboard or another authenticated page
                echo json_encode(array("success" => true, "message" => "Login successful","redirect_url" => $redirect_url));
                exit;
            } else {
                // Password is incorrect, redirect back to login page with error message
                header("Location: login.php?error=invalid_credentials");
                exit;
            }
        } else {
            // User not found, redirect back to login page with error message
            header("Location: login.php?error=user_not_found");
            exit;
        }
        
        // Close the SQL query
        sqlsrv_free_stmt($stmt);
        
    }
    public function insertPatientData($data)
    {
        $sql = "INSERT INTO patients (first_name, surname, date_of_birth, age, total_score) VALUES (?, ?, ?, ?, ?)";
        $params = [$data['firstName'], $data['surName'], $data['DateOfBirth'], $data['age'], $data['totalScore']];
        $stmt = sqlsrv_query($this->conn, $sql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        // Retrieve the new patient ID within the same scope
        $sql = "SELECT IDENT_CURRENT('patients') AS id";
        $stmt = sqlsrv_query($this->conn, $sql);
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
        if (sqlsrv_fetch($stmt)) {
            $patient_id = sqlsrv_get_field($stmt, 0);
        }

        sqlsrv_free_stmt($stmt);

        $sql = "SELECT id FROM questions WHERE panel = 'Brief Pain Inventory (BPI)'";
        $stmt = sqlsrv_query($this->conn, $sql);
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $question_id = $row['id'];
            $score = $data['question_' . $question_id];

            $sql_insert = "INSERT INTO patient_responses (patient_id, question_id, score) VALUES (?, ?, ?)";
            $params_insert = [$patient_id, $question_id, $score];
            $stmt_insert = sqlsrv_query($this->conn, $sql_insert, $params_insert);

            if ($stmt_insert === false) {
                die(print_r(sqlsrv_errors(), true));
            }
            sqlsrv_free_stmt($stmt_insert);
        }

        sqlsrv_free_stmt($stmt);

        return "Form submitted successfully!";
    }

    public function __destruct()
    {
        sqlsrv_close($this->conn);
    }
}
