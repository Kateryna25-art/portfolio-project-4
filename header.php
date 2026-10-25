<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php $img = get_template_directory_uri() . "/assets/images"; ?>
  <?php wp_head(); ?>
</head>

<body>
  <?php wp_body_open(); ?>
  <div class="wrapper">
    <header class="header">
      <div class="container">
        <div class="header__content is-loading justify-between">
          <div class="header__logo">
            <a class="header__logo-link" href="<?php echo esc_url(home_url("/")); ?>">
              <span>S</span>HOPE
            </a>
          </div>
          <div class="header__right is-loading">
            <?php

$view_order_url = wc_get_account_endpoint_url('orders');
if (is_user_logged_in()) {

    $orders = wc_get_orders([
        'customer_id' => get_current_user_id(),
        'limit'       => 1,
        'orderby'     => 'date',
        'order'       => 'DESC',
    ]);

    if (!empty($orders)) {

        $view_order_url = $orders[0]->get_view_order_url();
    }
}
?>
            <nav class="menu">
              <ul class="menu__list d-flex">
                <li class="menu__item menu-item-dropdown"><a class="menu__link shop-toggle" href="#">Shop</a>
                  <div class="header__dropdown">
                    <div class="dropdown__col">
                      <div class="dropdown__title">shop pages</div>
                      <ul class="dropdown__list">
                        <li class="dropdown__item"><a class="dropdown__link" href="<?php echo esc_url(wc_get_cart_url()); ?>">Cart</a></li>
                        <li class="dropdown__item"><a class="dropdown__link" href="<?php echo esc_url(wc_get_checkout_url()); ?>">Checkout</a></li>
                        <li class="dropdown__item"><a class="dropdown__link" href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a></li>
                        <li class="dropdown__item"><a class="dropdown__link" href="<?php echo esc_url(home_url('/top-trends/')); ?>">Post</a></li>
                        <li class="dropdown__item"><a class="dropdown__link" href="<?php echo esc_url(home_url('/privacy/')); ?>">Privacy</a></li>
                        <li class="dropdown__item"><a class="dropdown__link" href="<?php echo esc_url(home_url('/profile/')); ?>">Profile</a></li>
                      </ul>
                    </div>
                    <div class="dropdown__col">
                      <div class="dropdown__title">single product</div>
                      <ul class="dropdown__list">
                        <li class="dropdown__item"><a class="dropdown__link" href="<?php echo esc_url(home_url('/shop/')); ?>">Shop</a></li>
                        <li class="dropdown__item"><a class="dropdown__link" href="<?php echo esc_url(home_url('/product/')); ?>">Product</a></li>
                        <li class="dropdown__item"><a class="dropdown__link" href="<?php echo esc_url(is_user_logged_in()
                    ? home_url('/profile/')
                    : home_url('/my-account/')
                    ); 
                    ?>">Account</a></li>
                        <li class="dropdown__item"><a class="dropdown__link" href="<?php echo esc_url($view_order_url); ?>">View-Order</a></li>
                      </ul>
                    </div>
                  </div>
                </li>

                <li class="menu__item"><a class="menu__link" href="<?php echo esc_url(home_url('/blog/')); ?>">Blog</a></li>
                <li class="menu__item"><a class="menu__link" href="<?php echo esc_url(home_url('/our-story/')); ?>">Our Story</a></li>
              </ul>
            </nav>

            <div class="header__action">
              <ul class="header__action-list d-flex">
                <li class="header__action-item header__action-item--search">
                  <a class="header__action-link header__search-toggle"
                    href="#"
                    aria-label="Open search"
                    aria-expanded="false">
                    <svg width="19" height="19">
                      <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#search"></use>
                    </svg>
                  </a>
                  <form class="header__search-form"
                    method="get"
                    role="search"
                    action="<?php echo esc_url(home_url("/")); ?>">
                    <input class="header__search-input"
                      type="search"
                      name="s"
                      placeholder="Search products..."
                      aria-label="Search products"
                      required>
                    <input type="hidden" name="post_type" value="product">
                  </form>
                </li>
                <li class="header__action-item">
                  <a class="header__action-link header__cart" href="#">
                    <svg width="21" height="21">
                      <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#basket"></use>
                    </svg>
                    <span class="cart-count active is-loading">
                      <?php echo WC()->cart ? WC()->cart->get_cart_contents_count() : 0; ?>
                    </span>
                  </a>
                </li>
                <li class="header__action-item header__action-item--user">
                  <a class="header__action-link"
                    href="<?php echo esc_url(is_user_logged_in()
                    ? home_url('/profile/')
                    : home_url('/my-account/')
                    ); 
                    ?>"
                    aria-label="My Account">
                    <svg width="20" height="20">
                      <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#user"></use>
                    </svg>
                  </a>
                </li>
              </ul>
            </div>
            <div class="header__burger">
              <button class="header__burger-btn">
                <span class="header__burger-line"></span>
                <span class="header__burger-line"></span>
                <span class="header__burger-line header__burger-line--short"></span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="cart-overlay"></div>
    <?php get_template_part("shopping-bag"); ?>
