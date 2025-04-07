<?php
$title = "Login";
$css = 'includes/Registration.css';
include 'includes/AutoLoader.php';
include 'includes/header1.php';
?>
<div class="registration-container">
    <form class="registration-form" action="processRegistration.php" method="POST">
        <h2>Register</h2>
        <h4>When registered please log in!</h4>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <button type="submit" class="btn">Register</button>
    </form>
    <div class="login-link">
        <p>Already have an account? <a href="Login.php">Login here</a></p>
    </div>
</div>
<?php
include_once "includes/footer.php";
?>