<?php

require_once __DIR__ . '/../Model.php';
require_once __DIR__ . '/../../core/db_config.php';

class KPelanggaranModel extends Model {
    protected $db;

    public function __construct() {
        // Use SQL Server connection with proper configuration
        $serverName = DB_SERVER;
        $connectionOptions = [
            "Database" => DB_NAME,  // Nama database Anda
            "Uid" => DB_NAME        // Username Anda
        ];

        // Jika tanpa password, gunakan autentikasi Windows (Trusted Connection)
        // Jangan tambahkan "PWD" => DB_PASS
        $this->db = sqlsrv_connect($serverName, $connectionOptions);

        if ($this->db === false) {
            die("Connection failed: " . print_r(sqlsrv_errors(), true));
        }
    }

    // Method to fetch Pelanggaran Tingkat 1
    public function getPelanggaranTingkat1() {
        $query = "
            SELECT m.nim, 
                   m.nama_mahasiswa, 
                   p.tgl_pelanggaran, 
                   tt.deskripsi, 
                   s.jenis_sanksi, 
                   s.tgl_sanksi, 
                   sp.status_pelanggaran, 
                   sm.status_mahasiswa
            FROM pelanggaran AS p 
            INNER JOIN mahasiswa AS m ON p.nim = m.nim
            INNER JOIN tata_tertib AS tt ON tt.id_tata_tertib = p.id_tata_tertib
            LEFT JOIN sanksi AS s ON s.id_pelanggaran = p.id_pelanggaran
            INNER JOIN status_pelanggaran AS sp ON sp.id_status_pelanggaran = p.id_status_pelanggaran
            INNER JOIN status_mahasiswa AS sm ON sm.id_status_mahasiswa = m.id_status_mhs
            WHERE tt.level_tatib = 1
        ";

        $stmt = sqlsrv_query($this->db, $query);

        if ($stmt === false) {
            die("Query failed: " . print_r(sqlsrv_errors(), true));
        }

        $result = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $result[] = $row;
        }

        return $result;
    }

    // Method to update status of Pelanggaran
    public function updateStatusPelanggaran($idPelanggaran, $idStatus) {
        $query = "UPDATE pelanggaran SET id_status_pelanggaran = ? WHERE id_pelanggaran = ?";
        $params = [$idStatus, $idPelanggaran];

        $stmt = sqlsrv_query($this->db, $query, $params);

        if ($stmt === false) {
            die("Update failed: " . print_r(sqlsrv_errors(), true));
        }

        return true;
    }

    // Method to get detail of a specific Pelanggaran
    public function getDetailPelanggaran($idPelanggaran) {
        $query = "
            SELECT m.nim, 
                   m.nama_mahasiswa, 
                   m.angkatan, 
                   prod.nama_prodi, 
                   k.nama_kelas, 
                   sm.status_mahasiswa, 
                   p.tgl_pelanggaran, 
                   tt.level_tatib, 
                   s.tgl_sanksi, 
                   i.file_name, 
                   i.image_data, 
                   tt.deskripsi, 
                   s.jenis_sanksi, 
                   sp.status_pelanggaran
            FROM pelanggaran AS p 
            INNER JOIN mahasiswa AS m ON p.nim = m.nim
            INNER JOIN prodi AS prod ON prod.id_prodi = m.id_prodi
            INNER JOIN kelas AS k ON k.id_kelas = m.id_kelas
            INNER JOIN status_mahasiswa AS sm ON m.id_status_mhs = sm.id_status_mahasiswa
            INNER JOIN tata_tertib AS tt ON tt.id_tata_tertib = p.id_tata_tertib
            LEFT JOIN sanksi AS s ON s.id_pelanggaran = p.id_pelanggaran
            INNER JOIN image AS i ON i.id_image = p.id_image
            INNER JOIN status_pelanggaran AS sp ON sp.id_status_pelanggaran = p.id_status_pelanggaran
            WHERE tt.level_tatib = 1 AND p.id_pelanggaran = ?
        ";

        $params = [$idPelanggaran];
        $stmt = sqlsrv_query($this->db, $query, $params);

        if ($stmt === false) {
            die("Query failed: " . print_r(sqlsrv_errors(), true));
        }

        return sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    }
}
