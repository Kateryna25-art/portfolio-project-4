  <div class="footer__sub">
    <div class="container">
      <h2 class="footer__sub-title"><?php echo esc_html(get_field("subfooter_title")); ?></h2>
      <div class="footer__sub-grid d-flex">
        <a class="footer__sub-item"
          href="<?php echo esc_url(get_field("instagram_link_1")); ?>"
          aria-label="View post on Instagram" target="_blank" rel="noopener noreferrer">
          <img
            src="<?php echo esc_url(get_field("instagram_image_1")); ?>"
            width="200"
            height="200"
            alt="Jewerly collection">
          <div class="footer__sub-overlay">
            <span class="footer__sub-stat">
              <svg width="19" height="19">
                <use xlink:href="<?php echo esc_url(
                                    get_template_directory_uri() . "/assets/images/sprite.svg#heart",
                                  ); ?>"></use>
              </svg>
              <?php echo esc_html(
                number_format((int) get_field("instagram_likes_1"), 0, ".", ","),
              ); ?>
            </span>
            <span class="footer__sub-stat d-flex">
              <svg width="19" height="19">
                <use xlink:href="<?php echo esc_url(
                                    get_template_directory_uri() . "/assets/images/sprite.svg#comment",
                                  ); ?>"></use>
              </svg>
              <?php echo esc_html(
                number_format((int) get_field("instagram_comments_1"), 0, ".", ","),
              ); ?>
            </span>
          </div>
        </a>
        <a class="footer__sub-item"
          href="<?php echo esc_url(get_field("instagram_link_2")); ?>"
          aria-label="View post on Instagram" target="_blank" rel="noopener noreferrer">
          <img
            src="<?php echo esc_url(get_field("instagram_image_2")); ?>"
            width="200"
            height="200"
            alt="Jewerly collection">
          <div class="footer__sub-overlay">
            <span class="footer__sub-stat">
              <svg width="19" height="19">
                <use xlink:href="<?php echo esc_url(
                                    get_template_directory_uri() . "/assets/images/sprite.svg#heart",
                                  ); ?>"></use>
              </svg>
              <?php echo esc_html(
                number_format((int) get_field("instagram_likes_2"), 0, ".", ","),
              ); ?>
            </span>
            <span class="footer__sub-stat">
              <svg width="19" height="19">
                <use xlink:href="<?php echo esc_url(
                                    get_template_directory_uri() . "/assets/images/sprite.svg#comment",
                                  ); ?>"></use>
              </svg>
              <?php echo esc_html(
                number_format((int) get_field("instagram_comments_2"), 0, ".", ","),
              ); ?>
            </span>
          </div>
        </a>
        <a class="footer__sub-item"
          href="<?php echo esc_url(get_field("instagram_link_3")); ?>"
          aria-label="View post on Instagram" target="_blank" rel="noopener noreferrer">
          <img
            src="<?php echo esc_url(get_field("instagram_image_3")); ?>"
            width="200"
            height="200"
            alt="Jewerly collection">
          <div class="footer__sub-overlay">
            <span class="footer__sub-stat">
              <svg width="19" height="19">
                <use xlink:href="<?php echo esc_url(
                                    get_template_directory_uri() . "/assets/images/sprite.svg#heart",
                                  ); ?>"></use>
              </svg>
              <?php echo esc_html(
                number_format((int) get_field("instagram_likes_3"), 0, ".", ","),
              ); ?>
            </span>
            <span class="footer__sub-stat">
              <svg width="19" height="19">
                <use xlink:href="<?php echo esc_url(
                                    get_template_directory_uri() . "/assets/images/sprite.svg#comment",
                                  ); ?>"></use>
              </svg>
              <?php echo esc_html(
                number_format((int) get_field("instagram_comments_3"), 0, ".", ","),
              ); ?>
            </span>
          </div>
        </a>
        <a class="footer__sub-item"
          href="<?php echo esc_url(get_field("instagram_link_4")); ?>"
          aria-label="View post on Instagram" target="_blank" rel="noopener noreferrer">
          <img
            src="<?php echo esc_url(get_field("instagram_image_4")); ?>"
            width="200"
            height="200"
            alt="Jewerly collection">
          <div class="footer__sub-overlay">
            <span class="footer__sub-stat">
              <svg width="19" height="19">
                <use xlink:href="<?php echo esc_url(
                                    get_template_directory_uri() . "/assets/images/sprite.svg#heart",
                                  ); ?>"></use>
              </svg>
              <?php echo esc_html(
                number_format((int) get_field("instagram_likes_4"), 0, ".", ","),
              ); ?>
            </span>
            <span class="footer__sub-stat">
              <svg width="19" height="19">
                <use xlink:href="<?php echo esc_url(
                                    get_template_directory_uri() . "/assets/images/sprite.svg#comment",
                                  ); ?>"></use>
              </svg>
              <?php echo esc_html(
                number_format((int) get_field("instagram_comments_4"), 0, ".", ","),
              ); ?>
            </span>
          </div>
        </a>
        <a class="footer__sub-item"
          href="<?php echo esc_url(get_field("instagram_link_5")); ?>"
          aria-label="View post on Instagram" target="_blank" rel="noopener noreferrer">
          <img
            src="<?php echo esc_url(get_field("instagram_image_5")); ?>"
            width="200"
            height="200"
            alt="Jewerly collection">
          <div class="footer__sub-overlay">
            <span class="footer__sub-stat">
              <svg width="19" height="19">
                <use xlink:href="<?php echo esc_url(
                                    get_template_directory_uri() . "/assets/images/sprite.svg#heart",
                                  ); ?>"></use>
              </svg>
              <?php echo esc_html(
                number_format((int) get_field("instagram_likes_5"), 0, ".", ","),
              ); ?>
            </span>
            <span class="footer__sub-stat">
              <svg width="19" height="19">
                <use xlink:href="<?php echo esc_url(
                                    get_template_directory_uri() . "/assets/images/sprite.svg#comment",
                                  ); ?>"></use>
              </svg>
              <?php echo esc_html(
                number_format((int) get_field("instagram_comments_5"), 0, ".", ","),
              ); ?>
            </span>
          </div>
        </a>
      </div>
    </div>
  </div>