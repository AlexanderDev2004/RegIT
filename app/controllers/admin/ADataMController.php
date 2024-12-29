<?php 

/**
 *  Data Mahasiswa Controller
 * 
 */

require_once __DIR__ . '/../Controller.php';

class ADataMController extends Controller {

    public function index(){
        // Memuat file view untuk halaman data mahasiswa
        require_once './app/views/admin/datamhs.php';
    }

}

?>