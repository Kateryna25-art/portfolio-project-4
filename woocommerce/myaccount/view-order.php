
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
      <div class="view-order__inner">
        <div class="view-order__column">
          <h2 class="view-order__title">Order Details</h2>
          <dl class="view-order__info">
            <div class="view-order__item d-flex flex-column">
              <dt class="view-order__text">order number</dt>
              <dd class="view-order__order"><?php echo esc_html(
                  $order->get_order_number(),
              ); ?></dd>
            </div>
            <div class="view-order__item d-flex flex-column">
              <dt class="view-order__text">email</dt>
              <dd class="view-order__order"><?php echo esc_html(
                  $order->get_billing_email(),
              ); ?>
            </dd>
            </div>
            <div class="view-order__item d-flex flex-column">
              <dt class="view-order__text">payment method</dt>
              <dd class="view-order__order"><?php echo esc_html(
                  $order->get_payment_method_title(),
              ); ?></dd>
            </div>
            <div class="view-order__item d-flex flex-column">
              <dt class="view-order__text">order date</dt>
              <dd class="view-order__order"><?php echo esc_html(
                  $order->get_date_created()->date("F j, Y"),
              ); ?>
            </dd>
            </div>
          </dl>
        </div>
        <div class="view-order__column">
          <dl class="view-order__info">
            <div class="view-order__item d-flex">
              <dt class="view-order__text">delivery options</dt>
              <dd class="view-order__order"><?php echo esc_html(
                  $order->get_shipping_method() ?: "Not specified",
              ); ?>
            </dd>
            </div>
            <div class="view-order__item d-flex">
              <dt class="view-order__text">delivery address</dt>
              <dd class="view-order__order">
                <address class="view-order__address">
                <?php
                $shipping_address = $order->get_formatted_shipping_address();

                echo $shipping_address
                    ? wp_kses_post($shipping_address)
                    : "Not specified";
                ?>
                </address>
              </dd>
            </div>
            <div class="view-order__item d-flex">
              <dt class="view-order__text">contact number</dt>
              <dd class="view-order__order"><?php echo esc_html(
                  $order->get_billing_phone() ?: "Not specified",
              ); ?>
            </dd>
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

              <?php foreach ($order->get_items() as $item): ?>

                <tr>
                  <td class="view-order__order"><?php echo esc_html(
                      $item->get_name(),
                  ); ?>
                </td>
                  <td class="view-order__order"><?php echo wp_kses_post(
                      wc_price($item->get_total(), [
                          "currency" => $order->get_currency(),
                      ]),
                  ); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
               
              </tbody>
              <tfoot>
                <tr class="view-order__table-row">
                  <td class="view-order__text">subtotal</td>
                  <td class="view-order__order"><?php echo wc_price(
                      $order->get_subtotal(),
                      ["currency" => $order->get_currency()],
                  ); ?>
                  </td>
                </tr>
                <tr class="view-order__table-row">
                  <td class="view-order__text">shipping</td>
                  <td class="view-order__order"><?php echo wp_kses_post(
                      $order->get_shipping_to_display(),
                  ); ?>
                  </td>
                </tr>
                <tr class="view-order__table-row">
                  <td class="view-order__name">total</td>
                  <td class="view-order__name"><?php echo wp_kses_post(
                      $order->get_formatted_order_total(),
                  ); ?>
                  </td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
