<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Catch Themes
 * @subpackage Catch_Box
 * @since Catch Box 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_uri(); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="apple-touch-icon" href="/apple-touch-icon.png"/>
<?php
	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed">
	<header id="branding" role="banner">
		<hgroup style="background:url(<?php header_image(); ?>);">
    	<?php
				// Check to see if the header image has been removed
				$header_image = get_header_image();
				if ( ! empty( $header_image ) ) :
			?>
			<div id="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"></a></div>
			<?php endif; // end check for removed header image ?>
      	<div id="site-details">            
					<h1 id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><span><?php bloginfo( 'name' ); ?></span></a></h1>
					<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
        </div>
		</hgroup>
		<?php 
			// Check to see if header search has been disable
			$options = catchbox_get_theme_options();
			if ( $options ['disable_header_search'] == 0 ) :
				get_search_form();
            endif;  ?>
	</header><!-- #branding -->

	<div id="main" class="clearfix">
		<nav id="access" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Primary menu', 'catchbox' ); ?></h3>
			<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
			<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'catchbox' ); ?>"><?php _e( 'Skip to primary content', 'catchbox' ); ?></a></div>
			<div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'catchbox' ); ?>"><?php _e( 'Skip to secondary content', 'catchbox' ); ?></a></div>
			<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assiged to the primary position is the one used. If none is assigned, the menu with the lowest ID is used. */ ?>
      <?php if ( has_nav_menu( 'primary', 'catchbox' ) ) { 
					wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'menu-header-container' ) );
				} else { ?>
      <div class="menu-header-container">
				<?php wp_page_menu( array( 'menu_class'  => 'menu' ) ); ?>
      </div>
			<?php
                } ?>   
		</nav><!-- #access -->

		<?php if ( has_nav_menu( 'secondary', 'catchbox' ) ) { 
				// Check is seconday menu is enable or not
				$options = catchbox_get_theme_options();
				if ( !empty ($options ['enable_menus'] ) ) :
					$menuclass = "mobile-enable";
				else :
					$menuclass = "mobile-disable";
				endif;
		?>
		<nav id="access-secondary" class="<?php echo $menuclass; ?>" role="navigation">
    	<h3 class="assistive-text"><?php _e( 'Secondary menu', 'catchbox' ); ?></h3>
			<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
			<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'catchbox' ); ?>"><?php _e( 'Skip to primary content', 'catchbox' ); ?></a></div>
			<div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'catchbox' ); ?>"><?php _e( 'Skip to secondary content', 'catchbox' ); ?></a></div>
      <?php wp_nav_menu( array( 'theme_location'  => 'secondary', 'container_class' => 'menu-secondary-container' ) );  ?>
		</nav>
    <?php } ?>

		<div class="submenu">&nbsp;</div>

		<div id="primary">
			<!--insert-->
			<div id="content" role="main">
				<?php 
                /** 
                 * catchbox_content hook
                 *
                 * @hooked catchbox_slider_display - 10
                 */
                do_action( 'catchbox_content' ); ?>