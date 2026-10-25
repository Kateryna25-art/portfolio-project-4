<?php

get_header(); ?>
<main class="main">

  <section class="blog">
    <div class="container">
      <h1 class="blog__title"><?php single_cat_title(); ?></h1>
      <div class="blog__inner d-flex justify-between">
        <aside class="blog__sidebar">
          <div class="blog__categories">
            <h2 class="blog__categories-title">Categories</h2>
            <ul class="blog__categories-list d-flex flex-column">
              <?php
              $categories = get_categories();
              foreach ($categories as $category) {
                echo '<li class="blog__categories-item">';
                echo '<a class="blog__categories-link" href="' .
                  esc_url(get_category_link($category->term_id)) .
                  '">' .
                  esc_html($category->name) .
                  "</a>";
                echo "</li>";
              }
              ?>
            </ul>
          </div>
        </aside>
        <div class="blog__wrapper">
          <?php if (have_posts()): ?>
            <?php while (have_posts()):
              the_post(); ?>

              <article class="blog__box">
                <a class="blog__box-link" href="<?php the_permalink(); ?>">
                  <picture class="blog__box-img">
                    <?php if (has_post_thumbnail()): ?>
                      <?php the_post_thumbnail("medium", [
                        "width" => 450,
                        "height" => 300,
                        "alt" => get_the_title(),
                      ]); ?>
                    <?php else: ?>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog1.jpg" width="450" height="300"
                        alt="<?php the_title(); ?>">
                    <?php endif; ?>
                  </picture>
                </a>
                <div class="blog__content">
                  <span class="blog__content-date"> <?php echo get_the_category()[0]->name ??
                    "Fashion"; ?> - <?php the_time("F j,Y"); ?></span>
                  <h3 class="blog__content-title"><?php the_title(); ?></h3>
                  <p class="blog__content-text"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                  <a class="blog__content-link" href="<?php the_permalink(); ?>">Read More</a>
                </div>
              </article>
            <?php
            endwhile; ?>
          <?php else: ?>
            <p>No posts in this category</p>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
