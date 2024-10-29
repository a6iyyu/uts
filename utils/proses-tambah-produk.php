<?php
include 'connection.php';

$nama = $_POST['nama_produk'];
$harga = (float)$_POST['harga'];  // Pastikan harga adalah float
$stok = (int)$_POST['stok'];      // Pastikan stok adalah integer
$deskripsi = $_POST['deskripsi'];

// Ambil data biner gambar dari file yang diunggah
if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == UPLOAD_ERR_OK) {
    $gambar = file_get_contents($_FILES['gambar']['tmp_name']);
} else {
    die("Gagal mengunggah gambar.");
}

// Siapkan query untuk memasukkan produk
$sql = "INSERT INTO Produk (NamaProduk, Deskripsi, Harga, Stok, Gambar) VALUES (?, ?, ?, ?, CONVERT(VARBINARY(MAX), ?))";
$params = array($nama, $deskripsi, $harga, $stok, $gambar);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt) {
    // Redirect ke halaman index setelah berhasil menambahkan produk
    header("Location: ../index.php");
    exit(); // Pastikan untuk menghentikan eksekusi skrip setelah redirect
} else {
    echo "Gagal menambah produk: " . print_r(sqlsrv_errors(), true);
}