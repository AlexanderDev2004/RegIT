<?php 

require_once __DIR__ . '/../Controller.php';

class KProfilController extends Controller {

    public function index() {
        // Memuat file view untuk halaman beranda
        require_once './app/views/komdis/profilKomdis.php';
    }

}

?>