<?php
/*
Template Name: Our Story Template
*/
get_header();
?>
<main class="main">
  <section class="about">
    <div class="container-small">
      <div class="about__inner">
        <h1 class="about__title"><?php echo esc_html(get_field('our_story_title')); ?></h1>
        <div class="about__subtitle"><?php echo esc_html(get_field('our_story_subtitle')); ?></div>
        <div class="about__text"><?php echo esc_html(get_field('our_story_text')); ?></div>
        <div class="about__content">
          <h2 class="about__content-title"><?php echo esc_html(get_field('our_story_section_title')); ?></h2>
          <img src="<?php echo esc_url(get_field('our_story_section_img_1')); ?>" alt="Top trends">
          <p class="about__content-text"><?php echo esc_html(get_field('our_story_section_text_1')); ?></p>
          <ul class="about__content-list d-flex flex-column">
            <li class="about__content-item"><?php echo esc_html(get_field('our_story_section_item_1')); ?></li>
            <li class="about__content-item"><?php echo esc_html(get_field('our_story_section_item_2')); ?></li>
          </ul>
        </div>
        <div class="about__content">
          <h2 class="about__content-title"><?php echo esc_html(get_field('our_story_section_title_2')); ?></h2>
          <img src="<?php echo esc_url(get_field('our_story_section_image_2')); ?>" alt="Produced with care">
          <p class="about__content-text"><?php echo esc_html(get_field('our_story_section_text_2')); ?>
          </p>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>