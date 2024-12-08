<?php
require_once './app/models/auth/RegisterModel.php';

class RegisterController {
    public function index() {
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
}
