<?php 

trait BerandaTrait
{
    public function getDataPelanggaranTrait($db) : array {
        $dataPelanggaran = [];
        $returnData = [];

        $sql = "SELECT 
                    FORMAT(tgl_pelanggaran, 'MMMM') AS bulan,
                    COUNT(*) AS jumlah_pelanggaran
                FROM pelanggaran
                GROUP BY
                        FORMAT(tgl_pelanggaran, 'MMMM'),
                    MONTH(tgl_pelanggaran)
                ORDER BY MONTH(tgl_pelanggaran)";

        $stmt = sqlsrv_query($db, $sql);

        if ($stmt && sqlsrv_has_rows($stmt)) {
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $dataPelanggaran[$row['bulan']] = $row['jumlah_pelanggaran'];
            }
        }

        // Generate array month name with date time now -> month date time now -1 
        $this->generateMonthNow(function($months) use (&$returnData, $dataPelanggaran) {
            foreach ($months as $month) {
                $returnData[$month] = $dataPelanggaran[$month] ?? 0;
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


?>