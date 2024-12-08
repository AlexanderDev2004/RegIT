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
        require_once './app/controllers/mahasiswa/BerandaController.php';
        $controller = new BerandaController();
        $controller->index();
    } else if ($urlSegments[0] === 'dpa' && $urlSegments[1] === 'dashboard') {
        require_once './app/controllers/dpa/BerandaController.php';
        $controller = new BerandaController();
        $controller->index();
    } else if ($urlSegments[0] === 'dosen' && $urlSegments[1] === 'dashboard') {
        require_once './app/controllers/dosen/BerandaController.php';
        $controller = new BerandaController();
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
} else {
    // Selain route yang telah ditetapkan, dia bakal diarahkan ke halaman 404
    require_once './app/controllers/not_found/NotFoundController.php';
    $controller = new NotFoundController();
    $controller->index();
}

// ini untuk mengambil controller, method, dan id dari query string untuk pelanggaran mahasiswa
$controller = $_get['controller'] ?? 'pelanggaran';
$method = $_get['method'] ?? 'index';
$id = $_get['id'] ?? null;

// Path file controller
$controllerPath = './app/controller/mahasiswa/' . ucfirst($controller) . 'Controller.php';

// Cek apakah file controller ada
if (file_exists($controllerPath)) {
    // Jika ada, maka load file controller
    require_once $controllerPath;
    // Jika ada, maka load file model
    require_once './app/models/mahasiswa/' . ucfirst($controller) . 'Model.php';
    // Jika ada, maka load file view
    require_once './app/views/mahasiswa/' . ucfirst($controller) . '.php';
    // Jika ada, maka load file view
    require_once './app/views/components/Header.php';
    // Jika ada, maka load file view
    require_once './app/views/components/Footer.php';
    // Jika ada, maka load file view
    require_once './app/views/components/Sidebar.php';

    // Instansiasi class controller
    $controller = new $controller();
    // Memanggil method controller
    $controller->$method();
} else {
    // Jika tidak ada, maka redirect ke halaman 404
    header('Location: ./404');
}


//  ini untuk mengambil controller, method, dan id dari query string untuk profil mahasiswa
$controller = $_get['controller'] ?? 'profil_mahasiswa';
$method = $_get['method'] ?? 'index';
$id = $_get['id'] ?? null;

// Path file controller
$controllerPath = './app/controller/mahasiswa/' . ucfirst($controller) . 'Controller.php';

// Cek apakah file controller ada
if (file_exists($controllerPath)) {
    // Jika ada, maka load file controller
    require_once $controllerPath;
    // Jika ada, maka load file model
    require_once './app/models/mahasiswa/' . ucfirst($controller) . 'Model.php';
    // Jika ada, maka load file view
    require_once './app/views/mahasiswa/' . ucfirst($controller) . '.php';
    // Jika ada, maka load file view
    require_once './app/views/components/Header.php';
    // Jika ada, maka load file view
    require_once './app/views/components/Footer.php';
    // Jika ada, maka load file view
    require_once './app/views/components/Sidebar.php';

    // Instansiasi class controller
    $controller = new $controller();
    // Memanggil method controller
    $controller->$method();
} else {
    // Jika tidak ada, maka redirect ke halaman 404
    header('Location: ./404');
}
