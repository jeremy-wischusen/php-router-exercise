<?php
    /**
     * User: Jeremy Wischusen
     */

    /**
     * Class PatientsTest
     */
    class PatientsTest extends TestBase {
        public function testCreate() {
            $result = $this->makeRequest(
                'patients',
                'POST',
                json_encode(
                    [
                        "firstName" => "Fake",
                        "lastName" => "Patient"
                    ]
                )
            );
            $this->assertNotNull($result->id, 'Id should not be null.');
        }

        public function testDelete() {
            $result = $this->makeRequest(
                'patients/2',
                'DELETE'
            );
            $this->assertEquals('2', $result->deleted, 'Deleted ID was not expected value.');
        }

        public function testGetByID() {
            $result = $this->makeRequest(
                'patients/2',
                'GET'
            );
            $this->assertEquals('Fake', $result->firstName, 'Value for first name incorrect.');
            $this->assertEquals('Patient', $result->lastName, 'Value for last name incorrect.');
            $this->assertEquals('2', $result->id, 'IDs do not match.');
        }

        public function testPatients() {
            $result = $this->makeRequest(
                'patients',
                'GET'
            );
            $this->assertNotEmpty($result, 'A list of patients should have been returned.');
            $this->assertIsArray($result, 'An array should be returned.');
        }

        public function testUpdate() {
            $result = $this->makeRequest(
                'patients/2',
                'PATCH',
                json_encode(
                    [
                        "firstName" => "Patient",
                        "lastName" => "Fake"
                    ]
                )
            );
            $this->assertEquals('Patient', $result->firstName, 'Value for first name incorrect.');
            $this->assertEquals('Fake', $result->lastName, 'Value for last name incorrect.');
        }
    }
