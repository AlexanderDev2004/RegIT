<?php

require_once __DIR__ . '/../Model.php'; 

class MPelanggaranModel extends Model {

    public function getDataPelanggaran($nim) : array {
        $dataPelanggaran = [];
        
        $sql = "
            SELECT 
                p.tgl_pelanggaran,
                tt.deskripsi AS deskripsi_pelanggaran,
                tt.level_tatib AS tingkat,
                s.jenis_sanksi AS sanksi,
                s.tgl_sanksi,
                sp.status_pelanggaran
            FROM pelanggaran p
            INNER JOIN tata_tertib tt ON p.id_tata_tertib = tt.id_tata_tertib
            INNER JOIN status_pelanggaran sp ON p.id_status_pelanggaran = sp.id_status_pelanggaran
            LEFT JOIN sanksi s ON p.id_pelanggaran = s.id_pelanggaran
            WHERE p.nim = ?
            ORDER BY p.tgl_pelanggaran DESC
        ";

        $stmt = sqlsrv_query($this->db, $sql, [$nim]);
        if ($stmt) {
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $dataPelanggaran[] = [
                    'tgl_pelanggaran' => $row['tgl_pelanggaran']->format('d-m-Y'),
                    'deskripsi_pelanggaran' => $row['deskripsi_pelanggaran'],
                    'tingkat' => $row['tingkat'],
                    'sanksi' => $row['sanksi'] ?? '-',
                    'tgl_sanksi' => $row['tgl_sanksi'] ? $row['tgl_sanksi']->format('d-m-Y') : '-',
                    'status_pelanggaran' => $row['status_pelanggaran'],
                ];
            }
        }

        return $dataPelanggaran;
    }

}