<?php
$title = "Login";
$css = 'includes/login.css';
include 'includes/AutoLoader.php';
include 'includes/header1.php';
session_start();
/*if (isset($_SESSION['username'])) {
    header('Location: Home.php');
    exit;
}*/

?>
<div class="login-container">
    <form class="login-form" action="processLogin.php" method="POST">
        <h2>Login</h2>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <button type="submit" class="btn">Login</button>
    </form>
    <div class="register-link">
        <p>Don't have an account? <a href="Registration.php">Register here</a></p>
    </div>
</div>
<?php
include_once "includes/footer.php";
?>