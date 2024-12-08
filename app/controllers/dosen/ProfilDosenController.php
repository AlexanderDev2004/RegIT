<?php

require_once './app/models/dosen/ProfilDosenModel.php';

class ProfilDosenController {
    public function showProfilDosen($nip) {
        // Membuat instance dari ProfilDosenModel
        $profilModel = new ProfilDosenModel();
        
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
