<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sadoku - Sistem Informasi Penelitian</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">
    <nav class="bg-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Sadoku</h1>
            <div>
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline mr-4">Login</a>
                <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Register</a>
            </div>
        </div>
    </nav>
    <main class="container mx-auto mt-10 p-6 bg-white shadow rounded-lg">
        <h2 class="text-3xl font-bold mb-4">Selamat Datang di Sistem Informasi Penelitian</h2>
        <p class="text-gray-700">Sadoku adalah platform manajemen penelitian yang mempermudah proses pengajuan, review, dan keputusan akhir penelitian.</p>
        <div class="mt-6">
            <h3 class="text-xl font-semibold mb-2">Fitur Utama:</h3>
            <ul class="list-disc ml-6 text-gray-600">
                <li>Pengajuan Proposal Penelitian</li>
                <li>Reviewer yang Terintegrasi</li>
                <li>Dashboard Monitoring</li>
            </ul>
        </div>
    </main>
</body>
</html>
