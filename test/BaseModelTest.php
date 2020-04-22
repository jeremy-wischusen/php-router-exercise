<?php
    /**
     * User: Jeremy Wischusen
     */
    include_once __DIR__ . '/../httpdocs/models/BaseModel.php';

    use models\BaseModel;
    use PHPUnit\Framework\TestCase;

    class BaseModelTest extends TestCase {
        public function testCreateID() {
            $model = new BaseModel();
            $model->createID();
            $this->assertGreaterThanOrEqual(1, $model->id, 'Id should be greater or equal to 1.');
            $this->assertLessThanOrEqual(99, $model->id, 'Id should be less than or equal to 99.');
        }
    }
