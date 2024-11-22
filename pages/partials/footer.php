</main>
<footer class="footer text-center p-3 bg-light">
    <div class="container">
        <!-- Main Footer Content -->
        <div class="row">
            <div class="col-md-4">
                <h5>About Us</h5>
                <p>We provide online teaching resources for aspiring tech professionals.</p>
            </div>
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href=<?=BASE_URL."index.php"?>>Home</a></li>
                    <li><a href=<?=BASE_URL." pages/dashboard.php"?>>Dashboard</a></li>
                    <li><a href=<?=BASE_URL."#"?>>Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Contact</h5>
                <p>Email: support@online-teaching.com</p>
                <p>Phone: +123 456 7890</p>
                <div>
                    <a href="#"><i class="fab fa-facebook fa-lg mx-2"></i></a>
                    <a href="#"><i class="fab fa-twitter fa-lg mx-2"></i></a>
                    <a href="#"><i class="fab fa-linkedin fa-lg mx-2"></i></a>
                </div>
            </div>
        </div>
        <!-- Copyright Section -->
        <p class="copyright">&copy; 2024 Online Teaching Platform. All rights reserved.</p>
    </div>
</footer>

<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/5bd0d5f620.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js"></script>
<script src="<?= BASE_URL; ?>js/main.js"></script>

<script>
tinymce.init({
    selector: '#description'
});
</script>
</body>

</html>