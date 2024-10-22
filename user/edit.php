<?php
include '../koneksi.php';

$id = $_GET['id'];

// Fetch existing user data
$query = "SELECT * FROM user WHERE iduser = '$id'";
$result = $conn->query($query);
$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $role = $_POST['role'];
    
    // Jika password diisi, maka update password
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $query = "UPDATE user SET username = '$username', password = '$password', idrole = '$role' WHERE iduser = '$id'";
    } else {
        $query = "UPDATE user SET username = '$username', idrole = '$role' WHERE iduser = '$id'";
    }

    if ($conn->query($query) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}

// Ambil data role untuk dropdown
$queryRole = "SELECT * FROM role";
$resultRole = $conn->query($queryRole);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Edit User</h1>
        <form method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $user['username']; ?>" required>
            </div>
            <div class="form-group">
                <label>Password (Leave blank if not changing)</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label>Role</label>
                <select name="role" class="form-control" required>
                    <option value="">Select Role</option>
                    <?php while ($row = $resultRole->fetch_assoc()) { ?>
                        <option value="<?php echo $row['idrole']; ?>" <?php echo $row['idrole'] == $user['idrole'] ? 'selected' : ''; ?>>
                            <?php echo $row['nama_role']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Save Changes</button>
        </form>
    </div>
</body>
</html>
