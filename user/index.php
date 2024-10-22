<?php
include '../koneksi.php';

// Query untuk mendapatkan semua user
$query = "SELECT user.iduser, user.username, role.nama_role FROM user 
          LEFT JOIN role ON user.idrole = role.idrole";
$result = $conn->query($query); // Menggunakan $conn->query()

if ($result === false) {
    die("Error: " . $conn->error); // Penanganan error query
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link href="../css/styles.css" rel="stylesheet" /> <!-- Tambahkan style sheet sesuai kebutuhan -->
</head>
<body>
    <div class="container">
        <h1 class="mt-4">User Management</h1>
        <a href="create.php" class="btn btn-primary mb-2">Add New User</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['iduser']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['nama_role']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['iduser']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete.php?id=<?php echo $row['iduser']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
