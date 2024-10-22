<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_vendor = $_POST['nama_vendor'];
    $badan_hukum = $_POST['badan_hukum'];
    $status = $_POST['status'];

    $query = "INSERT INTO vendor (nama_vendor, badan_hukum, status) VALUES ('$nama_vendor', '$badan_hukum', '$status')";
    if (mysqli_query($conn, $query)) {
        header("Location: index.php"); // Redirect ke halaman index setelah berhasil insert
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Vendor</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Add New Vendor</h1>
        <form action="create.php" method="POST">
            <div class="form-group">
                <label for="nama_vendor">Nama Vendor:</label>
                <input type="text" class="form-control" id="nama_vendor" name="nama_vendor" required>
            </div>

            <div class="form-group">
                <label for="badan_hukum">Badan Hukum:</label>
                <input type="text" class="form-control" id="badan_hukum" name="badan_hukum" maxlength="1" required>
                <small class="form-text text-muted">Masukkan 1 karakter (misalnya: P untuk PT).</small>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Add Vendor</button>
            <a href="index.php" class="btn btn-secondary mt-2">Cancel</a>
        </form>
    </div>
</body>
</html>
