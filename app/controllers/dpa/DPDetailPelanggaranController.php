<?php 

require_once __DIR__ . '/../Controller.php';

class DPDetailPelanggaranController extends Controller {

    public function index(){
        session_start();
        
        // Mengecek jika pengguna sudah login
        if (!isset($_SESSION['id_pegawai'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }

        // Mengecek apakah user masih aktif di sesion ini selama 30 menit
        $this->checkExpireSession();

        // Memuat file view untuk halaman beranda
        require_once './app/views/dpa/detailPelanggaran.php';
    }

}

?>