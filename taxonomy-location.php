<?php get_header(); ?>
<?php $tax = get_queried_object(); ?>
  <section>
    <div class="grid-container p2">
      <div class="grid-x location-cover" style="background-image: url(<?php the_field('cover',$tax); ?>)">
        <div class="cell text-center">
          <div class="shadow"></div>
          <h1><?=$tax->name?></h1>
        </div>
      </div>
      <div class="grid-x location-text">
        <div class="cell small-2 large-4">
          <img src="<?php the_field('logo',$tax); ?>" alt="<?=$tax->name?>">
        </div>
        <div class="cell small-10 large-8">
          <div class="grid-x">
            <div class="cell large-10">
              <h2 class="name"><?=$tax->name?></h2>
              <div class="text">
                <?=$tax->description?>
              </div>
            </div>
            <div class="cell large-10">
              <h2><?php pll_e('AREAS OF EXPERTISE'); ?></h2>
              <div class="text">
                <?php the_field('areas_of_expertise',$tax); ?>
              </div>
            </div>
            <div class="cell large-10">
              <h2><?php pll_e('MUST SEE'); ?></h2>
              <div class="gallery">
                <?php the_field('must_see',$tax); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php get_footer(); ?>