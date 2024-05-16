<?php

require_once __DIR__ . '/../config/database.php';

class PatientController
{
    private $conn;
    public function __construct()
    {
        $this->conn = getDatabaseConnection();
    }

    public function getQuestions()
    {
        $sql = "SELECT * FROM dbo.questions WHERE panel = 'Brief Pain Inventory (BPI)'";
        $stmt = sqlsrv_query($this->conn, $sql);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $items = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $items[] = $row;
        }

        sqlsrv_free_stmt($stmt);
        return $items;
    }
    public function getQuestionsByPatientId()
    {
        $sql = "SELECT * FROM dbo.questions WHERE panel = 'Brief Pain Inventory (BPI)'";
        $stmt = sqlsrv_query($this->conn, $sql);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $items = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $items[] = $row;
        }

        sqlsrv_free_stmt($stmt);
        return $items;
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
