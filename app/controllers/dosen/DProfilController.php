<?php 

require_once './app/models/dosen/DProfilModel.php';
require_once __DIR__ . '/../Controller.php';

class DProfilController extends Controller {

    public function index() {
        // Memuat file view untuk halaman beranda
        require_once './app/views/dosen/profildosen.php';
    }

    public function showProfilDosen($nip) {
        // Membuat instance dari ProfilDosenModel
        $profilModel = new DProfilDosenModel();
        
        // Mengambil data profil dosen berdasarkan NIP
        $profilDosen = $profilModel->getProfilDosenByNIP($nip);
        
        if ($profilDosen && $profilDosen->num_rows > 0) {
            // Jika ada data, ambil data pertama
            $data = $profilDosen->fetch_assoc();
            // Kirim data ke view
            include 'app/views/dosen/profildosen.php';  
        } else {
            // Data tidak ditemukan, tampilkan pesan error
            echo "Data dosen tidak ditemukan!";
        }
    }

}

?>