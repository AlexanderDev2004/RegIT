<?php
require_once __DIR__ . '/../Model.php';

class DPFormModel extends Model {
    protected $table = 'pelanggaran'; // Nama tabel yang sesuai untuk pelanggaran

    // Ambil semua data pelanggaran
    public function getAll() {
        $query = "SELECT * FROM {$this->table}";
        $stmt = sqlsrv_query($this->db, $query);
        
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true)); // Handle query error
        }
        
        $result = [];
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $result[] = $row;
        }

        return $result;
    }

    // Ambil data pelanggaran berdasarkan ID
    public function getById($id) {
        $query = "SELECT * FROM {$this->table} WHERE [id] = ?";
        $params = array($id);
        $stmt = sqlsrv_query($this->db, $query, $params);
        
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true)); // Handle query error
        }
        
        return sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    }

    // Simpan data pelanggaran baru
    public function insert($data) {
        // Handle file upload for 'foto_bukti'
        if (isset($data['foto_bukti']) && $data['foto_bukti']['error'] == UPLOAD_ERR_OK) {
            $targetDir = 'uploads/'; // Specify your file upload directory
            $fileName = basename($data['foto_bukti']['name']);
            $targetFilePath = $targetDir . $fileName;
            move_uploaded_file($data['foto_bukti']['tmp_name'], $targetFilePath);
            $fotoBuktiPath = $targetFilePath; // Save the file path
        } else {
            $fotoBuktiPath = null;
        }

        $query = "INSERT INTO {$this->table} ([nim], [angkatan], [kelas], [tanggal_pelanggaran], [pelanggaran], [foto_bukti], [sanksi], [status_pelanggaran]) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $params = array(
            $data['nim'], 
            $data['angkatan'], 
            $data['kelas'], 
            $data['tanggal_pelanggaran'], 
            $data['pelanggaran'], 
            $fotoBuktiPath, // Save file path
            $data['sanksi'], 
            $data['status_pelanggaran']
        );
        
        $stmt = sqlsrv_query($this->db, $query, $params);
        
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true)); // Handle query error
        }
        
        // Mendapatkan ID terakhir yang disisipkan
        $lastInsertIdQuery = "SELECT SCOPE_IDENTITY() AS last_id";
        $stmtLastId = sqlsrv_query($this->db, $lastInsertIdQuery);
        $row = sqlsrv_fetch_array($stmtLastId, SQLSRV_FETCH_ASSOC);
        
        return $row['last_id'];
    }
}
