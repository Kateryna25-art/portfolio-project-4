<?php
defined("ABSPATH") || exit();

$product_tabs = apply_filters("woocommerce_product_tabs", []);

if (!empty($product_tabs)): ?>

  <div class="product__desktop-tabs">
    <div class="product__tabs is-loading">
      <?php
      $i = 0;
      foreach ($product_tabs as $key => $product_tab):
        $i++; ?>
        <div class="product__tabs-item">
          <a
            class="product__tabs-link <?php echo $i === 1 ? "product__tabs-link--active" : ""; ?>"
            href="#tab-<?php echo esc_attr($key); ?>">
            <?php echo wp_kses_post($product_tab["title"]); ?>
          </a>
        </div>
      <?php
      endforeach;
      ?>
    </div>
    <?php
    $i = 0;
    foreach ($product_tabs as $key => $product_tab):
      $i++; ?>
      <div
        id="tab-<?php echo esc_attr($key); ?>"
        class="product__tabs-content <?php echo $i === 1 ? "product__tabs-content--active" : ""; ?>">
        <?php if ($key === "description"): ?>

          <div class="product__box-page">
            <div class="product__box is-loading">
              <div class="product__box-text">
                <?php the_content(); ?>
              </div>
            </div>
          </div>
        <?php elseif ($key === "additional_information"): ?>
          <?php
          global $product;
          $weight = $product->get_weight();
          $dimensions = wc_format_dimensions($product->get_dimensions(false));

          $colours = str_replace(" | ", " , ", $product->get_attribute("Colours"));
          $material = $product->get_attribute("Material");
          ?>
          <div class="product__box-page">

            <?php if ($weight): ?>
              <div class="product__box is-loading">
                <div class="product__box-text">Weight:</div>
                <div class="product__box-count">
                  <?php echo esc_html($weight); ?> kg
                </div>
              </div>
            <?php endif; ?>
            <?php if ($dimensions): ?>
              <div class="product__box is-loading">
                <div class="product__box-text">Dimentions:</div>
                <div class="product__box-count">
                  <?php echo esc_html($dimensions); ?>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($colours): ?>
              <div class="product__box is-loading">
                <div class="product__box-text">Colours:</div>
                <div class="product__box-count">
                  <?php echo esc_html($colours); ?>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($material): ?>
              <div class="product__box is-loading">
                <div class="product__box-text">Material:</div>
                <div class="product__box-count">
                  <?php echo esc_html($material); ?>
                </div>
              </div>
            <?php endif; ?>
          </div>
        <?php elseif ($key === "reviews"): ?>
          <?php if (isset($product_tab["callback"])) {
            call_user_func($product_tab["callback"], $key, $product_tab);
          } ?>
        <?php endif; ?>
      </div>
    <?php
    endforeach;
    ?>
  </div>
<?php endif;
?>

<?php
global $product;
$weight = $product->get_weight();
$dimensions = wc_format_dimensions($product->get_dimensions(false));
$colours = str_replace(" | ", " | ", $product->get_attribute("Colours"));
$material = $product->get_attribute("Material");
?>
<div class="product__mobile-accordion">
  <details class="accordion-item">
    <summary class="accordion-item__title justify-between d-flex">Description</summary>
    <div class="accordion-content"><?php the_content(); ?></div>
  </details>
  <details class="accordion-item">
    <summary class="accordion-item__title justify-between d-flex">Aditional information</summary>
    <div class="accordion-content">
      <?php if ($weight): ?>
        <div class="product__box">
          <div class="product__box-text">Weight</div>
          <div class="product__box-count">
            <?php echo esc_html($weight); ?>
            kg</div>
        </div>
      <?php endif; ?>
      <?php if ($dimensions): ?>
        <div class="product__box">
          <div class="product__box-text">Dimensions</div>
          <div class="product__box-count">
            <?php echo esc_html($dimensions); ?>
          </div>
        </div>
      <?php endif; ?>
      <?php if ($colours): ?>
        <div class="product__box">
          <div class="product__box-text">Colours: </div>
          <div class="product__box-count">
            <?php echo esc_html($colours); ?>
          </div>
        </div>
      <?php endif; ?>
      <?php if ($material): ?>
        <div class="product__box">
          <div class="product__box-text">Material</div>
          <div class="product__box-count">
            <?php echo esc_html($material); ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </details>
  <?php
  $reviews = get_approved_comments($product->get_id());
  $reviews_count = count($reviews);
  ?>
  <details class="accordion-item">
    <summary class="accordion-item__title justify-between d-flex">Reviews
      (<?php echo esc_html($reviews_count); ?>)
    </summary>
    <div class="rewiews">
      <div class="rewiews__list">
        <h3 class="rewiews__title">
          <?php echo esc_html($reviews_count . " Reviews for " . $product->get_name()); ?>
        </h3>
        <?php foreach ($reviews as $review): ?>
          <?php $rating = (int) get_comment_meta($review->comment_ID, "rating", true); ?>
          <div class="rewiews__card">
            <div class="rewiews__card-block">
              <span class="rewiews__card-author">
                <?php echo esc_html($review->comment_author); ?>
                <span class="rewiews__card-date">
                  <?php echo esc_html(get_comment_date("j F, Y", $review)); ?>
                </span>
            </div>
            <div class="rewiews__card-rating d-flex">
              <?php for ($star = 1; $star <= 5; $star++): ?>

                <svg width="20" height="20">
                  <use xlink:href="<?php echo esc_url(
                                      get_template_directory_uri(),
                                    ); ?>/assets/images/sprite.svg#<?php echo $star <= $rating ? "star" : "star-white"; ?>"></use>
                </svg>
              <?php endfor; ?>
            </div>
            <div class="rewiews__card-info">
              <p class="rewiews__card-text">
                <?php echo esc_html($review->comment_content); ?>
              </p>
              <div class="rewiews__card-line"></div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="rewiews-form d-flex flex-column">
        <h3 class="rewiews-form__title">Add a Review</h3>
        <p class="rewiews-form__subtitle">Your email address will not be published. Required fields are marked *
        </p>
        <form class="rewiews-form__action"
          action="<?php echo esc_url(site_url("/wp-comments-post.php")); ?>"
          method="post">
          <div class="rewiews-form__field">
            <textarea class="rewiews-form__textarea"
              name="comment"
              placeholder="Your Review*" required></textarea>
          </div>
          <div class="rewiews-form__field">
            <input class="rewiews-form__input"
              type="text"
              name="author"
              placeholder="Enter your name*" required>
          </div>
          <div class="rewiews-form__field">
            <input class="rewiews-form__input"
              type="email"
              name="email"
              placeholder="Enter your Email*" required>
          </div>
          <div class="rewiews-form__checkbox">
            <label class="rewiews-form__checkbox-label" for="wp-comment-cookies-consent">
              <input type="checkbox"
                class="rewiews-form__checkbox-input"
                name="wp-comment-cookies-consent"
                id="wp-comment-cookies-consent"
                value="yes">
              <span class="rewiews-form__checkbox-text">Save my name, email, and website in this browser for the
                next
                time I comment</span>
            </label>
          </div>
          <div class="rewiews-form__rating flex-column">
            <span class="rewiews-form__rating-label">Your Rating*</span>
            <div class="rewiews-form__rating-icon d-flex">

              <input type="radio"
                name="rating"
                id="rating-1"
                value="1">
              <label for="rating-1">
                <svg width="20" height="20">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star-white"></use>
                </svg>
              </label>

              <input type="radio"
                name="rating"
                id="rating-2"
                value="2">
              <label for="rating-2">
                <svg width="20" height="20">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star-white"></use>
                </svg>
              </label>

              <input type="radio"
                name="rating"
                id="rating-3"
                value="3">
              <label for="rating-3">
                <svg width="20" height="20">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star-white"></use>
                </svg>
              </label>

              <input type="radio"
                name="rating"
                id="rating-4"
                value="4">
              <label for="rating-4">
                <svg width="20" height="20">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star-white"></use>
                </svg>
              </label>

              <input type="radio"
                name="rating"
                id="rating-5"
                value="5">
              <label for="rating-5">
                <svg width="20" height="20">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star-white"></use>
                </svg>
              </label>
            </div>
          </div>
          <input type="hidden"
            name="comment_post_ID"
            value="<?php echo esc_attr($product->get_id()); ?>">
          <button class="rewiews-form__btn" type="submit">Submit</button>

        </form>
      </div>
    </div>
  </details>
</div>