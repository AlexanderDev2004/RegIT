<?php 

require_once __DIR__ . '/../Model.php';

class BerandaModel extends Model {
    
    use BerandaTrait;

    public function getPelanggaranData() : array {
        return $this->getDataPelanggaranTrait($this->db);
    }

}

?>