<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Dashboard' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col bg-gray-100">
    <?= $this->include('layout/header') ?>

    <!-- Bagian utama yang bisa tumbuh dan mendorong footer ke bawah -->
    <main class="flex-grow">
        <?= $this->renderSection('content') ?>
    </main>

    <?= $this->include('layout/footer') ?>
</body>

</html>
