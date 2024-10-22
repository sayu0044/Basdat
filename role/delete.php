<?php
include '../koneksi.php';

$id = $_GET['id'];

$query = "DELETE FROM role WHERE idrole = $id";
if (mysqli_query($conn, $query)) {
    header("Location: index.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>
