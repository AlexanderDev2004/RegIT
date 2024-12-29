<?php 

require_once './app/models/komdis/KProfilModel.php';
require_once __DIR__ . '/../Controller.php';

class KProfilController extends Controller {

    public function index() {
        session_start();

        // Mengecek jika pengguna sudah login
        if (!isset($_SESSION['id_pegawai'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }

        // Mengecek apakah user masih aktif di sesion ini selama 30 menit
        $this->checkExpireSession();

        $data = $this->showProfilKomdis($_SESSION['id_pegawai']);
        
        // Memuat file view untuk halaman beranda
        require_once './app/views/komdis/profilKomdis.php';
    }

    public function showProfilKomdis($nip){
        // Membuat instance dari ProfilDpaModel
        $profilModel = new KProfilModel();
        
        // Mengembalikan data profil dpa berdasarkan NIP
        return $profilModel->getProfilKomdisByNIP($nip) ?? [];
    }

}

?>