<?php

require_once __DIR__ . '/../Model.php';
require_once __DIR__ . '/../.././core/db_config.php';
class KPelanggaranModel extends Model {

    public function getPelanggaranTingkat1() {
        $query = "
            SELECT m.nama_mahasiswa, p.tgl_pelanggaran, t.deskripsi, sa.jenis_sanksi, sa.tgl_sanksi, sp.status_pelanggaran, sm.status_mahasiswa
            FROM pelanggaran AS p
            INNER JOIN mahasiswa AS m ON p.nim = m.nim
            INNER JOIN sanksi AS sa ON p.id_pelanggaran = sa.id_pelanggaran
            INNER JOIN status_pelanggaran AS sp ON p.id_status_pelanggaran = sp.id_status_pelanggaran
            INNER JOIN status_mahasiswa AS sm ON m.id_status_mhs = sm.id_status_mahasiswa
            INNER JOIN tata_tertib AS t ON p.id_tata_tertib = t.id_tata_tertib
            WHERE t.level_tatib = 1
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}