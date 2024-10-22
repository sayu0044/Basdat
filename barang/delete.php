<?php
include 'koneksi.php';

$id = $_GET['id'];

// Query untuk menghapus barang
$query = "DELETE FROM barang WHERE idbarang = '$id'";
if ($conn->query($query) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $conn->error;
}
?>


