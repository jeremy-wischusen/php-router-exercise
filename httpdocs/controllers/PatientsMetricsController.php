<?php
    /**
     * PatientsMetricsController Class Definition
     */

    namespace controllers;

    use models\PatientMetricsModel;
    use stdClass;

    class PatientsMetricsController implements ICRUDController {
        public function create($params) {
            [
                $patientID,
            ] = $params;
            $body = file_get_contents('php://input');
            $data = json_decode($body);
            $metrics = new PatientMetricsModel();
            $metrics->patientID = $patientID;
            $metrics->id = $data->metric;
            echo json_encode($metrics);
        }

        public function delete($params) {
            $r = new stdClass();
            $r->deleted = $params[1];
            echo json_encode($r);
        }

        public function execute($params) {
            $paramCount = count($params);
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'GET':
                    if ($paramCount > 1) {
                        $this->get($params);
                    } else {
                        $this->index($params);
                    }
                    break;
                case 'POST':
                    $this->create($params);
                    break;
                case 'PATCH':
                    $this->update($params);
                    break;
                case 'DELETE':
                    $this->delete($params);
                    break;
            }
        }

        public function get($params) {
            [
                $patientID,
                $metricID
            ] = $params;
            $metrics = new PatientMetricsModel();
            $metrics->patientID = $patientID;
            $metrics->id = $metricID;
            echo json_encode($metrics);
        }

        public function index($params) {
            [$patientID] = $params;
            $metrics = [];
            $i = 3;
            while ($i) {
                $metric = new PatientMetricsModel();
                $metric->patientID = $patientID;
                $metric->id = $metric->createRandomMetric();
                $metrics[] = $metric;
                $i--;
            }
            echo json_encode($metrics);
        }

        public function update($params) {
            $body = file_get_contents('php://input');
            $data = json_decode($body);
            $metrics = new PatientMetricsModel();
            $metrics->patientID = $params[0];
            $metrics->id = $data->metric;
            echo json_encode($metrics);
        }
    }