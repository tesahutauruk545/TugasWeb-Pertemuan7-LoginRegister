<?php
require_once __DIR__ . '/config.php';

function getUsers() {
    if (!file_exists(DATA_FILE)) return [];
    $data = file_get_contents(DATA_FILE);
    return json_decode($data, true) ?: [];
}

function saveUsers($users) {
    file_put_contents(DATA_FILE, json_encode($users, JSON_PRETTY_PRINT));
}

function emailExists($email) {
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['email'] === $email) return true;
    }
    return false;
}

function registerUser($nama, $nim, $email, $jurusan, $password) {
    $users = getUsers();
    $newUser = [
        'id'            => uniqid(),
        'nama'          => htmlspecialchars(trim($nama)),
        'nim'           => htmlspecialchars(trim($nim)),
        'email'         => filter_var(trim($email), FILTER_SANITIZE_EMAIL),
        'jurusan'       => htmlspecialchars(trim($jurusan)),
        'password'      => password_hash($password, PASSWORD_DEFAULT),
        'registered_at' => date('Y-m-d H:i:s')
    ];
    $users[] = $newUser;
    saveUsers($users);
    return $newUser;
}

function loginUser($email, $password) {
    $users = getUsers();
    $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
    foreach ($users as $user) {
        if ($user['email'] === $email && password_verify($password, $user['password'])) {
            return $user;
        }
    }
    return false;
}

function updateUser($id, $nama, $nim, $jurusan) {
    $users = getUsers();
    foreach ($users as &$user) {
        if ($user['id'] === $id) {
            $user['nama']    = htmlspecialchars(trim($nama));
            $user['nim']     = htmlspecialchars(trim($nim));
            $user['jurusan'] = htmlspecialchars(trim($jurusan));
            break;
        }
    }
    saveUsers($users);
}
?>