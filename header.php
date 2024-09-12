<?php
/**
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <div id="content">
 */
?><!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
<meta charset="<?php bloginfo('charset');?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url');?>">
<!-- Favicons
    ================================================== -->
<link rel="shortcut icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/images/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url(get_template_directory_uri()); ?>/images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url(get_template_directory_uri()); ?>/images/apple-touch-icon-114x114.png">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/html5shiv.min.js"></script>
      <script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/respond.min.js"></script>
    <![endif]-->
<title><?php wp_title('-', true, 'right');?></title>
<?php wp_head();?>
</head>
<body <?php body_class();?>>
<div id="preloader">
  <div id="status"> <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/preloader.gif" height="64" width="64" alt=""> </div>
</div>
<!-- Navigation
    ==========================================-->
<nav id="menu" class="navbar navbar-default navbar-fixed-top <?=(!is_front_page() ? 'inner' : '')?>">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><i class="fa fa-code"></i> Precise<strong></strong></a> </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <?php

if (is_front_page()) {
	wp_nav_menu(array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right', 'fallback_cb' => 'precise_wp_page_menu'));
} else {
	wp_nav_menu(array('theme_location' => 'secondary', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right', 'fallback_cb' => 'precise_wp_page_menu'));
}
?>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>