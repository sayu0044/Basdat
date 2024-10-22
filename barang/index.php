<?php
include '../koneksi.php';

// Fetch barang from the database
$query = "SELECT barang.idbarang, barang.nama_barang, satuan.nama_satuan, barang.status 
          FROM barang 
          JOIN satuan ON barang.idsatuan = satuan.idsatuan";
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
    <title>Barang Management</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Barang Management</h1>
        <a href="create.php" class="btn btn-primary mb-2">Add New Barang</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['idbarang']; ?></td>
                        <td><?php echo $row['nama_barang']; ?></td>
                        <td><?php echo $row['nama_satuan']; ?></td>
                        <td><?php echo $row['status'] == 1 ? 'Aktif' : 'Tidak Aktif'; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['idbarang']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete.php?id=<?php echo $row['idbarang']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
