<!-- 404 Not Found -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-orange-500 flex items-center justify-center h-screen">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-4">
        <div class="text-center">
            <h1 class="text-6xl text-red-500 font-bold">404-Not Found</h1>
            <p class="text-2xl py-3">Halaman tidak ditemukan</p>
            <p class="text-gray-600 py-3">Anda mungkin salah mengetik URL atau halaman tersebut belum tersedia.</p>
            <a href=<?= BASE_URL . "/login" ?> class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Kembali</a>
        </div>
    </div>
</body>

</html>