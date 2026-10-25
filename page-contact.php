<?php
/*
Template Name: Contact
*/
get_header();
?>
<main class="main">
  <section class="contact">
    <div class="container">
      <div class="contact__inner">
        <h1 class="contact__title">
          <?php echo get_field('contact_title'); ?>
        </h1>
        <div class="contact__wrapper">
          <p class="contact__text">
            <?php echo get_field('contact_text'); ?>
          </p>
        </div>
        <div class="contact-form d-flex justify-between">
          <?php echo do_shortcode('[contact-form-7 id="c0edd07" title="Contact Us"]'); ?>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>