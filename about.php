<?php
/*
Template Name: About
*/
?>
<?php get_header();the_post(); ?>
<section>
  <div class="section" id="about">
    <?php $my_postid = 47;//This is page id or post id
  $content_post = get_post($my_postid);
  $content = $content_post->post_content;?>
    <div class="grid-container">
      <div class="grid-x about-section">
        <div class="cell large-12 small-12">
         <div class="about-desc">
           <div dir="rtl" class="desc">
            <?php echo  get_the_title(47); ?>
            <div class="text">
              <?php echo $content;?>
            </div>
           </div>
         </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
