<?php
require_once 'includes/functions.php';
if (!isset($_SESSION['user'])) {
    redirect('login.php');
}
$user = $_SESSION['user'];
$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama    = $_POST['nama'] ?? '';
    $nim     = $_POST['nim'] ?? '';
    $jurusan = $_POST['jurusan'] ?? '';
    
    if (empty($nama) || empty($nim) || empty($jurusan)) {
        $message = 'Semua field harus diisi!';
        $messageType = 'error';
    } else {
        updateUser($user['id'], $nama, $nim, $jurusan);
        $_SESSION['user']['nama']    = htmlspecialchars(trim($nama));
        $_SESSION['user']['nim']     = htmlspecialchars(trim($nim));
        $_SESSION['user']['jurusan'] = htmlspecialchars(trim($jurusan));
        $message = 'Profil berhasil diperbarui!';
        $messageType = 'success';
        $user = $_SESSION['user'];
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil - Kartu Nama Digital</title>
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
                <div class="logo-icon">✏️</div>
                <h1>Edit Profil</h1>
                <p class="subtitle">Perbarui informasi Kartu Nama Digitalmu</p>
            </div>
            
            <?php if ($message): ?>
                <div class="alert <?= $messageType ?>">
                    <span class="alert-icon"><?= $messageType === 'success' ? '✅' : '️' ?></span>
                    <?= htmlspecialchars($message) ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="" class="form">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" value="<?= htmlspecialchars($user['nama']) ?>" required>
                </div>
                
                <div class="form-group">
                    <label>NIM</label>
                    <input type="text" name="nim" value="<?= htmlspecialchars($user['nim']) ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Jurusan</label>
                    <input type="text" name="jurusan" value="<?= htmlspecialchars($user['jurusan']) ?>" required>
                </div>
                
                <div class="form-actions">
                    <a href="dashboard.php" class="btn-secondary">← Kembali</a>
                    <button type="submit" class="btn-primary">
                        <span>Simpan Perubahan</span>
                        <span class="btn-arrow">✓</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/js/script.js"></script>
</body>
</html>