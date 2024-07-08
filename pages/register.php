<?php
include '../includes/database.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_name = $_POST['user_name'];
    $role = $_POST['role'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Debugging statements
    echo "Original Password: " . htmlspecialchars($_POST['password']) . "<br>";
    echo "Hashed Password: " . htmlspecialchars($password) . "<br>";

    $sql = "INSERT INTO tbl_users (first_name, last_name, user_name, role, password) VALUES (?, ?, ?, ?, ?)";
    
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "sssss", $first_name, $last_name, $user_name, $role, $password);
        
        if(mysqli_stmt_execute($stmt)){
            header("location: login.php");
        } else {
            echo "Something went wrong. Please try again later.";
        }
    } else {
        echo "Database statement preparation failed.";
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($link);
?>

<?php include '../includes/header.php'; ?>

<h2>Register</h2>
<form action="register.php" method="post">
    <div class="mb-3">
        <label class="form-label">First Name</label>
        <input type="text" name="first_name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Last Name</label>
        <input type="text" name="last_name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="user_name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Role</label>
        <input type="text" name="role" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>

<?php include '../includes/footer.php'; ?>
