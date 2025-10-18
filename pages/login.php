<?php
session_start();
include_once __DIR__ . '/../config/db_connect.php';
include_once '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = getUserByEmail($email);

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['full_name'];
            header("Location: ../index.php");
            exit;
        } else {
            $error = "Incorrect password!";
        }
    } else {
        $error = "Email not registered!";
    }
}
?>

<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/login.css">

<div class="login-container">
    <h2>Login</h2>

    <?php if (isset($_GET['registered'])): ?>
        <p style="color:green; text-align:center;">Registration successful!</p>
    <?php endif; ?>

    <?php if (isset($error)): ?>
        <p style="color:red; text-align:center;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required placeholder="Enter your email">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required placeholder="Enter your password">
        </div>
        <button type="submit" class="btn">Login</button>
    </form>
    <p class="register-link">
        Don't have an account? <a href="registation.php">Register here</a>
    </p>
</div>