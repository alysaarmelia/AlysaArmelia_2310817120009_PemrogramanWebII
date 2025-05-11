<?php
include 'koneksi.php';
function getAllBooks($db) {
    return $db->query("SELECT * FROM buku");
}

function addBook($db, $judul, $penulis, $penerbit, $tahun) {
    $stmt = $db->prepare("INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $judul, $penulis, $penerbit, $tahun);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

function deleteBook($db, $id) {
    $stmt = $db->prepare("DELETE FROM buku WHERE id_buku = ?");
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

function updateBook($db, $id, $judul, $penulis, $penerbit, $tahun) {
    $stmt = $db->prepare("UPDATE buku SET judul_buku=?, penulis=?, penerbit=?, tahun_terbit=? WHERE id_buku=?");
    $stmt->bind_param("ssssi", $judul, $penulis, $penerbit, $tahun, $id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

function getAllMembers($db) {
    return $db->query("SELECT * FROM member");
}

function addMember($db, $nama, $nomor, $alamat, $tgl_bayar) {
    $tgl_mendaftar = date('Y-m-d H:i:s'); 
    $stmt = $db->prepare("INSERT INTO member (nama_member, nomor_member, alamat, tgl_terakhir_bayar, tgl_mendaftar) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nama, $nomor, $alamat, $tgl_bayar, $tgl_mendaftar);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

function deleteMember($db, $id) {
    $stmt = $db->prepare("DELETE FROM member WHERE id_member = ?");
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

function updateMember($db, $id, $nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar) {
    $stmt = $db->prepare("UPDATE member SET nama_member=?, nomor_member=?, alamat=?, tgl_mendaftar=?, tgl_terakhir_bayar=? WHERE id_member=?");
    $stmt->bind_param("sssssi", $nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar, $id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

function getAllPeminjaman($db) {
    return $db->query("SELECT * FROM peminjaman");
}

function addPeminjaman($db, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
    $stmt = $db->prepare("INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiss", $id_member, $id_buku, $tgl_pinjam, $tgl_kembali);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

function deletePeminjaman($db, $id) {
    $stmt = $db->prepare("DELETE FROM peminjaman WHERE id_peminjaman = ?");
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

function updatePeminjaman($db, $id, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
    $stmt = $db->prepare("UPDATE peminjaman SET id_member=?, id_buku=?, tgl_pinjam=?, tgl_kembali=? WHERE id_peminjaman=?");
    $stmt->bind_param("iissi", $id_member, $id_buku, $tgl_pinjam, $tgl_kembali, $id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}
?>