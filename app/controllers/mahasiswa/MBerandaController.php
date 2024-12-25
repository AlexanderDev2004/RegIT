<?php 

require_once __DIR__ . '/../Controller.php';

class MBerandaController extends Controller {

    public function index(){
        session_start();

        // Mengecek jika pengguna belum login
        if (!isset($_SESSION['nim'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }

        // Mengecek apakah user masih aktif di sesion ini selama 30 menit
        $this->checkExpireSession();

        // Memuat file view untuk halaman beranda
        require_once './app/views/mahasiswa/Beranda.php';
    }

}

?>