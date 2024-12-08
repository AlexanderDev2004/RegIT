<?php

include './app/model/dosen/FromDosenModel.php';
class FromDosenController {

    public function index() {
        // Memuat file view untuk halaman FromDosen
        require_once './app/views/dosen/FromDosen.php';
    }
    
}