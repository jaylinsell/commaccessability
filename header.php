<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package commaccessability
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'commaccessability' ); ?></a>

	<header id="masthead" class="header">
		<div class="header__branding">

			<?php the_custom_logo(); ?>
			<!-- <?php
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="header__title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="header__title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			?> -->
		</div><!-- .site-branding -->

		<section class="header__top">
			<button class="btn btn--secondary" type="button" role="listbox">Accessability</button>
			<button class="btn btn--secondary btn--icon" type="button" aria-label="Search">S</button>
			<button class="btn btn--primary" type="button">Book Transport</button>
		</section>

		<nav id="site-navigation" class="nav">
			<button class="nav__toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'commaccessability' ); ?></button>
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'menu_class'		 => 'nav__list',
					)
				);
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
