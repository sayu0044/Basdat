<?php
include 'koneksi.php';

$idbarang = $_GET['id']; // Mengambil ID barang dari URL

// Fetch barang data berdasarkan idbarang
$query = "SELECT * FROM barang WHERE idbarang = $idbarang";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $barang = mysqli_fetch_assoc($result); // Mengambil data barang
} else {
    die("Barang tidak ditemukan.");
}

// Fetch satuan untuk dropdown
$satuan_query = "SELECT idsatuan, nama_satuan FROM satuan";
$satuan_result = mysqli_query($conn, $satuan_query);

// Update barang jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $idsatuan = $_POST['idsatuan'];
    $status = $_POST['status'];

    $update_query = "UPDATE barang SET nama_barang = '$nama_barang', idsatuan = '$idsatuan', status = '$status' WHERE idbarang = $idbarang";
    
    if (mysqli_query($conn, $update_query)) {
        header("Location: index.php"); // Redirect setelah update sukses
    } else {
        echo "Error: " . $update_query . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Edit Barang</h1>
        <form action="edit.php?id=<?php echo $idbarang; ?>" method="POST">
            <div class="form-group">
                <label for="nama_barang">Nama Barang:</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo $barang['nama_barang']; ?>" required>
            </div>

            <div class="form-group">
                <label for="idsatuan">Satuan:</label>
                <select class="form-control" id="idsatuan" name="idsatuan" required>
                    <?php while ($row = mysqli_fetch_assoc($satuan_result)) { ?>
                        <option value="<?php echo $row['idsatuan']; ?>" <?php echo $row['idsatuan'] == $barang['idsatuan'] ? 'selected' : ''; ?>>
                            <?php echo $row['nama_satuan']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="1" <?php echo $barang['status'] == 1 ? 'selected' : ''; ?>>Aktif</option>
                    <option value="0" <?php echo $barang['status'] == 0 ? 'selected' : ''; ?>>Tidak Aktif</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Update Barang</button>
        </form>
    </div>
</body>
</html>
