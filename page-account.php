<?php
/*
Template Name: Account
*/
get_header(); ?>


<main class="main">
  <section class="account">
    <div class="container">
      <?php if (is_user_logged_in()): ?>
        <?php echo do_shortcode("[woocommerce_my_account]"); ?>
      <?php else: ?>

        <?php if (is_wc_endpoint_url("lost-password")): ?>

          <?php echo do_shortcode("[woocommerce_my_account]"); ?>

        <?php else: ?>


          <div class="account__inner">
            <h1 class="account__title">My account</h1>
            <div class="account__tabs">
              <button class="account__tab account__tab--active" type="button" data-tab="signin">Sign in</button>
              <button class="account__tab" type="button" data-tab="register">Register</button>
            </div>
            <?php wc_print_notices(); ?>

            <?php if (isset($_GET["password-reset"]) && $_GET["password-reset"] === "true"): ?>
              <p class="account__success">Your password has been successfully reset. You can nowsign in.</p>
            <?php endif; ?>

            <form class="account-form account-form--signin account-form--active"
              id="signin-form"
              method="post"
              action="<?php echo esc_url(wc_get_page_permalink("myaccount")); ?>">
              <div class="account-form__block">
                <input class="account-form__input" type="text" name="username" placeholder="Email" required
                  autocomplete="email">
              </div>
              <div class="account-form__block">
                <input class="account-form__input" type="password" name="password" placeholder="Password" required
                  autocomplete="current-password">
              </div>
              <div class="account-form__block account-form__block--checkbox">
                <label class="account-form__label-checkbox" for="">
                  <input class="account-form__checkbox"
                    type="checkbox"
                    name="remember"
                    value="forever">
                  <span class="account-form__checkbox-custom"></span>
                  Remember me
                </label>
              </div>
              <?php wp_nonce_field("woocommerce-login", "woocommerce-login-nonce"); ?>

              <button class="account-form__btn"
                type="submit"
                name="login"
                value="Log in">
                sign in
              </button>
              <a class="account-form__link" href="<?php echo esc_url(
                home_url("/resetpassword/"),
              ); ?>">Have you forgotten your password?</a>
            </form>
            <form class="account-form account-form--register"
              id="register-form"
              method="post"
              action="<?php echo esc_url(wc_get_page_permalink("myaccount")); ?>">
              <div class="account-form__block">
                <input class="account-form__input" type="email" name="email" placeholder="Email" required
                  autocomplete="email">
              </div>
              <div class="account-form__block">
                <input class="account-form__input"
                  type="password"
                  name="password"
                  placeholder="Password" required
                  autocomplete="new-password">
              </div>
              <?php wp_nonce_field("woocommerce-register", "woocommerce-register-nonce"); ?>
              <button class="account-form__btn"
                type="submit"
                name="register"
                value="Register">
                register
              </button>
            </form>
          </div>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
