<?php

require_once './app/models/mahasiswa/MPelanggaranModel.php'; // Include model
require_once __DIR__ . '/../Controller.php';

class MPelanggaranController extends Controller {

    public function index($id = null) {
        session_start();

        // Mengecek jika pengguna belum login
        if (!isset($_SESSION['nim'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }
        
        // Mengecek apakah user masih aktif di sesion ini selama 30 menit
        $this->checkExpireSession();

        $nim = $_SESSION['nim']; // Ambil NIM dari session
        $model = new MPelanggaranModel(); // Inisialisasi model

        // Ambil data pelanggaran mahasiswa berdasarkan NIM
        $dataPelanggaran = $model->getDataPelanggaran($nim);

        // Kirim data ke view
        $data = [
            'pelanggaran' => $dataPelanggaran
        ];

        // Memuat file view untuk halaman Pelanggaran
        require_once './app/views/mahasiswa/Pelanggaran.php';
    }
}