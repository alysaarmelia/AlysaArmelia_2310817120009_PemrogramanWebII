<?php
include 'koneksi.php';
include 'Model.php';

$member_message = '';
$message_type = '';
$editing_member = null;

if (isset($_POST['update_member'])) {
    $updated = updateMember(
        $db,
        $_POST['member_id'],
        $_POST['nama_member'],
        $_POST['nomor_member'],
        $_POST['alamat'],
        $_POST['tgl_mendaftar'],
        $_POST['tgl_terakhir_bayar']
    );
    $member_message = $updated ? "Member berhasil diupdate." : "Gagal update member.";
    $message_type = $updated ? "success" : "danger";
}

if (isset($_POST['edit_id'])) {
    $id = $_POST['edit_id'];
    $stmt = $db->prepare("SELECT * FROM member WHERE id_member = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $editing_member = $stmt->get_result()->fetch_assoc();
}
if (isset($_POST['delete_id'])) {
    $deleted = deleteMember($db, $_POST['delete_id']);
    $member_message = $deleted ? "Member berhasil dihapus." : "Gagal menghapus member.";
    $message_type = $deleted ? "success" : "danger";
}

$members = getAllMembers($db);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Member</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
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
        <h2 class="text-center mb-4">Daftar Member</h2>

        <?php if (!empty($member_message)): ?>
            <div class="alert alert-<?= $message_type; ?>"><?= $member_message; ?></div>
        <?php endif; ?>

        <?php if ($editing_member): ?>
            <form method="post" class="mb-4">
                <input type="hidden" name="member_id" value="<?= $editing_member['id_member'] ?>">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Nama Member</label>
                        <input type="text" name="nama_member" value="<?= htmlspecialchars($editing_member['nama_member']) ?>"
                            class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Nomor Member</label>
                        <input type="text" name="nomor_member" value="<?= htmlspecialchars($editing_member['nomor_member']) ?>"
                            class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Alamat</label>
                        <input type="text" name="alamat" value="<?= htmlspecialchars($editing_member['alamat']) ?>"
                            class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Tanggal Daftar</label>
                        <input type="date" name="tgl_mendaftar" value="<?= $editing_member['tgl_mendaftar'] ?>"
                            class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Terakhir Bayar</label>
                        <input type="date" name="tgl_terakhir_bayar" value="<?= $editing_member['tgl_terakhir_bayar'] ?>"
                            class="form-control" required>
                    </div>
                </div>
                <div class="mt-3 d-flex justify-content-between">
                    <button type="submit" name="update_member" class="btn btn-success">Simpan Perubahan</button>
                    <a href="<?= $_SERVER['PHP_SELF'] ?>" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        <?php endif; ?>

        <div class="d-flex justify-content-between mb-3">
            <a href="index.php" class="btn btn-secondary">Kembali</a>
            <a href="FormMember.php" class="btn btn-primary">Tambah Data Baru</a>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Nomor</th>
                    <th>Alamat</th>
                    <th>Tanggal Mendaftar</th>
                    <th>Tanggal Terakhir Bayar</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $members->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id_member'] ?></td>
                        <td><?= htmlspecialchars($row['nama_member']) ?></td>
                        <td><?= htmlspecialchars($row['nomor_member']) ?></td>
                        <td><?= htmlspecialchars($row['alamat']) ?></td>
                        <td><?= htmlspecialchars($row['tgl_mendaftar']) ?></td>
                        <td><?= htmlspecialchars($row['tgl_terakhir_bayar']) ?></td>
                        <td class="actions d-flex justify-content-center gap-1">
                            <form method="post" class="d-inline">
                                <input type="hidden" name="edit_id" value="<?= $row['id_member'] ?>">
                                <button type="submit" class="btn btn-warning btn-sm">
                                    Update
                                </button>
                            </form>
                            <form method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                <input type="hidden" name="delete_id" value="<?= $row['id_member'] ?>">
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