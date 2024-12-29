<?php 

require_once __DIR__ . '/../Model.php';

class KDetailPelanggaranModel extends Model {
    public function getDetailPelanggaranFromID($idPelanggaran){
        $sql = "SELECT TOP 1 m.nim, 
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
}

?>