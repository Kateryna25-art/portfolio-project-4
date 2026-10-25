<?php
defined("ABSPATH") || exit();

global $product;

$reviews = get_comments([
  "post_id" => $product->get_id(),
  "status" => "approve",
  "type" => "review",
]);
?>

<div class="rewiews d-flex justify-between">
      <div class="rewiews__list">
        <h3 class="rewiews__title">
          <?php echo $product->get_review_count(); ?> Reviews for <?php the_title(); ?></h3>
            <?php foreach ($reviews as $comment): ?>
        <div class="rewiews__card">
          <div class="rewiews__card-block is-loading">
            <span class="rewiews__card-author"><?php echo get_comment_author($comment); ?></span>
            <span class="rewiews__card-date"><?php echo get_comment_date("j F, Y", $comment); ?></span>
          </div>
          <?php $rating = get_comment_meta($comment->comment_ID, "rating", true); ?>
          <div class="rewiews__card-rating is-loading">
            <?php for ($star = 1; $star <= 5; $star++): ?>

            <svg width="20" height="20">
                <use xlink:href="<?php echo esc_url(
                  get_template_directory_uri(),
                ); ?>/assets/images/sprite.svg#<?php echo $star <= $rating ? "star" : "star-white"; ?>"></use>
                </svg>
                <?php endfor; ?>
          </div>
          <div class="rewiews__card-info">
            <p class="rewiews__card-text"><?php echo esc_html($comment->comment_content); ?></p>
            <div class="rewiews__card-line"></div>
          </div>
        </div>
      <?php endforeach; ?>
            </div> 
      <div class="rewiews-form d-flex flex-column">
        <h3 class="rewiews-form__title">Add a Review</h3>
        <p class="rewiews-form__subtitle">Your email address will not be published. Required fields are marked *</p>
        <form class="rewiews-form__action" action="<?php echo esc_url(
          site_url("/wp-comments-post.php"),
        ); ?>" method="post">
          <div class="rewiews-form__field">
            <textarea class="rewiews-form__textarea" name="comment" placeholder="Your Review*"></textarea>
          </div>
          <div class="rewiews-form__field">
            <input class="rewiews-form__input" type="text" name="author" placeholder="Enter your name*">
          </div>
          <div class="rewiews-form__field">
            <input class="rewiews-form__input" type="email" name="email" placeholder="Enter your Email*">
          </div>
      
        <div class="rewiews-form__checkbox">
          <label class="rewiews-form__checkbox-label">
            <input type="checkbox" class="rewiews-form__checkbox-input">
            <span class="rewiews-form__checkbox-text">Save my name, email, and website in this browser for the next
              time I comment</span>
          </label>
        </div>
        <div class="rewiews-form__rating d-flex">
          <span class="rewiews-form__rating-label">Your Rating*</span>
          <div class="rewiews-form__rating-icon d-flex">
            <label>
              <input type="radio" name="rating" value="1" required>
            <svg width="20" height="20">
              <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star-white"></use>
            </svg>
            </label>
            <label>
              <input type="radio" name="rating" value="2">
            <svg width="20" height="20">
              <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star-white"></use>
            </svg>
            </label>
                <label>
              <input type="radio" name="rating" value="3">
            <svg width="20" height="20">
              <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star-white"></use>
            </svg>
            </label>
              <label>
              <input type="radio" name="rating" value="4">
            <svg width="20" height="20">
              <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star-white"></use>
            </svg>
                </label>
                    <label>
              <input type="radio" name="rating" value="5">
            <svg width="20" height="20">
              <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star-white"></use>
            </svg>
              </label>
          </div>
        </div>
        <?php comment_id_fields(get_the_ID()); ?>
        <button class="rewiews-form__btn" type="submit">Submit</button>
    </form>
      </div>
    </div>
  

