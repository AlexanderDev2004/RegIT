<?php 

class DDetailPelanggaranController {
    private $idPelanggaran;
    
    public function __construct($idPelanggaran) {
        $this->idPelanggaran = $idPelanggaran;
    }

    public function index() {
        // Memuat file view untuk halaman beranda
        require_once './app/views/dosen/detailPelanggaran.php';
    }

}

?>