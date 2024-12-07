<?php

require_once './app/models/UserModel.php';

class LoginController
{

    public function index()
    {
        // Mengecek jika pengguna sudah login
        // if (isset($_SESSION['user_id'])) {
        //     header('Location: dashboard'); // redirect ke dashboard jika sudah login
        //     exit();
        // }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = htmlspecialchars(trim($_POST['username']));
            $password = $_POST['password'];

            // Panggil model untuk memverifikasi kredensial
            $userModel = new UserModel();
            $user = $userModel->authenticate($username, $password);

            if ($user) {
                // Jika berhasil login, buat sesi
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['role'] = $user['role'];

                // Redirect berdasarkan role
                if ($user['role'] === 'mahasiswa') {
                    header("Location: " . BASE_URL . "/dashboard/mahasiswa");
                } else if ($user['role'] === 'pegawai') {
                    switch ($userModel->getRoleUser($username)) {
                        case 'Dosen':
                            header("Location: " . BASE_URL . "/dashboard/dosen");
                            break;
                        case 'DPA':
                            header("Location: " . BASE_URL . "/dashboard/dpa");
                            break;
                        case 'Komisi Disiplin':
                            header("Location: " . BASE_URL . "/dashboard/komdis");
                            break;
                        case 'Administrator':
                            header("Location: " . BASE_URL . "/dashboard/admin");
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
