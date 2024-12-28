<!-- Graph -->
<div class="mx-auto rounded-md shadow-md p-4 flex flex-col justify-center items-center max-w-screen-xl bg-white mt-10">
    <div class="w-full max-w-full overflow-x-auto">
        <div class="w-full h-96"> <!-- Mengatur lebar penuh dan tinggi 24rem (96 * 0.25rem) -->
            <canvas id="myChart" class="w-full h-full"></canvas> <!-- Mengatur canvas agar mengisi kontainer -->
        </div>
    </div>
</div>    

<!-- Code Grafik -->
<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [{
                label: 'Jumlah Pelanggaran',
                data: [12, 19, 3, 5, 2, 3, 7, 8, 9, 10, 11, 12],
                borderWidth: 1,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, // Ubah ini menjadi false agar chart dapat menyesuaikan ukuran kontainer
            scales: {
                y: {
                    beginAtZero: true  
                }
            }
        }
    });
</script>
<!-- Code Grafik End -->