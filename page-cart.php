<?php
/*
Template Name: Cart
*/
get_header(); ?>
<main class="main">
  <section class="cart">
    <div class="container">
      <div class="cart__inner">
        <h1 class="cart__title">Shopping Cart</h1>

        <?php if (WC()->cart->is_empty()): ?>
          <p class="cart__empty">Your cart is currentlyempty.</p>
          <a class="cart__empty-link" href="<?php echo esc_url(home_url("/shop/")); ?>">
            Return to Shop
          </a>

        <?php else: ?>
          <div class="cart__container">
            <div class="cart__box">
              <ul class="cart__box-list d-flex flex-column">
                <?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item): ?>
                  <li class="cart__box-item d-flex"
                    data-cart-key="<?php echo esc_attr($cart_item_key); ?>">

                    <?php echo $cart_item["data"]->get_image("woocommerce_thumbnail", [
                      "width" => 136,
                      "height" => 136,
                      "style" => "width:136px;height:136px;object-fit:cover;",
                    ]); ?>
                    <div class="cart__box-info">
                      <div class="cart__box-brand d-flex">
                        <div class="cart__box-name">
                          <?php echo esc_html($cart_item["data"]->get_name()); ?>
                        </div>
                        <div class="cart__box-integration d-flex">
                          <div class="cart__box-quantity d-flex"
                            data-cart-key="<?php echo esc_attr($cart_item_key); ?>">

                            <button class="cart__box-qty-btn" type="button" data-action="decrease"
                              aria-label="Decrease quantity">-</button>
                            <span class="cart__box-qty-value">
                              <?php echo esc_html($cart_item["quantity"]); ?>
                            </span>
                            <button class="cart__box-qty-btn" type="button" data-action="increase"
                              aria-label="Increase quantity">+</button>
                          </div>
                          <button class="cart__box-remove"
                            type="button"
                            data-cart-key="<?php echo esc_attr($cart_item_key); ?>">
                            <svg width="11" height="12">
                              <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#remove"></use>
                            </svg>
                          </button>
                        </div>
                      </div>
                      <?php
                      $colours = $cart_item["data"]->get_attribute("Colours");
                      $material = $cart_item["data"]->get_attribute("Material");
                      ?>
                      <?php if ($colours): ?>
                        <p class="cart__box-spect">
                          <?php echo esc_html($colours); ?>
                        </p>
                      <?php endif; ?>

                      <?php if ($material): ?>
                        <p class="cart__box-spect">
                          <?php echo esc_html($material); ?>
                        </p>
                      <?php endif; ?>
                      <span class="cart__box-price">
                        <?php echo WC()->cart->get_product_price($cart_item["data"]); ?>
                      </span>
                    </div>
                  </li>

                <?php endforeach; ?>
              </ul>
              <div class="cart__box-action d-flex flex-column">

                <div class="cart__coupon d-flex">
                  <input class="cart__coupon-input" id="coupon_code" type="text" placeholder="Coupon Code">
                  <button class="cart__coupon-btn" type="button">apply coupon</button>
                </div>
              </div>
            </div>
            <div class="cart__content">
              <h2 class="cart__content-title">Cart Totals</h2>
              <div class="cart__total-row d-flex justify-between">
                <span class="cart__total-label">subtotal</span>
                <span class="cart__total-value">
                  <?php echo WC()->cart->get_cart_subtotal(); ?>
                </span>
              </div>
              <?php foreach (WC()->cart->get_coupons() as $code => $coupon): ?>
                <div class="cart__total-row d-flex justify-between">
                  <span class="cart__total-label">
                    Coupon: <?php echo esc_html($code); ?>
                  </span>

                  <span class="cart__total-value">
                    -<?php echo wc_price(WC()->cart->get_coupon_discount_amount($code)); ?>
                  </span>
                </div>
              <?php endforeach; ?>
              <div class="cart__total-row d-flex justify-between">
                <span class="cart__total-label">shipping</span>
                <span class="cart__total-value cart__total-span">
                  <?php echo esc_html__("Free shipping", "jewerly-theme"); ?>
                </span>
              </div>

              <div class="cart__summa d-flex flex-column">
                <div class="cart__summa-wrapper d-flex justify-between">
                  <span class="cart__summa-total">total</span>
                  <span class="cart__summa-price">
                    <?php echo WC()->cart->get_total(); ?>
                  </span>
                </div>
                <button class="cart__summa-btn"
                  type="button"
                  onclick="window.location.href='<?php echo esc_url(wc_get_checkout_url()); ?>'">
                  proceed to checkout
                </button>
              </div>
            </div>
          </div>

        <?php endif; ?>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
