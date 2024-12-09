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
        require_once './app/controllers/mahasiswa/BerandaController.php';
        $controller = new BerandaController();
        $controller->index();
    } else if ($urlSegments[0] === 'mahasiswa' && $urlSegments[1] === 'pelanggaran') {
        require_once './app/controllers/mahasiswa/PelanggaranController.php';
        $controller = new PelanggaranController();
        $controller->index();
    } else if ($urlSegments[0] === 'mahasiswa' && $urlSegments[1] === 'profil') {
        require_once './app/controllers/mahasiswa/ProfilMahasiswaController.php';
        $controller = new ProfilMahasiswaController(); 
        $controller->index();
    } else if ($urlSegments[0] === 'dpa' && $urlSegments[1] === 'dashboard') {
        require_once './app/controllers/dpa/BerandaController.php';
        $controller = new BerandaController();
        $controller->index();
    } else if ($urlSegments[0] === 'dosen' && $urlSegments[1] === 'dashboard') {
        require_once './app/controllers/dosen/BerandaController.php';
        $controller = new BerandaController();
        $controller->index();
    } else if ($urlSegments[0] === 'dosen' && $urlSegments[1] === 'form') {
        require_once './app/controllers/dosen/FormController.php';
        $controller = new FormController();
        $controller->index();
    } else if ($urlSegments[0] === 'dosen' && $urlSegments[1] === 'pelanggaran') {
        require_once './app/controllers/dosen/PelanggaranController.php';
        $controller = new PelanggaranController();
        $controller->index();
    } else if ($urlSegments[0] === 'dosen' && $urlSegments[1] === 'profil') {
        require_once './app/controllers/dosen/ProfilController.php';
        $controller = new ProfilController();
        $controller->index();
    } else if ($urlSegments[0] === 'komdis' && $urlSegments[1] === 'dashboard') {
        require_once './app/controllers/komdis/BerandaController.php';
        $controller = new BerandaController();
        $controller->index();
    } else if ($urlSegments[0] === 'admin' && $urlSegments[1] === 'dashboard') {
        require_once './app/controllers/admin/BerandaController.php';
        $controller = new BerandaController();
        $controller->index();
    } else {
        require_once './app/controllers/not_found/NotFoundController.php';
        $controller = new NotFoundController();
        $controller->index();
    }
} else if (count($urlSegments) === 3) {
    // Kondisi jika routenya memiliki 3 segmen (ex: mahasiswa/profil/edit)
    if ($urlSegments[0] === 'mahasiswa' && $urlSegments[1] === 'profil' && $urlSegments[2] === 'edit') {
        require_once './app/controllers/mahasiswa/EditProfilController.php';
        $controller = new EditProfilController();
        $controller->index();
    } else if ($urlSegments[0] === 'dosen' && $urlSegments[1] === 'profil' && $urlSegments[2] === 'edit') {
        require_once './app/controllers/dosen/EditProfilController.php';
        $controller = new EditProfilController();
        $controller->index();
    } else {
        require_once './app/controllers/not_found/NotFoundController.php';
        $controller = new NotFoundController();
        $controller->index();
    }
} else if (count($urlSegments) === 4) {
    if($urlSegments[0] === 'dosen' && $urlSegments[1] === 'pelanggaran' && $urlSegments[2] === 'detail' && is_numeric($urlSegments[3])) {
        require_once './app/controllers/dosen/DetailPelanggaranController.php';
        $controller = new DetailPelanggaranController($urlSegments[3]);
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
