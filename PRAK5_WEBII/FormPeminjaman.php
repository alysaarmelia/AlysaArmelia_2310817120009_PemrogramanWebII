<?php
include 'koneksi.php';
include 'model.php';

$message = "";
$message_type = "";

if (isset($_POST['add_peminjaman'])) {
    $result = addPeminjaman(
        $db,
        $_POST['id_member'],
        $_POST['id_buku'],
        $_POST['tanggal_pinjam'],
        $_POST['tanggal_kembali']
    );

    $message = $result ? "Peminjaman berhasil ditambahkan" : "Gagal menambahkan peminjaman";
    $message_type = $result ? "success" : "error";
}

$members = getAllMembers($db);
$books = getAllBooks($db);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Peminjaman</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
        padding-top: 50px;
    }
    
    .full-height {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding-top: 30px;
    }

    .container {
      max-width: 600px;
    }
    .card {
      padding: 50px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      width: 100%;
    }
    h2 {
      text-align: center;
      margin-bottom: 30px;
    }
  </style>
</head>

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
        <div class="row justify-content-center">
        <div class="container full-height">
            <div class="card">
            <h2>Tambah Peminjaman</h2>

            <?php if (!empty($message)): ?>
                <div class="alert alert-<?= $message_type ?>"><?= $message ?></div>
            <?php endif; ?>

            <form action="" method="POST">
                <input type="hidden" name="add_peminjaman" value="1">

                <div class="mb-3">
                <label for="tanggal_pinjam" class="form-label">Tanggal Peminjaman</label>
                <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" required>
                </div>

                <div class="mb-3">
                <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" required>
                </div>

                <div class="mb-3">
                <label for="id_member" class="form-label">Pilih ID Member</label>
                <select class="form-select" id="id_member" name="id_member" required>
                    <option value="">--pilih member--</option>
                    <?php foreach ($members as $member): ?>
                    <option value="<?= $member['id_member'] ?>"><?= $member['id_member'] ?> - <?= $member['nama_member'] ?></option>
                    <?php endforeach; ?>
                </select>
                </div>

                <div class="mb-3">
                <label for="id_buku" class="form-label">Pilih ID Buku</label>
                <select class="form-select" id="id_buku" name="id_buku" required>
                    <option value="">--pilih buku--</option>
                    <?php foreach ($books as $book): ?>
                    <option value="<?= $book['id_buku'] ?>"><?= $book['id_buku'] ?> - <?= $book['judul_buku'] ?></option>
                    <?php endforeach; ?>
                </select>
                </div>

                <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        </body>
        </html>