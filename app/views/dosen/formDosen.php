<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Dosen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-[#EBEEF5]">
    <!-- Navbar -->
    <?php include "components/header.php"?>
    <!-- Navbar End -->

    <!-- SideBar -->
    <div class="flex w-full mx-auto">
        <div class="w-64 h-screen bg-[#132145] text-white flex flex-col items-center py-6 absolute top-0">
            <div class="mb-6">
                <div class="w-20 h-20 flex items-center justify-center rounded-lg mt-6">
                    <img src="../../Public/LogoSide.png" alt="logo" class="w-20 h-20 object-contain">
                </div>
            </div>
            <!-- Navbar menu -->
            <nav class="w-64 flex flex-col">
                <a href="dosen.php" class="flex items-center gap-4 px-6 py-3 mb-2 rounded-lg text-sm font-bold hover:bg-yellow-600">
                    <svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.274461 6.12617C0 6.72291 0 7.40179 0 8.75955V12.9999C0 14.8856 0 15.8284 0.585786 16.4142C1.11733 16.9457 1.94285 16.9949 3.5 16.9995V12C3.5 10.8954 4.39543 10 5.5 10H8.5C9.60457 10 10.5 10.8954 10.5 12V16.9995C12.0572 16.9949 12.8827 16.9457 13.4142 16.4142C14 15.8284 14 14.8856 14 12.9999V8.75955C14 7.40179 14 6.72291 13.7255 6.12617C13.4511 5.52943 12.9356 5.08763 11.9047 4.20401L10.9047 3.34687C9.04143 1.74974 8.10977 0.951172 7 0.951172C5.89023 0.951172 4.95857 1.74974 3.09525 3.34687L2.09525 4.20401C1.06437 5.08763 0.548923 5.52943 0.274461 6.12617ZM8.5 16.9999V12H5.5V16.9999H8.5Z" fill="white" />
                    </svg>
                    <span>Beranda</span>                   
                </a>
                <a href="formDosen.php" class="flex items-center gap-4 px-6 py-3 mb-2 rounded-lg text-sm font-bold bg-[#F99D1C]">
                    <span>Form</span>
                </a>
                <a href="pelanggaran.php" class="flex items-center gap-4 px-6 py-3 mb-2 rounded-lg text-sm font-bold hover:bg-yellow-600">
                    <span>Pelanggaran</span>
                </a>
                <a href="profildosen.php" class="flex items-center gap-4 px-6 py-3 mb-2 rounded-lg text-sm font-bold hover:bg-yellow-600">
                    <span>Profil Saya</span>
                </a>
            </nav>
        </div>
    </div>
    <!-- End SideBar -->

    <!-- Content -->
    <div id="Form" class="flex justify-center items-center pt-8">
        <p class="font-bold text-3xl flex text-center text-[#132145] ml-8">Tambah Data Pelanggaran</p>
    </div>

    <div class="mx-auto rounded-md shadow-md p-4 max-w-screen-xl bg-white mt-8">
        <form action="FromDosenController.php?action=createLaporanPelanggaran" method="POST" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                <input type="number" id="nim" name="nim" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Masukkan NIM">
            </div>
            <div class="mb-4">
                <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal Pelanggaran</label>
                <input type="date" id="tanggal" name="tanggal" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div class="mb-4">
                <label for="pelanggaran" class="block text-sm font-medium text-gray-700">Pelanggaran</label>
                <select id="pelanggaran" name="pelanggaran" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <option value="1">Berbusana tidak sopan</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Upload Bukti</label>
                <input type="file" id="image" name="image" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div class="flex justify-between">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md">Simpan</button>
                <button type="reset" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md">Kembali</button>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <?php include "../components/Footer.php"?>
    <!-- Footer End -->
</body>
</html>
