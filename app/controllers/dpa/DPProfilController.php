<?php 

require_once './app/models/dpa/DPProfilModel.php';
require_once __DIR__ . '/../Controller.php';

class DPProfilController extends Controller {

    public function index(){
        session_start();
        
        // Mengecek jika pengguna sudah login
        if (!isset($_SESSION['id_pegawai'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }

        // Mengecek apakah user masih aktif di sesion ini selama 30 menit
        $this->checkExpireSession();

        $data = $this->showProfilDpa($_SESSION['id_pegawai']);

        // Memuat file view untuk halaman beranda
        require_once './app/views/dpa/profileDpa.php';
    }

    public function showProfilDpa($nip){
        // Membuat instance dari ProfilDpaModel
        $profilModel = new DPProfilModel();
        
        // Mengembalikan data profil dpa berdasarkan NIP
        return $profilModel->getProfilDpaByNIP($nip) ?? [];
    }

}

?>