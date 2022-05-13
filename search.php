<?php get_header(); ?>

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
  </section>
<?php get_footer(); ?>
