<?php

require_once './app/models/mahasiswa/ProfilMahasiswaModel.php';

class ProfilMahasiswaController {
    public function index() {
        session_start();

        // Ambil data profil mahasiswa dari database
        $model = new ProfilMahasiswaModel();
        $data['profil'] = $model->getProfilMahasiswaByNIM($_SESSION['nim']); // Misalnya berdasarkan NIM di session

        // Kirim data ke view
        require_once './app/views/mahasiswa/Profile.php';
    }
}
