import renderLoginPage from './pages/login.js';
import renderRegisterPage from './pages/register.js';

function getCurrentPage() {
    const path = window.location.pathname;
    return path.substring(path.lastIndexOf('/') + 1);
}

document.addEventListener('DOMContentLoaded', () => {
    const page = getCurrentPage();

    if (page === 'login.html' || page === '') {
        renderLoginPage();
    } else if (page === 'register.html') {
        renderRegisterPage();
    }
});