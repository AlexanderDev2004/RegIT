<?php 

/**
 *  Data DPA Controller
 * 
 */

require_once __DIR__ . '/../Controller.php';

class ADataDPController extends Controller {

    public function index(){
        // Memuat file view untuk halaman data dosen
        require_once './app/views/admin/dataDPA.php';
    }

}

?>