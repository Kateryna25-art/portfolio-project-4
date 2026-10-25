<?php
/*
Template Name: Product
*/
get_header();
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
        <a class="notification__link" href="#">view cart</a>
      </div>
    </div>
    <div class="product__inner">
      <div class="product__miniature">
        <picture class="product__miniature-img">
          <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/jewerly1.avif" type="image/avif">
          <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/jewerly1.webp" type="image/webp">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/jewerly1" width="120" height="120" alt="collection jewerly">
        </picture>
        <picture class="product__miniature-img">
          <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/jewerly1.avif" type="image/avif">
          <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/jewerly1.webp" type="image/webp">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/jewerly1" width="120" height="120" alt="collection jewerly">
        </picture>
        <picture class="product__miniature-img">
          <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/jewerly1.avif" type="image/avif">
          <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/jewerly1.webp" type="image/webp">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/jewerly1" width="120" height="120" alt="collection jewerly">
        </picture>
        <picture class="product__miniature-img">
          <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/jewerly1.avif" type="image/avif">
          <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/jewerly1.webp" type="image/webp">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/jewerly1" width="120" height="120" alt="collection jewerly">
        </picture>
      </div>

      <div class="product__main-img">
        <picture class="product__main-images">
          <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/jewerly1.avif" type="image/avif">
          <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/jewerly1.webp" type="image/webp">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/jewerly1" width="540" height="600" alt="collection jewerly">
        </picture>
        <span class="product__main-divider"></span>
      </div>
      <div class="product__info">
        <h1 class="product__title">Lira Earrings</h1>
        <div class="product__price">$ 20,00</div>
        <div class="product__wrapper d-flex">
          <div class="product__rating is-loading">
            <svg width="18" height="18">
              <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star"></use>
            </svg>
            <svg width="18" height="18">
              <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star"></use>
            </svg>
            <svg width="18" height="18">
              <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star"></use>
            </svg>
            <svg width="18" height="18">
              <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star"></use>
            </svg>
            <svg width="18" height="18">
              <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star"></use>
            </svg>
          </div>
          <div class="product__count">1 customer review</div>
        </div>
        <div class="product__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat, augue a
          volutpat hendrerit, sapien tortor faucibus augue, a maximus elit ex vitae libero. Sed quis mauris eget arcu
          facilisis consequat sed eu felis.</div>
        <div class="product__action d-flex">
          <div class="product__counter is-loading">
            <button class="product__counter-btn" type="button">-</button>
            <span class="product__counter-value">1</span>
            <button class="product__counter-btn" type="button">+</button>
          </div>
          <button class="product__counter-add" type="button">add to cart</button>
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
            <span class="product__details-text">12</span>
          </div>
          <div class="product__details-row is-loading">
            <span class="product__details-name">Categories:</span>
            <span class="product__details-text">Fashion, Style</span>
          </div>
        </div>
      </div>
    </div>
    <div class="product__desktop-tabs">
      <div class="product__tabs is-loading">
        <div class="product__tabs-item"><a class="product__tabs-link--active" href="#">Description</a>
        </div>
        <div class="product__tabs-item"><a class="product__tabs-link" href="#">Aditional information</a>
        </div>
        <div class="product__tabs-item"><a class="product__tabs-link" href="#">Reviews(0)</a>
        </div>
      </div>
      <div class="product__box-page">
        <div class="product__box is-loading">
          <div class="product__box-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat,
            augue a volutpat hendrerit, sapien tortor faucibus augue, a maximus elit ex vitae libero. Sed quis mauris
            eget arcu facilisis consequat sed eu felis. Nunc sed porta augue. Morbi porta tempor odio, in molestie
            diam
            bibendum sed.</div>
        </div>
      </div>
      <div class="product__box-page">
        <div class="product__box is-loading">
          <div class="product__box-text">Weight:</div>
          <div class="product__box-count">0.3 kg</div>
        </div>
        <div class="product__box is-loading">
          <div class="product__box-text">Dimentions:</div>
          <div class="product__box-count">15 x 10 x 1 cm</div>
        </div>
        <div class="product__box is-loading">
          <div class="product__box-text">Colours:</div>
          <div class="product__box-count">Black, Browns, White</div>
        </div>
        <div class="product__box is-loading">
          <div class="product__box-text">Material:</div>
          <div class="product__box-count">Metal</div>
        </div>
      </div>
      <div class="rewiews d-flex">
        <div class="rewiews__list">
          <h3 class="rewiews__title">2 Reviews for lira earings</h3>
          <div class="rewiews__card">
            <div class="rewiews__card-block is-loading">
              <span class="rewiews__card-author">Scarlet withch</span>
              <span class="rewiews__card-date">6 May, 2020</span>
            </div>
            <div class="rewiews__card-rating is-loading">
              <svg width="20" height="20">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star"></use>
              </svg>
              <svg width="20" height="20">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star"></use>
              </svg>
              <svg width="20" height="20">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star"></use>
              </svg>
              <svg width="20" height="20">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star-white"></use>
              </svg>
              <svg width="20" height="20">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star-white"></use>
              </svg>
            </div>
            <div class="rewiews__card-info">
              <p class="rewiews__card-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                nibh euismod tincidunt ut laoreet.</p>
              <div class="rewiews__card-line"></div>
            </div>
          </div>
          <div class="rewiews__card">
            <div class="rewiews__card-block">
              <span class="rewiews__card-author">Scarlet withch</span>
              <span class="rewiews__card-date">6 May, 2020</span>
            </div>
            <div class="rewiews__card-rating">
              <svg width="20" height="20">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star"></use>
              </svg>
              <svg width="20" height="20">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star"></use>
              </svg>
              <svg width="20" height="20">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star"></use>
              </svg>
              <svg width="20" height="20">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star-white"></use>
              </svg>
              <svg width="20" height="20">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star-white"></use>
              </svg>
            </div>
            <div class="rewiews__card-info">
              <p class="rewiews__card-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                nibh euismod tincidunt ut laoreet.</p>
            </div>
          </div>
        </div>
        <div class="rewiews-form d-flex flex-column">
          <h3 class="rewiews-form__title">Add a Review</h3>
          <p class="rewiews-form__subtitle">Your email address will not be published. Required fields are marked *</p>
          <form class="rewiews-form__action" action="#" method="post">
            <div class="rewiews-form__field">
              <textarea class="rewiews-form__textarea" placeholder="Your Review*"></textarea>
            </div>
            <div class="rewiews-form__field">
              <input class="rewiews-form__input" type="text" placeholder="Enter your name*">
            </div>
            <div class="rewiews-form__field">
              <input class="rewiews-form__input" type="email" placeholder="Enter your Email*">
            </div>
          </form>
          <div class="rewiews-form__checkbox">
            <label class="rewiews-form__checkbox-label" for="">
              <input type="checkbox" class="rewiews-form__checkbox-input">
              <span class="rewiews-form__checkbox-text">Save my name, email, and website in this browser for the next
                time I comment</span>
            </label>
          </div>
          <div class="rewiews-form__rating d-flex">
            <span class="rewiews-form__rating-label">Your Rating*</span>
            <div class="rewiews-form__rating-icon d-flex">
              <svg width="20" height="20">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star-white"></use>
              </svg>
              <svg width="20" height="20">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star-white"></use>
              </svg>
              <svg width="20" height="20">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star-white"></use>
              </svg>
              <svg width="20" height="20">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star-white"></use>
              </svg>
              <svg width="20" height="20">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star-white"></use>
              </svg>
            </div>
          </div>
          <button class="rewiews-form__btn" type="submit">Submit</button>
        </div>
      </div>
    </div>
    <div class="product__mobile-accordion d-flex flex-column">
      <details class="accordion-item">
        <summary class="accordion-item__title justify-between d-flex">Description</summary>
        <div class="accordion-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat,
          augue a volutpat hendrerit, sapien tortor faucibus augue, a maximus elit ex vitae libero. Sed quis mauris
          eget arcu facilisis consequat sed eu felis. Nunc sed porta augue. Morbi porta tempor odio, in molestie diam
          bibendum sed.</div>
      </details>
      <details class="accordion-item">
        <summary class="accordion-item__title justify-between d-flex">Aditional information</summary>
        <div class="accordion-content">
          <div class="product__box">
            <div class="product__box-text">Weight</div>
            <div class="product__box-count">0.3 kg</div>
          </div>
          <div class="product__box">
            <div class="product__box-text">Dimentions</div>
            <div class="product__box-count">15 x 10 x 1 cm</div>
          </div>
          <div class="product__box">
            <div class="product__box-text">Colours: </div>
            <div class="product__box-count"> Black, Browns, White</div>
          </div>
          <div class="product__box">
            <div class="product__box-text">Material</div>
            <div class="product__box-count">Metal</div>
          </div>
        </div>
      </details>
      <details class="accordion-item">
        <summary class="accordion-item__title justify-between d-flex">Reviews(0)</summary>
        <div class="rewiews">
          <div class="rewiews__list">
            <h3 class="rewiews__title">2 Reviews for lira earings</h3>
            <div class="rewiews__card">
              <div class="rewiews__card-block">
                <span class="rewiews__card-author">Scarlet withch</span>
                <span class="rewiews__card-date">6 May, 2020</span>
              </div>
              <div class="rewiews__card-rating">
                <svg width="20" height="20">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star"></use>
                </svg>
                <svg width="20" height="20">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star"></use>
                </svg>
                <svg width="20" height="20">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star"></use>
                </svg>
                <svg width="20" height="20">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star-white"></use>
                </svg>
                <svg width="20" height="20">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star-white"></use>
                </svg>
              </div>
              <div class="rewiews__card-info">
                <p class="rewiews__card-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                  nonummy
                  nibh euismod tincidunt ut laoreet.</p>
                <div class="rewiews__card-line"></div>
              </div>
            </div>
            <div class="rewiews__card">
              <div class="rewiews__card-block">
                <span class="rewiews__card-author">Scarlet withch</span>
                <span class="rewiews__card-date">6 May, 2020</span>
              </div>
              <div class="rewiews__card-rating">
                <svg width="20" height="20">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star"></use>
                </svg>
                <svg width="20" height="20">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star"></use>
                </svg>
                <svg width="20" height="20">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star"></use>
                </svg>
                <svg width="20" height="20">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star-white"></use>
                </svg>
                <svg width="20" height="20">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star-white"></use>
                </svg>
              </div>
              <div class="rewiews__card-info">
                <p class="rewiews__card-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                  nonummy
                  nibh euismod tincidunt ut laoreet.</p>
              </div>
            </div>
          </div>
          <div class="rewiews-form d-flex flex-column">
            <h3 class="rewiews-form__title">Add a Review</h3>
            <p class="rewiews-form__subtitle">Your email address will not be published. Required fields are marked *
            </p>
            <form class="rewiews-form__action" action="#" method="post">
              <div class="rewiews-form__field">
                <textarea class="rewiews-form__textarea" placeholder="Your Review*"></textarea>
              </div>
              <div class="rewiews-form__field">
                <input class="rewiews-form__input" type="text" placeholder="Enter your name*">
              </div>
              <div class="rewiews-form__field">
                <input class="rewiews-form__input" type="email" placeholder="Enter your Email*">
              </div>
            </form>
            <div class="rewiews-form__checkbox">
              <label class="rewiews-form__checkbox-label" for="">
                <input type="checkbox" class="rewiews-form__checkbox-input">
                <span class="rewiews-form__checkbox-text">Save my name, email, and website in this browser for the
                  next
                  time I comment</span>
              </label>
            </div>
            <div class="rewiews-form__rating flex-column">
              <span class="rewiews-form__rating-label">Your Rating*</span>
              <div class="rewiews-form__rating-icon">
                <svg width="20" height="20">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star-white"></use>
                </svg>
                <svg width="20" height="20">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star-white"></use>
                </svg>
                <svg width="20" height="20">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star-white"></use>
                </svg>
                <svg width="20" height="20">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star-white"></use>
                </svg>
                <svg width="20" height="20">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#star-white"></use>
                </svg>
              </div>
            </div>
            <button class="rewiews-form__btn" type="submit">Submit</button>
          </div>
        </div>
      </details>
    </div>
    <div class="product__similar">
      <h2 class="product__similar-title">Similar Items</h2>
      <div class="product__similar-box is-loading justify-between">
        <div class="product__similar-item">
          <picture class="product__similar-img">
            <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/jewerly2.avif" type="image/avif">
            <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/jewerly2.webp" type="image/webp">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/jewerly2.jpg" width="380" height="380" alt="collection jewerly">
          </picture>
          <div class="product__similar-text">Ollie Earrings</div>
          <div class="product__similar-price">$ 30,00</div>
        </div>
        <div class="product__similar-item">
          <picture class="product__similar-img">
            <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/jewerly5.avif" type="image/avif">
            <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/jewerly5.webp" type="image/webp">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/jewerly5.jpg" width="380" height="380" alt="collection jewerly">
          </picture>
          <div class="product__similar-text">Hal Earrings</div>
          <div class="product__similar-price">$ 25,00</div>
        </div>
        <div class="product__similar-item">
          <picture class="product__similar-img">
            <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/jewerly4.avif" type="image/avif">
            <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/jewerly4.webp" type="image/webp">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/jewerly4.jpg" width="380" height="380" alt="collection jewerly">
          </picture>
          <div class="product__similar-text">Kaede Hair Pin Set Of 3</div>
          <div class="product__similar-price">$ 30,00</div>
        </div>
      </div>
    </div>
  </div>
</section>
</main>
<?php get_footer(); ?>