<?php
session_start();


class RegisterModel {
    private $conn;

    public function __construct() {
        // Pastikan koneksi database berhasil
        $this->conn = require_once realpath(__DIR__ . '/../core/db_config.php');
        if (!$this->conn) {
            die("Koneksi database gagal!");
        }
    }

    public function register($username, $email, $password, $confirm_password, $image) {
        // Validasi input
        if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
            return ['status' => false, 'message' => 'Semua field harus diisi!'];
        }

        if ($password !== $confirm_password) {
            return ['status' => false, 'message' => 'Password dan konfirmasi password tidak cocok!'];
        }

        if (!(strlen($username) >= 10 && strlen($username) <= 18)) {
            return ['status' => false, 'message' => 'Username harus berupa NIM (10-12 karakter) atau NIP (18 karakter)!'];
        }

        if (!isset($image['tmp_name']) || $image['error'] !== UPLOAD_ERR_OK) {
            return ['status' => false, 'message' => 'Gagal mengunggah file gambar!'];
        }

        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Baca data file gambar
        $imageData = file_get_contents($image['tmp_name']);
        $fileName = $image['name'];

        try {
            // Periksa apakah email sudah ada
            $checkEmailQuery = "SELECT email FROM kredensial_mahasiswa WHERE email = ? UNION SELECT email FROM kredensial_pegawai WHERE email = ?";
            $stmt = sqlsrv_query($this->conn, $checkEmailQuery, [$email, $email]);

            if ($stmt === false) {
                return ['status' => false, 'message' => 'Gagal memeriksa email: ' . print_r(sqlsrv_errors(), true)];
            }

            if (sqlsrv_has_rows($stmt)) {
                return ['status' => false, 'message' => 'Email sudah terdaftar!'];
            }

            // Tentukan prosedur tersimpan
            $procedure = '';
            $params = [$username, $email, $hashed_password, $fileName, $imageData];

            if (strlen($username) >= 10 && strlen($username) <= 12) {
                $procedure = "EXEC GetRegisterMahasiswa @Nim = ?, @Email = ?, @Password = ?, @FileName = ?, @ImageData = ?";
            } elseif (strlen($username) === 18) {
                $procedure = "EXEC GetRegisterPegawai @IdPegawai = ?, @Email = ?, @Password = ?, @FileName = ?, @ImageData = ?";
            } else {
                return ['status' => false, 'message' => 'Format NIM/NIP tidak valid!'];
            }

            // Jalankan prosedur tersimpan
            $stmt = sqlsrv_query($this->conn, $procedure, $params);

            if ($stmt) {
                return ['status' => true, 'message' => 'Registrasi berhasil!'];
            } else {
                return ['status' => false, 'message' => 'Registrasi gagal: ' . print_r(sqlsrv_errors(), true)];
            }
        } catch (Exception $e) {
            return ['status' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()];
        }
    }
}
