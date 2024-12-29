<?php 

require_once __DIR__ . '/../traits/BerandaTrait.php';
require_once __DIR__ . '/../Model.php';

class MBerandaModel extends Model {
    
    use BerandaTrait;

    public function getPelanggaranData() : array {
        return $this->getDataPelanggaranTrait($this->db);
    }

}

?>