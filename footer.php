<footer class="footer">
  <div class="container">
    <div class="footer__top is-loading justify-between">
      <ul class="footer__top-list d-flex">
        <li class="footer__top-item">
          <a class="footer__top-link" 
          href="<?php echo esc_url(home_url("/contact/")); ?>">
          contact
        </a>
        </li>
        <li class="footer__top-item">
          <a class="footer__top-link" 
          href="<?php echo esc_url(home_url("/profile/")); ?>">
          terms of services
        </a>
        </li>
        <li class="footer__top-item">
          <a class="footer__top-link" 
          href="<?php echo esc_url(home_url("/profile/")); ?>"
          >
          shipping and returns
        </a>
        </li>
      </ul>
      <div class="footer__subscribe is-loading justify-between">
 
 <?php echo do_shortcode('[contact-form-7 id="b86ce9d" title="Без названия"]'); ?>
      </div>
    </div>
    <div class="footer__bottom is-loading justify-between">
      <p class="footer__bottom-text">
        <span class="footer__bottom-dark">
          © <?php echo date("Y"); ?> SHOPE.</span> Terms of use <span
          class="footer__bottom-dark">and</span>
          <a href="<?php echo esc_url(home_url("/privacy/")); ?>">
          privacy policy.</a></p>
      <div class="footer__social d-flex">
        <a class="footer__social-link" href="#"
        aria-label="LinkedIn">
          <svg width="19" height="19" aria-hidden="true">
            <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#link-footer"></use>
          </svg>
        </a>
        <a class="footer__social-link" 
        href="#" aria-label="Facebook">
          <svg width="19" height="19" aria-hidden="true">
            <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#face-footer"></use>
          </svg>
        </a>
        <a class="footer__social-link" 
        href="#" aria-label="Instagram">
          <svg width="19" height="19" aria-hidden="true">
            <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#insta-footer"></use>
          </svg>
        </a>
        <a class="footer__social-link"
         href="#" aria-label="Twitter">
          <svg width="19" height="19" aria-hidden="true">
            <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#twit-footer"></use>
          </svg>
        </a>
      </div>
    </div>
  </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>