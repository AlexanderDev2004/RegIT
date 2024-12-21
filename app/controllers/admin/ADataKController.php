<?php 

/**
 *  Data Komisi Disiplin Controller
 * 
 */

require_once __DIR__ . '/../Controller.php';

class ADataKController extends Controller {

    public function index(){
        // Memuat file view untuk halaman data kelas
        require_once './app/views/admin/datakomdis.php';
    }

}

?>