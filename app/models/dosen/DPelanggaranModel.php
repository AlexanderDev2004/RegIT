<?php

require_once __DIR__ . '/../Model.php';

class DPelanggaranModel extends Model {

    // public function createLaporanPelanggaranDosen($nim, $idStatusPelanggaran, $idPegawai, $idTataTertib, $tglPelanggaran, $fileName, $imageData) {
    //     // Query SQL untuk menyimpan data pelanggaran
    //     $sql = "INSERT INTO pelanggaran (nim, id_status_pelanggaran, id_pegawai, id_tata_tertib, tgl_pelanggaran, image_name, image_data) 
    //             VALUES (?, ?, ?, ?, ?, ?, ?)";

    //     $stmt = $this->db->prepare($sql);
    //     $stmt->bind_param("siissbs", $nim, $idStatusPelanggaran, $idPegawai, $idTataTertib, $tglPelanggaran, $fileName, $imageData);
    //     if ($stmt->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // mendapatkan data pelanggaran mahasiswa dari database
    public function getPelanggaran(){
        $resultDataPelanggaran = [];

        // SQL Query
        $sqlDataPelanggaranByDPA = "SELECT p.id_pelanggaran
                                        , m.nama_mahasiswa
                                        , p.tgl_pelanggaran
                                        , t.deskripsi
                                        , t.level_tatib
                                        , s.jenis_sanksi
                                        , s.tgl_sanksi
                                        , sp.status_pelanggaran
                                    FROM pelanggaran AS p
                                    INNER JOIN mahasiswa AS m ON p.nim = m.nim
                                    INNER JOIN tata_tertib AS t ON p.id_tata_tertib = t.id_tata_tertib
                                    LEFT JOIN sanksi AS s ON p.id_pelanggaran = s.id_pelanggaran
                                    INNER JOIN status_pelanggaran AS sp ON p.id_status_pelanggaran = sp.id_status_pelanggaran";
        
        $stmtDataPelanggaran = sqlsrv_prepare($this->db, $sqlDataPelanggaranByDPA);

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
?>
