<?php
/*
Template Name: contact
*/
?>
<?php get_header();the_post(); ?>
  <section id="contact">
      <div class="grid-x">
		  <div class="cell large-2"></div>
        <div class="cell large-8 small-12 text-center">
          <h3 class="page-title"><?php the_title();?></h3>
        </div>
		<div class="cell large-2"></div>
      </div>
      <div class="grid-x">
		  <div class="cell large-3"></div>
        <div class="cell large-6 medium-12 small-12">
          <div class="content">
            <div class="text"><?php the_content();?></div>
          </div>
        </div>
        <div class="cell large-3"></div>
	  </div>
      <div class="grid-x">
		  <div class="cell large-3"></div>
        <div class="cell large-6 medium-12 small-12">
          <div class="map-section">
            <?php echo do_shortcode('[contact-form-7 id="444" title="Contact form 1"]'); ?>
          </div>
        </div>
		  <div class="cell large-3"></div>
      </div>
      <div class="grid-x">
        <div class="cell large-12 small-12">
          <div class="map-section">
            <?php echo do_shortcode('[wpgmza id="1"]'); ?>
          </div>
        </div>
      </div>
  </section>
  <?php
      get_footer();
  ?>
