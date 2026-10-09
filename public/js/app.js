document.addEventListener('DOMContentLoaded', () => {
    // Mobile navigation toggle
    const mobileToggle = document.querySelector('.mobile-toggle');
    const navLinks = document.querySelector('.nav-links');

    if (mobileToggle && navLinks) {
        mobileToggle.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            const isExpanded = navLinks.classList.contains('active');
            mobileToggle.setAttribute('aria-expanded', isExpanded.toString());
        });
    }

    // Flash alert dismissal
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach((alert) => {
        const closeBtn = alert.querySelector('.alert-close');
        if (closeBtn) {
            closeBtn.addEventListener('click', () => {
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 200);
            });
        }
    });

    // Client-side quick filter for services (if present)
    const serviceSearchInput = document.getElementById('service-search');
    if (serviceSearchInput) {
        serviceSearchInput.addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase().trim();
            const serviceCards = document.querySelectorAll('.service-filterable-item');

            serviceCards.forEach((card) => {
                const text = card.textContent.toLowerCase();
                if (text.includes(query)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    }
});
