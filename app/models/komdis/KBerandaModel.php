<?php 

require_once __DIR__ . '/../Model.php';

class KBerandaModel extends Model {
    
    use BerandaTrait;

    public function getPelanggaranData() : array {
        return $this->getDataPelanggaranTrait($this->db);
    }

}

?>