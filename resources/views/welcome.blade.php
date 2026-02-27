<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            body {
                font-family: 'Instrument Sans', sans-serif;
            }
        </style>
    @endif
</head>
<body class="bg-[#FDFDFC] text-[#1b1b18] h-screen flex items-center justify-center">

    <div class="bg-white shadow-lg rounded-lg p-10 text-center flex flex-col items-center justify-center">
        <h1 class="text-xl font-bold mb-4">
            Rafli Ramadhani Oktavianto Khufi
        </h1>
        <p class="text-xl mb-6">
            20230140127
        </p>
        <button class="bg-[#FDFDFC] border border-gray-300 rounded px-4 py-2 hover:bg-gray-100">
            Modul Pertemuan 1
        </button>
    </div>

</body>
</html>