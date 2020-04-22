<?php
    /**
     * TestBase Class Definition
     */

    use PHPUnit\Framework\TestCase;

    class TestBase extends TestCase {
        protected $siteURL;

        /**
         * TestBase constructor.
         */
        public function __construct() {
            $this->siteURL = $_ENV['SITE_URL'];
            parent::__construct();
        }

        protected function createURL($path) {
            return $this->siteURL . $path;
        }

        public function makeRequest($path, $method = "GET", $data = NULL) {
            $url = $this->createURL($path);
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            if ($data !== NULL) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt(
                    $ch,
                    CURLOPT_HTTPHEADER,
                    array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($data)
                    )
                );
            }
            $exec = curl_exec($ch);

            return json_decode($exec);
        }
    }