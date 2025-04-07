<?php
include_once 'includes/AutoLoader.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];

    $Registration = new UserRepository();
    $params = [
        'username' => $username,
        'email' => $email,
        'role' => 'user',
    ];
    $Registration->create($params);
    header('Location: login.php');
    exit;
} else {
    header('Location: login.php');
    exit;
}
