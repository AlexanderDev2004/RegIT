<?php 

require_once __DIR__ . '/../Controller.php';

class KBerandaController extends Controller {

    public function index(){
        // Memuat file view untuk halaman beranda
        require_once './app/views/komdis/berandaKomdis.php';
    }
    
}

?>