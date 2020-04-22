<?php
    /**
     * PatientsController Class Definition
     */

    namespace controllers;

    use models\PatientModel;
    use stdClass;

    class PatientsController implements ICRUDController {
        public function create($params) {
            $body = file_get_contents('php://input');
            $data = json_decode($body);
            $model = new PatientModel();
            $model->firstName = $data->firstName;
            $model->lastName = $data->lastName;
            $model->createID();
            echo json_encode($model);
        }

        public function delete($params) {
            [$id] = $params;
            $r = new stdClass();
            $r->deleted = $id;
            echo json_encode($r);
        }

        public function execute($params) {
            $paramCount = count($params);
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'GET':
                    if ($paramCount > 0) {
                        $this->get($params);
                    } else {
                        $this->index();
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
            [$id] = $params;
            $model = new PatientModel();
            $model->id = $id;
            $model->firstName = 'Fake';
            $model->lastName = 'Patient';
            echo json_encode($model);
        }

        public function index($params = NULL) {
            $patients = [];
            $create = 10;
            while ($create) {
                $m = new PatientModel();
                $m->firstName = 'Fake' . $create;
                $m->lastName = 'Patient';
                $m->id = $create;
                $create--;
                $patients[] = $m;
            }
            echo json_encode($patients);
        }

        public function update($params) {
            [$id] = $params;
            $body = file_get_contents('php://input');
            $data = json_decode($body);
            $model = new PatientModel();
            $model->firstName = $data->firstName;
            $model->lastName = $data->lastName;
            $model->id = $id;
            echo json_encode($model);
        }
    }