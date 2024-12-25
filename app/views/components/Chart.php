<!-- Graph -->
<div class="mx-auto rounded-md shadow-md p-4 flex-col justify-center items-center max-w-screen-xl bg-white mt-10">
        <div class="">
            <canvas id="myChart" class="mx-auto mb-14 h-[600px] mb-6 flex rounded"></canvas>
        </div>
    </div>    

    <!-- Code Grafik -->
    <script>
        const pelanggaranData = <?= $encodedJsonChartData ?>;

        const labelsMonths = Object.keys(pelanggaranData);
        const dataPelanggaran = Object.values(pelanggaranData);
        
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labelsMonths,
                datasets: [{
                    label: 'Jumlah Pelanggaran',
                    data: dataPelanggaran,
                    borderWidth: 1,
                      
                }]
            },
            options: {
                scales: {

                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <!-- Code Grafik End -->