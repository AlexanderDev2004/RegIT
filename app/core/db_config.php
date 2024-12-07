<?php



// Koneksi ke database menggunakan SQL Server
$serverName = DB_SERVER; // ganti dengan server Anda
$connectionInfo = array("Database" => DB_NAME);
$conn = sqlsrv_connect($serverName, $connectionInfo);

if (!$conn) {
    die("Connection could not be established.<br />" . print_r(sqlsrv_errors(), true));
}

// Kembalikan koneksi untuk digunakan di model atau controller
return $conn;


?>