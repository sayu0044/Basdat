<?php
include '../koneksi.php';

$id = $_GET['id'];

// Query untuk menghapus user
$query = "DELETE FROM user WHERE iduser = '$id'";
if ($conn->query($query) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $conn->error;
}
?>
