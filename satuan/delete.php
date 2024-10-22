<?php
include '../koneksi.php';

$id = $_GET['id'];

// Query untuk menghapus satuan
$query = "DELETE FROM satuan WHERE idsatuan = '$id'";
if ($conn->query($query) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $conn->error;
}
?>
