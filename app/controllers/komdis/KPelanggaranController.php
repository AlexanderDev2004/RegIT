<?php 

require_once './app/models/komdis/KPelanggaranModel.php';
require_once __DIR__ . '/../Controller.php';

class KPelanggaranController extends Controller {
    // private $pelanggaranModel;

    // public function __construct() {
    //     $this->pelanggaranModel = new KPelanggaranModel();
    // }

    public function index() {
        session_start();

        // Mengecek jika pengguna sudah login
        if (!isset($_SESSION['id_pegawai'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }

        // Mengecek apakah user masih aktif di sesion ini selama 30 menit
        $this->checkExpireSession();

        $pelanggaranModel = new KPelanggaranModel();

        $dataPelanggaran = $pelanggaranModel->getPelanggaranTingkat1();
        
        require_once './app/views/komdis/pelanggaran.php';
    }

    // public function detail($idPelanggaran) {
    //     $detailPelanggaran = $this->pelanggaranModel->getDetailPelanggaran($idPelanggaran);
    //     require_once './app/views/komdis/detailPelanggaran.php';
    // }

    // public function updateStatus($idPelanggaran, $idStatus) {
    //     $this->pelanggaranModel->updateStatusPelanggaran($idPelanggaran, $idStatus);
    //     header("Location: /komdis/pelanggaran");
    // }
}
