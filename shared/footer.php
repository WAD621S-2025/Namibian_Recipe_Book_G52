<footer class="main-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-brand">
                <h3>Namibian Recipe Book</h3>
                <p>Preserving traditional Namibian cuisine for future generations</p>
            </div>
            <div class="footer-links">
                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <a href="?page=home">Home</a>
                    <a href="?page=all-recipes">All Recipes</a>
                    <a href="?page=add-recipe">Add Recipe</a>
                </div>
                <div class="footer-section">
                    <h4>Connect</h4>
                    <a href="#">Facebook</a>
                    <a href="#">Instagram</a>
                    <a href="#">Twitter</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© <?= date("Y") ?> Namibian Recipe Book | All Rights Reserved</p>
        </div>
    </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.carousel-inner');
    const prevBtn = document.querySelector('.prev');
    const nextBtn = document.querySelector('.next');

    if (carousel && prevBtn && nextBtn) {
        prevBtn.addEventListener('click', () => {
            carousel.scrollBy({ left: -220, behavior: 'smooth' });
        });

        nextBtn.addEventListener('click', () => {
            carousel.scrollBy({ left: 220, behavior: 'smooth' });
        });
    }
});
</script>

</html>
