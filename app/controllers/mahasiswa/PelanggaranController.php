<?php

require_once './app/models/mahasiswa/PelanggaranModel.php'; // Include model

class PelanggaranController {

    public function index($id = null) {
        $model = new PelanggaranModel(); // Inisialisasi model
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
