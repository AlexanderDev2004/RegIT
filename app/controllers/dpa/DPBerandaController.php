<?php 

require_once __DIR__ . '/../Controller.php';

class DPBerandaController extends Controller {

    public function index(){
        // Memuat file view untuk halaman beranda
        require_once './app/views/dpa/beranda.php';
    }
    
}

?>