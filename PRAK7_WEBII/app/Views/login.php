<?= $this->extend('layout/main.php') ?>
<?= $this->section('content') ?>

<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <form action="/login/valid" method="post" class="bg-white p-8 rounded shadow-md w-full max-w-sm space-y-4">
        <h2 class="text-2xl font-bold text-center text-gray-800">Login</h2>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="bg-red-100 text-red-700 p-3 rounded text-sm">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="bg-green-100 text-green-700 p-3 rounded text-sm">
                <?= esc(session()->getFlashdata('success')) ?>
            </div>
        <?php endif; ?>

        <div>
            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
            <input type="text" name="username" id="username" required
                class="mt-1 w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-500" placeholder="Masukkan username">
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password" required
                class="mt-1 w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-500" placeholder="Masukkan password">
        </div>

        <button type="submit" name="login"
            class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">Login</button>
    </form>
</div>

<?= $this->endSection() ?>
