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
    // Kondisi jika routenya memiliki 2 segmen (ex: dashboard/mahasiswa)
    if($urlSegments[0] === 'dashboard' && $urlSegments[1] === 'mahasiswa') {
        require_once './app/controllers/mahasiswa/BerandaController.php';
        $controller = new BerandaController();
        $controller->index();
    } else if ($urlSegments[0] === 'dashboard' && $urlSegments[1] === 'dpa') {
        require_once './app/controllers/dpa/BerandaController.php';
        $controller = new BerandaController();
        $controller->index();
    } else if ($urlSegments[0] === 'dashboard' && $urlSegments[1] === 'dosen') {
        require_once './app/controllers/dosen/BerandaController.php';
        $controller = new BerandaController();
        $controller->index();
    } else if ($urlSegments[0] === 'dashboard' && $urlSegments[1] === 'komdis') {
        require_once './app/controllers/komdis/BerandaController.php';
        $controller = new BerandaController();
        $controller->index();
    } else if ($urlSegments[0] === 'dashboard' && $urlSegments[1] === 'admin') {
        require_once './app/controllers/admin/BerandaController.php';
        $controller = new BerandaController();
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
