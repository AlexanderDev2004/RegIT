<?php
class MahasiswaModel {
    private $db;

    public function __construct() {
        $this->db = new Database(); // Pastikan kelas Database terkoneksi dengan SQL Server
    }

    public function getProfilMahasiswaByNIM($nim) {
        $query = "SELECT m.nim, m.nama, p.nama_prodi, k.nama_kelas, m.angkatan, sm.status 
                  FROM mahasiswa m
                  JOIN prodi p ON m.prodi_id = p.id
                  JOIN kelas k ON m.kelas_id = k.id
                  JOIN status_mahasiswa sm ON m.status_id = sm.id
                  WHERE m.nim = :nim";
        $this->db->query($query);
        $this->db->bind(':nim', $nim);

        return $this->db->single(); // Ambil satu baris data
    }
}
