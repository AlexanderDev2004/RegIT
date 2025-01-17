<?php 

require_once './app/models/dosen/DPelanggaranModel.php';
require_once __DIR__ . '/../Controller.php';

class DPelanggaranController extends Controller {

    public function index() {
        session_start();
        
        // Mengecek jika pengguna sudah login
        if (!isset($_SESSION['id_pegawai'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }

        // Mengecek apakah user masih aktif di sesion ini selama 30 menit
        $this->checkExpireSession();
        
        // Memuat file view untuk halaman pelanggaran
        $dataPelanggaran = $this->getDataPelanggaran();

        // Memuat file view untuk halaman beranda
        require_once './app/views/dosen/pelanggaran.php';
    }

    public function getDataPelanggaran() {
        $dpPelanggaranModel = new DPelanggaranModel();
        
        // Get Data pelanggaran dari model
        $result = $dpPelanggaranModel->getPelanggaran();

        // Return Array 2 dimensi
        return $result;
    }

    // public function createLaporanPelanggaran() {
    //     $model = new DPelanggaranDosenModel();

    //     // Validasi dan ambil data dari form
    //     $nim = $_POST['nim'];
    //     if (strlen($nim) > 12) {
    //         die("NIM terlalu panjang, maksimum 12 karakter.");
    //     }

    //     $idStatusPelanggaran = (int) $_POST['status_pelanggaran'];
    //     $idPegawai = $_SESSION['id_pegawai']; // Validasi session harus sudah ada
    //     $idTataTertib = (int) $_POST['pelanggaran'];
    //     $tglPelanggaran = date('d-m-Y H:i:s', strtotime($_POST['tanggal'])); // Format datetime

    //     $fileName = $_FILES['image']['name'];
    //     $imageData = base64_encode(file_get_contents($_FILES['image']['tmp_name']));

    //     // Kirim data ke model
    //     $model->createLaporanPelanggaranDosen($nim, $idStatusPelanggaran, $idPegawai, $idTataTertib, $tglPelanggaran, $fileName, $imageData);

    //     // Redirect dengan pesan sukses
    //     header("Location: dosen.php?success=1");
    //     exit();
    // }

}

?>