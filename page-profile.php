<?php
/*
Template Name: Profile
*/
get_header();
?>

<?php

if (!is_user_logged_in()) {
  wp_safe_redirect(home_url('/my-account/'));
  exit;
}

?>
<main class="main">
  <section class="profile">
    <div class="container">
      <div class="profile__inner">
        <h1 class="profile__title">My Account</h1>
        <nav class="profile-nav">
          <ul class="profile-nav__list d-flex">
            <li class="profile-nav__item is-active">
              <a class="profile-nav__link" href="#dashboard">Dashboard</a>
            </li>
            <li class="profile-nav__item">
              <a class="profile-nav__link" href="#orders">Orders</a>
            </li>
            <li class="profile-nav__item">
              <a class="profile-nav__link" href="#downloads">Downloads</a>
            </li>
            <li class="profile-nav__item">
              <a class="profile-nav__link" href="#addresses">Addresses</a>
            </li>
            <li class="profile-nav__item">
              <a class="profile-nav__link" href="#account-details">Account
                details</a>
            </li>
            <li class="profile-nav__item">
              <a class="profile-nav__link" href="<?php echo esc_url(wc_logout_url(home_url('/my-account/'))); ?>">
                Logout
              </a>
            </li>
          </ul>
        </nav>
        <div class="profile__content is-active" id="dashboard">
          <p class="profile__text">Hello <?php echo esc_html(wp_get_current_user()->display_name); ?>
            (not <?php echo esc_html(wp_get_current_user()->display_name); ?>
            <a class="profile__link-inline" href="<?php echo esc_url(wc_logout_url(home_url('/my-account/'))); ?>">
              Log out</a>)
          </p>
          <p class="profile__text">From your account dashboard you can view your<a class="profile__link-inline"
              href="#orders">recent orders</a>,manage your<a class="profile__link-inline" href="#addresses">shipping and
              billing addresses</a>, and edit
            your <a class="profile__link-inline" href="#account-details">password and account details</a>.
          </p>
        </div>
        <div class="profile__content" id="orders">
          <?php
          $customer_orders = wc_get_orders([
            'customer_id' => get_current_user_id(),
            'limit' => -1,
            'orderby' => 'date',
            'order' => 'DESC',
          ]);
          ?>

          <?php if (empty($customer_orders)): ?>
            <div class="profile__orders-box d-flex justify-between">
              <p class="pofile__text">No order has been made yet.</p>
              <button class="profile__downloads-btn">browse product</button>
            </div>
          <?php else : ?>
            <table class="profile__orders-table">
              <thead class="profile__orders-table__head">
                <tr class="profile__orders-table__row">
                  <th class="profile__orders-table__th">order number</th>
                  <th class="profile__orders-table__th">date</th>
                  <th class="profile__orders-table__th">status</th>
                  <th class="profile__orders-table__th">total</th>
                  <th class="profile__orders-table__th">actions</th>
                </tr>
              </thead>
              <tbody class="profile__orders-table__body">
                <?php foreach ($customer_orders as $order): ?>
                  <tr class="profile__orders-table__row">
                    <td class="profile__orders-table__td">
                      <?php echo esc_html($order->get_order_number()); ?>
                    </td>
                    <td class="profile__orders-table__td">
                      <?php echo esc_html(wc_format_datetime($order->get_date_created())); ?>
                    </td>
                    <td class="profile__orders-table__td">
                      <?php echo esc_html(wc_get_order_status_name($order->get_status())); ?>
                    </td>
                    <td class="profile__orders-table__td">
                      <?php echo wp_kses_post($order->get_formatted_order_total()); ?>
                    </td>
                    <td class="profile__orders-table__td"><a class="profile__orders-table__action" href="<?php echo esc_url($order->get_view_order_url()); ?>">
                        View Order</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php endif; ?>
        </div>
        <div class="profile__content" id="downloads">
          <?php $downloads = WC()->customer->get_downloadable_products(); ?>
          <?php if (empty($downloads)) : ?>
            <div class="profile__orders-box d-flex justify-between">
              <p class="pofile__text">No downloads available yet.</p>
              <button class="profile__downloads-btn">browse product</button>
            </div>
          <?php else : ?>
            <?php foreach ($downloads as $download) : ?>
              <p class="profile__text">
                <a class="profile__link-inline"
                  href="<?php echo esc_url($download['download_url']); ?>">
                  <?php echo esc_html($download['download_name']); ?>
                </a>
              </p>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <div class="profile__content" id="addresses">
          <?php
          $customer = new WC_Customer(get_current_user_id());
          $billing_address = $customer->get_billing_address_1();
          $shipping_address = $customer->get_shipping_address_1();
          $billing_first_name = $customer->get_billing_first_name();
          $shipping_first_name = $customer->get_shipping_first_name();
          $address_data = [
            'billing' => [
              'first_name' => $customer->get_billing_first_name(),
              'last_name'  => $customer->get_billing_last_name(),
              'company'   => $customer->get_billing_company(),
              'country'   => $customer->get_billing_country(),
              'address'   => $customer->get_billing_address_1(),
              'postcode'  => $customer->get_billing_postcode(),
              'city'      => $customer->get_billing_city(),
              'phone'     => $customer->get_billing_phone(),
              'email'     => $customer->get_billing_email(),
            ],
            'shipping' => [
              'first_name' => $customer->get_shipping_first_name(),
              'last_name'  => $customer->get_shipping_last_name(),
              'company'   => $customer->get_shipping_company(),
              'country'   => $customer->get_shipping_country(),
              'address'   => $customer->get_shipping_address_1(),
              'postcode'  => $customer->get_shipping_postcode(),
              'city'      => $customer->get_shipping_city(),
            ],
          ];
          ?>
          <p class="pofile__text">The following addresses will be used on the checkout page by default.</p>
          <div class="profile__addresses-box d-flex justify-between">
            <div class="profile__addresses-column">
              <div class="profile__addresses-card">
                <h3 class="profile__addresses-title">Billing address</h3>
                <div class="prifile__addresses-preview">
                  <a href="#billing-form" class="profile__addresses-action">
                    <?php echo !empty($billing_address) ? 'EDIT' : 'ADD'; ?>
                  </a>
                  <p class="profile__addresses-desc">
                    <?php if (!empty($billing_address)) : ?>
                      <?php echo esc_html($billing_address); ?>
                    <?php else : ?>
                      You have not set up this type of address yet.
                    <?php endif; ?>
                  </p>
                </div>
              </div>
            </div>
            <div class="profile__addresses-column">
              <div class="profile__addresses-card">
                <h3 class="profile__addresses-title">Shipping address</h3>
                <div class="prifile__addresses-preview">
                  <a href="#shipping_form" class="profile__addresses-action">
                    <?php echo !empty($shipping_address) ? 'EDIT' : 'ADD'; ?>
                  </a>
                  <p class="profile__addresses-desc">
                    <?php if (!empty($shipping_address)) : ?>
                      <?php echo esc_html($shipping_address); ?>
                    <?php else : ?>
                      You have not set up this type of address yet.
                    <?php endif; ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <script>
            window.profileAddressData = <?php echo wp_json_encode($address_data); ?>;
          </script>
          <form id="address-form"
            method="post"
            action=""
            class="profile__addresses-form d-flex flex-column is-hidden">
            <input type="hidden"
              id="address-type"
              name="address_type"
              value="billing">
            <input type="hidden" name="save_profile_address" value="1">
            <?php wp_nonce_field('save_profile_address', 'profile_address_nonce'); ?>
            <div class="addresses__form-row d-flex justify-between">
              <label class="addresses__form-field">
                <input class="addresses__form-input"
                  type="text"
                  placeholder="First name*"
                  name="first_name"
                  required>
              </label>
              <label class="addresses__form-field">
                <input class="addresses__form-input"
                  type="text" placeholder="last name *"
                  name="last_name"
                  value="<?php echo esc_attr($customer->get_billing_last_name()); ?>"
                  required>
              </label>
            </div>
            <label class="addresses__form-field">
              <input class="addresses__form-input"
                type="text"
                placeholder="Company Name"
                name="company"
                value="<?php echo esc_attr($customer->get_billing_company()); ?>">
            </label>
            <label class="addresses__form-field">
              <select class="addresses__form-input addresses__form-select" type="text" name="country" required>
                <option value="">Country *</option>
                <option value="UA" <?php selected($customer->get_billing_country(), 'UA'); ?>>
                  Ukraine
                </option>
                <option value="US" <?php selected($customer->get_billing_country(), 'US'); ?>>
                  United States
                </option>
              </select>
            </label>
            <label class="addresses__form-field">
              <input class="addresses__form-input"
                type="text"
                placeholder="Street Address *"
                name="address"
                value="<?php echo esc_attr($customer->get_billing_address_1()); ?>"
                required>
            </label>
            <label class="addresses__form-field">
              <input class="addresses__form-input"
                type="text"
                placeholder="Postcode / ZIP *"
                name="postcode"
                value="<?php echo esc_attr($customer->get_billing_postcode()); ?>"
                required>
            </label>
            <label class="addresses__form-field">
              <input class="addresses__form-input"
                type="text"
                placeholder="Town / City *"
                name="city"
                value="<?php echo esc_attr($customer->get_billing_city()); ?>"
                required>
            </label>
            <label class="addresses__form-field billing-only">
              <input class="addresses__form-input"
                type="tel"
                placeholder="Phone *"
                name="phone"
                value="<?php echo esc_attr($customer->get_billing_phone()); ?>"
                required>
            </label>
            <label class="addresses__form-field billing-only">
              <input class="addresses__form-input"
                type="email"
                placeholder="Email *"
                name="email"
                value="<?php echo esc_attr($customer->get_billing_email()); ?>"
                required>
            </label>
            <?php wp_nonce_field('save_profile_address', 'profile_address_nonce'); ?>
            <button type="submit"
              name="save_profile_address" value="1"
              class="profile__btn-form">
              save address
            </button>
          </form>
        </div>
        <div class="profile__content" id="account-details">
          <?php
          $current_user = wp_get_current_user();
          ?>
          <div class="profile__account">
            <h1 class="profile__account-title">Account details</h1>
            <form class="profile__account-form d-flex flex-column" action="" method="post">
              <input type="hidden" name="save_account_details" value="1">
              <?php wp_nonce_field('save_account_details', 'account_details_nonce'); ?>
              <label class="profile__account-form__field">
                <input class="profile__account-form__input"
                  type="text"
                  placeholder="First name*"
                  name="first_name"
                  value="<?php echo esc_attr($current_user->first_name); ?>"
                  required>
              </label>
              <label class="profile__account-form__field">
                <input class="profile__account-form__input"
                  type="text"
                  placeholder="Last name*"
                  name="last_name"
                  value="<?php echo esc_attr($current_user->last_name); ?>"
                  required>
              </label>
              <label class="profile__account-form__field">
                <input class="profile__account-form__input"
                  type="text"
                  placeholder="Display name*"
                  name="display_name"
                  value="<?php echo esc_attr($current_user->display_name); ?>"
                  required>
                <p class="profile__account-form__hint">This will be how your name will be displayed in the
                  account section and in reviews.</p>
              </label>
              <label class="profile__account-form__field">
                <input class="profile__account-form__input"
                  type="email"
                  placeholder="Email address*"
                  name="email"
                  value="<?php echo esc_attr($current_user->user_email); ?>"
                  required>
              </label>
              <fieldset class="profile__account-form__fieldset">
                <legend class="profile__account-form__legend">Password change</legend>
                <label class="profile__account-form__field">
                  <input class="profile__account-form__input" type="password"
                    placeholder="Current password (leave blank to leave unchanged)" name="current_password">
                </label>
                <label class="profile__account-form__field">
                  <input class="profile__account-form__input" type="password"
                    placeholder="New password (leave blank to leave unchanged)" name="new_password">
                </label>
                <label class="profile__account-form__field">
                  <input class="profile__account-form__input" type="password" placeholder="Confirm new password"
                    name="confirm_password">
                </label>
              </fieldset>
              <button class="profile__account-form__btn" type="submit" name="test_account_submit" value="1">save changes</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>