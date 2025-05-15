<?= $this->extend('layout/header') ?>
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
    <div class="profile-card max-w-3xl bg-white/10 backdrop-blur-sm rounded-2xl p-8 shadow-lg">
        <h2 class="text-5xl md:text-6xl text-white font-serif mb-6"><?= $mahasiswa['nama'] ?></h2>
        <p class="text-2xl md:text-3xl text-white mb-8"><?= $mahasiswa['nim'] ?></p>

        <a href="<?= base_url('profile') ?>" class="inline-block border border-white text-white px-8 py-3 text-lg hover:bg-gray-300 hover:text-white transition duration-300">Profile</a>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const profileCard = document.querySelector('.profile-card');

        if (profileCard) {
            profileCard.style.opacity = 0;

            anime({
                targets: '.profile-card',
                opacity: [0, 1],
                translateY: [50, 0],
                duration: 1200,
                easing: 'easeOutExpo',
                delay: 300
            });

            anime({
                targets: ['.profile-card h2', '.profile-card p', '.profile-card a'],
                opacity: [0, 1],
                translateY: [20, 0],
                duration: 800,
                easing: 'easeOutQuad',
                delay: anime.stagger(200, {
                    start: 600
                })
            });
        }
    });
</script>
<?= $this->endSection() ?>