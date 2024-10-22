<?php
include '../koneksi.php';

// Fetch roles from the database
$query = "SELECT * FROM role";
$result = $conn->query($query); // Use $conn->query() instead of mysqli_query()

if ($result === false) {
    die("Error: " . $conn->error); // Handle query error
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role Management</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Role Management</h1>
        <a href="create.php" class="btn btn-primary mb-2">Add New Role</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Role Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['idrole']; ?></td>
                        <td><?php echo $row['nama_role']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['idrole']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete.php?id=<?php echo $row['idrole']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
