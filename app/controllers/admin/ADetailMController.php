<?php 

require_once __DIR__ . '/../Controller.php';

class ADetailMController extends Controller {

    private $idMahasiswa;

    public function __construct($idMahasiswa){
        $this->idMahasiswa = $idMahasiswa;
    }
    
    public function index(){
        // Memuat file view untuk halaman detail mahasiswa
        require_once './app/views/admin/detailMahasiswa.php';
    }
    
}

?>