<?php
include_once __DIR__ . '/../config/db_connect.php';
include_once '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Password match check
    if ($password != $confirm_password) {
        $error = "Passwords do not match!";
    } elseif (getUserByEmail($email)) {
        $error = "Email already registered!";
    } else {
        $result = addUser($name, $email, $password);
        if ($result === true) {
            // Registration success → Redirect to login page
            header("Location: login.php?registered=1");
            exit;
        } else {
            $error = "Error: " . $result;
        }
    }
}
?>

<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/registation.css ">

<div class="register-container">
    <h2>Register</h2>

    <?php if (isset($error)): ?>
        <p style="color:red; text-align:center;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required placeholder="Enter your full name">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required placeholder="Enter your email">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required placeholder="Enter your password">
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirm your password">
        </div>
        <button type="submit" class="btn">Register</button>
    </form>
    <p class="login-link">
        Already have an account? <a href="login.php">Login here</a>
    </p>
</div>