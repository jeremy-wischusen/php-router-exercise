<?php
    /**
     * User: Jeremy Wischusen
     */
    include_once __DIR__ . '/../httpdocs/models/BaseModel.php';
    include_once __DIR__ . '/../httpdocs/models/PatientMetricsModel.php';

    use PHPUnit\Framework\TestCase;
    use models\PatientMetricsModel;

    class PatientMetricsModelTest extends TestCase {
        public function testCreateRandomMetric() {
            $model = new PatientMetricsModel();
            $metric = $model->createRandomMetric();
            $this->assertEquals(3, strlen($metric), 'Metric string length should be 3.');
        }
    }
