<?php
include_once 'includes/AutoLoader.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];

    $login = new UserRepository();
    $user = $login->getUserByUsernameAndEmail($username, $email);
    if ($user) {
        $user = new Utilisateur($user->utilisateur_id, $user->username, $user->email, $user->role);
        session_start();
        $_SESSION['role'] = $user->role;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
        header('Location: Home.php');
        exit;
    } else {
        header('Location: login.php?error=invalid_credentials');
        exit;
    }
} else {
    header('Location: login.php');
    exit;
}
