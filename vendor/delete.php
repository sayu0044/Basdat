<?php
include '../koneksi.php';

$id = $_GET['id']; 

// Query untuk menghapus vendor
$query = "DELETE FROM vendor WHERE idvendor = '$id'";
if ($conn->query($query) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $conn->error;
}
?>