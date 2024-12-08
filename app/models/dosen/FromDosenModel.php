<?php
require_once __DIR__ . '/../Model.php'; 

class FromDosenModel extends Model {

    public function getDataFromDosen($id) : array {
        $dataFromDosen = [];
        $returnData = [];
        $sql = "SELECT FORMAT(tgl_from, 'MMMM') AS bulan, 
            COUNT(*) AS jumlah_from FROM from_dosen WHERE id_from_dosen = ? GROUP BY FORMAT(tgl_from, 'MMMM'), 
            MONTH(tgl_from) ORDER BY MONTH(tgl_from)";
        $stmt = sqlsrv_query($this->db, $sql, [$id]);
        if ($stmt) {
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $dataFromDosen[$row['bulan']] = $row['jumlah_from'];
            }
        }
        // Generate array month name with date time now -> month date time now -1 
        $this->generateMonthNow(function($months) {
            foreach ($months as $month) {
                $returnData[$month] = $dataFromDosen[$month] ?? 0;
            }
        });
        return $returnData;
    }

    private function generateMonthNow($callback) {
        $months = [];
        // Loop dari bulan sekarang hingga bulan sebelumnya
        for ($i = 0; $i < 12; $i++) {
            // Hitung bulan yang akan dimasukkan
            $month = date('F', strtotime("-$i month"));  // Mengambil nama bulan
            // Masukkan nama bulan ke dalam array
            array_push($months, $month); 
        }
        $callback($months);
    }
}