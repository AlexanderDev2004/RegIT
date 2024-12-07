<?php 

class RegisterModel {

    private $db;

    public function __construct() {
        $this->db = include_once __DIR__ . '/../core/db_config.php';
    }

    public function register(string $userId, string $email, string $password, string $fileName, string $imageData) {
        $hashedPassword = hash('sha256', $password); // Gunakan password_hash untuk produksi
    
        // Menentukan Role dan SQL Query
        $role = null;
        $procedure = null;
        $parameters = [];
    
        switch (true) {
            case strlen($userId) === 18:
                $role = "Pegawai";
                $procedure = "GetRegisterPegawai";
                $parameters = [$userId, $email, $hashedPassword, $fileName, $imageData];
                break;
    
            case strlen($userId) >= 10 && strlen($userId) <= 12:
                $role = "Mahasiswa";
                $procedure = "GetRegisterMahasiswa";
                $parameters = [$userId, $email, $hashedPassword, $fileName, $imageData];
                break;
        }
    
        // Role tidak valid
        if (is_null($role)) {
            return false;
        }
    
        // Siapkan Query SQL
        $sql = "EXEC $procedure 
                @IdOrNim = ?, 
                @Email = ?, 
                @Password = ?, 
                @FileName = ?, 
                @ImageData = ?";
    
        $stmt = sqlsrv_prepare($this->db, $sql, $parameters);
    
        // Eksekusi Query
        if ($stmt && sqlsrv_execute($stmt)) {
            return true;
        }
    
        return false;
    }
}

?>