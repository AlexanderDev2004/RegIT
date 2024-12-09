<?php 

class BerandaController {

    public function index(){
        session_start();

        // Mengecek jika pengguna sudah login
        if (!isset($_SESSION['nim'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }

        // Memuat file view untuk halaman beranda
        require_once './app/views/mahasiswa/Beranda.php';
    }

}

?>