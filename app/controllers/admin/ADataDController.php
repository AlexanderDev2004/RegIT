<?php 

/**
 *  Data Dosen Controller
 * 
 */

require_once __DIR__ . '/../Controller.php';

class ADataDController extends Controller {

    public function index(){
        // Memuat file view untuk halaman data dosen
        require_once './app/views/admin/dataDosen.php';
    }

}

?>