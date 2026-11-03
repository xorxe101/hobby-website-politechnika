// Example JS requirement: dark mode toggle
const toggleBtn = document.getElementById('theme-toggle');

if (toggleBtn) {
    toggleBtn.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
    });
}

document.addEventListener('DOMContentLoaded', () => {
    // 1. Dark/Light Mode Toggle
    const themeBtn = document.getElementById('theme-toggle');
    if (themeBtn) {
        themeBtn.addEventListener('click', () => {
            document.body.classList.toggle('dark-theme');
        });
    }

    // 2. Client-side Form Validation
    const form = document.getElementById('contact-form');
    if (form) {
        form.addEventListener('submit', (event) => {
            let isValid = true;

            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');
            const messageInput = document.getElementById('message');

            const nameError = document.getElementById('name-error');
            const emailError = document.getElementById('email-error');
            const messageError = document.getElementById('message-error');

            // Reset errors
            nameError.textContent = '';
            emailError.textContent = '';
            messageError.textContent = '';

            // Name check
            if (nameInput.value.trim() === '') {
                nameError.textContent = 'Name cannot be blank.';
                isValid = false;
            }

            // Email check (Regex)
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailInput.value.trim())) {
                emailError.textContent = 'Please enter a valid email format.';
                isValid = false;
            }

            // Message check
            if (messageInput.value.trim().length < 10) {
                messageError.textContent = 'Message must be at least 10 characters.';
                isValid = false;
            }

            // Stop PHP submission if JS checks fail
            if (!isValid) {
                event.preventDefault();
            }
        });
    }
});