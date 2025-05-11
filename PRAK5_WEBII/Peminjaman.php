<?php
include 'koneksi.php';
include 'Model.php';

$edit_data = null;
$members = getAllMembers($db);
$books = getAllBooks($db);

if (isset($_POST['edit_id'])) {
    $id = $_POST['edit_id'];
    $stmt = $db->prepare("SELECT * FROM peminjaman WHERE id_peminjaman = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $edit_data = $stmt->get_result()->fetch_assoc();
}

if (isset($_POST['update_peminjaman'])) {
    $result = updatePeminjaman(
        $db,
        $_POST['peminjaman_id'],
        $_POST['id_member'],
        $_POST['id_buku'],
        $_POST['tgl_pinjam'],
        $_POST['tgl_kembali']
    );
    $peminjaman_message = $result ? "Peminjaman berhasil diupdate" : "Gagal update peminjaman";
    $message_type = $result ? "success" : "danger";
}

if (isset($_POST['delete_id'])) {
    $deleteResult = deletePeminjaman($db, $_POST['delete_id']);
    $peminjaman_message = $deleteResult ? "Data berhasil dihapus." : "Gagal menghapus data.";
    $message_type = $deleteResult ? "success" : "danger";
}

$query = "SELECT p.id_peminjaman, p.tgl_pinjam, p.tgl_kembali, m.nama_member, b.judul_buku 
          FROM peminjaman p
          JOIN member m ON p.id_member = m.id_member
          JOIN buku b ON p.id_buku = b.id_buku";

$result = $db->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Peminjaman</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
        <h2 class="text-center mb-4">Daftar Peminjaman</h2>

        <?php if (isset($peminjaman_message)): ?>
            <div class="alert alert-<?= $message_type ?>"><?= $peminjaman_message ?></div>
        <?php endif; ?>

        <?php if ($edit_data): ?>
            <form method="post" class="mb-4">
                <input type="hidden" name="peminjaman_id" value="<?= $edit_data['id_peminjaman'] ?>">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="id_member" class="form-label">Nama Member</label>
                        <select name="id_member" class="form-select" required>
                            <option value="">Pilih Member</option>
                            <?php while ($m = $members->fetch_assoc()): ?>
                                <option value="<?= $m['id_member'] ?>" <?= $m['id_member'] == $edit_data['id_member'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($m['nama_member']) ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="id_buku" class="form-label">Judul Buku</label>
                        <select name="id_buku" class="form-select" required>
                            <option value="">Pilih Buku</option>
                            <?php while ($b = $books->fetch_assoc()): ?>
                                <option value="<?= $b['id_buku'] ?>" <?= $b['id_buku'] == $edit_data['id_buku'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($b['judul_buku']) ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                        <input type="date" class="form-control" name="tgl_pinjam" value="<?= $edit_data['tgl_pinjam'] ?>" required>
                    </div>
                    <div class="col-md-3">
                        <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                        <input type="date" class="form-control" name="tgl_kembali" value="<?= $edit_data['tgl_kembali'] ?>" required>
                    </div>
                </div>
                <div class="mt-3 d-flex justify-content-between">
                    <button type="submit" name="update_peminjaman" class="btn btn-success">Simpan Perubahan</button>
                    <a href="Peminjaman.php" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        <?php endif; ?>

        <div class="d-flex justify-content-between mb-3">
            <a href="index.php" class="btn btn-secondary">Kembali</a>
            <a href="FormPeminjaman.php" class="btn btn-primary">Tambah Data Baru</a>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Nama Member</th>
                    <th>Judul Buku</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id_peminjaman']) ?></td>
                        <td><?= htmlspecialchars($row['tgl_pinjam']) ?></td>
                        <td><?= htmlspecialchars($row['tgl_kembali']) ?></td>
                        <td><?= htmlspecialchars($row['nama_member']) ?></td>
                        <td><?= htmlspecialchars($row['judul_buku']) ?></td>
                        <td class="actions d-flex justify-content-center gap-1">
                            <form method="post">
                                <input type="hidden" name="edit_id" value="<?= $row['id_peminjaman'] ?>">
                                <button type="submit" class="btn btn-warning btn-sm">
                                    Update
                                </button>
                            </form>
                            <form method="post" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                <input type="hidden" name="delete_id" value="<?= $row['id_peminjaman'] ?>">
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