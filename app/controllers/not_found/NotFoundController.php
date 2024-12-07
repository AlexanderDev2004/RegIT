<?php 

class NotFoundController {

    public function index(){
        // Memuat file view untuk halaman 404
        require_once './404.php';
    }
}

?>