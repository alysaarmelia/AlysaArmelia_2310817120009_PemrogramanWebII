<header class="bg-gray-800 text-white p-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-2xl md:text-3xl font-bold">Perpustakaan Shasha</h1>
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