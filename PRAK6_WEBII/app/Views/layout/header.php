<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Praktikum Modul 5</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen bg-gray-100">
    <header class="bg-gray-800 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl md:text-3xl font-bold">Praktikum Modul 5</h1>
            <nav class="flex space-x-6">
                <a href="/" class="hover:text-gray-300 transition duration-300 text-lg">Beranda</a>
                <a href="/profile" class="hover:text-gray-300 transition duration-300 text-lg">Profile</a>
            </nav>
        </div>
    </header>
    <div>
        <?= $this->renderSection('content') ?>
    </div>