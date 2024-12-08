<?php
require_once __DIR__ . '/../Model.php'; 

class FromDosenModel extends Model {

    public function getFromDosen() {
        $sql = "SELECT * FROM from_dosen";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }
}