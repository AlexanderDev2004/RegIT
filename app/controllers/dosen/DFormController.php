<?php 
require_once './app/models/dosen/DFormModel.php';
require_once __DIR__ . '/../Controller.php';

class DFormController extends Controller {
    

    public function index() {
        session_start();
        
        if (!isset($_SESSION['id_pegawai'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }

        $this->checkExpireSession();
        
        require_once './app/views/dosen/formDosen.php';
    }

    public function createLaporanPelanggaran() {
        $model = new DFormDosenModel();

        // Validasi dan ambil data dari form
        if (!isset($_POST['nim'], $_POST['status_pelanggaran'], $_POST['pelanggaran'], $_POST['tanggal'], $_FILES['image'])) {
            die("Data form tidak lengkap.");
        }

        $Nim = $_POST['nim'];
        if (strlen($Nim) > 12) {
            die("NIM terlalu panjang, maksimum 12 karakter.");
        }

        $IdStatusPelanggaran = (int) $_POST['status_pelanggaran'];
        $IdPegawai = $_SESSION['id_pegawai']; // Pastikan session id_pegawai sudah ada
        $IdTataTertib = (int) $_POST['pelanggaran'];
        $TglPelanggaran = date('Y-m-d H:i:s', strtotime($_POST['tanggal']));// Format datetime untuk SQL Server

        $FileName = $_FILES['image']['name'];
        $ImageData = base64_encode(file_get_contents($_FILES['image']['tmp_name']));

        // Debugging: Cetak data yang akan dikirim ke model
        echo "NIM: $Nim, Status Pelanggaran: $IdStatusPelanggaran, ID Pegawai: $IdPegawai, ID Tata Tertib: $IdTataTertib, Tanggal: $TglPelanggaran, File Name: $FileName, Image Data: $ImageData";

        // Kirim data ke model
        $model->CreateLaporanPelanggaranDosen($Nim, $IdStatusPelanggaran, $IdPegawai, $IdTataTertib, $TglPelanggaran, $FileName, $ImageData);

        // Redirect dengan pesan sukses
        header("Location: " . BASE_URL . "/dosen/form");
        exit();
    }
}
?>