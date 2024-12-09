<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

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
<body class="bg-[#EBEEF5] scale font-poppins">
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
                <a href="datamhs.php" target="" class="flex items-center gap-4 px-6 py-3 mb-2 bg-[#132145] rounded-lg text-white rounded-lg text-sm font-bold hover:bg-yellow-600 bg-[#F99D1C]">
                <img src="../../Public/personalcard.svg" alt="">
                    <span class="">Data Mahasiswa</span>                   
                </a>
                <a href="dataDosen.php" target="" class="flex items-center gap-4 px-6 py-3 mb-2 bg-[#132145] rounded-lg text-white rounded-lg text-sm font-bold hover:bg-yellow-600">
                <img src="../../Public/personalcard.svg" alt="">    
                    <span class="">Data Dosen</span>
                </a>
                <a href="dataDPA.php" target="" class="flex items-center gap-4 px-6 py-3 mb-2 bg-[#132145] rounded-lg text-white rounded-lg text-sm font-bold hover:bg-yellow-600">
                <img src="../../Public/personalcard.svg" alt="">
                    <span class="">Data DPA</span>
                </a>
                <a href="datakomdis.php" target="" class="flex items-center gap-4 px-6 py-3 mb-2 bg-[#132145] rounded-lg text-white rounded-lg text-sm font-bold hover:bg-yellow-600">
                <img src="../../Public/personalcard.svg" alt="">
                    <span class="">Data Komdis</span>
                </a>
                <a href="dataadmin.php" target="" class="flex items-center gap-4 px-6 py-3 mb-2 bg-[#132145] rounded-lg text-white rounded-lg text-sm font-bold hover:bg-yellow-600">
                <img src="../../Public/personalcard.svg" alt="">
                    <span class="">Data Admin</span>
                </a>
                <a href="pelanggaran.php" target="" class="flex items-center gap-4 px-6 py-3 mb-2 bg-[#132145] rounded-lg text-white rounded-lg text-sm font-bold hover:bg-yellow-600">
                <img src="../../Public/logoPelanggaran.svg" alt="">
                    <span class="">Pelanggaran</span>
                </a>
                <a href="profilAdmin.php" target="" class="flex items-center gap-4 px-6 py-3 mb-2 bg-[#132145] rounded-lg text-white rounded-lg text-sm font-bold hover:bg-yellow-600">
                <img src="../../Public/logoUser.svg" alt="">
                    <span class="">Profil Saya</span>
                </a>
            </nav>
        </div>
    </div>
    <!-- Sidebar End -->

    <div id="Beranda" class=" flex justify-center pt-8 ">
        <p class="font-bold text-3xl flex text-center items-center text-[#132145] py-auto pl-64 mb-8 flex flex-col justify-center">Data Mahasiswa</p>
    </div>

    <!-- Content -->
     <div class="bg-white p-6 rounded-lg shadow-md w-full lg:w-3/4 ml-80 mt-8">
        <div class="overflow-x-auto grid grid-cols-3 gap-x-0 gap-y-8">
            <div class="mt-6 mb-2">
                <span class="font-bold text-[#132145] ml-8">NIM</span>
                <p class="ml-8 text-gray-600">2341720220</p>
            </div>
            <div class="mt-6 ">
                <span class="font-bold text-[#132145] ml-8">Nama</span>
                <p class="ml-8 text-gray-600">Fiera Ziadattun Nisa'</p>
            </div>
            <div class="mt-6 ">
                <span class="font-bold text-[#132145] ml-8">Angkatan</span>
                <p class="ml-8 text-gray-600">2023</p>
            </div>
            <div class="mt-6 ">
                <span class="font-bold text-[#132145] ml-8">Prodi</span>
                <p class="ml-8 text-gray-600">DIV Teknik Informatika</p>
            </div>
            <div class="mt-6 ">
                <span class="font-bold text-[#132145] ml-8">Kelas</span>
                <p class="ml-8 text-gray-600">2H</p>
            </div>
            <div class="mt-6">
                <span class="font-bold text-[#132145] ml-8">Status Mahasiswa</span>
                <p class="ml-8 text-gray-600">Aktif</p>
            </div>
        </div>

        <div class="flex mt-6 mb-2">
            <div class="font-bold text-[#132145] ml-8">Bukti</div>
            <img src="../../public/contohKTM.png" alt="">
        </div>
        
     </div>

    <!-- Footer -->
    <?php include "../components/Footer.php"?>
    <!-- Footer End -->
</body>
</html>