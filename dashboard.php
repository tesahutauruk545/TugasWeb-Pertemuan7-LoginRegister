<?php
require_once 'includes/functions.php';
if (!isset($_SESSION['user'])) {
    redirect('login.php');
}
$user = $_SESSION['user'];
$firstName = explode(' ', $user['nama'])[0];
$initial = strtoupper(substr($user['nama'], 0, 1));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Kartu Nama Digital</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="bg-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
        <div class="shape shape-4"></div>
    </div>

    <div class="dashboard-container">
        <!-- Header -->
        <header class="dashboard-header glass">
            <div class="logo">
                <span class="logo-icon-sm">🎴</span>
                <span>Kartu Nama Digital</span>
            </div>
            <div class="header-actions">
                <a href="edit_profile.php" class="btn-secondary">✏️ Edit Profil</a>
                <a href="logout.php" class="btn-danger">🚪 Logout</a>
            </div>
        </header>
        
        <!-- Welcome Section -->
        <div class="welcome-section glass">
            <div class="welcome-text">
                <h2>Halo, <?= htmlspecialchars($firstName) ?>! 👋</h2>
                <p>Ini adalah Kartu Nama Digital kamu. Simpan dengan baik!</p>
            </div>
            <div class="welcome-badge">
                <span class="status-dot"></span>
                <span>Active Member</span>
            </div>
        </div>

        <!-- Kartu Nama Digital (Glassmorphism Premium) -->
        <div class="namecard-wrapper">
            <div class="namecard" id="namecard">
                <div class="namecard-bg">
                    <div class="bg-gradient"></div>
                    <div class="bg-pattern"></div>
                    <div class="bg-glow"></div>
                </div>
                
                <div class="namecard-content">
                    <div class="namecard-header">
                        <div class="avatar">
                            <span class="avatar-letter"><?= $initial ?></span>
                            <div class="avatar-ring"></div>
                        </div>
                        <div class="card-badge">
                            <span class="badge-dot"></span>
                            STUDENT CARD
                        </div>
                    </div>
                    
                    <div class="namecard-body">
                        <div class="card-info-top">
                            <div class="card-label">Nama Lengkap</div>
                            <h2 class="card-name"><?= htmlspecialchars($user['nama']) ?></h2>
                        </div>
                        
                        <div class="card-info-grid">
                            <div class="info-item">
                                <span class="info-icon">🆔</span>
                                <div class="info-content">
                                    <span class="info-label">NIM</span>
                                    <span class="info-value"><?= htmlspecialchars($user['nim']) ?></span>
                                </div>
                            </div>
                            
                            <div class="info-item">
                                <span class="info-icon">📧</span>
                                <div class="info-content">
                                    <span class="info-label">Email</span>
                                    <span class="info-value"><?= htmlspecialchars($user['email']) ?></span>
                                </div>
                            </div>
                            
                            <div class="info-item">
                                <span class="info-icon">🎓</span>
                                <div class="info-content">
                                    <span class="info-label">Jurusan</span>
                                    <span class="info-value"><?= htmlspecialchars($user['jurusan']) ?></span>
                                </div>
                            </div>
                            
                            <div class="info-item">
                                <span class="info-icon">📅</span>
                                <div class="info-content">
                                    <span class="info-label">Terdaftar</span>
                                    <span class="info-value"><?= date('d M Y', strtotime($user['registered_at'])) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="namecard-footer">
                        <div class="footer-left">
                            <div class="barcode">||| || ||| | |||| |||</div>
                            <span class="footer-text">UNIMED • 2026</span>
                        </div>
                        <div class="footer-right">
                            <div class="chip"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Stats Section -->
        <div class="stats-grid">
            <div class="stat-card glass">
                <div class="stat-icon">🔐</div>
                <div class="stat-content">
                    <div class="stat-value">Secure</div>
                    <div class="stat-label">Password Hashed</div>
                </div>
            </div>
            <div class="stat-card glass">
                <div class="stat-icon">✨</div>
                <div class="stat-content">
                    <div class="stat-value">Verified</div>
                    <div class="stat-label">Email Validated</div>
                </div>
            </div>
            <div class="stat-card glass">
                <div class="stat-icon">🎯</div>
                <div class="stat-content">
                    <div class="stat-value">Active</div>
                    <div class="stat-label">Session Live</div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/script.js"></script>
</body>
</html>