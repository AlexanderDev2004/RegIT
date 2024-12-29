<?php

require_once __DIR__ . '/../Model.php';


class DPPelanggaranModel extends Model {
    // private $model;

    // // Konstruktor terlooping dan maka akan muncul error : Allowed memory size of 1073741824 bytes exhausted (tried to allocate 4096 bytes) in C:\laragon\www\RegIT\app\models\dpa\DPPelanggaranModel.php on line 9
    // public function __construct() {
    //     $this->model = new DPPelanggaranModel();
    // }
    
    // ini_set('memory_limit', '44M');

    // Metode untuk membuat laporan pelanggaran mahasiswa
    // public function createLaporanPelanggaran($params) {
    //     $query = "{CALL CreateLaporanPelanggaranDPA(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)}";
    
    //     // Menyiapkan parameter untuk stored procedure
    //     $stmt = sqlsrv_prepare($this->db->getConnection(), $query, [
    //         [&$params['nim'], SQLSRV_PARAM_IN],
    //         [&$params['id_pegawai'], SQLSRV_PARAM_IN],
    //         [&$params['level_tatib'], SQLSRV_PARAM_IN],
    //         [&$params['tgl_pelanggaran'], SQLSRV_PARAM_IN],
    //         [&$params['deskripsi'], SQLSRV_PARAM_IN],
    //         [&$params['file_name'], SQLSRV_PARAM_IN],
    //         [&$params['image_data'], SQLSRV_PARAM_IN],
    //         [&$params['jenis_sanksi'], SQLSRV_PARAM_IN],
    //         [&$params['tgl_sanksi'], SQLSRV_PARAM_IN],
    //         [&$params['id_status_pelanggaran'], SQLSRV_PARAM_IN]
    //     ]);
    
    //     if (!$stmt) {
    //         // Error handling jika statement gagal
    //         throw new Exception('Error preparing the SQL query: ' . print_r(sqlsrv_errors(), true));
    //     }
    
    //     // Menjalankan stored procedure
    //     if (sqlsrv_execute($stmt)) {
    //         $result = [];
    //         while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    //             $result[] = $row;
    //             // Free memory after processing each row
    //             unset($row); 
    //         }
    //         return $result; // Mengembalikan hasil yang diterima
    //     } else {
    //         // Menangani error saat eksekusi
    //         throw new Exception('Error executing SQL query: ' . print_r(sqlsrv_errors(), true));
    //     }
    // }

    // mendapatkan data pelanggaran mahasiswa dari database
    public function getPelanggaran(string $idPegawai){
        $resultDataPelanggaran = [];

        // SQL Query
        $sqlDataPelanggaranByDPA = "EXEC GetDaftarPelanggaranByDPA @IdPegawai = ?";
        $stmtDataPelanggaran = sqlsrv_prepare($this->db, $sqlDataPelanggaranByDPA, array($idPegawai));

        // If query executed successfully maka dia akan mengembalikan data pelanggaran
        if($stmtDataPelanggaran && sqlsrv_execute($stmtDataPelanggaran)){
            $resultDataPelanggaran = [];
            while($row = sqlsrv_fetch_array($stmtDataPelanggaran, SQLSRV_FETCH_ASSOC)){
                $resultDataPelanggaran[] = $row;
                // unset($row);
            }
        } else {
            // Menangani error saat eksekusi
            throw new Exception('Error executing SQL query: ' . print_r(sqlsrv_errors(), true));
        }

        return $resultDataPelanggaran;
    }

    
}
