<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $role_name = $_POST['role_name'];
    
    $query = "INSERT INTO role (nama_role) VALUES ('$role_name')";
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
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
    <title>Add New Role</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Add New Role</h1>
        <form action="create.php" method="POST">
            <div class="form-group">
                <label for="role_name">Role Name:</label>
                <input type="text" class="form-control" id="role_name" name="role_name" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Add Role</button>
        </form>
    </div>
</body>
</html>
