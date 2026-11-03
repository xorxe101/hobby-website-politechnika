// Example JS requirement: dark mode toggle
const toggleBtn = document.getElementById('theme-toggle');

if (toggleBtn) {
    toggleBtn.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
    });
}

document.addEventListener('DOMContentLoaded', () => {
    // --- 1. Persistent Theme Toggle ---
    const themeBtn = document.getElementById('theme-toggle');
    const rootElement = document.documentElement;

    // Set button label based on current active theme
    const updateButtonLabel = () => {
        if (themeBtn) {
            const isDark = rootElement.classList.contains('dark-theme');
            themeBtn.textContent = isDark ? 'Light Mode' : 'Dark Mode';
        }
    };

    // Sync button text on page load
    updateButtonLabel();

    if (themeBtn) {
        themeBtn.addEventListener('click', () => {
            rootElement.classList.toggle('dark-theme');
            
            // Save current choice to localStorage
            const isDark = rootElement.classList.contains('dark-theme');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');

            updateButtonLabel();
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

    // --- 3. Mandatory Cookie Consent Modal ---
    const cookieOverlay = document.getElementById('cookie-overlay');
    const acceptBtn = document.getElementById('accept-cookies');
    const declineBtn = document.getElementById('decline-cookies');

    // If no choice was made, display overlay and lock scroll
    if (cookieOverlay && !localStorage.getItem('cookie_consent')) {
        cookieOverlay.style.display = 'flex';
        document.body.classList.add('cookie-locked');
    }

    const closeCookieModal = () => {
        cookieOverlay.style.display = 'none';
        document.body.classList.remove('cookie-locked');
    };

    if (acceptBtn) {
        acceptBtn.addEventListener('click', () => {
            localStorage.setItem('cookie_consent', 'accepted');
            document.cookie = "cookie_consent=accepted; max-age=" + (86400 * 365) + "; path=/";
            closeCookieModal();
        });
    }

    if (declineBtn) {
        declineBtn.addEventListener('click', () => {
            localStorage.setItem('cookie_consent', 'declined');
            document.cookie = "cookie_consent=declined; max-age=" + (86400 * 365) + "; path=/";
            document.cookie = "visitor_name=; max-age=0; path=/";
            closeCookieModal();
        });
    }
});