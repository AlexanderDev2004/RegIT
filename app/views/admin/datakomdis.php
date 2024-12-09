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
                <a href="datamhs.php" target="" class="flex items-center gap-4 px-6 py-3 mb-2 bg-[#132145] rounded-lg text-white rounded-lg text-sm font-bold hover:bg-yellow-600">
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
                <a href="datakomdis.php" target="" class="flex items-center gap-4 px-6 py-3 mb-2 bg-[#132145] rounded-lg text-white rounded-lg text-sm font-bold hover:bg-yellow-600 bg-[#F99D1C]">
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

    <!-- Table Start -->
    <div class="bg-white p-6 rounded-lg shadow-md w-11/12 lg:w-3/4 ml-80">
        <div class="flex flex-end justify-end">
            <button type="button" onclick="window.location.href='tambahAdmin.php'"
                class="flex items-center w-66 px-4 py-2 mb-2 mr-2 bg-[#34C759] text-white font-semibold rounded-lg shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                    <img src="../../Public/iconTambah.svg" alt="" class="mr-2">
                    <span>Tambah Data Komdis</span>
            </button>
        </div>
        <div class="overflow-x-auto overflow-y-auto max-h-[500px]">
        <table class="w-full border-collapse border border-[#132145] text-sm text-left">
                <thead class="bg-white text-gray-800">
                    <tr>
                        <th class="border border-[#132145] px-4 py-2">No</th>
                        <th class="border border-[#132145] px-4 py-2">NIP</th>
                        <th class="border border-[#132145] px-4 py-2">Nama Dosen</th>
                        <th class="border border-[#132145] px-4 py-2">Email</th>
                        <th class="border border-[#132145] px-4 py-2">Bukti</th>
                        <th class="border border-[#132145] px-4 py-2">Status Verifikasi</th>
                        <th class="border border-[#132145] px-4 py-2">Lainnya</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white">
                        <td class="border border-[#132145] px-4 py-2 text-center">1</td>
                        <td class="border border-[#132145] px-4 py-2">19827251234</td>
                        <td class="border border-[#132145] px-4 py-2">Komdis123 </td>
                        <td class="border border-[#132145] px-4 py-2 text-center">dosen123@abc.com</td>
                        <td class="border border-[#132145] px-4 py-2"><img src="../../Public/contohKTM.png" alt=""></td>
                        <td class="border border-[#132145] px-4 py-2 text-center">
                            <div class="flex flex-row justify-center">
                                <img src="../../Public/centang.svg" alt="" class="flex flex-row justify-center">
                                <span>Verified</span>
                            </div>
                        </td>
                        <td class="border border-[#132145] px-4 py-2 text-center">
                            <div class="flex flex-row justify-center space-x-2"> 
                                <button type="button" onclick="window.location.href='detailPelanggaran.php'" 
                                    class="flex items-center w-28 px-4 py-2 bg-[#132145] text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    <i class="fa-solid fa-pen pl-0 pr-2"></i>
                                    <span class="ml-2">Edit</span>    
                                </button>
                                <button type="button" 
                                    class="flex flex-row w-28 px-4 py-2 bg-[#FF3B30] text-white font-semibold rounded-lg shadow-md ml-2 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                    <img src="../../Public/Trash.svg" alt="">
                                    <span class="ml-2">Hapus</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="bg-white">
                        <td class="border border-[#132145] px-4 py-2 text-center">2</td>
                        <td class="border border-[#132145] px-4 py-2">19827251758</td>
                        <td class="border border-[#132145] px-4 py-2">Komdis234</td>
                        <td class="border border-[#132145] px-4 py-2 text-center">dosen234@abc.com</td>
                        <td class="border border-[#132145] px-4 py-2"><img src="../../Public/contohKTM.png" alt=""></td>
                        <td class="border border-[#132145] px-4 py-2 text-center">
                        <div class="flex flex-row justify-center">
                                <img src="../../Public/requsted.svg" alt="">
                                    <span>Requested</span>
                            </div>
                        </td>
                        <td class="border border-[#132145] px-4 py-2 text-center">
                            <div class="flex flex-row justify-center space-x-2 mx-2"> 
                                <button type="button" onclick="window.location.href='detailPelanggaran.php'" 
                                    class="flex items-center w-28 px-4 py-2 bg-[#132145] text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    <i class="fa-solid fa-pen pl-0 pr-2"></i>
                                    <span class="ml-2">Edit</span>    
                                </button>
                                <button type="button" 
                                    class="flex flex-row w-28 px-4 py-2 bg-[#FF3B30] text-white font-semibold rounded-lg shadow-md ml-2 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                    <img src="../../Public/Trash.svg" alt="">
                                    <span class="ml-2">Hapus</span>
                                </button>
                                <button type="button" id="status1" 
                                class="flex items-center w-30 px-4 py-2 bg-[#FEC01A] text-white font-semibold rounded-lg shadow-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2"> 
                                    <img src="../../Public/verifikasi.svg" alt="">
                                    <span class="ml-2">Verifikasi</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="bg-white">
                        <td class="border border-[#132145] px-4 py-2 text-center">3</td>
                        <td class="border border-[#132145] px-4 py-2">19827251245</td>
                        <td class="border border-[#132145] px-4 py-2">Komdis345 </td>
                        <td class="border border-[#132145] px-4 py-2 text-center">dosen345@abc.com</td>
                        <td class="border border-[#132145] px-4 py-2"></td>
                        <td class="border border-[#132145] px-4 py-2 text-center">
                            <div class="flex flex-row justify-center">
                                <img src="../../Public/X.svg" alt="">
                                <span>Unregistered</span>
                            </div>
                        </td>
                        <td class="border border-[#132145] px-4 py-2 text-center">
                            <div class="flex flex-row justify-center space-x-2"> 
                                <button type="button" onclick="window.location.href='detailPelanggaran.php'" 
                                    class="flex items-center w-28 px-4 py-2 bg-[#132145] text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    <i class="fa-solid fa-pen pl-0 pr-2"></i>
                                    <span class="ml-2">Edit</span>    
                                </button>
                                <button type="button" 
                                    class="flex flex-row w-28 px-4 py-2 bg-[#FF3B30] text-white font-semibold rounded-lg shadow-md ml-2 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                    <img src="../../Public/Trash.svg" alt="">
                                    <span class="ml-2">Hapus</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="bg-white">
                        <td class="border border-[#132145] px-4 py-2 text-center">4</td>
                        <td class="border border-[#132145] px-4 py-2">19827251222</td>
                        <td class="border border-[#132145] px-4 py-2">Komdis456 </td>
                        <td class="border border-[#132145] px-4 py-2 text-center">dosen456@abc.com</td>
                        <td class="border border-[#132145] px-4 py-2"><img src="../../Public/contohKTM.png" alt=""></td>
                        <td class="border border-[#132145] px-4 py-2 text-center">
                            <div class="flex flex-row justify-center">
                                <img src="../../Public/centang.svg" alt="">
                                    <span>Verified</span>
                            </div>
                        </td>
                        <td class="border border-[#132145] px-4 py-2 text-center">
                            <div class="flex flex-row justify-center space-x-2"> 
                                <button type="button" onclick="window.location.href='detailPelanggaran.php'" 
                                    class="flex items-center w-28 px-4 py-2 bg-[#132145] text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    <i class="fa-solid fa-pen pl-0 pr-2"></i>
                                    <span class="ml-2">Edit</span>    
                                </button>
                                <button type="button" 
                                    class="flex flex-row w-28 px-4 py-2 bg-[#FF3B30] text-white font-semibold rounded-lg shadow-md ml-2 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                    <img src="../../Public/Trash.svg" alt="">
                                    <span class="ml-2">Hapus</span>
                                </button>
                                <!-- <button type="button" id="status1" 
                                class="flex items-center w-30 px-4 py-2 bg-[#FEC01A] text-white font-semibold rounded-lg shadow-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2"> 
                                    <img src="../../Public/verifikasi.svg" alt="">
                                    <span class="ml-2">Verifikasi</span>
                                </button> -->
                            </div>
                        </td>
                    </tr>
                    <tr class="bg-white">
                        <td class="border border-[#132145] px-4 py-2 text-center">5</td>
                        <td class="border border-[#132145] px-4 py-2">19827251452</td>
                        <td class="border border-[#132145] px-4 py-2">Komdis567 </td>
                        <td class="border border-[#132145] px-4 py-2 text-center">dsoen567@abc.com</td>
                        <td class="border border-[#132145] px-4 py-2"><img src="../../Public/contohKTM.png" alt=""></td>
                        <td class="border border-[#132145] px-4 py-2 text-center">Verified</td>
                        <td class="border border-[#132145] px-4 py-2 text-center">
                            <div class="flex flex-row justify-center space-x-2"> 
                                <button type="button" onclick="window.location.href='detailPelanggaran.php'" 
                                    class="flex items-center w-28 px-4 py-2 bg-[#132145] text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    <i class="fa-solid fa-pen pl-0 pr-2"></i>
                                    <span class="ml-2">Edit</span>    
                                </button>
                                <button type="button" 
                                    class="flex flex-row w-28 px-4 py-2 bg-[#FF3B30] text-white font-semibold rounded-lg shadow-md ml-2 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                    <img src="../../Public/Trash.svg" alt="">
                                    <span class="ml-2">Hapus</span>
                                </button>
                                <!-- <button type="button" id="status1" 
                                class="flex items-center w-30 px-4 py-2 bg-[#FEC01A] text-white font-semibold rounded-lg shadow-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2"> 
                                    <img src="../../Public/verifikasi.svg" alt="">
                                    <span class="ml-2">Verifikasi</span>
                                </button> -->
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <?php include "../components/Footer.php"?>
    <!-- Footer End -->
</body>
</html>