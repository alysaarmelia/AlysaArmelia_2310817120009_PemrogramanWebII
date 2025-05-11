<?php
include 'koneksi.php';
include 'Model.php';

$edit_data = null;

if (isset($_POST['edit_id'])) {
    $id = $_POST['edit_id'];
    $stmt = $db->prepare("SELECT * FROM buku WHERE id_buku = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $edit_data = $stmt->get_result()->fetch_assoc();
}

if (isset($_POST['update_book'])) {
    $updateResult = updateBook(
        $db,
        $_POST['book_id'],
        $_POST['judul_buku'],
        $_POST['penulis'],
        $_POST['penerbit'],
        $_POST['tahun_terbit']
    );
    $book_message = $updateResult ? "Buku berhasil diupdate" : "Gagal update buku";
    $message_type = $updateResult ? "success" : "danger";
}
if (isset($_POST['delete_id'])) {
    $deleteResult = deleteBook($db, $_POST['delete_id']);
    $book_message = $deleteResult ? "Buku berhasil dihapus" : "Gagal menghapus buku";
    $message_type = $deleteResult ? "success" : "danger";
}

$query = "SELECT * FROM buku";
$result = $db->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            padding-top: 80px;
            background-color: #f2f2f2;
        }

        .card-custom {
            background-color: #fff;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            max-width: 1000px;
            margin: auto;
        }

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .actions .btn {
            margin-right: 5px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">Perpustakaan Shasha</a>
        </div>
    </nav>

    <div class="card-custom mt-4">
        <h2 class="text-center mb-4">Daftar Buku</h2>

        <?php if (!empty($book_message)): ?>
            <div class="alert alert-<?= $message_type; ?>">
                <?= $book_message; ?>
            </div>
        <?php endif; ?>

        <?php if ($edit_data): ?>
            <form method="post" class="mb-4">
                <input type="hidden" name="book_id" value="<?= $edit_data['id_buku'] ?>">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Judul Buku</label>
                        <input type="text" name="judul_buku" class="form-control" value="<?= htmlspecialchars($edit_data['judul_buku']) ?>" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Penulis</label>
                        <input type="text" name="penulis" class="form-control" value="<?= htmlspecialchars($edit_data['penulis']) ?>" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Penerbit</label>
                        <input type="text" name="penerbit" class="form-control" value="<?= htmlspecialchars($edit_data['penerbit']) ?>" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" class="form-control" value="<?= htmlspecialchars($edit_data['tahun_terbit']) ?>" required>
                    </div>
                </div>
                <div class="mt-3 d-flex justify-content-between">
                    <button type="submit" name="update_book" class="btn btn-success">Simpan Perubahan</button>
                    <a href="Buku.php" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        <?php endif; ?>

        <div class="d-flex justify-content-between mb-3">
            <a href="index.php" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
            <a href="FormBuku.php" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Tambah Buku Baru</a>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>ID Buku</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id_buku']) ?></td>
                        <td><?= htmlspecialchars($row['judul_buku']) ?></td>
                        <td><?= htmlspecialchars($row['penulis']) ?></td>
                        <td><?= htmlspecialchars($row['penerbit']) ?></td>
                        <td><?= htmlspecialchars($row['tahun_terbit']) ?></td>
                        <td class="actions d-flex justify-content-center gap-1">
                            <form method="post" class="d-inline">
                                <input type="hidden" name="edit_id" value="<?= $row['id_buku'] ?>">
                                <button type="submit" class="btn btn-warning btn-sm">
                                    Update
                                </button>
                            </form>
                            <form method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus buku ini?');">
                                <input type="hidden" name="delete_id" value="<?= $row['id_buku'] ?>">
                                <button type="submit" class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>

                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>