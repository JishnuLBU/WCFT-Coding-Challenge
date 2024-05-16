<?php
require_once '../config/database.php';

class Patient {
    private $conn;

    public function __construct() {
        $this->conn = getDatabaseConnection();
    }
 
    public function fetchAllPatients($firstName) {
        $sql = "SELECT id, first_name, surname, FORMAT(date_of_birth, 'yyyy-MM-dd') AS formatted_date_of_birth, age, total_score, FORMAT(created_at, 'yyyy-MM-dd') AS formatted_created_at FROM patients";
        if ($firstName !== null) {
            $sql .= " WHERE first_name LIKE ?";
            $params[] = "%$firstName%";
        }
    
        $stmt = sqlsrv_query($this->conn, $sql);
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $patients = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $patients[] = $row;
        }

        return $patients;
    }
    public function fetchPatientQAById($id)
    {
        $sql = "select q.question_text, pr.score from patient_responses pr join questions q on pr.question_id=q.id where pr.patient_id = ?";
       
        $params = [$id];
        $stmt = sqlsrv_query($this->conn, $sql, $params);
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true)); 
        }

        $patientQA = null;
        if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $patientQA = $row;
        }
        return $patientQA;
    }
    public function fetchPatientById($id) {  
        $sql = "SELECT *,FORMAT(date_of_birth, 'yyyy-MM-dd') AS date_of_birth FROM patients WHERE id = ?";
       /* $sql = "SELECT q.*, pr.score
        FROM dbo.questions AS q
        JOIN patient_responses AS pr ON q.id = pr.question_id
        WHERE q.panel = 'Brief Pain Inventory (BPI)' AND pr.patient_id = ?";*/
        $params = [$id];
        $stmt = sqlsrv_query($this->conn, $sql, $params);
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true)); 
        }

        $patient = null;
        if ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $patient = $row;
        }
        return $patient;
        
    }

    public function updatePatient($data) {
        $sql = "UPDATE patients SET first_name = ?, surname = ?, date_of_birth = ?, age = ?, total_score = ? WHERE id = ?";
        $params = [$data['firstName'], $data['surName'], $data['dateOfBirth'], $data['age'], $data['totalScore'], $data['patientId']];
        $stmt = sqlsrv_query($this->conn, $sql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        return true;
    }

    public function deletePatient($id) {
        $sql = "DELETE FROM patients WHERE id = ?";
        $params = [$id];
        $stmt = sqlsrv_query($this->conn, $sql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        return true;
    }

    public function getSearchResult($firstName) { 
        $sql = "SELECT first_name FROM patients WHERE first_name like ?";
        $params = ["%$firstName%"];
        $stmt = sqlsrv_query($this->conn, $sql, $params);
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $patients = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $patients[] = $row;
        }

        return $patients; 
    }
}
?>
