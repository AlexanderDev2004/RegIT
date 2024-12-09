<?php 

class MEditProfilController {
    public function index() {
        session_start();

        // Mengecek jika pengguna sudah login
        if (!isset($_SESSION['nim'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }

        // Memuat file view untuk halaman edit profil
        require_once './app/views/mahasiswa/UbahPassword.php';
    }
}

?>