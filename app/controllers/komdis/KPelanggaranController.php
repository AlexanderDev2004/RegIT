<?php 

require_once __DIR__ . '/../Controller.php';
require_once __DIR__ . '/../../models/komdis/KPelanggaranModel.php';

class KPelanggaranController extends Controller {
    private $pelanggaranModel;

    public function __construct() {
        $this->pelanggaranModel = new KPelanggaranModel();
    }

    public function index() {
        $dataPelanggaran = $this->pelanggaranModel->getPelanggaranTingkat1();
        require_once './app/views/komdis/pelanggaran.php';
    }

    public function detail($idPelanggaran) {
        $detailPelanggaran = $this->pelanggaranModel->getDetailPelanggaran($idPelanggaran);
        require_once './app/views/komdis/detailPelanggaran.php';
    }

    public function updateStatus($idPelanggaran, $idStatus) {
        $this->pelanggaranModel->updateStatusPelanggaran($idPelanggaran, $idStatus);
        header("Location: /komdis/pelanggaran");
    }
}
