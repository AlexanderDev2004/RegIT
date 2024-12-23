<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content here -->
</head>
<body class="bg-[#EBEEF5] scale font-poppins">
    <!-- Navbar -->
    <?php include "components/header.php"?>
    <!-- Navbar End -->

    <!-- SideBar -->
    <div class="flex w-full mx-auto">
        <div class="w-64 h-screen bg-[#132145] text-white flex flex-col items-center py-6 absolute top-0">
            <!-- Sidebar content here -->
        </div>
    </div>
    <!-- Sidebar End -->

    <!-- Main Content -->
    <div id="Pelanggaran" class="flex justify-center items-center pt-8">
       <p class="font-bold text-3xl flex text-center items-center text-[#132145] ml-8 flex flex-col justify-center">Analisa Pelanggaran</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md w-11/12 lg:w-3/4 ml-80 mt-10">
        <div class="overflow-x-auto overflow-y-auto max-h-[500px]">
            <table class="w-full border-collapse border border-blue-200 text-sm text-left">
                <thead class="bg-white text-gray-800">
                    <tr>
                        <th class="border border-blue-200 px-4 py-2">No</th>
                        <th class="border border-blue-200 px-4 py-2 w-1/3">Nama Mahasiswa</th>
                        <th class="border border-blue-200 px-4 py-2">Tanggal Pelanggaran</th>
                        <th class="border border-blue-200 px-4 py-2">Deskripsi Pelanggaran</th>
                        <th class="border border-blue-200 px-4 py-2">Sanksi</th>
                        <th class="border border-blue-200 px-4 py-2 w-1/5">Tanggal Sanksi</th>
                        <th class="border border-blue-200 px-4 py-2">Status Pelanggaran</th>
                        <th class="border border-blue-200 px-4 py-2">Status Mahasiswa</th>
                        <th class="border border-blue-200 px-4 py-2">Lainnya</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach ($dataPelanggaran as $pelanggaran) { ?>
                        <tr class="bg-white">
                            <td class="border border-blue-200 px-4 py-2 text-center"><?= $no++ ?></td>
                            <td class="border border-blue-200 px-4 py-2"><?= $pelanggaran['nama_mahasiswa'] ?></td>
                            <td class="border border-blue-200 px-4 py-2"><?= $pelanggaran['tgl_pelanggaran'] ?></td>
                            <td class="border border-blue-200 px-4 py-2"><?= $pelanggaran['deskripsi'] ?></td>
                            <td class="border border-blue-200 px-4 py-2"><?= $pelanggaran['jenis_sanksi'] ?></td>
                            <td class="border border-blue-200 px-4 py-2 text-center"><?= $pelanggaran['tgl_sanksi'] ?></td>
                            <td class="border border-blue-200 px-4 py-2 text-center"><?= $pelanggaran['status_pelanggaran'] ?></td>
                            <td class="border border-blue-200 px-4 py-2 text-center"><?= $pelanggaran['status_mahasiswa'] ?></td>
                            <td class="border border-blue-200 px-4 py-2 text-center">
                                <div class="flex flex-row justify-center space-x-2"> 
                                    <button type="button" onclick="window.location.href='detailPelanggaran.php'" 
                                        class="flex items-center w-28 px-4 py-2 bg-[#132145] text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                        <img src="../../Public/Details.svg" alt="" class="">
                                        <span class="ml-2">Detail</span>    
                                    </button>
                                    <button type="button" 
                                        class="flex flex-row w-28 px-4 py-2 bg-[#FF3B30] text-white font-semibold rounded-lg shadow-md ml-2 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                        <img src="../../Public/Trash.svg" alt="">
                                        <span class="ml-2">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <?php include "./app/views/components/footer.php"?>
    <!-- Footer End -->
</body>
</html>