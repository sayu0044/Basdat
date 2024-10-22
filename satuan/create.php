<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_satuan = $_POST['nama_satuan'];
    $status = $_POST['status'];

    // Query untuk insert satuan baru
    $query = "INSERT INTO satuan (nama_satuan, status) VALUES ('$nama_satuan', '$status')";
    if ($conn->query($query) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Satuan</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <h1 class="mt-4">Add New Satuan</h1>
        <form method="POST">
            <div class="form-group">
                <label>Nama Satuan</label>
                <input type="text" name="nama_satuan" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
</body>

</html>