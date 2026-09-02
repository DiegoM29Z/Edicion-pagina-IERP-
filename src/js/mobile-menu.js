document.addEventListener('DOMContentLoaded', function () {
    const toggles = document.querySelectorAll('.mobile-toggle');

    toggles.forEach(button => {
        button.addEventListener('click', function () {
            const target = this.parentNode.nextElementSibling;
            if (target) {
                // Toggle visual states
                this.classList.toggle('text-brand-primary');
                this.classList.toggle('rotate-180');
                target.classList.toggle('hidden');

                // Toggle ARIA attribute for accessibility
                const isExpanded = this.getAttribute('aria-expanded') === 'true';
                this.setAttribute('aria-expanded', !isExpanded);
            }
        });
    });
});
