<?php
include 'koneksi.php';
include 'model.php';

$message = "";
$message_type = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = addMember(
        $db,
        $_POST['nama'],
        $_POST['telepon'],
        $_POST['alamat'],
        $_POST['tgl_terakhir_bayar']
    );

    $message = $result ? "Member berhasil ditambahkan" : "Gagal menambahkan member";
    $message_type = $result ? "success" : "error";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Member - Perpustakaan Shasha</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
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
        <div class="overlay" id="home">
            <div class="content-box">
            <div class="title">
                <h1>Selamat Datang di <span>Perpustakaan Shasha</span></h1>
            </div>
            <div class="subtitle">
                Terdapat buku-buku yang dapat dipinjamkan
            </div>

            <form action="" method="post">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" required>

                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" required>

                <label for="telepon">Telepon</label>
                <input type="text" id="telepon" name="telepon" required>

                <label for="tgl_terakhir_bayar">Tanggal Terakhir Bayar</label>
                <input type="date" id="tgl_terakhir_bayar" name="tgl_terakhir_bayar" value="<?php echo date('Y-m-d'); ?>" required>

                <input type="submit" name="add_member" value="Simpan">
            </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>