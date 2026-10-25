<?php
/*
Template Name: Blog Template
*/
get_header(); ?>
<main class="main">

  <section class="blog">
    <div class="container">
      <h1 class="blog__title">Blog</h1>
      <div class="blog__inner d-flex justify-between">
        <aside class="blog__sidebar">
          <search class="blog__search">
            <form class="blog__form d-flex" action="#" method="get">
              <input class="blog__form-input" type="search" name="search" placeholder="Search...">
              <button class="blog__form-btn is-loading">
                <svg width="19" height="19">
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#search"></use>
                </svg>
              </button>
            </form>
          </search>
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
          <?php
          $paged = get_query_var("paged") ? get_query_var("paged") : 1;
          $blog_query = new WP_Query([
            "post_type" => "post",
            "posts_per_page" => 2,
            "paged" => $paged,
          ]);
          ?>
          <?php if ($blog_query->have_posts()): ?>
            <?php while ($blog_query->have_posts()):
              $blog_query->the_post(); ?>
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
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog1.jpg" width="450" height="300" alt="<?php the_title(); ?>">
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
            <p>No post</p>
          <?php endif; ?>

          <?php
          $total_pages = $blog_query->max_num_pages;

          if ($total_pages > 1):
            $links = paginate_links([
              "total" => $total_pages,
              "current" => $paged,
              "prev_next" => false,
              "type" => "array",
            ]); ?>

            <nav class="blog__pagination d-flex" aria-label="Blog Pagination">
              <ul class="blog__pagination-list d-flex">
                <?php foreach ($links as $link): ?>
                  <?php
                  $link = str_replace("page-numbers", "blog__pagination-link", $link);
                  $link = str_replace("current", "blog__pagination-link--active", $link);
                  ?>
                  <li class="blog__pagination-item"><?php echo $link; ?></li>
                <?php endforeach; ?>

              </ul>
            </nav>
          <?php
          endif;
          ?>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
