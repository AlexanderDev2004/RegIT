<?php 

require_once __DIR__ . '/../Model.php';

class KEditDataPelanggaranModel extends Model {
    public function getDetailPelanggaranFromID($idPelanggaran){
        $sql = "SELECT TOP 1 m.nim
                        , m.nama_mahasiswa
                        , m.angkatan
                        , prod.nama_prodi
                        , k.nama_kelas
                        , sm.status_mahasiswa
                        , p.tgl_pelanggaran
                        , tt.level_tatib
                        , s.tgl_sanksi
                        , i.file_name
                        , i.image_data
                        , tt.deskripsi
                        , s.jenis_sanksi
                        , sp.status_pelanggaran
                FROM pelanggaran AS p
                INNER JOIN mahasiswa AS m ON p.nim = m.nim
                INNER JOIN prodi AS prod ON m.id_prodi = prod.id_prodi
                INNER JOIN kelas AS k ON m.id_kelas = k.id_kelas
                INNER JOIN status_mahasiswa AS sm ON m.id_status_mhs = sm.id_status_mahasiswa
                INNER JOIN tata_tertib AS tt ON p.id_tata_tertib = tt.id_tata_tertib
                LEFT JOIN sanksi AS s ON p.id_pelanggaran = s.id_pelanggaran
                LEFT JOIN image AS i ON p.id_image = i.id_image
                INNER JOIN status_pelanggaran AS sp ON p.id_status_pelanggaran = sp.id_status_pelanggaran
                WHERE p.id_pelanggaran = ?";

        $stmt = sqlsrv_prepare($this->db, $sql, array($idPelanggaran));

        // Menangani error saat eksekusi
        if(!$stmt || !sqlsrv_execute($stmt)){
            throw new Exception('Error executing SQL query: ' . print_r(sqlsrv_errors(), true));
            return [];
        }
        
        // If query executed successfully maka dia akan mengembalikan data pelanggaran
        return sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    }

    public function getListTatib(){
        $sql = "SELECT * FROM tata_tertib";

        $stmt = sqlsrv_prepare($this->db, $sql);

        if(!$stmt || !sqlsrv_execute($stmt)){
            throw new Exception('Error executing SQL query: ' . print_r(sqlsrv_errors(), true));
            return [];
        }

        $listTatib = [];
        while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
            $listTatib[] = $row;
        }

        return $listTatib;
    }
}

?>