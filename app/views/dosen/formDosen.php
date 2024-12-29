<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Dosen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          },
          fontFamily: {
            poppins: ['Poppins', 'sans-serif'],
          }
        }
      }
    }
    </script>
</head>
<body class="bg-[#EBEEF5] font-poppins">
    <!-- Navbar -->
    <?php include "components/header.php"?>
    <!-- Navbar End -->

    <!-- Sidebar -->
    <div class="flex w-full mx-auto">
        <div class="w-64 h-screen bg-[#132145] text-white flex flex-col items-center py-6 fixed top-0">
            <div class="mb-6">
                <div class="w-20 h-20 flex items-center justify-center rounded-lg mt-6">
                    <img src="../public/LogoSide.png" alt="logo" class="w-20 h-20 object-contain">
                </div>
            </div>
            <!-- Navbar menu -->
            <nav class="w-64 flex flex-col">
                <a href="dashboard" class="flex items-center gap-4 px-6 py-3 mb-2 rounded-lg text-white text-sm font-bold hover:bg-yellow-600">
                    <i class="fa-solid fa-house"></i>
                    <span>Beranda</span>
                </a>
                <a href="form" class="flex items-center gap-4 px-6 py-3 mb-2 rounded-lg text-white text-sm font-bold hover:bg-yellow-600 bg-[#F99D1C]">
                    <i class="fa-solid fa-pen"></i>
                    <span>Form</span>
                </a>
                <a href="pelanggaran" class="flex items-center gap-4 px-6 py-3 mb-2 rounded-lg text-white text-sm font-bold hover:bg-yellow-600">
                    <i class="fa-solid fa-ban"></i>
                    <span>Pelanggaran</span>
                </a>
                <a href="profil" class="flex items-center gap-4 px-6 py-3 mb-2 rounded-lg text-white text-sm font-bold hover:bg-yellow-600">
                    <i class="fa-solid fa-user"></i>
                    <span>Profil Saya</span>
                </a>
            </nav>
        </div>
    </div>
    <!-- End Sidebar -->

    <!-- Main Content -->
    <div class="ml-64 w-full p-6 pt-8">
        <div id="Form" class="flex justify-center items-center">
            <p class="font-bold text-3xl text-[#132145]">Tambah Data Pelanggaran</p>
        </div>

        <div class="mt-8 p-6 rounded-md shadow-md bg-white max-w-screen-lg mx-auto">
            <form action="<?= BASE_URL ?>/dosen/createLaporanPelanggaran" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                    <input type="number" id="nim" name="nim" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#132145] focus:border-[#132145]" placeholder="Masukkan NIM" required>
                </div>
                <div class="mb-4">
                    <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal Pelanggaran</label>
                    <input type="date" id="tanggal" name="tanggal" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#132145] focus:border-[#132145]" required>
                </div>
                <div class="mb-4">
                    <label for="pelanggaran" class="block text-sm font-medium text-gray-700">Pelanggaran</label>
                    <select id="pelanggaran" name="pelanggaran" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#132145] focus:border-[#132145]" required>
                        <option value="1">Berbusana tidak sopan</option>
                        <option value="2">Berkata tidak sopan</option>
                        <!-- Tambahkan opsi lain sesuai kebutuhan -->
                    </select>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Upload Bukti</label>
                    <input type="file" id="image" name="image" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#132145] focus:border-[#132145]" required>
                </div>
                <div class="flex justify-between">
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-green-700">Simpan</button>
                    <button type="reset" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md shadow-md hover:bg-gray-400">Reset</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Main Content End -->

    <!-- Footer -->
    <?php include "./app/views/components/footer.php"?>
    <!-- Footer End -->
</body>
</html>