<?php 

/**
 *  Data Administrator Controller
 * 
 */

require_once __DIR__ . '/../Controller.php';

class ADataAController extends Controller {

    public function index(){
        // Memuat file view untuk halaman data dosen
        require_once './app/views/admin/dataadmin.php';
    }

}

?>