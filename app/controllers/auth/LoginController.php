<?php

require_once './app/models/auth/LoginModel.php';

class LoginController
{

    public function index()
    {
        session_start();

        // Mengecek jika pengguna sudah login
        // if (isset($_SESSION['user_id'])) {
        //     header('Location: dashboard'); // redirect ke dashboard jika sudah login
        //     exit();
        // }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = htmlspecialchars(trim($_POST['username']));
            $password = $_POST['password'];

            // Panggil model untuk memverifikasi kredensial
            $loginModel = new LoginModel();
            $user = $loginModel->authenticate($username, $password);

            if ($user) {
                // Redirect berdasarkan role
                if ($user['role'] === 'mahasiswa') {
                    // Jika berhasil login, buat sesi
                    $_SESSION['nim'] = $user['user_id'];
                    $_SESSION['role'] = $user['role'];
                    $_SESSION['name'] = $loginModel->getNameByID($user['user_id']);

                    header("Location: " . BASE_URL . "/mahasiswa/dashboard");
                } else if ($user['role'] === 'pegawai') {
                    // Jika berhasil login, buat sesi
                    $_SESSION['id_pegawai'] = $user['user_id'];
                    $_SESSION['role'] = $user['role'];
                    $_SESSION['name'] = $loginModel->getNameByID($user['user_id']);
                    
                    switch ($loginModel->getRoleUser($username)) {
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
                } else {
                    $_SESSION['error'] = "NIM/NIP atau Password salah.";
                    header("Location: ./login");
                    exit();
                }
            }
        }

        // Memuat file view untuk halaman login
        require_once './app/views/loginPage.php';
    }
}
