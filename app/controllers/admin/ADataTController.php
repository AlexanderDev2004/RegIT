<?php 

/**
 *  Data Tata-Tertib Controller
 * 
 */

require_once __DIR__ . '/../Controller.php';

class ADataTController extends Controller {

    public function index(){
        // Memuat file view untuk halaman data dosen
        require_once './app/views/admin/pelanggaran.php';
    }

}

?>