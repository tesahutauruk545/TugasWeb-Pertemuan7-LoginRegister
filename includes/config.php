<?php
session_start();

define('DATA_FILE', __DIR__ . '/../data/users.json');
define('BASE_URL', 'http://localhost/TugasWeb-Pertemuan7-LoginRegister/');

function redirect($page) {
    header('Location: ' . BASE_URL . $page);
    exit;
}
?>