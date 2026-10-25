<?php
defined('ABSPATH') || exit;
get_header();

global $product;

if (!is_a($product, 'WC_Product')) {
  $product = wc_get_product(get_the_ID());
}
?>
<section class="product">
  <div class="container">
    <div class="notification__inner notification--hidden is-loading justify-between">
      <div class="notification__message is-loading">
        <div class="notification__icon d-flex">
          <svg width="20" height="20">
            <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#check"></use>
          </svg>
        </div>
        The item added to your Shopping bag.
      </div>
      <div class="notification__action d-flex">
        <a class="notification__link" href="<?php echo esc_url(wc_get_cart_url()); ?>">
          view cart
        </a>
      </div>
    </div>
    <div class="product__inner">
      <div class="product__miniature">
        <?php
        $gallery_ids = $product->get_gallery_image_ids();

        foreach ($gallery_ids as $image_id) :
        ?>
          <div class="product__miniature-img">
            <?php
            echo wp_get_attachment_image(
              $image_id,
              'woocommerce_thumbnail',
            );
            ?>
          </div>

        <?php endforeach; ?>
      </div>
      <div class="product__main-img">
        <picture class="product__main-images">
          <?php
          echo $product->get_image(
            'woocommerce_single',
          );
          ?>
        </picture>
        <span class="product__main-divider"></span>
      </div>
      <div class="product__info">
        <h1 class="product__title">
          <?php echo esc_html($product->get_name()); ?>
        </h1>
        <div class="product__price">
          <?php echo wp_kses_post($product->get_price_html()); ?>
        </div>
        <div class="product__wrapper d-flex">
          <?php $average_rating = $product->get_average_rating(); ?>

          <div class="product__rating is-loading">
            <?php for ($i = 1; $i <= 5; $i++) : ?>

              <svg width="18" height="18">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#<?php echo $i <= round($average_rating) ? 'star' : 'star-white'; ?>"></use>
              </svg>
            <?php endfor; ?>

          </div>
          <div class="product__count">
            <?php
            $review_count = $product->get_review_count();

            echo esc_html($review_count) . ' customer ' .
              ($review_count === 1 ? 'review' : 'reviews');
            ?>
          </div>
        </div>
        <div class="product__text">
          <?php echo wp_kses_post($product->get_description()); ?>
        </div>
        <div class="product__action d-flex">
          <div class="product__counter is-loading">
            <button class="product__counter-btn" type="button">-</button>
            <span class="product__counter-value">1</span>
            <button class="product__counter-btn" type="button">+</button>
          </div>
          <button
            class="product__counter-add"
            type="button"
            data-product-id="<?php echo esc_attr($product->get_id()); ?>">
            add to cart
          </button>
        </div>
        <div class="product__share is-loading justify-between">
          <button class="product__btn-wishlist">
            <svg width="19" height="18">
              <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#wishlist"></use>
            </svg>
          </button>
          <div class="product__social-links d-flex">
            <a href="#">
              <svg width="21" height="16">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#email"></use>
              </svg>
            </a>
            <a href="#">
              <svg width="21" height="16">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#face-footer"></use>
              </svg>
            </a>
            <a href="#">
              <svg width="21" height="16">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#insta-footer"></use>
              </svg>
            </a>
            <a href="#">
              <svg width="21" height="16">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#twit-footer"></use>
              </svg>
            </a>
          </div>
        </div>
        <div class="product__details">
          <div class="product__details-row is-loading">
            <span class="product__details-name">sku:</span>
            <span class="product__details-text"><?php echo esc_html($product->get_sku()); ?>
            </span>
          </div>
          <div class="product__details-row is-loading">
            <span class="product__details-name">Categories:</span>
            <span class="product__details-text"><?php echo wc_get_product_category_list($product->get_id(), ', '); ?>
            </span>
          </div>
        </div>
      </div>
    </div>
    <?php woocommerce_output_product_data_tabs(); ?>
    <?php
    $related_ids = wc_get_related_products(
      $product->get_id(),
      3
    );
    ?>
    <div class="product__similar">
      <h2 class="product__similar-title">Similar Items</h2>
      <div class="product__similar-box is-loading justify-between">
        <?php foreach ($related_ids as $related_id) : ?>
          <?php
          $related_product = wc_get_product($related_id);
          if (!$related_product) {
            continue;
          }
          ?>
          <div class="product__similar-item">
            <a href="<?php echo esc_url($related_product->get_permalink()); ?>">
              <div class="product__similar-img">
                <?php
                echo $related_product->get_image(
                  'woocommerce_thumbnail'
                );
                ?>
              </div>
              <div class="product__similar-text">
                <?php echo esc_html($related_product->get_name()); ?>
              </div>
              <div class="product__similar-price">
                <?php echo wp_kses_post($related_product->get_price_html()); ?>
              </div>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>