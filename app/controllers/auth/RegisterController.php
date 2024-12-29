<?php
require_once './app/models/auth/RegisterModel.php';
require_once './app/models/auth/LoginModel.php';

class RegisterController {
    public function index() {
        session_start();

        // Mengecek jika pengguna sudah login/masih ada sessionnya/belum logout
        if (isset($_SESSION['nim']) || isset($_SESSION['id_pegawai']) && isset($_SESSION['role'])) {
            $this->loginWithCurrentSession($_SESSION['nim'] ?? $_SESSION['id_pegawai'], $_SESSION['role']);
        }

        // Tampilkan halaman register
        require_once './app/views/signUpPage.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $registerModel = new RegisterModel();

            // Ambil data dari form
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $image = $_FILES['id_image'];

            // Proses registrasi
            $result = $registerModel->register($username, $email, $password, $confirm_password, $image);

            if ($result['status']) {
                // Redirect ke halaman login jika sukses
                header("Location: ./login");
                exit();
            } else {
                // Tampilkan pesan error di view
                $_SESSION['error'] = $result['message'];
                header("Location: ./register");
                exit();
            }
        }
    }

    public function loginWithCurrentSession($sessionUserId, $sessionRole){
        session_start();

        if ($sessionRole === 'mahasiswa') {
            // menuju ke halaman dashboard mahasiswa
            header("Location: " . BASE_URL . "/mahasiswa/dashboard");
        } else if ($sessionRole === 'pegawai') {
            $loginModel = new LoginModel();
            switch ($loginModel->getRoleUser($sessionUserId)) {
                case 'Dosen':
                    header("Location: " . BASE_URL . "/dosen/dashboard");
                    break;
                case 'DPA':
                    header("Location: " . BASE_URL . "/dpa/dashboard");
                    break;
                case 'Komisi Disiplin':
                    header("Location: " . BASE_URL . "/komdis/dashboard");
                    break;
                case 'Administrator':
                    header("Location: " . BASE_URL . "/admin/dashboard");
                    break;
            }
        }
    }
}
