<?php 

require_once __DIR__ . '/../Controller.php';

class AProfilController extends Controller {
    
    public function index(){
        // Memuat file view untuk halaman profil
        require_once './app/views/admin/profilAdmin.php';
    }
    
}

?>