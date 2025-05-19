<?= $this->extend('layout/main.php') ?>
<?= $this->section('content') ?>

<div class="container mx-auto mt-10 px-4" x-data="{ showCreate: false }">
    <h2 class="text-2xl font-semibold mb-4">Dashboard Buku</h2>

    <button @click="showCreate = !showCreate"
        class="mb-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        <span x-text="showCreate ? 'Tutup Form Tambah' : 'Tambah Buku Baru'"></span>
    </button>

    <form action="<?= site_url('/dashboard/create') ?>" method="post"
        class="bg-white p-6 rounded shadow-md space-y-4 mb-10" x-show="showCreate" x-transition>
        <input type="text" name="judul" placeholder="Judul" required class="w-full p-2 border border-gray-300 rounded">
        <input type="text" name="penulis" placeholder="Penulis" required class="w-full p-2 border border-gray-300 rounded">
        <input type="text" name="penerbit" placeholder="Penerbit" required class="w-full p-2 border border-gray-300 rounded">
        <input type="number" name="tahun_terbit" placeholder="Tahun Terbit" required class="w-full p-2 border border-gray-300 rounded">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Tambah Buku</button>
    </form>

    <hr class="my-10">

    <h2 class="text-2xl font-semibold mb-4">Daftar Buku</h2>

    <?php if (!empty($buku)): ?>
        <div class="overflow-x-auto">
            <table class="w-full table-auto bg-white shadow-md rounded">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="p-4">id</th>
                        <th class="p-4">Judul</th>
                        <th class="p-4">Penulis</th>
                        <th class="p-4">Penerbit</th>
                        <th class="p-4">Tahun Terbit</th>
                        <th class="p-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($buku as $book): ?>
                        <tr class="border-t" x-data="{ editMode: false }">
                            <td class="p-4">
                                <span><?= esc($book['id']) ?></span>
                                <input type="hidden" name="id" value="<?= esc($book['id']) ?>">
                            </td>
                            <td class="p-4">
                                <span x-show="!editMode"><?= esc($book['judul']) ?></span>
                                <input x-show="editMode" type="text" name="judul" value="<?= esc($book['judul']) ?>" class="w-full p-1 border rounded">
                            </td>
                            <td class="p-4">
                                <span x-show="!editMode"><?= esc($book['penulis']) ?></span>
                                <input x-show="editMode" type="text" name="penulis" value="<?= esc($book['penulis']) ?>" class="w-full p-1 border rounded">
                            </td>
                            <td class="p-4">
                                <span x-show="!editMode"><?= esc($book['penerbit']) ?></span>
                                <input x-show="editMode" type="text" name="penerbit" value="<?= esc($book['penerbit']) ?>" class="w-full p-1 border rounded">
                            </td>
                            <td class="p-4">
                                <span x-show="!editMode"><?= esc($book['tahun_terbit']) ?></span>
                                <input x-show="editMode" type="number" name="tahun_terbit" value="<?= esc($book['tahun_terbit']) ?>" class="w-full p-1 border rounded">
                            </td>
                            <td class="p-4">
                                <div x-show="!editMode" class="space-x-2">
                                    <button @click="editMode = true" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</button>

                                    <form action="<?= site_url('/dashboard/delete/' . $book['id']) ?>" method="post" onsubmit="return confirm('Yakin Mau Menghapus?')" class="inline">
                                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                                    </form>
                                </div>

                                <form action="<?= site_url('/dashboard/update/' . $book['id']) ?>" method="post"
                                    x-show="editMode" x-transition class="space-y-1">
                                    <input type="hidden" name="judul" :value="$el.closest('tr').querySelector('[name=judul]').value">
                                    <input type="hidden" name="penulis" :value="$el.closest('tr').querySelector('[name=penulis]').value">
                                    <input type="hidden" name="penerbit" :value="$el.closest('tr').querySelector('[name=penerbit]').value">
                                    <input type="hidden" name="tahun_terbit" :value="$el.closest('tr').querySelector('[name=tahun_terbit]').value">

                                    <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">Simpan</button>
                                    <button type="button" @click="editMode = false" class="bg-gray-500 text-white px-3 py-1 rounded hover:bg-gray-600">Batal</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="text-gray-600 mt-4">Tidak ada data buku ditemukan.</p>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
