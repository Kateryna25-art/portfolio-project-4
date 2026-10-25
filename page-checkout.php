<?php
/*
Template Name: Checkout
*/
get_header();

if (is_wc_endpoint_url("order-received")) {
  echo do_shortcode("[woocommerce_checkout]");
  get_footer();
  return;
}
$checkout = WC()->checkout();
?>

<main class="main">
  <section class="checkout">
    <div class="container">
      <h1 class="checkout__title">Checkout</h1>
      <div class="checkout__inner">
        <div class="checkout__top">
          <p class="checkout__notice">Returning customer?
            <a class="checkout__notice-link showlogin" href="#">Click here to login</a>
          </p>
          <p class="checkout__notice">Have a coupon?
            <a class="checkout__notice-link showcoupon" href="#">Click here to enter your code</a>
          </p>
          <div class="checkout-coupon__wrapper">
            <p class="checkout-coupon__text">If you have a coupon code, please apply it below.</p>
            <form class="checkout-coupon__form d-flex justify-between" action="#" method="post">
              <input class="checkout-coupon__input" type="text" name="coupon_code" placeholder="Coupon Code"
                id="coupon_code">
              <button class="checkout-coupon__btn">apply coupon</button>
            </form>
          </div>
        </div>
        <form name="checkout"
          method="post"
          class="woocommerce-checkout checkout"
          action="<?php echo esc_url(wc_get_checkout_url()); ?>"
          enctype="multipart/form-data">
          <div class="checkout__column d-flex justify-between">
            <div class="checkout__billing">
              <h2 class="checkout__billing-title">Billing Details</h2>
              <div class="checkout__billing-row d-flex">
                <label class="checkout__billing-label" for="billing_first_name">
                  <input class="checkout__billing-input" type="text" name="billing_first_name" id="billing_first_name"
                    placeholder="First name *" required>
                </label>
                <label class="checkout__billing-label" for="billing_last_name">
                  <input class="checkout__billing-input" type="text" name="billing_last_name" id="billing_last_name"
                    placeholder="last name *" required>
                </label>
              </div>
              <div class="checkout__billing-content">
                <label class="checkout__billing-label" for="billing_company">
                  <input class="checkout__billing-input" type="text" name="billing_company" id="billing_company"
                    placeholder="Company Name">
                </label>
              </div>
              <div class="checkout__billing-content">
                <label class="visually-hidden" for="billing_country">Country *</label>
                <select class="checkout__billing-select" name="billing_country" id="billing_country" required>
                  <option disabled selected>Country *</option>
                  <option value="RO">Romania</option>
                  <option value="UA">Ukraine</option>
                </select>
              </div>
              <div class="checkout__billing-content">
                <label class="checkout__billing-label" for="billing_address_1">
                  <input class="checkout__billing-input" type="text" name="billing_address_1" id="billing_address_1"
                    placeholder="Street Address *" required>
                </label>
              </div>
              <div class="checkout__billing-content">
                <label class="checkout__billing-label" for="billing_postcode">
                  <input class="checkout__billing-input" type="text" name="billing_postcode" id="billing_postcode"
                    placeholder="Postcode / ZIP *" required>
                </label>
              </div>
              <div class="checkout__billing-content">
                <label class="checkout__billing-label" for="billing_state">
                  <input class="checkout__billing-input" type="text" name="billing_state" id="billing_state"
                    placeholder="Country / Region *" required>
                </label>
              </div>
              <div class="checkout__billing-content">
                <label class="checkout__billing-label" for="billing_city">
                  <input class="checkout__billing-input" type="text" name="billing_city" id="billing_city"
                    placeholder="Town / City *" required>
                </label>
              </div>
              <div class="checkout__billing-content">
                <label class="checkout__billing-label" for="billing_phone">
                  <input class="checkout__billing-input" type="tel" name="billing_phone" id="billing_phone"
                    placeholder="Phone *" required>
                </label>
              </div>
              <div class="checkout__billing-content">
                <label class="checkout__billing-label" for="billing_email">
                  <input class="checkout__billing-input" type="email" name="billing_email" id="billing_email"
                    placeholder="Email *" required>
                </label>
              </div>
              <div class="checkout__billing-content checkout__billing-content--checkbox">
                <label class="checkout__checkbox-label" for="createaccount">
                  <input class="checkout__checkbox-input" type="checkbox" name="createaccount" id="createaccount"
                    value="1">
                  <span class="checkout__checkbox-text">Create an account?</span>
                </label>
              </div>
              <div class="checkout__billing-content checkout__billing-content--checkbox">
                <label class="checkout__checkbox-label" for="ship-to-different-address-checkbox">
                  <input class="checkout__checkbox-input" type="checkbox" name="ship_to_different_address"
                    id="ship-to-different-address-checkbox" value="1">
                  <span class="checkout__checkbox-text">Ship to a different address?</span>
                </label>
              </div>
              <div class="checkout__billing-content">
                <label class="checkout__billing-label" for="order_comments">
                  <textarea class="checkout__billing-textarea"
                    type="text"
                    name="order_comments"
                    id="order_comments"
                    placeholder="Order notes"></textarea>
                </label>
              </div>
            </div>
            <div class="checkout__order">
              <h2 class="checkout__order-title">Your Order</h2>
              <div class="checkout__order-rewiew">
                <div class="checkout__order-table">
                  <div class="checkout__order-header d-flex justify-between">
                    <span class="checkout__order-th">product</span>
                    <span class="checkout__order-th">total</span>
                  </div>
                  <?php foreach (WC()->cart->get_cart() as $cart_item): ?>
                    <div class="checkout__order-item d-flex justify-between">
                      <span class="checkout__order-name">
                        <?php echo esc_html($cart_item["data"]->get_name()); ?>
                        * <?php echo esc_html($cart_item["quantity"]); ?>
                      </span>

                      <span class="checkout__order-price">
                        <?php echo WC()->cart->get_product_subtotal($cart_item["data"], $cart_item["quantity"]); ?>
                      </span>
                    </div>
                  <?php endforeach; ?>
                  <div class="checkout__order-item d-flex justify-between">
                    <span class="checkout__order-label">subtotal</span>
                    <span class="checkout__order-price">
                      <?php wc_cart_totals_subtotal_html(); ?>
                    </span>
                  </div>
                  <div class="checkout__order-item d-flex justify-between">
                    <span class="checkout__order-label">shipping</span>
                    <span class="checkout__order-price">Free shipping</span>
                  </div>
                  <div class="checkout__order-item d-flex justify-between">
                    <span class="checkout__order-value">total</span>
                    <span class="checkout__order-value">
                      <?php wc_cart_totals_order_total_html(); ?>
                    </span>
                  </div>
                </div>
                <div class="checkout__payment">
                  <div class="checkout__payment-methods">
                    <div class="checkout__payment-item">
                      <label class="checkout__payment-label">
                        <input class="checkout__payment-input" type="radio" name="payment_method" value="bacs">
                        <span class="checkout__payment-text">Direct bank transfer</span>
                      </label>
                      <div class="checkout__payment-box">
                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment
                          reference. Your order will not be shipped until the funds have cleared in our account</p>
                      </div>
                    </div>
                    <div class="checkout__payment-item">
                      <label class="checkout__payment-label">
                        <input class="checkout__payment-input" type="radio" name="payment_method" value="cheque">
                        <span class="checkout__payment-text">Check payments</span>
                      </label>
                    </div>
                    <div class="checkout__payment-item">
                      <label class="checkout__payment-label">
                        <input class="checkout__payment-input" type="radio" name="payment_method" value="cod" checked>
                        <span class="checkout__payment-text">Cash on delivery</span>
                      </label>
                    </div>
                    <div class="checkout__payment-item checkout__payment-item--paypall is-loading">
                      <label class="checkout__payment-label">
                        <input class="checkout__payment-input" type="radio" name="payment_method" value="paypal">
                        <span class="checkout__payment-text">PayPal</span>
                      </label>
                      <svg width="13" height="16">
                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#paypal"></use>
                      </svg>
                    </div>
                  </div>
                  <button class="checkout__submit-btn"
                    type="submit"
                    name="woocommerce_checkout_place_order"
                    value="1">place order</button>
                  <?php wp_nonce_field("woocommerce-process_checkout", "woocommerce-process-checkout-nonce"); ?>
                </div>
              </div>
            </div>
        </form>
      </div>
    </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
