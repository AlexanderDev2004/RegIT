<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelanggaran</title>
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
    <?php include "components/Header.php" ?>
    <!-- Header End -->

    <!-- SideBar -->
    <?php include "components/Sidebar.php" ?>
    <!-- Sidebar End -->

    <!-- Content -->
    <div id="Pelanggaran" class="flex justify-center pt-8">
        <p class="font-bold text-3xl flex text-center items-center text-[#132145] py-auto pl-64 mb-8 flex flex-col justify-center">Tabel Pelanggaran</p>
    </div>
    <!-- Content End -->

    <!-- Table Start -->
    <div class="bg-white p-6 rounded-lg shadow-md w-11/12 lg:w-3/4 ml-80">
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-[#132145] text-sm text-left">
                <thead class="bg-white text-gray-800">
                    <tr>
                        <th class="border border-[#132145] px-4 py-2">No</th>
                        <th class="border border-[#132145] px-4 py-2">Tanggal Pelanggaran</th>
                        <th class="border border-[#132145] px-4 py-2">Deskripsi Pelanggaran</th>
                        <th class="border border-[#132145] px-4 py-2">Tingkat</th>
                        <th class="border border-[#132145] px-4 py-2">Sanksi</th>
                        <th class="border border-[#132145] px-4 py-2">Tanggal Sanksi</th>
                        <th class="border border-[#132145] px-4 py-2">Status Pelanggaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data['pelanggaran'])): ?>
                        <?php $no = 1; foreach ($data['pelanggaran'] as $bulan => $jumlah): ?>
                            <tr class="bg-white">
                                <td class="border border-[#132145] px-4 py-2 text-center"><?= $no++; ?></td>
                                <td class="border border-[#132145] px-4 py-2"><?= $bulan; ?></td>
                                <td class="border border-[#132145] px-4 py-2"><?= $jumlah; ?></td>
                                <td class="border border-[#132145] px-4 py-2 text-center">-</td>
                                <td class="border border-[#132145] px-4 py-2">-</td>
                                <td class="border border-[#132145] px-4 py-2 text-center">-</td>
                                <td class="border border-[#132145] px-4 py-2 text-center">-</td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="border border-[#132145] px-4 py-2 text-center">Tidak ada data pelanggaran.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Table End -->

    <!-- Footer -->
    <?php include "./app/views/components/footer.php" ?>
    <!-- Footer End -->
</body>
</html>
