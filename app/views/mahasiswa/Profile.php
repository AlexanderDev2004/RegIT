<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">

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
    <!-- Header -->
    <?php include "components/Header.php"?>
    <!-- Header End -->

    <!-- SideBar -->
    <div class="flex">
        <div class="w-64 h-screen bg-[#132145] text-white flex flex-col items-center py-6 absolute top-0">
            <div class="mb-6">
                <div class="w-20 h-20 flex items-center justify-center rounded-lg mt-6">
                    <img src=".././public/LogoSide.png" alt="logo" class="w-20 h-20 object-contain">
                </div>
            </div>
            <!-- Navbar menu -->
            <nav class="w-52 flex flex-col">
                <a href="dashboard" target="" class="flex items-center gap-4 px-6 py-3 mb-2 bg-[#132145] rounded-lg text-white rounded-lg text-sm font-bold hover:bg-yellow-600">
                    <svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg" class=" ">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.274461 6.12617C0 6.72291 0 7.40179 0 8.75955V12.9999C0 14.8856 0 15.8284 0.585786 16.4142C1.11733 16.9457 1.94285 16.9949 3.5 16.9995V12C3.5 10.8954 4.39543 10 5.5 10H8.5C9.60457 10 10.5 10.8954 10.5 12V16.9995C12.0572 16.9949 12.8827 16.9457 13.4142 16.4142C14 15.8284 14 14.8856 14 12.9999V8.75955C14 7.40179 14 6.72291 13.7255 6.12617C13.4511 5.52943 12.9356 5.08763 11.9047 4.20401L10.9047 3.34687C9.04143 1.74974 8.10977 0.951172 7 0.951172C5.89023 0.951172 4.95857 1.74974 3.09525 3.34687L2.09525 4.20401C1.06437 5.08763 0.548923 5.52943 0.274461 6.12617ZM8.5 16.9999V12H5.5V16.9999H8.5Z" fill="white"
                    arial-current="page"
                    />
                    </svg>
                        <span class="">Beranda</span>                   
                </a>
                <a href="pelanggaran" target="" class="flex items-center gap-4 px-6 py-3 mb-2 bg-[#132145] rounded-lg text-white rounded-lg text-sm font-bold hover:bg-yellow-600">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9 18C13.9706 18 18 13.9706 18 9C18 4.02944 13.9706 0 9 0C4.02944 0 0 4.02944 0 9C0 13.9706 4.02944 18 9 18ZM4 10H14V8H4V10Z" fill="white"/>
                    </svg>
                        <span class="">Pelanggaran</span>
                </a>
                <a href="profil" target="" class="flex items-center gap-4 px-6 py-3 mb-2 bg-[#132145] rounded-lg text-white rounded-lg text-sm font-bold hover:bg-yellow-600">
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

    <!-- Content -->
    <div id="Profile" class=" flex justify-center pt-8 ">
        <p class="font-bold text-3xl flex text-center items-center text-[#132145] py-auto pl-64 mb-8 flex flex-col justify-center">Profil Saya</p>
    </div>
    <!-- Content End -->

    <!-- Profile -->
    <div class="bg-white p-6 rounded-lg shadow-md w-full lg:w-3/4 ml-80 mt-14">
        <!-- Edit Password -->
        <div class="flex flex-end justify-end">
            <a href="profil/edit" class="w-48 bg-[#132145] text-white py-2 px-4 rounded-md hover:bg-blue-700 flex items-center">
                <i class="fa-solid fa-pen pl-0 pr-2"></i>
                <span class="pl-2">Ubah Password</span>
            </a>
        </div>
        <!-- Edit Button End -->
        <div class="overflow-x-auto grid grid-cols-2 gap-x-0 gap-y-8">
    <div>
        <span class="font-bold text-[#132145]">NIM</span>
        <p><?= htmlspecialchars($data['profil']['nim'] ?? 'Data tidak tersedia'); ?></p>
    </div>
    <div>
        <span class="font-bold text-[#132145]">Nama Prodi</span>
        <p><?= htmlspecialchars($data['profil']['nama_prodi'] ?? 'Data tidak tersedia'); ?></p>
    </div>
    <div>
        <span class="font-bold text-[#132145]">Nama</span>
        <p><?= htmlspecialchars($data['profil']['nama'] ?? 'Data tidak tersedia'); ?></p>
    </div>
    <div>
        <span class="font-bold text-[#132145]">Nama Kelas</span>
        <p><?= htmlspecialchars($data['profil']['nama_kelas'] ?? 'Data tidak tersedia'); ?></p>
    </div>
    <div>
        <span class="font-bold text-[#132145]">Angkatan</span>
        <p><?= htmlspecialchars($data['profil']['angkatan'] ?? 'Data tidak tersedia'); ?></p>
    </div>
    <div>
        <span class="font-bold text-[#132145]">Status Mahasiswa</span>
        <p><?= htmlspecialchars($data['profil']['status'] ?? 'Data tidak tersedia'); ?></p>
    </div>
</div>


            <!-- Logout Button -->
            <div class="flex mt-6 ">                
                <a href="../login" class="flex flex-row bg-red-500 w-28 text-white py-2 rounded-md hover:bg-red-600 px-auto">
                    <img src=".././public/logout.svg" alt="" class="ml-2">
                    <span class="ml-4">Keluar</span>
                </a>
            </div>
            <!-- Logout Button End -->
        </div>
    </div>
    <!-- Profile End -->

    <!-- Footer -->
    <?php include "./app/views/components/footer.php"?>
    <!-- Footer End -->
</body>
</html>
