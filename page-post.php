<?php
/*
Template Name: Post
*/
get_header();
?>
<main class="main">
  <section class="post">
    <div class="container">
      <div class="post__inner d-flex">
        <aside class="post__sidebar">
          <search class="post__search">
            <form class="post__form d-flex" action="#" method="get">
              <input class="post__form-input" type="search" name="search" placeholder="Search...">
              <button class="post__form-btn">
                <svg width="19" height="19">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#search"></use>
                </svg>
              </button>
            </form>
          </search>
          <div class="post__categories">
            <h2 class="post__categories-title">Categories</h2>
            <ul class="post__categories-list d-flex flex-column">
              <li class="post__categories-item"><a class="post__categories-link" href="#">Fashion</a>
              </li>
              <li class="post__categories-item"><a class="post__categories-link" href="#">Style</a>
              </li>
              <li class="post__categories-item"><a class="post__categories-link" href="#">Accessories</a>
              </li>
              <li class="post__categories-item"><a class="post__categories-link" href="#">Season</a>
              </li>
            </ul>
          </div>
        </aside>
        <div class="post__wrapper">
          <article class="post__article">
            <h1 class="post__title">Fast Fashion, And Faster Fashion</h1>
            <div class="post__meta d-flex">
              <span class="post__prefix">by</span>
              <span class="post__name">anna johnson</span>
              <span class="post__date">- October 8,2020</span>
            </div>
            <div class="post__slider swiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <picture>
                    <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/post1.avif" type="image/avif">
                    <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/post1.webp" type="image/webp">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/post1.jpg" width="947" height="489" alt="collection jewerly">
                  </picture>
                </div>
                <div class="swiper-slide">
                  <picture>
                    <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/post1.avif" type="image/avif">
                    <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/post1.webp" type="image/webp">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/post1.jpg" width="947" height="489" alt="collection jewerly">
                  </picture>
                </div>
                <div class="swiper-slide">
                  <picture>
                    <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/post1.avif" type="image/avif">
                    <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/post1.webp" type="image/webp">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/post1.jpg" width="947" height="489" alt="collection jewerly">
                  </picture>
                </div>
                <div class="swiper-slide">
                  <picture>
                    <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/post1.avif" type="image/avif">
                    <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/post1.webp" type="image/webp">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/post1.jpg" width="947" height="489" alt="collection jewerly">
                  </picture>
                </div>
                <div class="swiper-slide">
                  <picture>
                    <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/post1.avif" type="image/avif">
                    <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/post1.webp" type="image/webp">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/post1.jpg" width="947" height="489" alt="collection jewerly">
                  </picture>
                </div>
                <div class="swiper-slide">
                  <picture>
                    <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/post1.avif" type="image/avif">
                    <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/post1.webp" type="image/webp">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/post1.jpg" width="947" height="489" alt="collection jewerly">
                  </picture>
                </div>
              </div>
              <div class="swiper-pagination is-loading"></div>
            </div>
            <div class="post__box-narrow container-small">
              <div class="post__box">
                <p class="post__box-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat,
                  augue
                  a
                  volutpat hendrerit, sapien tortor faucibus augue, a maximus elit ex vitae libero. Sed quis mauris eget
                  arcu facilisis consequat sed eu felis. Nunc sed porta augue.</p>
                <p class="post__box-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat,
                  augue
                  a
                  volutpat hendrerit, sapien tortor faucibus augue, a maximus elit ex vitae libero. Sed quis mauris eget
                  arcu facilisis consequat sed eu felis.</p>
              </div>
              <div class="post__box">
                <picture>
                  <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/post2.avif" type="image/avif">
                  <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/post2.webp" type="image/webp">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/post2.jpg" width="670" height="300" alt="collection jewerly">
                </picture>
                <h2 class="post__box-title">Top trends</h2>

                <p class="post__box-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat,
                  augue a volutpat hendrerit, sapien tortor faucibus augue, a maximus elit ex vitae libero.</p>
                <ul class="post__box-list">
                  <li class="post__box-item">consectetur adipiscing elit. Aliquam placerat</li>
                  <li class="post__box-item">Lorem ipsum dolor sit amet consectetur</li>
                  <li class="post__box-item"> sapien tortor faucibus augue</li>
                  <li class="post__box-item">a maximus elit ex vitae libero. Sed quis mauris eget arcu facilisis</li>
                </ul>
              </div>
              <div class="post__bottom is-loading">
                <div class="post__tags d-flex">
                  <span class="post__tags-title">Tags</span>
                  <ul class="post__tags-list">
                    <li class="post__tags-item">Fashion,</li>
                    <li class="post__tags-item">Style,</li>
                    <li class="post__tags-item">Season</li>
                  </ul>
                </div>
                <div class="post__tags d-flex">
                  <span class="post__tags-title">Share</span>
                  <ul class="post__tags-list post__tags-icon d-flex">
                    <li class="post__tags-item">
                      <a class="post__tags-link" href="#">
                        <svg width="19" height="19">
                          <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#face-footer"></use>
                        </svg>
                      </a>
                    </li>
                    <li class="post__tags-item">
                      <a class="post__tags-link" href="#">
                        <svg width="19" height="19">
                          <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#insta-footer"></use>
                        </svg>
                      </a>
                    </li>
                    <li class="post__tags-item">
                      <a class="post__tags-link" href="#">
                        <svg width="19" height="19">
                          <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#twit-footer"></use>
                        </svg>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="post__footer">
                <h2 class="post__footer-title">Leave a reply</h2>
                <div class="post__footer-subtitle">Your email address will not be published. Required fields are marked
                  *</div>
                <div class="post__footer-content">
                  <input class="post__footer-input" type="text" placeholder="Enter your name*">
                </div>
                <div class="post__footer-content">
                  <input class="post__footer-input" type="text" placeholder="Enter your Email*">
                </div>
                <div class="post__footer-content">
                  <input class="post__footer-input" type="text" placeholder="Enter your Website">
                </div>
                <div class="post__footer-content">
                  <label class="post__footer-checkbox-label" for="save-user">
                    <input class="post__footer-checkbox" type="checkbox" id="save-user">
                    <span class="post__footer-custom"></span>
                    <span class="post__footer-text">Save my name, email, and website in this browser for the next time I
                      comment</span>
                  </label>
                </div>
                <div class="post__footer-content">
                  <textarea class="post__footer-textarea" name="comment" placeholder="Your Comment*"
                    required></textarea>
                </div>
                <button class="post__footer-btn">post comment</button>
              </div>
              <div class="post__comment">
                <h2 class="post__comment-title">Comments(3)</h2>
                <ul class="post__comment-list d-flex flex-column">
                  <li class="post__comment-item d-flex">
                    <div class="post__comment-avatar">
                      <picture>
                        <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/avatar1.avif" type="image/avif">
                        <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/avatar1.webp" type="image/webp">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/avatar1.jpg" width="70" height="70" alt="collection jewerly">
                      </picture>
                    </div>
                    <div class="post__comment-content">
                      <div class="post__comment-info d-flex justify-between">
                        <div class="post__comment-author is-loading">
                          <h3 class="post__comment-author-title">Scarlet withch</h3>
                          <span class="post__comment-author-date">6 May, 2020</span>
                        </div>
                        <a class="post__comment-reply justify-between" href="#">
                          <svg width="16" height="14">
                            <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#reply-arrow"></use>
                          </svg>
                          <span>Reply</span>
                        </a>
                      </div>
                      <p class="post__comment-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                        nonummy nibh euismod tincidunt ut laoreet.</p>
                    </div>
                  </li>
                  <li class="post__comment-item post__comment-item--reply d-flex">
                    <div class="post__comment-avatar">
                      <picture>
                        <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/avatar2.avif" type="image/avif">
                        <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/avatar2.webp" type="image/webp">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/avatar2.jpg" width="70" height="70" alt="collection jewerly">
                      </picture>
                    </div>
                    <div class="post__comment-content">
                      <div class="post__comment-info d-flex justify-between">
                        <div class="post__comment-author is-loading">
                          <h3 class="post__comment-author-title">Kate moss</h3>
                          <span class="post__comment-author-date">6 May, 2020</span>
                        </div>
                        <a class="post__comment-reply justify-between" href="#">
                          <svg width="16" height="14">
                            <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#reply-arrow"></use>
                          </svg>
                          <span>Reply</span>
                        </a>
                      </div>
                      <p class="post__comment-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                        nonummy nibh euismod tincidunt ut laoreet.</p>
                    </div>
                  </li>
                  <li class="post__comment-item d-flex">
                    <div class="post__comment-avatar">
                      <picture>
                        <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/avatar1.avif" type="image/avif">
                        <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/avatar1.webp" type="image/webp">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/avatar1.jpg" width="70" height="70" alt="collection jewerly">
                      </picture>
                    </div>
                    <div class="post__comment-content">
                      <div class="post__comment-info d-flex justify-between">
                        <div class="post__comment-author is-loading">
                          <h3 class="post__comment-author-title">Scarlet withch</h3>
                          <span class="post__comment-author-date">6 May, 2020</span>
                        </div>
                        <a class="post__comment-reply justify-between" href="#">
                          <svg width="16" height="14">
                            <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#reply-arrow"></use>
                          </svg>
                          <span>Reply</span>
                        </a>
                      </div>
                      <p class="post__comment-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                        nonummy nibh euismod tincidunt ut laoreet.</p>
                    </div>
                  </li>
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