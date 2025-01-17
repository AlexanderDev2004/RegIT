<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pelanggaran</title>
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
                    <img src=".././public/LogoSide.png" alt="logo" class="w-20 h-20 object-contain">
                </div>
            </div>
            <!-- Navbar menu -->
            <nav class="w-64 flex flex-col">
                <a href="dashboard" target="" class="flex items-center gap-4 px-6 py-3 mb-2 bg-[#132145] rounded-lg text-white rounded-lg text-sm font-bold hover:bg-yellow-600">
                <svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg" class=" ">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.274461 6.12617C0 6.72291 0 7.40179 0 8.75955V12.9999C0 14.8856 0 15.8284 0.585786 16.4142C1.11733 16.9457 1.94285 16.9949 3.5 16.9995V12C3.5 10.8954 4.39543 10 5.5 10H8.5C9.60457 10 10.5 10.8954 10.5 12V16.9995C12.0572 16.9949 12.8827 16.9457 13.4142 16.4142C14 15.8284 14 14.8856 14 12.9999V8.75955C14 7.40179 14 6.72291 13.7255 6.12617C13.4511 5.52943 12.9356 5.08763 11.9047 4.20401L10.9047 3.34687C9.04143 1.74974 8.10977 0.951172 7 0.951172C5.89023 0.951172 4.95857 1.74974 3.09525 3.34687L2.09525 4.20401C1.06437 5.08763 0.548923 5.52943 0.274461 6.12617ZM8.5 16.9999V12H5.5V16.9999H8.5Z" fill="white"
                arial-current="page"
                />
                </svg>
                    <span class="">Beranda</span>                   
                </a>
                <a href="pelanggaran" target="" class="flex items-center gap-4 px-6 py-3 mb-2 bg-[#132145] rounded-lg text-white rounded-lg text-sm font-bold hover:bg-yellow-600 bg-[#F99D1C]">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M9 18C13.9706 18 18 13.9706 18 9C18 4.02944 13.9706 0 9 0C4.02944 0 0 4.02944 0 9C0 13.9706 4.02944 18 9 18ZM4 10H14V8H4V10Z" fill="white"/>
                </svg>
                    <span class="">Pelanggaran</span>
                </a>
                <a href="profil " target="" class="flex items-center gap-4 px-6 py-3 mb-2 bg-[#132145] rounded-lg text-white rounded-lg text-sm font-bold hover:bg-yellow-600">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 15.0141 20.6665 17.7167 18.5573 19.5501C18.0996 18.3251 17.306 17.2481 16.2613 16.4465C15.0388 15.5085 13.5409 15 12 15C10.4591 15 8.96118 15.5085 7.73867 16.4465C6.69405 17.2481 5.90038 18.3251 5.44269 19.5501C3.33349 17.7167 2 15.0141 2 12ZM16.8296 20.7059C16.8337 20.7212 16.8381 20.7363 16.8429 20.7512C15.4081 21.5469 13.757 22 12 22C10.243 22 8.59193 21.5469 7.15711 20.7512C7.16185 20.7363 7.16628 20.7212 7.17037 20.7059C7.45525 19.6427 8.08297 18.7033 8.95619 18.0332C9.82942 17.3632 10.8993 17 12 17C13.1007 17 14.1706 17.3632 15.0438 18.0332C15.917 18.7033 16.5448 19.6427 16.8296 20.7059ZM10 9C10 7.89543 10.8954 7 12 7C13.1046 7 14 7.89543 14 9C14 10.1046 13.1046 11 12 11C10.8954 11 10 10.1046 10 9ZM12 5C9.79086 5 8 6.79086 8 9C8 11.2091 9.79086 13 12 13C14.2091 13 16 11.2091 16 9C16 6.79086 14.2091 5 12 5Z" fill="white"/>
                <rect x="2.5" y="2.5" width="19" height="19" rx="9.5" stroke="white"/>
                </svg>
                    <span class="">Profil Saya</span>
                </a>
            </nav>
        </div>
    </div>
    <!-- Sidebar End -->

    <!-- Main Content -->
    <div id="Pelanggaran"class="flex justify-center items-center pt-8">
       <p class="font-bold text-3xl flex text-center items-center text-[#132145] ml-8 flex flex-col justify-center">Edit Pelanggaran</p>
    </div>
    
    <!-- Content -->
    <div class="bg-white p-6 rounded-lg shadow-md w-full lg:w-3/4 ml-80 mt-8">
        <div class="overflow-x-auto overflow-y-auto max-h-[500px]">
        <div class="mb-4">
                <label for="NIM" class="block text-sm font-bold text-[#132145] mb-2 ml-8">NIM</label>
                <input type="text" id="NIM" value="<?= $dataPelanggaran["nim"] ?>" readonly class="w-3/4 px-3 py-2 ml-8 border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="overflow-x-auto grid grid-cols-2 gap-x-0 gap-y-8">
                <div class="mt-6 ">
                    <span class="font-bold text-[#132145] ml-8">Nama Mahasiswa</span>
                    <p class="ml-8 text-gray-600"><?= $dataPelanggaran["nama_mahasiswa"] ?></p>
                </div>
                <div class="mt-6 ">
                    <span class="font-bold text-[#132145] ml-8">Angkatan</span>
                    <p class="ml-8 text-gray-600"><?= $dataPelanggaran["angkatan"] ?></p>
                </div>
                <div class="mt-6 ">
                    <span class="font-bold text-[#132145] ml-8">Prodi</span>
                    <p class="ml-8 text-gray-600"><?= $dataPelanggaran["nama_prodi"] ?></p>
                </div>
                <div class="mt-6 ">
                    <span class="font-bold text-[#132145] ml-8">Kelas</span>
                    <p class="ml-8 text-gray-600"><?= $dataPelanggaran["nama_kelas"] ?></p>
                </div>
                <div>
                    <div class="flex mt-6 mb-2">
                        <div class="font-bold text-[#132145] ml-8">Bukti Pelanggaran</div>
                    </div>
                    <button class="bg-white text-blue-400 text-sm ml-8 flex-row">
                        <p><?= $dataPelanggaran["file_name"] ?></p>
                    </button>
                </div>
            </div>

            <div>
            <div class="mt-6 flex flex-col">
                <label for="pelanggaran" class="font-bold text-[#132145] ml-8">Tingkat Pelanggaran</label>
                <select id="pelanggaran" class="w-3/4 px-3 py-2 ml-8 border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="1" <?= $dataPelanggaran["level_tatib"] == "1" ? "selected" : "" ?>>1</option>
                    <option value="2" <?= $dataPelanggaran["level_tatib"] == "2" ? "selected" : "" ?>>2</option>
                    <option value="3" <?= $dataPelanggaran["level_tatib"] == "3" ? "selected" : "" ?>>3</option>
                </select>
            </div>
            <div class="flex mt-6 flex flex-col">
                <label for="tatib" class="font-bold text-[#132145] ml-8">Pelanggaran</label>
                <select id="tatib" class="w-3/4 px-3 py-2 ml-8 border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <!-- Data pelanggaran akan dimuat secara dinamis -->
                </select>
            </div>
            </div>
            <div class="mt-6 flex flex-col">
                <label for="tanggal" class="font-bold text-[#132145] ml-8">Tanggal Pelanggaran</label>
                    <input type="text" id="tanggal" class="w-3/4 px-3 py-2 ml-8 border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?= date_format($dataPelanggaran["tgl_pelanggaran"], "d-m-Y") ?>">
                </label>
            </div>
            <div>
                <div class="flex mt-6 flex flex-col">
                    <label for="sanksi" class="font-bold text-[#132145] ml-8">Sanksi</label>
                    <!-- <select id="sanksi" class="w-3/4 px-3 py-2 ml-8 border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="1">Teguran lisan disertai surat pernyataan bermaterai yang ditandatangani mahasiswa dan DPA</option>
                        <option value="2">Teguran tertulis disertai surat pernyataan bermaterai yang ditandatangani mahasiswa dan DPA</option>
                    </select> -->
                    <input type="text" id="sanksi" class="w-3/4 px-3 py-2 ml-8 border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?= $dataPelanggaran["jenis_sanksi"] ?>">
                </div>
            </div>
            <div>
                <div class="mt-6 flex flex-col">
                    <label for="tanggalsanksi" class="font-bold text-[#132145] ml-8">Tanggal Sanksi</label>
                        <input type="text" id="tanggalsanksi" class="w-3/4 px-3 py-2 ml-8 border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?= $dataPelanggaran["tgl_sanksi"] !== null ? date_format($dataPelanggaran["tgl_sanksi"], "d-m-Y") : "" ?>">
                    </label>
                </div>
            </div>
            <div class="flex mt-6 flex-col">
                <label for="status" class="font-bold text-[#132145] ml-8">Status Sanksi</label>
                <select id="status" class="w-3/4 px-3 py-2 ml-8 border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="1">Belum Selesai</option>
                    <option value="2">Selesai</option>
                </select>
            </div>
            <div class="flex flex-row mt-4">
                <button onclick="window.location.href='detailPelanggaran.php'"
                class="mt-4 ml-8 bg-[#34C759] px-4 py-2 text-center flex flex-row w-32 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" >
                    <img src="../../../public/simpan.svg" alt="">
                    <span class="ml-2">Simpan</span>
                </button>
                <button
                onclick="window.location.href='.././<?= $getIdPelanggaran ?>'" 
                class="mt-4 ml-8 bg-[#132145] px-4 py-2 text-center flex flex-row w-32 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    <img src="../../../public/Back.svg" alt="">
                    <span class="ml-2">Kembali</span>
                </button>
            </div>
            
        </div>
    </div>

    <!-- Footer -->
    <?php include "./app/views/components/footer.php"?>
    <!-- Footer End -->

    <script>
        let tataTertibData = <?= json_encode($listTatib); ?>; // Kirim data tata tertib dari PHP ke JavaScript

        // Isi dropdown 'tatib' dengan data yang sudah ada dari PHP
        document.addEventListener("DOMContentLoaded", function() {
            const tatibSelect = document.getElementById('tatib');
            
            // Kosongkan dropdown 'tatib' sebelum mengisi
            tatibSelect.innerHTML = '';

            // Ambil level_tatib yang sudah dipilih sebelumnya
            const levelTingkatPelanggaran = "<?= $dataPelanggaran['level_tatib']; ?>";

            // Filter data tata tertib sesuai dengan level yang sudah dipilih
            const filteredData = tataTertibData.filter(item => item.level_tatib == levelTingkatPelanggaran);

            // Isi dropdown 'tatib' dengan data yang sudah dipilih
            filteredData.forEach(tatib => {
                const option = document.createElement('option');
                option.value = tatib.id_tata_tertib;
                option.textContent = tatib.deskripsi;
                tatibSelect.appendChild(option);
            });
        });

        // Event listener untuk dropdown Tingkat Pelanggaran
        document.getElementById('pelanggaran').addEventListener('change', function () {
            const level = this.value; // Ambil level yang dipilih
            const tatibSelect = document.getElementById('tatib');
            tatibSelect.innerHTML = ''; // Kosongkan dropdown Pelanggaran

            // Filter data tata tertib sesuai level
            const filteredData = tataTertibData.filter(item => item.level_tatib == level);

            // Tambahkan data baru ke dropdown
            filteredData.forEach(tatib => {
                const option = document.createElement('option');
                option.value = tatib.id_tata_tertib;
                option.textContent = tatib.deskripsi;
                tatibSelect.appendChild(option);
            });
        });
    </script>
</body>
</html>