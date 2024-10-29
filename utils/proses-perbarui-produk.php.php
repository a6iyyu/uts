<?php
include 'connection.php';

// Mendapatkan data dari form
$produk_id = $_POST['id'];
$nama = $_POST['nama_produk'];
$harga = (float)$_POST['harga'];
$stok = (int)$_POST['stok'];
$deskripsi = $_POST['deskripsi'];

// Ambil data biner gambar jika diunggah
if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == UPLOAD_ERR_OK) {
    $gambar = file_get_contents($_FILES['gambar']['tmp_name']);

    // Update produk dengan gambar baru
    $sql = "UPDATE Produk SET NamaProduk = ?, Deskripsi = ?, Harga = ?, Stok = ?, Gambar = CONVERT(VARBINARY(MAX), ?) WHERE ID = ?";
    $params = array($nama, $deskripsi, $harga, $stok, $gambar, $produk_id);
} else {
    // Update produk tanpa mengubah gambar
    $sql = "UPDATE Produk SET NamaProduk = ?, Deskripsi = ?, Harga = ?, Stok = ? WHERE ProdukID = ?";
    $params = array($nama, $deskripsi, $harga, $stok, $produk_id);
}

$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt) {
    // Redirect ke halaman index setelah berhasil memperbarui produk
    header("Location: ../index.php");
    exit();
} else {
    echo "Gagal memperbarui produk: " . print_r(sqlsrv_errors(), true);
}