<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $idsatuan = $_POST['idsatuan'];
    $status = $_POST['status'];

    $query = "INSERT INTO barang (nama_barang, idsatuan, status) VALUES ('$nama_barang', '$idsatuan', '$status')";
    if (mysqli_query($conn, $query)) {
        header("Location: index.php"); // Redirect ke halaman index setelah berhasil insert
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

// Fetch data satuan untuk dropdown
$satuan_query = "SELECT idsatuan, nama_satuan FROM satuan";
$satuan_result = mysqli_query($conn, $satuan_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Barang</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Add New Barang</h1>
        <form action="create.php" method="POST">
            <div class="form-group">
                <label for="nama_barang">Nama Barang:</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
            </div>

            <div class="form-group">
                <label for="idsatuan">Satuan:</label>
                <select class="form-control" id="idsatuan" name="idsatuan" required>
                    <?php while ($row = mysqli_fetch_assoc($satuan_result)) { ?>
                        <option value="<?php echo $row['idsatuan']; ?>"><?php echo $row['nama_satuan']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Add Barang</button>
        </form>
    </div>
</body>
</html>
