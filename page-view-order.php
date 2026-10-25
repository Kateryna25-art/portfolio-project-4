<?php
/*
Template Name: View-Order
*/
get_header();

$order_id = absint(get_query_var('view-order'));
if (is_wc_endpoint_url('order-received')) {
  $order_id = absint(get_query_var('order-received'));
}

$order = wc_get_order($order_id);
?>
<main class="main">
  <section class="view-order">
    <div class="container">
      <h1 class="visually-hidden">Order Details</h1>
      <div class="view-order__notice view-order__notice--hidden">
        <div class="view-order__notice-inner is-loading">
          <svg width="11" height="12">
            <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#order-check"></use>
          </svg>
          <span class="view-order__notice-text">We’ve received your order</span>
        </div>
      </div>
      <div class="view-order__inner">0
        <div class="view-order__column">
          <h2 class="view-order__title">Order Details</h2>
          <dl class="view-order__info">
            <div class="view-order__item d-flex flex-column">
              <dt class="view-order__text">order number</dt>
              <dd class="view-order__order">1879605573994</dd>
            </div>
            <div class="view-order__item d-flex flex-column">
              <dt class="view-order__text">email</dt>
              <dd class="view-order__order">Vitathemes@gmail.com</dd>
            </div>
            <div class="view-order__item d-flex flex-column">
              <dt class="view-order__text">payment method</dt>
              <dd class="view-order__order">Mastercard*************7865</dd>
            </div>
            <div class="view-order__item d-flex flex-column">
              <dt class="view-order__text">order date</dt>
              <dd class="view-order__order">October 8,2020</dd>
            </div>
          </dl>
        </div>
        <div class="view-order__column">
          <dl class="view-order__info">
            <div class="view-order__item d-flex">
              <dt class="view-order__text">delivery options</dt>
              <dd class="view-order__order">Standard delivery</dd>
            </div>
            <div class="view-order__item d-flex">
              <dt class="view-order__text">delivery address</dt>
              <dd class="view-order__order">
                <address class="view-order__address">
                  Kristian holst 34<br>
                  old street W1F<br>
                  7NU london <br>
                  United Kingdom
                </address>
              </dd>
            </div>
            <div class="view-order__item d-flex">
              <dt class="view-order__text">contact number</dt>
              <dd class="view-order__order">+44 8749790988</dd>
            </div>
          </dl>
        </div>
        <div class="view-order__column view-order__column-block">
          <h2 class="view-order__title">Order Summary</h2>
          <div class="view-order__wrapper">
            <table class="view-order__table">
              <thead>
                <tr class="view-order__table-row">
                  <th class="view-order__table-title">product</th>
                  <th class="view-order__table-title">total</th>
                </tr>
              </thead>
              <tbody class="view-order__table-body">
                <tr>
                  <td class="view-order__order">Lira Earrings</td>
                  <td class="view-order__order">$64</td>
                </tr>
                <tr>
                  <td class="view-order__order">Ollie Earrings</td>
                  <td class="view-order__order">$10</td>
                </tr>
                <tr>
                  <td class="view-order__order">Kaede Hair Pin</td>
                  <td class="view-order__order">$10</td>
                </tr>
              </tbody>
              <tfoot>
                <tr class="view-order__table-row">
                  <td class="view-order__text">subtotal</td>
                  <td class="view-order__order">$85</td>
                </tr>
                <tr class="view-order__table-row">
                  <td class="view-order__text">shipping</td>
                  <td class="view-order__order">Free shipping</td>
                </tr>
                <tr class="view-order__table-row">
                  <td class="view-order__name">total</td>
                  <td class="view-order__name">$85</td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>