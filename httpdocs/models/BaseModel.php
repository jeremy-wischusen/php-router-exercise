<?php
    /**
     * BaseModel Class Definition
     */

    namespace models;
    class BaseModel {
        public $id;

        public function createID() {
            $this->id = random_int(1, 99);
        }
    }