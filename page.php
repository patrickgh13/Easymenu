<?php get_header();the_post(); ?>
  <section>
    <div class="grid-container">
      <div class="grid-x">
        <div class="cell medium-12">
          <h1 class="page-title"><?php the_title();?></h1>
        </div>
        <div class="cell large-3"></div>
        <div class="cell large-6 medium-12 small-12">
          <div class="content">
            <div class="text"><?php the_content();?></div>
          </div>
        </div>
        <div class="cell large-3"></div>
      </div>
    </div>
  </section>
<?php get_footer(); ?>
