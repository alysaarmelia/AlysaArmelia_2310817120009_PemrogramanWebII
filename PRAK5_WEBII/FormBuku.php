<?php
include 'koneksi.php';
include 'model.php';

$message = "";
$message_type = "";

$isEdit = false;
$id_buku = '';
$judul = '';
$penulis = '';
$penerbit = '';
$tahun = '';

if (isset($_GET['id'])) {
    $isEdit = true;
    $id_buku = $_GET['id'];

    $stmt = $db->prepare("SELECT * FROM buku WHERE id_buku = ?");
    $stmt->execute([$id_buku]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($data) {
        $judul = $data['judul_buku'];
        $penulis = $data['penulis'];
        $penerbit = $data['penerbit'];
        $tahun = $data['tahun_terbit'];
    } else {
        $message = "Data buku tidak ditemukan.";
        $message_type = "danger";
        $isEdit = false;
    }
}

if (isset($_POST['add_book'])) {
    $result = addBook(
        $db,
        $_POST['judul_buku'],
        $_POST['penulis'],
        $_POST['penerbit'],
        $_POST['tahun_terbit']
    );
    $message = $result ? "Buku berhasil ditambahkan." : "Gagal menambahkan buku.";
    $message_type = $result ? "success" : "danger";
}

if (isset($_POST['update_book'])) {
    $result = updateBook(
        $db,
        $_POST['id_buku'],
        $_POST['judul_buku'],
        $_POST['penulis'],
        $_POST['penerbit'],
        $_POST['tahun_terbit']
    );
    $message = $result ? "Buku berhasil diperbarui." : "Gagal memperbarui buku.";
    $message_type = $result ? "success" : "danger";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $isEdit ? 'Edit Buku' : 'Tambah Buku' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

    <style>
        body {
            background: url('perpustakaan.jpg') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar-blur {
            background-color: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px); 
        }

        .overlay {
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            background-color: rgba(0, 0, 0, 0.4);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-top: 80px;
        }
    </style>

    <body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">
        <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="#">Perpustakaan Shasha</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <div class="overlay">
            <div class="container">
                <div class="row justify-content-center">
                <div class="col-md-8">
                <?php if (!empty($message)): ?>
                    <div class="alert alert-<?= $message_type ?> alert-dismissible fade show" role="alert">
                        <?= htmlspecialchars($message) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif; ?>
                    <div class="card shadow-sm">
                    <style>
                        .bg-oren-muda {
                            background-color: #e08549; 
                            color: white;
                        }
                    </style>
                            <div class="card-header bg-oren-muda">
                            <h5 class="mb-0"><?= $isEdit ? 'Edit Data Buku' : 'Form Tambah Buku' ?></h5>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <?php if ($isEdit): ?>
                                    <input type="hidden" name="id_buku" value="<?= htmlspecialchars($id_buku) ?>">
                                <?php endif; ?>

                                <div class="mb-3">
                                    <label for="judul_buku" class="form-label">Judul Buku</label>
                                    <input type="text" class="form-control" name="judul_buku" id="judul_buku" value="<?= htmlspecialchars($judul) ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="penulis" class="form-label">Penulis</label>
                                    <input type="text" class="form-control" name="penulis" id="penulis" value="<?= htmlspecialchars($penulis) ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="penerbit" class="form-label">Penerbit</label>
                                    <input type="text" class="form-control" name="penerbit" id="penerbit" value="<?= htmlspecialchars($penerbit) ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                                    <input type="text" pattern="\d{4}" maxlength="4" class="form-control" name="tahun_terbit" id="tahun_terbit" value="<?= htmlspecialchars($tahun) ?>" required>
                                </div>

                                <style>
                                .btn-oren-muda {
                                    background-color: #e08549;
                                    color: white;
                                    border: none;
                                }

                                .btn-oren-muda:hover {
                                    background-color: #cf743e; 
                                    color: white;
                                }
                            </style>
                                <button type="submit" name="<?= $isEdit ? 'update_book' : 'add_book' ?>" class="btn btn-oren-muda">
                                    <?= $isEdit ? 'Perbarui Buku' : 'Tambah Buku' ?>
                                </button>
                                <a href="index.php" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>