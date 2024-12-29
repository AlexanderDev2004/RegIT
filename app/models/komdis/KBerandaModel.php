<?php 

require_once __DIR__ . '/../Model.php';
require_once __DIR__ . '/../Traits/BerandaTrait.php';

class KBerandaModel extends Model {
    
    use BerandaTrait;

    public function getPelanggaranData() : array {
        return $this->getDataPelanggaranTrait($this->db);
    }

}

?>