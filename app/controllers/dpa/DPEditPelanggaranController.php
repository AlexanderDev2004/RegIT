<?php 

require_once __DIR__ . '/../Controller.php';

class DPEditPelanggaranController extends Controller {
    
    public function index(){
        session_start();
        
        // Mengecek jika pengguna sudah login
        if (!isset($_SESSION['id_pegawai'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }

        // Memuat file view untuk halaman beranda
        require_once './app/views/dpa/editPelanggaran.php';
    }

}

?>