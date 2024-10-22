<?php
include '../koneksi.php';

// Query untuk mendapatkan semua satuan
$query = "SELECT * FROM satuan";
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
    <title>Satuan Management</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Satuan Management</h1>
        <a href="create.php" class="btn btn-primary mb-2">Add New Satuan</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Satuan</th>
                    <th>Nama Satuan</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['idsatuan']; ?></td>
                        <td><?php echo $row['nama_satuan']; ?></td>
                        <td><?php echo $row['status'] == 1 ? 'Aktif' : 'Tidak Aktif'; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['idsatuan']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete.php?id=<?php echo $row['idsatuan']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
