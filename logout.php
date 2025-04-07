<?php
unset($_SESSION['role']);
unset($_SESSION['username']);
unset($_SESSION['email']);
header('Location: login.php');
exit;
