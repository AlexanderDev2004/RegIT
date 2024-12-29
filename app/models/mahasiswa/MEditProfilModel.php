<?php 

require_once __DIR__ . '/../Model.php';

class MEditProfilModel extends Model {
    
    public function checkOldPass(string $passwordLama){
        // Check if nim is available in kredensial_mahasiswa
        $sql = "SELECT TOP 1 * FROM kredensial_mahasiswa WHERE nim = ?";

        $stmt = sqlsrv_prepare($this->db, $sql, array($_SESSION['nim']));

        if (!$stmt || !sqlsrv_execute($stmt)) {
            die("Error preparing statement or executing query: " . print_r(sqlsrv_errors(), true));
        }
        
        $result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

        
        if (!$result) {
            return false;
        } 
        
        // Check if password is correct
        return (hash("sha256", $passwordLama) === $result['password']);
    }

    public function checkConfirmNewPass(string $passwordBaru, string $konfirmasiPassword){
        return $passwordBaru === $konfirmasiPassword && $passwordBaru !== "" && $konfirmasiPassword !== "";
    }

    public function saveNewPass(string $nim, string $passwordBaru){
        $sql = "UPDATE kredensial_mahasiswa
                    SET password = ?
                    WHERE nim = ?";
        
        $stmt = sqlsrv_prepare($this->db, $sql, array(hash("sha256", $passwordBaru), $nim));

        if (!$stmt || !sqlsrv_execute($stmt)) {
            die("Error preparing statement or executing query: " . print_r(sqlsrv_errors(), true));
            return false;
        } else {
            return true;
        }
    }

}

?>