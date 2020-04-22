<?php
    /**
     * User: Jeremy Wischusen
     */

    /**
     * Class PatientsMetricsTest
     */
    class PatientsMetricsTest extends TestBase {
        public function testCreate() {
            $result = $this->makeRequest(
                'patients/2/metrics',
                'POST',
                json_encode(
                    [
                        "metric" => "efg",
                    ]
                )
            );
            $this->assertEquals('efg', $result->id, 'Id is not expected value.');
        }

        public function testDelete() {
            $result = $this->makeRequest(
                'patients/2/metrics/abc',
                'DELETE'
            );
            $this->assertEquals('abc', $result->deleted, 'Deleted ID was not expected value.');
        }

        public function testGetByID() {
            $result = $this->makeRequest(
                'patients/2/metrics/abc',
                'GET'
            );
            $this->assertEquals('2', $result->patientID, 'Value for patient ID incorrect.');
            $this->assertEquals('abc', $result->id, 'Value for metric incorrect.');
        }

        public function testMetrics() {
            $result = $this->makeRequest(
                'patients/2/metrics',
                'GET'
            );
            $correctUser = TRUE;
            foreach ($result as $r) {
                if ($r->patientID !== '2') {
                    $correctUser = FALSE;
                    break;
                }
            }
            $this->assertTrue($correctUser, 'All results returned should have been for the same user.');
            $this->assertIsArray($result, 'Results should have been an array of metrics.');
            $this->assertNotEmpty($result, 'A list of metrics should have been returned.');
        }

        public function testUpdate() {
            $result = $this->makeRequest(
                'patients/2/metrics/abc',
                'PATCH',
                json_encode(
                    [
                        "metric" => "def",
                    ]
                )
            );
            $this->assertEquals('2', $result->patientID, 'Value for patient ID incorrect.');
            $this->assertEquals('def', $result->id, 'Value for metric incorrect.');
        }
    }
