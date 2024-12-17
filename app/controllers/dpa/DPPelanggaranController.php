<?php

require_once __DIR__ . '/../../../app/models/dpa/DPPelanggaranModel.php';

class DPPelanggaranController {
    private $model;

    public function __construct() {
        $this->model = new DPPelanggaranModel();
    }

    public function createLaporan() {
        try {
            // Pastikan form data sudah ada dan valid
            if (empty($_POST['nim']) || empty($_POST['level_tatib']) || empty($_POST['tgl_pelanggaran']) || 
                empty($_POST['deskripsi']) || empty($_POST['jenis_sanksi']) || empty($_POST['tgl_sanksi']) || 
                empty($_POST['id_status_pelanggaran'])) {
                throw new Exception('Data tidak lengkap.');
            }

            // Validasi upload file
            if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
                $file_name = $_FILES['file']['name'];
                $image_data = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
            } else {
                throw new Exception('File tidak valid atau tidak ada.');
            }

            // Data input dari form
            $params = [
                'nim' => $_POST['nim'], // NIM Mahasiswa
                'id_pegawai' => $_SESSION['id_pegawai'], // ID Pegawai
                'level_tatib' => $_POST['level_tatib'], 
                'tgl_pelanggaran' => $_POST['tgl_pelanggaran'], 
                'deskripsi' => $_POST['deskripsi'],
                'file_name' => $file_name, 
                'image_data' => $image_data,
                'jenis_sanksi' => $_POST['jenis_sanksi'], 
                'tgl_sanksi' => $_POST['tgl_sanksi'], 
                'id_status_pelanggaran' => $_POST['id_status_pelanggaran']
            ];

            // Panggil metode model untuk menyimpan data
            $result = $this->model->createLaporanPelanggaran($params);

            // Berikan respons berdasarkan hasil
            if ($result[0]['response'] == 'true') {
                echo "Berhasil menyimpan data: " . $result[0]['response'];
            } else {
                echo "Gagal menyimpan data: " . $result[0]['response'];
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage(); // Menampilkan pesan error
        }
    }
}
