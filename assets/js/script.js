// ===== 3D Tilt Effect untuk Namecard =====
const namecard = document.getElementById('namecard');

if (namecard) {
    namecard.addEventListener('mousemove', (e) => {
        const rect = namecard.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        
        const centerX = rect.width / 2;
        const centerY = rect.height / 2;
        
        const rotateX = ((y - centerY) / centerY) * -10;
        const rotateY = ((x - centerX) / centerX) * 10;
        
        namecard.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-10px)`;
    });
    
    namecard.addEventListener('mouseleave', () => {
        namecard.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateY(0)';
    });
}

// ===== Smooth Form Input Animation =====
const inputs = document.querySelectorAll('input[type="text"], input[type="email"], input[type="password"]');

inputs.forEach(input => {
    input.addEventListener('focus', function() {
        this.parentElement.style.transform = 'scale(1.02)';
        this.parentElement.style.transition = 'transform 0.3s ease';
    });
    
    input.addEventListener('blur', function() {
        this.parentElement.style.transform = 'scale(1)';
    });
});

// ===== Auto-hide alerts after 5 seconds =====
const alerts = document.querySelectorAll('.alert');
alerts.forEach(alert => {
    setTimeout(() => {
        alert.style.opacity = '0';
        alert.style.transform = 'translateY(-10px)';
        alert.style.transition = 'all 0.3s ease';
        setTimeout(() => alert.remove(), 300);
    }, 5000);
});

// ===== Console Easter Egg =====
console.log('%c🎴 Kartu Nama Digital', 'font-size: 20px; font-weight: bold; color: #667eea;');
console.log('%cDibuat dengan ❤️ menggunakan PHP Native + Glassmorphism CSS', 'font-size: 12px; color: #764ba2;');