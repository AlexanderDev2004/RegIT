<?php 

class UserModel {
    private $db;

    public function __construct() {
        $this->db = include_once __DIR__ . '/../core/db_config.php';
    }

    public function authenticate($username, $password) {
        // Hash password untuk verifikasi
        $hashedPassword = hash('sha256', $password); // Gunakan password_hash untuk produksi

        // Cek login mahasiswa
        $sqlMahasiswa = "EXEC GetLoginMahasiswa @Nim = ?, @Password = ?";
        $stmtMahasiswa = sqlsrv_prepare($this->db, $sqlMahasiswa, array($username, $hashedPassword));

        if ($stmtMahasiswa && sqlsrv_execute($stmtMahasiswa)) {
            $resultMahasiswa = sqlsrv_fetch_array($stmtMahasiswa, SQLSRV_FETCH_ASSOC);
            
            $resultMahasiswa['response'] = filter_var($resultMahasiswa['response'], FILTER_VALIDATE_BOOLEAN);

            if ($resultMahasiswa['response']) {
                return ['user_id' => $username, 'role' => 'mahasiswa'];
            }
        }

        // Cek login pegawai
        $sqlPegawai = "EXEC GetLoginPegawai @IdPegawai = ?, @Password = ?";
        $stmtPegawai = sqlsrv_prepare($this->db, $sqlPegawai, array($username, $hashedPassword));

        if ($stmtPegawai && sqlsrv_execute($stmtPegawai)) {
            $resultPegawai = sqlsrv_fetch_array($stmtPegawai, SQLSRV_FETCH_ASSOC);
            $resultPegawai['response'] = filter_var($resultPegawai['response'], FILTER_VALIDATE_BOOLEAN);

            if ($resultPegawai['response']) {
                return ['user_id' => $username, 'role' => 'pegawai'];
            }
        }

        return false; // Jika tidak ditemukan
    }

    function getRoleUser($IdPegawai) {
        $sql = "SELECT rp.role_pegawai 
                    FROM pegawai AS p
                    INNER JOIN role_pegawai AS rp ON p.id_role_pegawai = rp.id_role_pegawai
                    WHERE p.id_pegawai = ?";
        $stmt = sqlsrv_prepare($this->db, $sql, array($IdPegawai));
        if ($stmt && sqlsrv_execute($stmt)) {
            $result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            return $result['role_pegawai'];
        }
    }
}

?>