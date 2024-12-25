<?php

require_once './config.php';

// Ambil URL dari query string
if (isset($_GET['url'])) {
    // menghapus tanda / di akhir string
    $url = rtrim($_GET['url'], '/');
    // memastikan string URL bersih dan tidak mengandung karakter berbahaya
    $url = filter_var($url, FILTER_SANITIZE_URL);
    //  memecah string menjadi array berdasarkan karakter pemisah /
    $urlSegments = explode('/', $url);
} else {
    $urlSegments = []; // Jika URL kosong
}

// jika url salah atau tidak ada maka akan muncul halaman 404
// if (empty($urlSegments)) {
//     header('Location: ./404');
// }

// Routing sederhana
// if (empty($urlSegments)) {
//     // Redirect ke halaman login jika URL kosong
//     header('Location: login');
// } elseif ($urlSegments[0] === 'login') {
//     require_once './app/controllers/auth/LoginController.php';
//     $controller = new LoginController();
//     $controller->index();
// } elseif ($urlSegments[0] === 'register') {
//     require_once './app/controllers/auth/RegisterController.php';
//     $controller = new RegisterController();
//     $controller->index();
// } else {
//     require_once './app/controllers/not_found/NotFoundController.php';
//     $controller = new NotFoundController();
//     $controller->index();
// }

// ROUTING
// Base URL
// Akan dijalankan ketika panjang urlSegment adalah 1 tidak lebih
if(count($urlSegments) === 1 || empty($urlSegments)){
    // Kondisi jika routenya memiliki 1 segmen (ex: login)
    switch ($urlSegments[0]) {
        case '':
            // Redirect ke halaman login jika URL kosong
            header('Location: login');
            break;

        case 'login':
            require_once './app/controllers/auth/LoginController.php';
            $controller = new LoginController();
            $controller->index();
            break;
        
        case 'register':
            require_once './app/controllers/auth/RegisterController.php';
            $controller = new RegisterController();
            $controller->index();
            break;

        default:
            require_once './app/controllers/not_found/NotFoundController.php';
            $controller = new NotFoundController();
            $controller->index();
            break;
    }
} else if (count($urlSegments) === 2) {
    // Kondisi jika routenya memiliki 2 segmen (ex: mahasiswa/dashboard)
    if($urlSegments[0] === 'mahasiswa' && $urlSegments[1] === 'dashboard') {
        require_once './app/controllers/mahasiswa/MBerandaController.php';
        $controller = new MBerandaController();
        $controller->index();
    } else if ($urlSegments[0] === 'mahasiswa' && $urlSegments[1] === 'pelanggaran') {
        require_once './app/controllers/mahasiswa/MPelanggaranController.php';
        $controller = new MPelanggaranController();
        $controller->index();
    } else if ($urlSegments[0] === 'mahasiswa' && $urlSegments[1] === 'profil') {
        require_once './app/controllers/mahasiswa/MProfilController.php';
        $controller = new MProfilController(); 
        $controller->index();
    } else if ($urlSegments[0] === 'dpa' && $urlSegments[1] === 'dashboard') {
        require_once './app/controllers/dpa/DPBerandaController.php';
        $controller = new DPBerandaController();
        $controller->index();
    } else if ($urlSegments[0] === 'dpa' && $urlSegments[1] === 'pelanggaran') {
        require_once './app/controllers/dpa/DPPelanggaranController.php';
        $controller = new DPPelanggaranController();
        $controller->index();
    } else if ($urlSegments[0] === 'dpa' && $urlSegments[1] === 'form') {
        require_once './app/controllers/dpa/DPFormController.php';
        $controller = new DPFormController();
        $controller->index();
    } else if ($urlSegments[0] === 'dpa' && $urlSegments[1] === 'profil') {
        require_once './app/controllers/dpa/DPProfilController.php';
        $controller = new DPProfilController();
        $controller->index();
    } else if ($urlSegments[0] === 'dosen' && $urlSegments[1] === 'dashboard') {
        require_once './app/controllers/dosen/DBerandaController.php';
        $controller = new DBerandaController();
        $controller->index();
    } else if ($urlSegments[0] === 'dosen' && $urlSegments[1] === 'form') {
        require_once './app/controllers/dosen/DFormController.php';
        $controller = new DFormController();
        $controller->index();
    } else if ($urlSegments[0] === 'dosen' && $urlSegments[1] === 'pelanggaran') {
        require_once './app/controllers/dosen/DPelanggaranController.php';
        $controller = new DPelanggaranController();
        $controller->index();
    } else if ($urlSegments[0] === 'dosen' && $urlSegments[1] === 'profil') {
        require_once './app/controllers/dosen/DProfilController.php';
        $controller = new DProfilController();
        $controller->index();
    } else if ($urlSegments[0] === 'komdis' && $urlSegments[1] === 'dashboard') {
        require_once './app/controllers/komdis/KBerandaController.php';
        $controller = new KBerandaController();
        $controller->index();
    } else if ($urlSegments[0] === 'komdis' && $urlSegments[1] === 'pelanggaran') {
        require_once './app/controllers/komdis/KPelanggaranController.php';
        $controller = new KPelanggaranController();
        $controller->index();
    } else if ($urlSegments[0] === 'komdis' && $urlSegments[1] === 'profil') {
        require_once './app/controllers/komdis/KProfilController.php';
        $controller = new KProfilController();
        $controller->index();
    } else if ($urlSegments[0] === 'admin' && $urlSegments[1] === 'data-mahasiswa') {
        require_once './app/controllers/admin/ADataMController.php';
        $controller = new ADataMController();
        $controller->index();
    } else if ($urlSegments[0] === 'admin' && $urlSegments[1] === 'data-dosen') {
        require_once './app/controllers/admin/ADataDController.php';
        $controller = new ADataDController();
        $controller->index();
    } else if ($urlSegments[0] === 'admin' && $urlSegments[1] === 'data-dpa') {
        require_once './app/controllers/admin/ADataDPController.php';
        $controller = new ADataDPController();
        $controller->index();
    } else if ($urlSegments[0] === 'admin' && $urlSegments[1] === 'data-komdis') {
        require_once './app/controllers/admin/ADataKController.php';
        $controller = new ADataKController();
        $controller->index();
    } else if ($urlSegments[0] === 'admin' && $urlSegments[1] === 'data-tatib') {
        require_once './app/controllers/admin/ADataTController.php';
        $controller = new ADataTController();
        $controller->index();
    } else if ($urlSegments[0] === 'admin' && $urlSegments[1] === 'data-admin') {
        require_once './app/controllers/admin/ADataAController.php';
        $controller = new ADataAController();
        $controller->index();
    } else if ($urlSegments[0] === 'admin' && $urlSegments[1] === 'profil') {
        require_once './app/controllers/admin/AProfilController.php';
        $controller = new AProfilController();
        $controller->index();
    } else {
        require_once './app/controllers/not_found/NotFoundController.php';
        $controller = new NotFoundController();
        $controller->index();
    }
} else if (count($urlSegments) === 3) {
    // Kondisi jika routenya memiliki 3 segmen (ex: mahasiswa/profil/edit)
    if ($urlSegments[0] === 'mahasiswa' && $urlSegments[1] === 'profil' && $urlSegments[2] === 'edit') {
        require_once './app/controllers/mahasiswa/MEditProfilController.php';
        $controller = new MEditProfilController();
        $controller->index();
    } else if ($urlSegments[0] === 'mahasiswa' && $urlSegments[1] === 'profil' && $urlSegments[2] === 'logout') {
        require_once './app/controllers/mahasiswa/MProfilController.php';
        $controller = new MProfilController();
        $controller->logout();
    } else if ($urlSegments[0] === 'dpa' && $urlSegments[1] === 'pelanggaran' && is_numeric($urlSegments[2])) {
        require_once './app/controllers/dpa/DPDetailPelanggaranController.php';
        $controller = new DPDetailPelanggaranController($urlSegments[2]);
        $controller->index();
    } else if ($urlSegments[0] === 'dpa' && $urlSegments[1] === 'profil' && $urlSegments[2] === 'edit') {
        require_once './app/controllers/dpa/DPEditProfilController.php';
        $controller = new DPEditProfilController();
        $controller->index();
    } else if ($urlSegments[0] === 'dosen' && $urlSegments[1] === 'pelanggaran' && is_numeric($urlSegments[2])) {
        require_once './app/controllers/dosen/DDetailPelanggaranController.php';
        $controller = new DDetailPelanggaranController($urlSegments[2]);
        $controller->index();
    } else if ($urlSegments[0] === 'dosen' && $urlSegments[1] === 'form' && $urlSegments[2] === 'submit') {
        require_once './app/controllers/dosen/DFormController.php';
        $controller = new DFormController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->createLaporanPelanggaran();
        } else {
            // Jika bukan POST, redirect ke halaman form
            header("Location: " . BASE_URL . "/dosen/form");
            exit();
        }
    } else if ($urlSegments[0] === 'dosen' && $urlSegments[1] === 'profil' && $urlSegments[2] === 'edit') {
        require_once './app/controllers/dosen/DEditProfilController.php';
        $controller = new DEditProfilController();
        $controller->index();
    } else if ($urlSegments[0] === 'komdis' && $urlSegments[1] === 'pelanggaran' && is_numeric($urlSegments[2])) {
        require_once './app/controllers/komdis/KDetailPelanggaranController.php';
        $controller = new KDetailPelanggaranController($urlSegments[2]);
        $controller->index();
    } else if ($urlSegments[0] === 'komdis' && $urlSegments[1] === 'profil' && $urlSegments[2] === 'edit') {
        require_once './app/controllers/komdis/KEditProfilController.php';
        $controller = new KEditProfilController();
        $controller->index();
    } else if ($urlSegments[0] === 'admin' && $urlSegments[1] === 'data-mahasiswa' && is_numeric($urlSegments[2])) {
        require_once './app/controllers/admin/ADetailMController.php';
        $controller = new ADetailMController($urlSegments[2]);
        $controller->index();
    }else {
        require_once './app/controllers/not_found/NotFoundController.php';
        $controller = new NotFoundController();
        $controller->index();
    }
} else if (count($urlSegments) === 4) {
    if ($urlSegments[0] === 'mahasiswa' && $urlSegments[1] === 'profil' && $urlSegments[2] === 'edit' && $urlSegments[3] === 'submit') {
        require_once './app/controllers/mahasiswa/MEditProfilController.php';
        $controller = new MEditProfilController();
        $controller->submitNewPassword();
    } else if ($urlSegments[0] === 'dpa' && $urlSegments[1] === 'pelanggaran' && is_numeric($urlSegments[2]) && $urlSegments[3] === 'edit') {
        require_once './app/controllers/dpa/DPEditPelanggaranController.php';
        $controller = new DPEditPelanggaranController($urlSegments[2]);
        $controller->index();
    } else if ($urlSegments[0] === 'komdis' && $urlSegments[1] === 'pelanggaran' && is_numeric($urlSegments[2]) && $urlSegments[3] === 'edit') {
        require_once './app/controllers/komdis/KEditPelanggaranController.php';
        $controller = new KEditPelanggaranController($urlSegments[2]);
        $controller->index();
    } else {
        require_once './app/controllers/not_found/NotFoundController.php';
        $controller = new NotFoundController();
        $controller->index();
    }
} else {
    // Selain route yang telah ditetapkan, dia bakal diarahkan ke halaman 404
    require_once './app/controllers/not_found/NotFoundController.php';
    $controller = new NotFoundController();
    $controller->index();
}