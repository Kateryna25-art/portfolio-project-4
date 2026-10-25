<?php
get_header(); ?>

<main class="main">
  <section class="shop">
    <div class="container">
      <div class="shop__inner">
        <h2 class="shop-sidebar__title">Shop The Latest</h2>
        <div class="shop__layout d-flex">
          <aside class="shop-sidebar">
            <div class="shop-sidebar__search">
              <input type="text" id="shop-search" placeholder="Search..." class="shop-sidebar__input" value="<?php echo esc_attr(
                $_GET["s_query"] ?? "",
              ); ?>">
              <button class="shop-sidebar__btn" type="submit" id="shop-search-btn">
                <svg width="19" height="19">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#search"></use>
                </svg>
              </button>
            </div>
            <div class="shop-sidebar__filter">
              <select class="shop-sidebar__select" name="category" id="shop-category">
                <option value="">Shop By</option>
                <option value="earrings" <?php selected($_GET["category"] ?? "", "earrings"); ?>>Earrings</option>
                <option value="rings" <?php selected($_GET["category"] ?? "", "rings"); ?>>Rings</option>
                <option value="necklace" <?php selected($_GET["category"] ?? "", "necklace"); ?>>Necklace</option>
              </select>
            </div>
            <div class="shop-sidebar__filter">
              <select class="shop-sidebar__select" name="orderby" id="shop-orderby">
                <option value="">Sort By</option>
                <option value="popular" <?php selected($_GET["orderby"] ?? "", "popular"); ?>>Popularity</option>
                <option value="price-low" <?php selected(
                  $_GET["orderby"] ?? "",
                  "price-low",
                ); ?>>Price: Low to Hight</option>
                <option value="price-hight" <?php selected(
                  $_GET["orderby"] ?? "",
                  "price-hight",
                ); ?>>Price: Hight to Low</option>
              </select>
            </div>
            <div class="shop-sidebar__filter filter-price">
              <div id="range-slider" class="filter__price-slider"></div>
              <div class="filter-price__content d-flex justify-between">
                <div class="filter-price__aside">
                  Price: $<span id="min-price">0</span> - $<span id="max-price">180</span>
                </div>
                <button class="filter-price__btn" type="button" id="shop-price-btn">Filter</button>
              </div>
            </div>
            <div class="filter-toggles d-flex flex-column">
              <label class="toggle-item is-loading justify-between">
                <span class="toggle-text">On sale</span>
                <input class="toggle-input" id="sale-toggle" type="checkbox" <?php checked(
                  $_GET["on_sale"] ?? "",
                  "1",
                ); ?>>
                <span class="toggle-slider"></span>
              </label>
              <label class="toggle-item is-loading justify-between">
                <span class="toggle-text">In stock</span>
                <input class="toggle-input" id="stock-toggle" type="checkbox" <?php checked(
                  $_GET["in_stock"] ?? "",
                  "1",
                ); ?>>
                <span class="toggle-slider"></span>
              </label>
            </div>
          </aside>
          <div class="shop__content">
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

?>
    </div>
  </div>
</section>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
