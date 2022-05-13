<?php
/*
Template Name: top
*/
?>
<?php global $menu_Theme ?>
      <div class="header">
        <div class="grid-x grid-container">
          <div class="cell large-5 medium-6 small-6">
            <div class="logo">
              <a href="<?=home_url();?>">
                <?php $url = wp_get_attachment_url( get_post_thumbnail_id(44) );?>
<!--                 	<img src="<?php echo $url; ?>"/> -->
				  <img src="<?php echo $menu_Theme['opt-logo']['thumbnail']?>"/> 
				  
				<h1 class="show-for-large"><?= bloginfo('name'); ?></h1>
              </a>
            </div>
		  </div>
          <div class="cell large-7 medium-6 small-6 align-self-middle">
            <div class="menu show-for-large">
				<?php wp_nav_menu(array( 'menu' => 'header-menu')); ?>
			</div>
			<div class="burger hide-for-large">
				<span></span>
				<span></span>
				<span></span>
			</div>
			<div id="mob-menu" class="hide-for-large">
				<?php wp_nav_menu(array( 'menu' => 'header-menu')); ?>
			</div>
          </div>
        </div>
      </div>
