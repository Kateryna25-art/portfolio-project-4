<aside class="shopping-bag">
  <div class="shopping-bag__header">
    <div class="shopping-bag__wrapper">
      <div class="shopping-bag__title">Shopping Bag</div>
      <button class="shopping-bag__close" type="button" aria-label="Close shopping bag">
        <svg width="18" height="18">
          <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#remove"></use>
        </svg>
      </button>
    </div>
    <span class="shopping-bag__sub">
      <?php echo WC()->cart->get_cart_contents_count(); ?> items</span>
  </div>
  <ul class="shopping-bag__list">
    <?php if (WC()->cart && !WC()->cart->is_empty()) : ?>
      <?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) :
        $product = $cart_item['data'];
        $quantity = $cart_item['quantity'];
        if (!$product || !$product->exists()) {
          continue;
        }
      ?>
        <li
          class="shopping-bag__item"
          data-cart-key="<?php echo esc_attr($cart_item_key); ?>">
          <?php echo $product->get_image('woocommerce_thumbnail'); ?>
          <div class="shopping-bag__info">
            <div class="shopping-bag__brand">
              <div class="shopping-bag__name">
                <?php echo esc_html($product->get_name()); ?>
              </div>
              <button
                class="shopping-bag__remove"
                type="button"
                data-cart-key="<?php echo esc_attr($cart_item_key); ?>">
                <svg width="6" height="6">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#remove"></use>
                </svg>
              </button>
            </div>
            <span class="shopping-bag__price">
              <?php echo $product->get_price_html(); ?>
            </span>
            <div class="shopping-bag__quantity">
              <span class="shopping-bag__qty">QTY:</span>
              <button
                class="shopping-bag__qty-btn"
                type="button"
                data-action="decrease">-</button>
              <span class="shopping-bag__qty-value"><?php echo esc_html($quantity); ?></span>
              <button
                class="shopping-bag__qty-btn"
                type="button"
                data-action="increase">+</button>
            </div>
          </div>
        </li>
      <?php endforeach; ?>
    <?php endif; ?>
  </ul>
  <div class="shopping-bag__footer">
    <div class="shopping-bag__total">
      <span class="shopping-bag__total-label">
        Subtotal (<?php echo WC()->cart->get_cart_contents_count(); ?> items)</span>
      <span class="shopping-bag__total-value">
        <?php echo WC()->cart->get_cart_subtotal(); ?></span>
    </div>
    <a
      class="shopping-bag__checkout"
      href="<?php echo esc_url(wc_get_cart_url()); ?>">
      view cart
    </a>
  </div>
</aside>