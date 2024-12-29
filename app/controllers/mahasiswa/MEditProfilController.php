<?php 

require_once './app/models/mahasiswa/MEditProfilModel.php';
require_once __DIR__ . '/../Controller.php';

class MEditProfilController extends Controller {
    public function index() {
        session_start();

        // Mengecek jika pengguna belum login
        if (!isset($_SESSION['nim'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }

        // Mengecek apakah user masih aktif di sesion ini selama 30 menit
        $this->checkExpireSession();

        // Memuat file view untuk halaman edit profil
        require_once './app/views/mahasiswa/UbahPassword.php';
    }

    public function submitNewPassword(){
        session_start();

        // Mengecek jika pengguna belum login
        if (!isset($_SESSION['nim'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }

        // Mengecek apakah user masih aktif di sesion ini selama 30 menit
        $this->checkExpireSession();

        // Mendapatkan data dari form
        $nim = $_SESSION['nim'] ?? "";
        $passwordLama = $_POST['password-lama'] ?? "";
        $passwordBaru = $_POST['password-baru'] ?? "";
        $konfirmasiPassword = $_POST['konfirmasi-password'] ?? "";
        
        $model = new MEditProfilModel();
        
        // Mengecek Apakah password lama benar
        if(!$model->checkOldPass($passwordLama)){
            header("Location: " . BASE_URL . "/mahasiswa/profil/edit");
            return;
        }
        
        // Mengecek apakah password baru dan konfirmasi password sama
        if(!$model->checkConfirmNewPass($passwordBaru, $konfirmasiPassword)){
            header("Location: " . BASE_URL . "/mahasiswa/profil/edit");
            return;
        }
        
        // Menyimpan password baru ke database
        if(!$model->saveNewPass($nim, $passwordBaru)){
            header("Location: " . BASE_URL . "/mahasiswa/profil/edit");
            return;
        }

        // Mengarahkan ke halaman profil
        header("Location: " . BASE_URL . "/mahasiswa/profil");
    }
}

?>