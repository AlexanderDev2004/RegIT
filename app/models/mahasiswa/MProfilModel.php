<?php

require_once __DIR__ . '/../Model.php';

class MProfilModel extends Model {

    public function getProfilMahasiswaByNIM($nim): array {
        // Query SQL
        $query = "SELECT TOP 1 nim, nama_prodi, nama_mahasiswa, nama_kelas, angkatan, status_mahasiswa
                FROM mahasiswa AS m
                INNER JOIN prodi AS p ON m.id_prodi = p.id_prodi
                INNER JOIN kelas AS k ON m.id_kelas = k.id_kelas
                INNER JOIN status_mahasiswa AS sm ON m.id_status_mhs = sm.id_status_mahasiswa
                WHERE nim = ?";
        
        // Eksekusi query dengan sqlsrv_prepare dan sqlsrv_execute
        $stmt = sqlsrv_prepare($this->db, $query, [$nim]);
        if (!$stmt) {
            die("Error preparing statement: " . print_r(sqlsrv_errors(), true));
        }

        if (!sqlsrv_execute($stmt)) {
            die("Error executing query: " . print_r(sqlsrv_errors(), true));
        }

        // Ambil satu baris hasil query
        $result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        if (!$result) {
            return null; // Tidak ditemukan
        }

        return $result;
    }

}
