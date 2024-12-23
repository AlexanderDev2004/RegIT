<?php 

require_once __DIR__ . '/../Controller.php';

class DPProfilController extends Controller {

    public function index(){
        session_start();
        
        // Mengecek jika pengguna sudah login
        if (!isset($_SESSION['id_pegawai'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }

        // Memuat file view untuk halaman beranda
        require_once './app/views/dpa/profileDpa.php';
    }

    public function showProfilDpa($nip){
        // Membuat instance dari ProfilDpaModel
        $profilModel = new DProfilDpaModel();
        
        // Mengambil data profil dpa berdasarkan NIP
        $profilDpa = $profilModel->getProfilDpaByNIP($nip);
        
        if ($profilDpa && $profilDpa->num_rows > 0) {
            // Jika ada data, ambil data pertama
            $data = $profilDpa->fetch_assoc();
            // Kirim data ke view
            include 'app/views/dpa/profileDpa.php';  
        } else {
            // Data tidak ditemukan, tampilkan pesan error
            echo "Data dpa tidak ditemukan!";
        }
    }

}

?>