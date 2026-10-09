document.addEventListener('DOMContentLoaded', () => {
    // Auto-generate slug from title if slug input is empty or touched
    const titleInput = document.getElementById('title');
    const slugInput = document.getElementById('slug');

    if (titleInput && slugInput) {
        let userManuallyEditedSlug = slugInput.value.length > 0;

        slugInput.addEventListener('input', () => {
            userManuallyEditedSlug = true;
        });

        titleInput.addEventListener('input', (e) => {
            if (!userManuallyEditedSlug) {
                slugInput.value = e.target.value
                    .toLowerCase()
                    .trim()
                    .replace(/[^\w\s-]/g, '')
                    .replace(/[\s_-]+/g, '-')
                    .replace(/^-+|-+$/g, '');
            }
        });
    }

    // Secure delete confirmation modals
    const deleteForms = document.querySelectorAll('.delete-confirm-form');
    deleteForms.forEach((form) => {
        form.addEventListener('submit', (e) => {
            const confirmed = window.confirm('Are you sure you want to permanently delete this item? This action cannot be reversed.');
            if (!confirmed) {
                e.preventDefault();
            }
        });
    });

    // Alert auto dismissal
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
});
