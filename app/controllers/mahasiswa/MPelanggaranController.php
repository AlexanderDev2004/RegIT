<?php

require_once './app/models/mahasiswa/MPelanggaranModel.php'; // Include model

class MPelanggaranController {

    public function index($id = null) {
        session_start();

        // Mengecek jika pengguna sudah login
        if (!isset($_SESSION['nim'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }

        $model = new MPelanggaranModel(); // Inisialisasi model
        $dataPelanggaran = $model->getDataPelanggaran($id); // Ambil data pelanggaran
        
        // Kirim data ke view
        $data = [
            'pelanggaran' => $dataPelanggaran
        ];

        // Memuat file view untuk halaman Pelanggaran
        require_once './app/views/mahasiswa/Pelanggaran.php';
    }
}
?>
