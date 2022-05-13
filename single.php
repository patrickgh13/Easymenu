<?php get_header();the_post(); ?>
  <section  id="about-page">
	  <div class="top-cover">
		<img class="cover-img" src="<?php echo get_template_directory_uri();?>/imgs/extra/blog/Group 139.jpg" alt="ثبت شرکت نستوه">
		<div class="cover-text">
		  <h1><?php echo get_the_title($article->ID) ?></h1>
		</div>
		<nav aria-label="You are here:" role="navigation" class="cover-breadcrumb">
		  <ul class="breadcrumbs">
			<li>درباره ما</li>
			<li><a href="#">نستوه</a></li>
		  </ul>
		</nav>
	  </div>
    <div class="section">
  <?php $my_postid = 85;//This is page id or post id
$content_post = get_post($my_postid);
$content = $content_post->post_content;?>
  <div class="grid-container">
    <div class="grid-x about-section" data-equalizer data-equalize-on="medium" id="test-eq">
      <div class="cell medium-6 small-12">
        <img src="<?php echo get_template_directory_uri();?>/imgs/extra/about-photo.jpg" alt="درباره نستوه" data-equalizer-watch>
      </div>
      <div class="cell medium-6 small-12">
       <div class="about-desc" data-equalizer-watch>
         <div dir="rtl" class="desc">
          <?php echo  get_the_title(85); ?>
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
