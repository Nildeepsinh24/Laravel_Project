// Alpine.js for interactive components (optional but recommended)
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// Smooth animations on page load
document.addEventListener('DOMContentLoaded', () => {
    // Initialize tooltip if Bootstrap is available
    if (typeof bootstrap !== 'undefined') {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    }

    // Add animation classes to animated elements
    const animatedElements = document.querySelectorAll('[class*="animate-"]');
    animatedElements.forEach(el => {
        el.style.opacity = '0';
        setTimeout(() => {
            el.style.animation = `${el.className.match(/animate-\w+/)?.[0]} 0.6s ease-out forwards`;
        }, 50);
    });
});

// Handle sidebar toggle
window.toggleSidebar = function() {
    const sidebar = document.querySelector('.sidebar');
    if (sidebar) {
        sidebar.classList.toggle('show');
    }
};

// Add active state to current navigation item
document.querySelectorAll('.nav-link').forEach(link => {
    if (link.href === window.location.href) {
        link.classList.add('active');
    }
});

// Prevent console errors in production
if (process.env.NODE_ENV === 'production') {
    console.log = () => {};
    console.warn = () => {};
}
