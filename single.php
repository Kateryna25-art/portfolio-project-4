<?php
/*
Template Name: Post
*/
get_header(); ?>
<main class="main">
  <section class="post">
    <div class="container">
      <div class="post__inner d-flex">
        <aside class="post__sidebar">
          <search class="post__search">
            <form class="post__form d-flex" action="<?php echo esc_url(home_url("/")); ?>" method="get">
              <input class="post__form-input" type="search" name="s" placeholder="Search...">
              <button class="post__form-btn" type="submit">
                <svg width="19" height="19">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#search"></use>
                </svg>
              </button>
            </form>
          </search>
          <div class="post__categories">
            <h2 class="post__categories-title">Categories</h2>
            <ul class="post__categories-list d-flex flex-column">
              <?php
              $categories = get_categories();
              if ($categories):
                foreach ($categories as $category): ?>
                  <li class="post__categories-item">
                    <a class="post__categories-link" href="<?php echo esc_url(
                      get_category_link($category->term_id),
                    ); ?>">
                      <?php echo esc_html($category->name); ?>
                    </a>
                  </li>
              <?php endforeach;
              endif;
              ?>
            </ul>
          </div>
        </aside>
        <div class="post__wrapper">
          <article class="post__article">
            <h1 class="post__title"><?php the_title(); ?></h1>
            <div class="post__meta d-flex">
              <span class="post__prefix">by</span>
              <span class="post__name"><?php echo esc_html(get_field("post_name")); ?></span>
              <span class="post__date">- <?php echo esc_html(get_field("post_date")); ?></span>
            </div>
            <div class="post__slider swiper">
              <div class="swiper-wrapper">
                <?php
                $slides = [
                  "post_slide_1",
                  "post_slide_2",
                  "post_slide_3",
                  "post_slide_4",
                  "post_slide_5",
                  "post_slide_6",
                ];
                foreach ($slides as $field_name):
                  $slide = get_field($field_name);
                  if ($slide): ?>
                    <div class="swiper-slide">
                      <picture>
                        <?php echo wp_get_attachment_image($slide["ID"], "full"); ?>
                      </picture>
                    </div>
                <?php endif;
                endforeach;
                ?>
              </div>
              <div class="swiper-pagination is-loading"></div>
            </div>
            <div class="post__box-narrow container-small">
              <div class="post__box">
                <p class="post__box-text"><?php the_content(); ?></p>
                <p class="post__box-text"><?php the_content(); ?></p>
              </div>
              <div class="post__box">
                <?php $image = get_field("post_image"); ?>

                <?php if ($image): ?>
                  <picture>
                    <img
                      src="<?php echo esc_url($image["url"]); ?>"
                      alt="<?php echo esc_attr($image["alt"]); ?>"
                      width="670"
                      height="300">
                  </picture>
                <?php endif; ?>
                <h2 class="post__box-title"><?php echo esc_html(get_field("post_subtitle")); ?></h2>

                <p class="post__box-text"><?php echo esc_html(get_field("post_text")); ?></p>
                <ul class="post__box-list">
                  <?php
                  $list = get_field("post_list");

                  if ($list) {
                    $list = str_replace("<ul>", '<ul class="post__box-list">', $list);
                    $list = str_replace("<li>", '<li class="post__box-item">', $list);

                    echo wp_kses_post($list);
                  }
                  ?>
                </ul>
              </div>
              <div class="post__bottom is-loading justify-between">
                <div class="post__tags d-flex">
                  <span class="post__tags-title">Tags</span>
                  <ul class="post__tags-list d-flex">
                    <?php
                    $tags = get_the_tags();

                    if ($tags):
                      foreach ($tags as $tag): ?>
                        <li class="post__tags-item">
                          <a class="post__tags-link"
                            href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
                            <?php echo esc_html($tag->name); ?>
                          </a>
                        </li>
                    <?php endforeach;
                    endif;
                    ?>
                  </ul>
                </div>
                <div class="post__tags d-flex">
                  <span class="post__tags-title">Share</span>
                  <ul class="post__tags-list post__tags-icon d-flex">
                    <li class="post__tags-item">
                      <a class="post__tags-link"
                        href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode(get_permalink()); ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="Facebook">
                        <svg width="19" height="19">
                          <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#face-footer"></use>
                        </svg>
                      </a>
                    </li>
                    <li class="post__tags-item">
                      <a class="post__tags-link"
                        href="https://www.instagram.com/your_username/"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="Instagram">
                        <svg width="19" height="19">
                          <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#insta-footer"></use>
                        </svg>
                      </a>
                    </li>
                    <li class="post__tags-item">
                      <a class="post__tags-link"
                        href="https://www.twitter.com/intent/tweet?url=<?php echo rawurlencode(get_permalink()); ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="Twitter">
                        <svg width="19" height="19">
                          <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#twit-footer"></use>
                        </svg>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>

              <?php
              $commenter = wp_get_current_commenter();
              $req = get_option("require_name_email");

              $fields = [
                "author" =>
                  '<div class="post__footer-content">
		<input  class="post__footer-input" id="author" name="author" type="text" placeholder="Enter your name*' .
                  '" value="' .
                  esc_attr($commenter["comment_author"]) .
                  '" ' .
                  ($req ? "required" : "") .
                  ' >
	</div>',

                "email" =>
                  '<div class="post__footer-content">
		<input class="post__footer-input" id="email" name="email" type="email" placeholder="Enter your Email*' .
                  '" value="' .
                  esc_attr($commenter["comment_author_email"]) .
                  '" ' .
                  ($req ? "required" : "") .
                  '>
	</div>',

                "url" =>
                  '<div class="post__footer-content">
		<input class="post__footer-input" id="url" name="url" type="url" placeholder="Enter your Website" value="' .
                  esc_attr($commenter["comment_author_url"]) .
                  '">
	</div>',

                "cookies" =>
                  '<div class="post__footer-content">
		 
		 <label class="post__footer-checkbox-label" for="wp-comment-cookies-consent">
     <input class="post__footer-checkbox" id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" ' .
                  (empty($commenter["comment_author_email"]) ? "" : 'checked="checked"') .
                  '>
     <span class="post__footer-custom"></span>
     <span class="post__footer-text">Save my name, email, and website in this browser for the next time I comment</span>
     </label>
	</div>',
              ];

              $comments_args = [
                "fields" => $fields,
                "comment_field" => '<div class="post__footer-content">
                                        <textarea class="post__footer-textarea" id="comment" name="comment" placeholder="Your Comment*" required></textarea>
                                      </div>',
                "title_reply" => "Leave a reply",
                "title_reply_before" => '<h2 class="post__footer-title">',
                "title_reply_after" => "</h2>",
                "notes_before" =>
                  '<div class="post__footer-subtitle">Your email address will not be published. Required fields are marked *</div>',
                "class_container" => "post__footer",
                "submit_button" => '<button name="%1$s" type="submit" id="%2$s" class="post__footer-btn">%4$s</button>',
                "label_submit" => "post comment",
              ];

              comment_form($comments_args);
              ?>


              <div class="post__comment">
                <?php // Принудительно получаем одобренные комментарии для текущего поста
                $post_comments = get_comments([
                  "post_id" => get_the_ID(),
                  "status" => "approve",
                  "orderby" => "comment_date",
                  "order" => "ASC",
                ]); ?>
                <h2 class="post__comment-title">Comments(<?php echo count($post_comments); ?>)</h2>

                <ul class="post__comment-list d-flex flex-column">
                  <?php if (!empty($post_comments)) {
                    foreach ($post_comments as $comment) { ?>
                      <li class="post__comment-item d-flex" id="comment-<?php echo esc_attr($comment->comment_ID); ?>">
                        <div class="post__comment-avatar">
                          <?php echo get_avatar($comment, 70, "", "Avatar", ["class" => ""]); ?>
                        </div>
                        <div class="post__comment-content">
                          <div class="post__comment-info d-flex justify-between">
                            <div class="post__comment-author">
                              <h3 class="post__comment-author-title"><?php echo esc_html(
                                $comment->comment_author,
                              ); ?></h3>
                              <span class="post__comment-author-date"><?php echo mysql2date(
                                "j F, Y",
                                $comment->comment_date,
                              ); ?></span>
                            </div>
                            <div class="post__comment-reply">
                              <a class="post__comment-reply justify-between" href="<?php echo esc_url(
                                get_permalink(),
                              ); ?>?replytocom=<?php echo $comment->comment_ID; ?>#respond">
                                <svg width="16" height="14">
                                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#reply-arrow"></use>
                                </svg>
                                <span>Reply</span>
                              </a>
                            </div>
                          </div>
                          <div class="post__comment-text">
                            <?php echo wp_kses_post($comment->comment_content); ?>
                          </div>
                        </div>
                      </li>
                  <?php }
                  } else {
                    echo '<p style="color: #777; font-size: 14px; padding: 10px 0;">No comments yet.</p>';
                  } ?>
                </ul>
              </div>

            </div>
          </article>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
