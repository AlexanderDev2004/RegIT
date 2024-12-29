<?php 

require_once __DIR__ . '/../Model.php';

class DPEditProfilModel extends Model {

    public function checkOldPass(string $passwordLama){
        // Check if nim is available in kredensial_pegawai
        $sql = "SELECT TOP 1 * FROM kredensial_pegawai WHERE id_pegawai = ?";

        $stmt = sqlsrv_prepare($this->db, $sql, array($_SESSION['id_pegawai']));

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

    public function saveNewPass(string $idPegawai, string $passwordBaru){
        $sql = "UPDATE kredensial_pegawai
                    SET password = ?
                    WHERE id_pegawai = ?";
        
        $stmt = sqlsrv_prepare($this->db, $sql, array(hash("sha256", $passwordBaru), $idPegawai));

        if (!$stmt || !sqlsrv_execute($stmt)) {
            die("Error preparing statement or executing query: " . print_r(sqlsrv_errors(), true));
            return false;
        } else {
            return true;
        }
    }

}

?>