<?php 

require_once __DIR__ . '/../Controller.php';
require_once __DIR__ . '/../../models/komdis/KPelanggaranModel.php';

class KPelanggaranController extends Controller {
    
    public function index() {
        // Membuat instance dari Model
        $pelanggaranModel = new KPelanggaranModel();

        // Mengambil data pelanggaran tingkat 1
        $dataPelanggaran = $pelanggaranModel->getPelanggaranTingkat1();

        // Mengirim data ke View
        require_once './app/views/komdis/pelanggaran.php';
    }
}

?>