<?php
class ProfilMahasiswaController {
    public function index() {
        // Ambil data profil mahasiswa dari database
        $model = new MahasiswaModel();
        $data['profil'] = $model->getProfilMahasiswaByNIM($_SESSION['nim']); // Misalnya berdasarkan NIM di session

        // Kirim data ke view
        require_once '../app/views/mahasiswa/Profile.php';
    }
}
