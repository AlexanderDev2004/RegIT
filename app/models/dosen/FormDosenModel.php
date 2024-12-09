<?php
require_once __DIR__ . '/../Model.php';

class FormDosenModel extends Model {
    public function createLaporanPelanggaranDosen($nim, $idStatusPelanggaran, $idPegawai, $idTataTertib, $tglPelanggaran, $fileName, $imageData) {
        // Prosedur SQL Server dengan parameter input
        $sql = "{CALL CreateLaporanPelanggaranDosen(?, ?, ?, ?, ?, ?, ?)}";

        // Format parameter sesuai dengan tipe data yg di SQL Server 
        $params = [
            [$nim, SQLSRV_PARAM_IN],                   
            [$idStatusPelanggaran, SQLSRV_PARAM_IN],   
            [$idPegawai, SQLSRV_PARAM_IN],            
            [$idTataTertib, SQLSRV_PARAM_IN],         
            [$tglPelanggaran, SQLSRV_PARAM_IN],       
            [$fileName, SQLSRV_PARAM_IN],             
            [$imageData, SQLSRV_PARAM_IN]             
        ];

        // Eksekusi prosedur
        $stmt = sqlsrv_query($this->db, $sql, $params);

        // Cek error jika ada
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
    }
}
