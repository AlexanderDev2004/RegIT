<?php
require_once __DIR__ . '/../Model.php';

class DFormDosenModel extends Model {
    public function CreateLaporanPelanggaranDosen($Nim, $IdStatusPelanggaran, $IdPegawai, $IdTataTertib, $TglPelanggaran, $FileName, $ImageData) {
        // Prosedur SQL Server dengan parameter input
        $sql = "{CALL CreateLaporanPelanggaranDosen(?, ?, ?, ?, ?, ?, ?)}";

        // Format parameter sesuai dengan tipe data yang di SQL Server 
        $params = [
            [$Nim, SQLSRV_PARAM_IN],                   
            [$IdStatusPelanggaran, SQLSRV_PARAM_IN],   
            [$IdPegawai, SQLSRV_PARAM_IN],            
            [$IdTataTertib, SQLSRV_PARAM_IN],         
            [$TglPelanggaran, SQLSRV_PARAM_IN],       
            [$FileName, SQLSRV_PARAM_IN],             
            [$ImageData, SQLSRV_PARAM_IN]             
        ];

        // Eksekusi prosedur
        $stmt = sqlsrv_query($this->db, $sql, $params);

        // Cek error jika ada
        if ($stmt === false) {
            throw new Exception(print_r(sqlsrv_errors(), true));
        }
        
        // Tutup statement
        sqlsrv_free_stmt($stmt);
    }
}
?>