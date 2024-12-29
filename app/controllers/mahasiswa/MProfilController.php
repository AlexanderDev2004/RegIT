<?php

require_once './app/models/mahasiswa/MProfilModel.php';
require_once __DIR__ . '/../Controller.php';

class MProfilController extends Controller {
    public function index() {
        session_start();

        // Mengecek jika pengguna belum login
        if (!isset($_SESSION['nim'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }

        // Mengecek apakah user masih aktif di sesion ini selama 30 menit
        $this->checkExpireSession();

        // Ambil data profil mahasiswa dari database
        $model = new MProfilModel();
        $data['profil'] = $model->getProfilMahasiswaByNIM($_SESSION['nim']); // Misalnya berdasarkan NIM di session

        // Kirim data ke view
        require_once './app/views/mahasiswa/Profile.php';
    }
}
