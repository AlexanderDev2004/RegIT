<?php

class ProfilDosenModel {
    private $db;

    public function __construct() {
        // Asumsikan $this->db adalah koneksi database
        $this->db = new mysqli('localhost', 'username', 'password', 'database');
        
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function getProfilDosenByNIP($nip) {
        $query = "SELECT * FROM dosen WHERE nip = '$nip'";
        return $this->db->query($query);
    }
}
?>
