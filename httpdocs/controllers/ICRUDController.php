<?php
    /**
     * ICRUDController Interface Definition
     */

    namespace controllers;
    interface ICRUDController {
        public function create($params);

        public function delete($params);

        public function execute($params);

        public function get($params);

        public function update($params);
    }