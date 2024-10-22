<?php
include '../koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM role WHERE idrole = $id";
$result = mysqli_query($conn, $query);
$role = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $role_name = $_POST['role_name'];
    
    $query = "UPDATE role SET nama_role = '$role_name' WHERE idrole = $id";
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
    <title>Edit Role</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Edit Role</h1>
        <form action="edit.php?id=<?php echo $id; ?>" method="POST">
            <div class="form-group">
                <label for="role_name">Role Name:</label>
                <input type="text" class="form-control" id="role_name" name="role_name" value="<?php echo $role['nama_role']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Update Role</button>
        </form>
    </div>
</body>
</html>
