<?php

require_once __DIR__ . '/../Model.php';

class KProfilModel extends Model {

    public function getProfilKomdisByNIP($nip) {
        $sql = "SELECT TOP 1 p.id_pegawai, p.nama_pegawai
                FROM pegawai AS p
                WHERE p.id_pegawai = ?";

        $stmt = sqlsrv_prepare($this->db, $sql, array($nip));

        if (!$stmt || !sqlsrv_execute($stmt)) {
            die("Error preparing statement or executing query: " . print_r(sqlsrv_errors(), true));
        }

        $result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

        return $result ?? null;
    }

}
?>