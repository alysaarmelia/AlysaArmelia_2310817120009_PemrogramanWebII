<?= $this->extend('layout/header') ?>
<?= $this->section('content') ?>
<main class="container mx-auto p-4 md:p-8 flex justify-center items-center min-h-[90vh]">
    <div class="bg-gray-500 rounded-3xl p-8 shadow-xl max-w-6xl w-full min-h-[500px] border-4 border-white-100">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <div class="flex justify-center items-center">
                <div class="bg-white p-3 shadow-md w-[440px] h-[430px] rounded-xl overflow-hidden flex items-center justify-center">
                    <img src="<?= base_url('image/apalah.jpg') ?>" alt="Foto Profil" class="w-full h-full object-cover rounded-lg">
                </div>
            </div>

            <div class="text-white h-full flex flex-col justify-between">
                <div>
                    <h2 class="text-4xl md:text-5xl font-bold mb-1"><?= $mahasiswa['nama'] ?></h2>
                    <p class="text-2xl mb-6"><?= $mahasiswa['nim'] ?></p>

                    <div class="space-y-5 mb-4">
                        <p class="text-xl"><span class="font-medium">Prodi:</span> <?= $mahasiswa['nama'] ?></p>
                        <p class="text-xl"><span class="font-medium">Lahir:</span> <?= $mahasiswa['lahir'] ?></p>
                        <p class="text-xl"><span class="font-medium">Hobi:</span> <?= $mahasiswa['hobi'] ?></p>
                        <p class="text-xl"><span class="font-medium">Idola:</span> <?= $mahasiswa['idola'] ?></p>
                    </div>
                </div>

                <div>
                    <h3 class="text-2xl font-semibold mb-4 text-center">Skill:</h3>
                    <div class="flex justify-center">
                        <div class="flex flex-wrap gap-4 justify-center">
                            <?php foreach ($mahasiswa['skill'] as $skillName => $skillDesc): ?>
                                <?php $words = explode(' ', $skillName); ?>
                                <div
                                    class="bg-white text-black rounded-full w-24 h-24 flex items-center justify-center text-center p-2 cursor-pointer transform transition-transform duration-300 hover:scale-110"
                                    onclick="openModal('<?= esc($skillName) ?>')">
                                    <div>
                                        <?php foreach ($words as $word): ?>
                                            <p class="text-sm"><?= esc($word) ?></p>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                                <div
                                    id="modal-<?= esc($skillName) ?>"
                                    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
                                    <div class="bg-white rounded-lg p-6 max-w-md w-full text-black relative">
                                        <button
                                            class="absolute top-2 right-2 text-xl font-bold"
                                            onclick="closeModal('<?= esc($skillName) ?>')">&times;</button>
                                        <h2 class="text-2xl font-bold mb-4"><?= esc($skillName) ?></h2>
                                        <p><?= esc($skillDesc) ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
        <script>
            function openModal(index) {
                document.getElementById('modal-' + index).classList.remove('hidden');
            }

            function closeModal(index) {
                document.getElementById('modal-' + index).classList.add('hidden');
            }

            window.addEventListener('click', function(e) {
                document.querySelectorAll('[id^="modal-"]').forEach(modal => {
                    if (!modal.classList.contains('hidden') && e.target === modal) {
                        modal.classList.add('hidden');
                    }
                });
            });
        </script>
<?= $this->endSection() ?>