<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book_Test</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen bg-gray-100">
    <header class="bg-gray-800 text-white p-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-2xl md:text-3xl font-bold">Book Testing</h1>
        <nav class="flex space-x-6">
            <a href="/" class="hover:text-gray-300 transition duration-300 text-lg">Home</a>
            <?php if (session()->get('isLog')) : ?>
                <a href="/dashboard" class="hover:text-gray-300 transition duration-300 text-lg">Dashboard</a>
                <a href="/logout" class="hover:text-gray-300 transition duration-300 text-lg">Logout</a>
            <?php else : ?>
                <a href="/login" class="hover:text-gray-300 transition duration-300 text-lg">Login</a>
            <?php endif; ?>
        </nav>
    </div>
</header>
</body>
</html>
