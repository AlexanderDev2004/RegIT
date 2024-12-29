<?php 

require_once './app/models/dpa/DPEditProfilModel.php';
require_once __DIR__ . '/../Controller.php';

class DPEditProfilController extends Controller {

    public function index(){
        session_start();
        
        // Mengecek jika pengguna sudah login
        if (!isset($_SESSION['id_pegawai'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }

        // Mengecek apakah user masih aktif di sesion ini selama 30 menit
        $this->checkExpireSession();

        // Memuat file view untuk halaman beranda
        require_once './app/views/dpa/ubahPassword.php';
    }

    public function submitNewPassword(){
        session_start();

        // Mengecek jika pengguna belum login
        if (!isset($_SESSION['id_pegawai'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }
        
        // Mengecek apakah user masih aktif di sesion ini selama 30 menit
        $this->checkExpireSession();
        
        // Mendapatkan data dari form
        $idPegawai = $_SESSION['id_pegawai'] ?? "";
        $passwordLama = $_POST['password-lama'] ?? "";
        $passwordBaru = $_POST['password-baru'] ?? "";
        $konfirmasiPassword = $_POST['konfirmasi-password'] ?? "";
        
        $model = new DPEditProfilModel();
        
        // Mengecek Apakah password lama benar
        if(!$model->checkOldPass($passwordLama)){
            header("Location: " . BASE_URL . "/dpa/profil/edit");
            return;
        }
        
        // Mengecek apakah password baru dan konfirmasi password sama
        if(!$model->checkConfirmNewPass($passwordBaru, $konfirmasiPassword)){
            header("Location: " . BASE_URL . "/dpa/profil/edit");
            return;
        }
        
        // Menyimpan password baru ke database
        if(!$model->saveNewPass($idPegawai, $passwordBaru)){
            header("Location: " . BASE_URL . "/dpa/profil/edit");
            return;
        }

        // Mengarahkan ke halaman profil
        header("Location: " . BASE_URL . "/dpa/profil");
    }
}

?>