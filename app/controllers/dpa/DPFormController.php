<?php
// Nanti akan dibuat controller dari table dpa
require_once './app/models/dpa/DPFormModel.php';
require_once __DIR__ . '/../Controller.php';

class DPFormController extends Controller {

    public function index(){
        // Memuat file view untuk halaman beranda
        require_once './app/views/dpa/formDPA.php';
    }

}