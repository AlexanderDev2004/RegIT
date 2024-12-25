<?php 

require_once __DIR__ . '/../Model.php';

class LoginModel extends Model {

    public function authenticate($userId, $password) : array|bool 
    {
        // Hash password untuk verifikasi
        $hashedPassword = hash('sha256', $password); // Gunakan password_hash untuk produksi

        // Cek login mahasiswa
        $sqlMahasiswa = "EXEC GetLoginMahasiswa @Nim = ?, @Password = ?";
        $stmtMahasiswa = sqlsrv_prepare($this->db, $sqlMahasiswa, array($userId, $hashedPassword));

        if ($stmtMahasiswa && sqlsrv_execute($stmtMahasiswa)) {
            $resultMahasiswa = sqlsrv_fetch_array($stmtMahasiswa, SQLSRV_FETCH_ASSOC);
            
            $resultMahasiswa['response'] = filter_var($resultMahasiswa['response'], FILTER_VALIDATE_BOOLEAN);

            if ($resultMahasiswa['response']) {
                return ['user_id' => $userId, 'role' => 'mahasiswa'];
            }
        }

        // Cek login pegawai
        $sqlPegawai = "EXEC GetLoginPegawai @IdPegawai = ?, @Password = ?";
        $stmtPegawai = sqlsrv_prepare($this->db, $sqlPegawai, array($userId, $hashedPassword));

        if ($stmtPegawai && sqlsrv_execute($stmtPegawai)) {
            $resultPegawai = sqlsrv_fetch_array($stmtPegawai, SQLSRV_FETCH_ASSOC);
            $resultPegawai['response'] = filter_var($resultPegawai['response'], FILTER_VALIDATE_BOOLEAN);

            if ($resultPegawai['response']) {
                return ['user_id' => $userId, 'role' => 'pegawai'];
            }
        }

        return false; // Jika tidak ditemukan
    }

    function getRoleUser($IdPegawai) {
        $sql = "SELECT TOP 1 rp.role_pegawai 
                    FROM pegawai AS p
                    INNER JOIN role_pegawai AS rp ON p.id_role_pegawai = rp.id_role_pegawai
                    WHERE p.id_pegawai = ?";
        $stmt = sqlsrv_prepare($this->db, $sql, array($IdPegawai));
        if ($stmt && sqlsrv_execute($stmt)) {
            $result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            return $result['role_pegawai'];
        }
    }

    function getNameByID($id){
        $GLOBALS["id"] = $id; ;

        if(strlen($id) == 0){
            return "NO ID PROVIDED!";
        } else if ($this->isMahasiswa() || $this->isPegawai()) {
            // Mahasiswa get name by nim
            $nameColumn = $this->isMahasiswa() ? 'nama_mahasiswa' : 'nama_pegawai';
            $tableName = $this->isMahasiswa() ? 'mahasiswa' : 'pegawai';
            $idColumn = $this->isMahasiswa() ? 'nim' : 'id_pegawai';
            $sql = "SELECT TOP 1 {$nameColumn} FROM {$tableName} WHERE {$idColumn} = ?";
        } else {
            return "NOT A VALID ID!";
        }

        $stmt = sqlsrv_prepare($this->db, $sql, array($id));
        if ($stmt && sqlsrv_execute($stmt)) {
            $result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            return $result[$nameColumn];
        } else {
            return "ID NOT FOUND!";
        }
    }

    function isMahasiswa() {
        return strlen($GLOBALS['id']) >= 10 && strlen($GLOBALS['id']) <= 12;
    }

    function isPegawai(){
        return strlen($GLOBALS['id']) == 18;
    }
}

?>