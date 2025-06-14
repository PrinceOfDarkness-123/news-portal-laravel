document.addEventListener('DOMContentLoaded', function() {
    const toggle = document.getElementById('togglePassword');
    const input = document.getElementById('passwordInput');
    const icon = document.getElementById('eyeIcon');
    toggle.addEventListener('click', function() {
       if (input.type === "password") {
        input.type = 'text';
        icon.className = 'bi bi-eye-slash-fill';
       } else {
           input.type = 'password';
           icon.className = 'bi bi-eye-fill';
       }
    });
})

