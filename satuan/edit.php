<?php
include '../koneksi.php';

$id = $_GET['id'];

// Fetch existing satuan data
$query = "SELECT * FROM satuan WHERE idsatuan = '$id'";
$result = $conn->query($query);
$satuan = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_satuan = $_POST['nama_satuan'];
    $status = $_POST['status'];

    // Query untuk update satuan
    $query = "UPDATE satuan SET nama_satuan = '$nama_satuan', status = '$status' WHERE idsatuan = '$id'";
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
    <title>Edit Satuan</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <h1 class="mt-4">Edit Satuan</h1>
        <form method="POST">
            <div class="form-group">
                <label>Nama Satuan</label>
                <input type="text" name="nama_satuan" class="form-control" value="<?php echo $satuan['nama_satuan']; ?>" required>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="1" <?php echo $satuan['status'] == 1 ? 'selected' : ''; ?>>Aktif</option>
                    <option value="0" <?php echo $satuan['status'] == 0 ? 'selected' : ''; ?>>Tidak Aktif</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Save Changes</button>
        </form>
    </div>
</body>

</html>