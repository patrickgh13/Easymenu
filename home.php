<?php
/*
Template Name: home
*/
?>
<?php get_header();the_post(); ?>
  <section>
      <div class="grid-x">
        <div class="cell large-12 small-12">
          <div class="home-slider">
            <?php echo do_shortcode('[metaslider id="99"]'); ?>
          </div>
        </div>
      </div>
	  <?php
			$about_page = get_post(47); 
			$about_excerpt = $about_page->post_excerpt;	
	 		$about_title = get_the_title( $about_page );
	  		$about_permalink = get_permalink( $about_page );
	  if (has_post_thumbnail( $about_page ) ):
		  $about_image = wp_get_attachment_image_src( get_post_thumbnail_id( $about_page ), 'single-post-thumbnail' ); ?>		  
	  <?php endif; ?>
      <div class="grid-x grid-container about_section">
        <div class="cell large-6 small-12 about_desc text-left">
			<h2><?=$about_title?></h2>
			<p><?=$about_excerpt?></p>
			<a href="<?=$about_permalink?>">read more</a>
        </div>
		<div class="cell large-6 small-12 about_image">
			<div class="image_holder"><img src="<?= $about_image[0]?>"></div>
		</div>
      </div>
      <div class="grid-x grid-container">
        <div class="cell large-12 small-12">
          <div class="instagram-section">
            <?php echo do_shortcode('[instagram-feed]'); ?>
          </div>
        </div>
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