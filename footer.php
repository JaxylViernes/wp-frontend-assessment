<footer id="contact" class="bg-dark text-white-50 py-4">
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
        <p class="mb-0 small">
            &copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.
        </p>
        <ul class="list-inline mb-0">
            <li class="list-inline-item">
                <a class="text-white-50" href="#" aria-label="Facebook"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
            </li>
            <li class="list-inline-item">
                <a class="text-white-50" href="#" aria-label="Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
            </li>
            <li class="list-inline-item">
                <a class="text-white-50" href="#" aria-label="Email us"><i class="fa-solid fa-envelope" aria-hidden="true"></i></a>
            </li>
        </ul>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
