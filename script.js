document.addEventListener("DOMContentLoaded", function() {
    const cards = document.querySelectorAll('.category-card');

    cards.forEach(card => {
        card.addEventListener('click', function() {
            const pairValue = this.getAttribute('data-pair');

            // Remove the active class from all cards
            cards.forEach(c => c.classList.remove('active'));

            // Add the active class to all cards with the same data-pair
            document.querySelectorAll(`.category-card[data-pair="${pairValue}"]`).forEach(c => {
                c.classList.add('active');
            });
        });
    });
});
