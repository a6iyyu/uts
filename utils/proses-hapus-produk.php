<?php
include 'connection.php';

// Mendapatkan ID produk dari URL
if (isset($_GET['id'])) {
    $produk_id = $_GET['id'];

    // Query untuk menghapus produk berdasarkan ID
    $sql = "DELETE FROM Produk WHERE ProdukID = ?";
    $params = array($produk_id);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        // Redirect ke halaman index setelah berhasil menghapus produk
        header("Location: ../index.php");
        exit();
    } else {
        echo "Gagal menghapus produk: " . print_r(sqlsrv_errors(), true);
    }
} else {
    die("ID produk tidak ditentukan.");
}