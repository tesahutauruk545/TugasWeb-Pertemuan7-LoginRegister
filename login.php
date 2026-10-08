<?php
require_once 'includes/functions.php';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $pass  = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);
    
    $user = loginUser($email, $pass);
    
    if ($user) {
        $_SESSION['user'] = $user;
        if ($remember) {
            setcookie('user_email', $user['email'], time() + (86400 * 30), '/');
        }
        redirect('dashboard.php');
    } else {
        $error = 'Email atau password salah!';
    }
}

$savedEmail = $_COOKIE['user_email'] ?? '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Kartu Nama Digital</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="bg-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
    </div>

    <div class="container">
        <div class="form-card">
            <div class="card-header">
                <div class="logo-icon"></div>
                <h1>Selamat Datang</h1>
                <p class="subtitle">Login untuk melihat Kartu Nama Digitalmu</p>
            </div>
            
            <?php if ($error): ?>
                <div class="alert error">
                    <span class="alert-icon">⚠️</span>
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="" class="form">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($savedEmail) ?>" placeholder="nama@email.com" required>
                </div>
                
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Masukkan password" required>
                </div>
                
                <div class="form-group checkbox-group">
                    <label class="checkbox-label">
                        <input type="checkbox" name="remember" <?= $savedEmail ? 'checked' : '' ?>>
                        <span class="checkbox-custom"></span>
                        <span>Ingat saya</span>
                    </label>
                </div>
                
                <button type="submit" class="btn-primary">
                    <span>Login</span>
                    <span class="btn-arrow">→</span>
                </button>
            </form>
            
            <p class="switch-link">Belum punya akun? <a href="register.php">Daftar di sini</a></p>
        </div>
    </div>
    <script src="assets/js/script.js"></script>
</body>
</html>