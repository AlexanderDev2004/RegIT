<?php 

require_once './app/models/komdis/KEditDataPelanggaranModel.php';
require_once __DIR__ . '/../Controller.php';

class KEditPelanggaranController extends Controller {

    private $idPelanggaran;

    public function __construct($idPelanggaran) {
        session_start();
        
        // Mengecek jika pengguna sudah login
        if (!isset($_SESSION['id_pegawai'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }

        // Mengecek apakah user masih aktif di sesion ini selama 30 menit
        $this->checkExpireSession();

        $this->idPelanggaran = $idPelanggaran;
    }

    public function index(){
        $getIdPelanggaran = $this->idPelanggaran;

        // model 
        $editDataPelanggaranModel = new KEditDataPelanggaranModel();

        // Get Data pelanggaran dari model
        $dataPelanggaran = $editDataPelanggaranModel->getDetailPelanggaranFromID($this->idPelanggaran);
        // Get Data pelanggaran dari model
        $listTatib = $editDataPelanggaranModel->getListTatib();
        

        // Memuat file view untuk halaman beranda
        require_once './app/views/komdis/editPelanggaran.php';
    }

}

?>