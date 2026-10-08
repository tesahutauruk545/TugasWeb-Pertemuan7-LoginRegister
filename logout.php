<?php
require_once 'includes/config.php';
if (isset($_COOKIE['user_email'])) {
    setcookie('user_email', '', time() - 3600, '/');
}
session_destroy();
redirect('login.php');
?>