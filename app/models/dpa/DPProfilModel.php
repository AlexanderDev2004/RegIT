<?php

require_once __DIR__ . '/../Model.php';

class DPProfilModel extends Model {

    public function getProfilDpaByNIP($nip) {
        $sql = "SELECT TOP 1 p.id_pegawai, p.nama_pegawai, prod.nama_prodi, k.nama_kelas
                FROM pegawai AS p
                INNER JOIN dpa ON p.id_pegawai = dpa.id_pegawai
                INNER JOIN prodi AS prod ON prod.id_prodi = dpa.id_prodi
                INNER JOIN kelas AS k ON k.id_kelas = dpa.id_kelas
                WHERE p.id_pegawai = ?";

        $stmt = sqlsrv_prepare($this->db, $sql, array($nip));

        if (!$stmt || !sqlsrv_execute($stmt)) {
            die("Error preparing statement or executing query: " . print_r(sqlsrv_errors(), true));
        }

        $result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

        return $result ?? null;
        // $query = "SELECT * FROM dpa WHERE nip = '$nip'";
        // return $this->db->query($query);
    }
}