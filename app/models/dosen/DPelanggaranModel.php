<?php

require_once __DIR__ . '/../Model.php';

class DPelanggaranDosenModel extends Model {
    public function createLaporanPelanggaranDosen($nim, $idStatusPelanggaran, $idPegawai, $idTataTertib, $tglPelanggaran, $fileName, $imageData) {
        // Query SQL untuk menyimpan data pelanggaran
        $sql = "INSERT INTO pelanggaran (nim, id_status_pelanggaran, id_pegawai, id_tata_tertib, tgl_pelanggaran, image_name, image_data) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("siissbs", $nim, $idStatusPelanggaran, $idPegawai, $idTataTertib, $tglPelanggaran, $fileName, $imageData);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
