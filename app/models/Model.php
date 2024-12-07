<?php 

class Model {
    protected $db;

    public function __construct() {
        $this->db = include_once __DIR__ . '/../core/db_config.php';
    }
}

?>