<?php 

class DBerandaController extends Controller {

    public function index(){
        // Memuat file view untuk halaman beranda
        require_once './app/views/dosen/dosen.php';
    }
    
}

?>