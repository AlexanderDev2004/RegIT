<?php

require_once './app/models/mahasiswa/MProfilModel.php';

class MProfilController {
    public function index() {
        session_start();

        // Mengecek jika pengguna sudah login
        if (!isset($_SESSION['nim'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }

        // Ambil data profil mahasiswa dari database
        $model = new MProfilModel();
        $data['profil'] = $model->getProfilMahasiswaByNIM($_SESSION['nim']); // Misalnya berdasarkan NIM di session

        // Kirim data ke view
        require_once './app/views/mahasiswa/Profile.php';
    }
}