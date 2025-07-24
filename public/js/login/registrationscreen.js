//For Confirm Password field in Login and Sign Up Screen
document.addEventListener('DOMContentLoaded', function() {
    const toggle = document.getElementById('togglePasswordForConfirm');
    const input = document.getElementById('passwordInputForConfirm');
    const icon = document.getElementById('eyeIconForConfirm');
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
function dismissAlert() {
    const alertBox = document.getElementById('infoAlert');
    if (alertBox) {
        alertBox.style.display = 'none';

        // Optional: scroll to top smoothly
        window.scrollTo({ top: 0, behavior: 'smooth' });

        // Optional: reset scroll if form/container shifted
        const formContainer = document.querySelector('.container-size');
        if (formContainer) {
            formContainer.scrollTop = 0;
        }
    }
}