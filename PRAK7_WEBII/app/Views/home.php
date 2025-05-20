<?= $this->extend('layout/main.php') ?>
<?= $this->section('content') ?>

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-image: url('<?= base_url('image/image.jpg') ?>');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>

<main class="container mx-auto p-4 md:p-8 flex flex-col items-center justify-center text-center min-h-[80vh]">
    <div class="home-card max-w-3xl bg-gray-900/70 backdrop-blur-sm rounded-2xl p-10 shadow-2xl">
        <h1 class="text-4xl md:text-6xl text-white font-bold mb-6">Perpustakaan Shasha</h1>
        <p class="text-2xl md:text-3xl text-gray-200 mb-8">Selamat datang dan nikmati buku-bukunya.</p>

        <?php if (session()->get('isLog')): ?>
            <a href="<?= base_url('/dashboard') ?>" class="mx-auto inline-block bg-white text-gray-800 px-6 py-3 rounded-lg font-semibold hover:bg-gray-200 transition">
                Dashboard
            </a>
        <?php else: ?>
            <a href="<?= base_url('/login') ?>" class="mx-auto inline-block bg-white text-gray-800 px-6 py-3 rounded-lg font-semibold hover:bg-gray-200 transition">
                Login
            </a>
        <?php endif; ?>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        anime({
            targets: '.home-card',
            opacity: [0, 1],
            translateY: [60, 0],
            duration: 1200,
            easing: 'easeOutExpo'
        });

        anime({
            targets: ['.home-card h1', '.home-card p', '.home-card a'],
            opacity: [0, 1],
            translateY: [20, 0],
            delay: anime.stagger(200, { start: 500 }),
            duration: 800,
            easing: 'easeOutQuad'
        });
    });
</script>

<?= $this->endSection() ?>