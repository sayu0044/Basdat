<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Menggunakan hash bcrypt
    $role = $_POST['role'];

    // Query untuk insert user baru
    $query = "INSERT INTO user (username, password, idrole) VALUES ('$username', '$password', '$role')";
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
    <title>Add New User</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Add New User</h1>
        <form method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <br>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <br>
            <div class="form-group">
                <label>Role</label>
                <select name="role" class="form-control" required>
                    <option value="">Select Role</option>
                    <?php while ($row = $resultRole->fetch_assoc()) { ?>
                        <option value="<?php echo $row['idrole']; ?>"><?php echo $row['nama_role']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
</body>
</html>
