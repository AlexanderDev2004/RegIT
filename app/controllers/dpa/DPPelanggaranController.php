<?php

require_once __DIR__ . '/../Controller.php';
require_once __DIR__ . '/../../../app/models/dpa/DPPelanggaranModel.php';

class DPPelanggaranController extends Controller {
    // private $model;

    // public function __construct() {
    //     $this->model = new DPPelanggaranModel();
    // }

    // public function index() {
    //     // Data dari database untuk ditampilkan di form (opsional)
    //     require_once './app/views/dpa/pelanggaran.php';
    // }

    // public function createLaporan() {
    //     try {
    //         // Pastikan form data sudah ada dan valid
    //         if (empty($_POST['nim']) || empty($_POST['level_tatib']) || empty($_POST['tgl_pelanggaran']) || 
    //             empty($_POST['deskripsi']) || empty($_POST['jenis_sanksi']) || empty($_POST['tgl_sanksi']) || 
    //             empty($_POST['id_status_pelanggaran'])) {
    //             throw new Exception('Data tidak lengkap.');
    //         }

    //         // Validasi upload file
    //         if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    //             $file_name = $_FILES['file']['name'];
    //             $image_data = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
    //         } else {
    //             throw new Exception('File tidak valid atau tidak ada.');
    //         }

    //         // Data input dari form
    //         $params = [
    //             'nim' => $_POST['nim'], // NIM Mahasiswa
    //             'id_pegawai' => $_SESSION['id_pegawai'], // ID Pegawai
    //             'level_tatib' => $_POST['level_tatib'], 
    //             'tgl_pelanggaran' => $_POST['tgl_pelanggaran'], 
    //             'deskripsi' => $_POST['deskripsi'],
    //             'file_name' => $file_name, 
    //             'image_data' => $image_data,
    //             'jenis_sanksi' => $_POST['jenis_sanksi'], 
    //             'tgl_sanksi' => $_POST['tgl_sanksi'], 
    //             'id_status_pelanggaran' => $_POST['id_status_pelanggaran']
    //         ];

    //         // Panggil metode model untuk menyimpan data
    //         $result = $this->model->createLaporanPelanggaran($params);

    //         // Berikan respons berdasarkan hasil
    //         if ($result[0]['response'] == 'true') {
    //             echo "Berhasil menyimpan data: " . $result[0]['response'];
    //         } else {
    //             echo "Gagal menyimpan data: " . $result[0]['response'];
    //         }
    //     } catch (Exception $e) {
    //         echo "Error: " . $e->getMessage(); // Menampilkan pesan error
    //     }
    // }

    public function index(){
        session_start();
        
        // Mengecek jika pengguna sudah login
        if (!isset($_SESSION['id_pegawai'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }

        // Mengecek apakah user masih aktif di sesion ini selama 30 menit
        $this->checkExpireSession();

        // Memuat file view untuk halaman pelanggaran
        $dataPelanggaran = $this->getDataPelanggaran($_SESSION['id_pegawai']);

        require_once './app/views/dpa/pelanggaran.php';
    }

    public function getDataPelanggaran(string $idPegawai) {
        $dpPelanggaranModel = new DPPelanggaranModel();
        
        // Get Data pelanggaran dari model
        $result = $dpPelanggaranModel->getPelanggaran($idPegawai);

        // Return Array 2 dimensi
        return $result;
    }
}
