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
			<button id="accessabillity" class="btn btn--secondary btn--small btn--accessability" type="button" role="listbox">Accessability</button>

			<div class="search">
				<button class="btn btn--secondary btn--small btn--icon" type="button" aria-label="Search">
					<svg class="search__icon" width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
						<title>Search</title>
						<desc>Click to open the search field.</desc>
						<path d="M7 13.0762C10.3137 13.0762 13 10.3728 13 7.03809C13 3.70334 10.3137 1 7 1C3.68629 1 1 3.70334 1 7.03809C1 10.3728 3.68629 13.0762 7 13.0762Z" stroke="#5C068C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M16.9999 17.1021L11.2856 11.3516" stroke="#5C068C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>

				</button>
			</div>
			<button class="btn btn--primary btn--small" type="button">Book Transport</button>
		</section>

		<nav id="site-navigation" class="nav">
			<button class="nav__toggle btn btn--secondary" aria-controls="primary-menu" aria-expanded="false">Menu</button>
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
