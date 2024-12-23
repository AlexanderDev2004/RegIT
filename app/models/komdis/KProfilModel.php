<?php
class KProfilModel {
    private $db;

    public function __construct() {
        // Asumsikan $this->db adalah koneksi database
        $this->db = new mysqli('localhost', 'username', 'password', 'database');
        
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function getProfilByNIP($nip) {
        $query = "SELECT * FROM komdis WHERE nip = '$nip'";
        return $this->db->query($query);
    }
}
?>