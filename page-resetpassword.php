<?php
/*
Template Name: Resetpassword
*/
get_header();
?>
<main class="main">
  <section class="resetpassword">
    <div class="container">
      <div class="resetpassword__inner">
        <h1 class="resetpassword__title">Have you Forgotten Your Password ?</h1>
        <div class="resetpassword__subtitle">
          <?php if (isset($_GET['reset-link-sent']) && $_GET['reset-link-sent'] === 'true') : ?>
            If an account exists for this email, you willreceive apasswordreset link.
          <?php else : ?>
            If you've forgotten your password, enter your e-mail address and we'll send
            you an e-mail
          <?php endif; ?>
        </div>
        <form class="resetpassword__form"
          method="post"
          action="<?php echo esc_url(wc_get_endpoint_url('lost-password', '', wc_get_page_permalink('myaccount'))); ?>">
          <div class="resetpassword__row d-flex flex-column">
            <input class="resetpassword__input" type="email" name="user_login" placeholder="Email" required
              autocomplete="email">
          </div>
          <?php wp_nonce_field('lost_password', 'woocommerce-lost-password-nonce'); ?>
          <input type="hidden" name="wc_reset_password" value="true">
          <button class="resetpassword__btn" type="submit">reset password</button>
        </form>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>