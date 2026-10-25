<?php
/*
Template Name: Home 
*/
get_header(); ?>

<main class="main">
  <section class="banner">
    <div class="container">
      <form class="search-bar is-loading"
      role="search"
      method="get"
      action="<?php echo esc_url(home_url('/')); ?>">
        <button class="search-bar__btn" type="submit">
          <svg width="12" height="11">
            <use xlink:href="<?php echo esc_url(
              get_template_directory_uri(),
            ); ?>/assets/images/sprite.svg#search"></use>
          </svg>
        </button>
        <input class="search-bar__input" 
        type="search" 
        name="s"
        aria-label="Search products"
         placeholder="Search..."
         required>
         
         <input type="hidden" name="post_type" value="product">
      </form>
      <div class="banner__slider swiper mySwiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide banner__slide">
            <div class="banner__content d-flex flex-column">
              <h1 class="banner__title"><?php echo get_field("slider_1_title"); ?></h1>
              <span class="banner__price">
                $<?php echo number_format((float) get_field("slider_1_price", 54), 2, ",", ""); ?>
              </span>
              <a class="banner__button"
                href="<?php echo esc_url(get_field("slider_1_link")); ?>">

                <?php echo esc_html(get_field("slider_1_button")); ?></a>
            </div>
            <?php $image = get_field("slide_img1"); ?>
            <?php if ($image): ?>
              <img
                src="<?php echo esc_url($image["url"]); ?>"
                alt="<?php echo esc_attr($image["alt"]); ?>">
            <?php endif; ?>
          </div>
          <div class="swiper-slide banner__slide">
            <div class="banner__content d-flex flex-column">
              <h1 class="banner__title"><?php echo get_field("slider_1_title"); ?></h1>
              <span class="banner__price">
                $<?php echo number_format((float) get_field("slider_1_price", 54), 2, ",", ""); ?>
              </span>
              <a class="banner__button"
                href="<?php echo esc_url(get_field("slider_1_link")); ?>">

                <?php echo esc_html(get_field("slider_1_button")); ?></a>
            </div>
            <?php $image = get_field("slide_img1"); ?>
            <?php if ($image): ?>
              <img
                src="<?php echo esc_url($image["url"]); ?>"
                alt="<?php echo esc_attr($image["alt"]); ?>">
            <?php endif; ?>
          </div>
          <div class="swiper-slide banner__slide">
            <div class="banner__content d-flex flex-column">
              <h1 class="banner__title"><?php echo get_field("slider_2_title"); ?></h1>
              <span class="banner__price">
                $<?php echo number_format((float) get_field("slider_2_price", 54), 2, ",", ""); ?>
              </span>
              <a class="banner__button"
                href="<?php echo esc_url(get_field("slider_1_link")); ?>">

                <?php echo esc_html(get_field("slider_1_button")); ?></a>
            </div>
            <?php $image = get_field("slide_img1"); ?>
            <?php if ($image): ?>
              <img
                src="<?php echo esc_url($image["url"]); ?>"
                alt="<?php echo esc_attr($image["alt"]); ?>">
            <?php endif; ?>
          </div>

        </div>
        <div class="swiper-pagination"></div>

      </div>
  </section>
  <div class="latest">
    <div class="container">
      <div class="latest__wrapper d-flex justify-between">
        <h2 class="latest__title">Shop The Latest</h2>
        <a class="latest__button"
          href="<?php echo esc_url(home_url("/shop/")); ?>">
          View All</a>
      </div>
    </div>
  </div>

  <section class="products-grid">
    <div class="container">
      <div class="products-grid__content">

        <?php
        global $post;

        $args = [
          "post_type" => "product",
          "posts_per_page" => 6,
          "orderby" => "comment_count",
        ];

        $category = isset($_GET["category"]) ? sanitize_text_field($_GET["category"]) : "";

        if ($category) {
          $args["tax_query"] = [
            [
              "taxonomy" => "product_cat",
              "field" => "slug",
              "terms" => $category,
            ],
          ];
        }
        $orderby = isset($_GET["orderby"]) ? sanitize_text_field($_GET["orderby"]) : "";

        if ($orderby === "price-low") {
          $args["meta_key"] = "_price";
          $args["orderby"] = "meta_value_num";
          $args["order"] = "ASC";
        }
        if ($orderby === "price-hight") {
          $args["meta_key"] = "_price";
          $args["orderby"] = "meta_value_num";
          $args["order"] = "DESC";
        }
        if ($orderby === "popular") {
          $args["meta_key"] = "total_sales";
          $args["orderby"] = "meta_value_num";
          $args["order"] = "DESC";
        }

        $search = isset($_GET["s_query"]) ? sanitize_text_field($_GET["s_query"]) : "";

        if ($search) {
          $args["s"] = $search;
        }
        $on_sale = isset($_GET["on_sale"]) && $_GET["on_sale"] === "1";

        if ($on_sale) {
          $sale_ids = wc_get_product_ids_on_sale();

          $args["post__in"] = !empty($sale_ids) ? $sale_ids : [0];
        }

        $in_stock = isset($_GET["in_stock"]) && $_GET["in_stock"] === "1";

        if ($in_stock) {
          $args["meta_query"][] = [
            "key" => "_stock_status",
            "value" => "instock",
            "compare" => "=",
          ];
        }
        $query = new WP_Query($args);

        if ($query->have_posts()) {
          while ($query->have_posts()) {

            $query->the_post();
            $product = wc_get_product(get_the_ID());
            ?>
            <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="product__card">
              <picture class="product__card-picture">
                <?php echo get_the_post_thumbnail(get_the_ID(), "medium"); ?>
              </picture>
              <?php if (!$product->is_in_stock()): ?>
                <span class="product__card-sold">Sold out</span>
              <?php elseif ($product->is_on_sale()): ?>

                <?php
                $regular_price = (float) $product->get_regular_price();
                $sale_price = (float) $product->get_sale_price();

                if ($regular_price > 0 && $sale_price > 0) {
                  $discount = round((($regular_price - $sale_price) / $regular_price) * 100);
                }
                ?>

                <?php if (!empty($discount)): ?>
                  <span class="product__card-sail">
                    -<?php echo esc_html($discount); ?>%
                  </span>
                <?php endif; ?>

              <?php endif; ?>
              <div class="product__card-info"><?php the_title(); ?></div>
              <span class="product__card-price">
                <?php echo $product->get_price_html(); ?>
              </span>
            </a>
        <?php
          }
        }

        wp_reset_postdata();

// Сбрасываем $post
?>
      </div>
    </div>
  </section>
</main>
<?php get_template_part("subfooter"); ?>
<?php get_footer(); ?>
