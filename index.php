<?php
require_once 'includes/config.php';
if (isset($_SESSION['user'])) {
    redirect('dashboard.php');
}
redirect('login.php');
?>