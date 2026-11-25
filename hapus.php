<?php
// agar terhubung dengan database karena menggunakan query delete
require_once "koneksi.php";

// Mengambil id
$id = (int) $_POST["id"];

// membuat query delete
$query = "DELETE FROM anggota WHERE id = ?";

// mengyiapkan preapred statement
$stmt = mysqli_prepare($koneksi, $query);

// mengikat parameter
mysqli_stmt_bind_param($stmt, "i", $id);

// Menjalankan query delete
if (mysql_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    header ("Location: data.php");
    exit;
} else {
    die ("Gagal menghapus data: " . mysqli_stmt_error[$stmt]);
}

?>