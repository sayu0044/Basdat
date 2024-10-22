<?php
include '../koneksi.php';

// Fetch vendor from the database
$query = "SELECT idvendor, nama_vendor, badan_hukum, status FROM vendor";
$result = $conn->query($query);

if ($result === false) {
    die("Error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Management</title>
    <link href="../css/styles.css" rel="stylesheet" /> <!-- Ganti dengan path ke file CSS Anda -->
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Vendor Management</h1>
        <a href="create.php" class="btn btn-primary mb-2">Add New Vendor</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Vendor</th>
                    <th>Nama Vendor</th>
                    <th>Badan Hukum</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['idvendor']; ?></td>
                        <td><?php echo htmlspecialchars($row['nama_vendor']); ?></td>
                        <td><?php echo htmlspecialchars($row['badan_hukum']); ?></td>
                        <td><?php echo $row['status'] == '1' ? 'Aktif' : 'Tidak Aktif'; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['idvendor']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete.php?idvendor=<?php echo $vendor['idvendor']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus vendor ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
    <?php $conn->close(); ?>
</body>
</html>
