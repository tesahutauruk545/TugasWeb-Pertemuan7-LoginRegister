<?php
require_once 'includes/functions.php';
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama    = $_POST['nama'] ?? '';
    $nim     = $_POST['nim'] ?? '';
    $email   = $_POST['email'] ?? '';
    $jurusan = $_POST['jurusan'] ?? '';
    $pass    = $_POST['password'] ?? '';
    $pass2   = $_POST['password2'] ?? '';
    
    if (empty($nama) || empty($nim) || empty($email) || empty($jurusan) || empty($pass)) {
        $error = 'Semua field harus diisi!';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Format email tidak valid!';
    } elseif (emailExists($email)) {
        $error = 'Email sudah terdaftar!';
    } elseif (strlen($pass) < 6) {
        $error = 'Password minimal 6 karakter!';
    } elseif ($pass !== $pass2) {
        $error = 'Konfirmasi password tidak cocok!';
    } else {
        registerUser($nama, $nim, $email, $jurusan, $pass);
        $success = 'Registrasi berhasil! Silakan login.';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Kartu Nama Digital</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Animated Background Shapes -->
    <div class="bg-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
    </div>

    <div class="container">
        <div class="form-card">
            <div class="card-header">
                <div class="logo-icon">🎓</div>
                <h1>Buat Akun</h1>
                <p class="subtitle">Daftar untuk mendapatkan Kartu Nama Digitalmu</p>
            </div>
            
            <?php if ($error): ?>
                <div class="alert error">
                    <span class="alert-icon">⚠️</span>
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div class="alert success">
                    <span class="alert-icon">✅</span>
                    <?= htmlspecialchars($success) ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="" class="form">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" value="<?= htmlspecialchars($_POST['nama'] ?? '') ?>" placeholder="Masukkan nama lengkap" required>
                </div>
                
                <div class="form-group">
                    <label>NIM</label>
                    <input type="text" name="nim" value="<?= htmlspecialchars($_POST['nim'] ?? '') ?>" placeholder="Contoh: 12345678" required>
                </div>
                
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" placeholder="nama@email.com" required>
                </div>
                
                <div class="form-group">
                    <label>Jurusan</label>
                    <input type="text" name="jurusan" value="<?= htmlspecialchars($_POST['jurusan'] ?? '') ?>" placeholder="Contoh: Teknik Informatika" required>
                </div>
                
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Minimal 6 karakter" required>
                </div>
                
                <div class="form-group">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password2" placeholder="Ulangi password" required>
                </div>
                
                <button type="submit" class="btn-primary">
                    <span>Daftar Sekarang</span>
                    <span class="btn-arrow">→</span>
                </button>
            </form>
            
            <p class="switch-link">Sudah punya akun? <a href="login.php">Login di sini</a></p>
        </div>
    </div>
    <script src="assets/js/script.js"></script>
</body>
</html>