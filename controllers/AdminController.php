<?php
require_once '../model/patient.php';

class AdminController {
    private $patientModel;

    public function __construct() {
        $this->patientModel = new Patient();
    }

    public function getAllPatients($firstName = null) { 
        return $this->patientModel->fetchAllPatients($firstName);
    }

    public function getPatientById($id) {
        return $this->patientModel->fetchPatientById($id);
    }
    public function getPatientQAById($id) {
        return $this->patientModel->fetchPatientQAById($id);
    }
    public function deletePatientById($id) {
        return $this->patientModel->deletePatientById($id);
    }
    

    public function updatePatient($data) { 
        return $this->patientModel->updatePatient($data);
    }

    public function deletePatient($id) {
        return $this->patientModel->deletePatient($id);
    }

    public function getSearchResult($firstName) { 
        return $this->patientModel->getSearchResult($firstName);
    }
}
?>
