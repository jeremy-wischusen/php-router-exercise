<?php
    /**
     * PatientsMetricsModel Class Definition
     */

    namespace models;
    class PatientMetricsModel extends BaseModel {
        public $patientID;

        public function createRandomMetric() {
            $characters = 'abcdefghijklmnopqrstuvwxyz';
            $cLength = strlen($characters);
            $s = random_int(0, $cLength - 3);

            return substr($characters, $s, 3);
        }
    }