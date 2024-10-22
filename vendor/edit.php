<?php
include 'koneksi.php';

// Ambil ID vendor dari URL atau tetapkan ID default jika tidak ada
$idvendor = isset($_GET['idvendor']) ? intval($_GET['idvendor']) : 1; // Misalnya, 1 adalah ID default

// Fetch vendor data berdasarkan idvendor
$query = "SELECT * FROM vendor WHERE idvendor = $idvendor";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $vendor = mysqli_fetch_assoc($result); // Mengambil data vendor
} else {
    // Anda bisa memberikan informasi atau mengalihkan ke halaman lain jika vendor tidak ditemukan
    echo "Vendor tidak ditemukan.";
    exit; // Keluar dari skrip jika vendor tidak ditemukan
}

// Update vendor jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_vendor = $_POST['nama_vendor'];
    $badan_hukum = $_POST['badan_hukum'];
    $status = $_POST['status'];

    $update_query = "UPDATE vendor SET nama_vendor = '$nama_vendor', badan_hukum = '$badan_hukum', status = '$status' WHERE idvendor = $idvendor";
    
    if (mysqli_query($conn, $update_query)) {
        header("Location: index.php"); // Redirect setelah update sukses
        exit; // Pastikan untuk exit setelah redirect
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
    <title>Edit Vendor</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Edit Vendor</h1>
        <form action="edit.php?idvendor=<?php echo $idvendor; ?>" method="POST">
            <div class="form-group">
                <label for="nama_vendor">Nama Vendor:</label>
                <input type="text" class="form-control" id="nama_vendor" name="nama_vendor" value="<?php echo htmlspecialchars($vendor['nama_vendor']); ?>" required>
            </div>

            <div class="form-group">
                <label for="badan_hukum">Badan Hukum:</label>
                <input type="text" class="form-control" id="badan_hukum" name="badan_hukum" maxlength="1" value="<?php echo htmlspecialchars($vendor['badan_hukum']); ?>" required>
                <small class="form-text text-muted">Masukkan 1 karakter (misalnya: P untuk PT).</small>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="1" <?php echo $vendor['status'] == 1 ? 'selected' : ''; ?>>Aktif</option>
                    <option value="0" <?php echo $vendor['status'] == 0 ? 'selected' : ''; ?>>Tidak Aktif</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Update Vendor</button>
            <a href="index.php" class="btn btn-secondary mt-2">Cancel</a>
        </form>
    </div>
</body>
</html>