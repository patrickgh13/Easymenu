<?php global $menu_Theme; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="canonical" href="<?php bloginfo('wpurl'); ?>" />
    <title><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <?php wp_head(); ?>

	<style>
		body{
			background-color: <?php echo $menu_Theme['opt-color-body'] ?>;
		}
		footer{
			background-color: <?php echo $menu_Theme['opt-color-footer'] ?>;
		}
	</style>
</head>
	
<body <?php body_class(); ?>>
  <header>
    <?php
    require_once('top.php');
    ?>
  </header>
