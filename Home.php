<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
$title = "Home";
$css = 'includes/style.css';
include 'includes/AutoLoader.php';
include 'includes/header.php';
?>
<div class="home-container">
    <h1>Welcome to your space!</h1>
</div>
<?php
include 'includes/footer.php';
?>