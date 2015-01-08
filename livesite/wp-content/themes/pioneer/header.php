<?php
/**
 * @package Pioneer
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">

	<title>Pioneer</title>

	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/flexslider.css" type="text/css" media="screen" />
	

	<link rel="stylesheet" href="fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	<link media="all" rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/all.css">
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/style2.css" type="text/css" media="screen" />
	<link media="all" rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/responsive-css.css">
	<?php wp_head(); ?>
	
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
	<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>

	<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jquery.flexslider.js"></script>
	<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/image-scale.js"></script>
	<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/scripts.js"></script> 
	<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/main.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

	<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jquery.elevateZoom-3.0.8.min.js"></script>

	<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jcf.js"></script> 
	<?php if(!is_single()):?>
		<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jcf.checkbox.js"></script> 
	<?php endif; ?>
	<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jcf.select.js"></script> 
	<script type="text/javascript">
			jcf.lib.domReady(function(){
				jcf.customForms.replaceAll();
			});
		</script>	
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
  <!--[if lte IE 8]>
  <style>
    #header,
    .page-holder,
    #footer{
      display: none;
    }
  </style>
  <script src="<?php echo get_template_directory_uri(); ?>/js/ie6/warning.js"></script>
    <script>
      window.onload=function(){
      e("<?php echo get_template_directory_uri(); ?>/js/ie6/");
   }
  </script>
<![endif]-->

</head>

<body <?php body_class(); ?>>
<div class="wrappper">
	<span id="base-url"><?php echo esc_url( home_url( ) ); ?></span>
	<!-- BEGIN HEADER -->
		<header id="header">

			<div class="top">
				<div class="wrap">
					<ul class="top-logos">
						<li><a href="/"><img src="<?php bloginfo( 'template_url' ); ?>/images/top-logo01.png" alt=""></a></li>
						<li><a href="http://www.olympiafaucets.com/" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/top-logo02.png" alt=""></a></li>
						<li><a href="http://www.centralbrass.com/" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/top-logo03.png" alt=""></a></li>
					</ul>
					<h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo( 'template_url' ); ?>/images/logo.png" alt=""><span><?php bloginfo( 'name' ); ?></span></a></h1>
				</div>
			</div>
			<div class="bottom">
				<div class="wrap">
					<nav class="nav">
					<a href="#" class="mobile-menu-opener">menu</a>
						<?php wp_nav_menu('Header Menu'); ?>
					</nav>
					<div class="search-box">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
		</header>
	<!-- END HEADER -->



