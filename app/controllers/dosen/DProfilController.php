<?php 

require_once './app/models/dosen/DProfilModel.php';
require_once __DIR__ . '/../Controller.php';

class DProfilController extends Controller {

    public function index() {
        session_start();
        
        // Mengecek jika pengguna sudah login
        if (!isset($_SESSION['id_pegawai'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }

        // Mengecek apakah user masih aktif di sesion ini selama 30 menit
        $this->checkExpireSession();
        
        $data = $this->showProfilDosen($_SESSION['id_pegawai']);

        // Memuat file view untuk halaman beranda
        require_once './app/views/dosen/profildosen.php';
    }

    public function showProfilDosen($nip) {
        // Membuat instance dari ProfilDpaModel
        $profilModel = new DProfilModel();
        
        // Mengembalikan data profil dpa berdasarkan NIP
        return $profilModel->getProfilDosenByNIP($nip) ?? [];
    }

}

?>