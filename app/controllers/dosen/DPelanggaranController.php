<?php 

require_once './app/models/dosen/DPelanggaranModel.php';
require_once __DIR__ . '/../Controller.php';

class DPelanggaranController extends Controller {

    public function index() {
        // Memuat file view untuk halaman beranda
        require_once './app/views/dosen/pelanggaran.php';
    }

    public function createLaporanPelanggaran() {
        $model = new DPelanggaranDosenModel();

        // Validasi dan ambil data dari form
        $nim = $_POST['nim'];
        if (strlen($nim) > 12) {
            die("NIM terlalu panjang, maksimum 12 karakter.");
        }

        $idStatusPelanggaran = (int) $_POST['status_pelanggaran'];
        $idPegawai = $_SESSION['id_pegawai']; // Validasi session harus sudah ada
        $idTataTertib = (int) $_POST['pelanggaran'];
        $tglPelanggaran = date('Y-m-d H:i:s', strtotime($_POST['tanggal'])); // Format datetime

        $fileName = $_FILES['image']['name'];
        $imageData = base64_encode(file_get_contents($_FILES['image']['tmp_name']));

        // Kirim data ke model
        $model->createLaporanPelanggaranDosen($nim, $idStatusPelanggaran, $idPegawai, $idTataTertib, $tglPelanggaran, $fileName, $imageData);

        // Redirect dengan pesan sukses
        header("Location: dosen.php?success=1");
        exit();
    }

}

?>