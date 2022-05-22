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
			<div class="acc__wrapper">
				<button id="accessabillity" class="btn btn--secondary btn--small btn--accessability" type="button" role="listbox">
					Change View

					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M17.207 9.54301C17.0195 9.35553 16.7652 9.25022 16.5 9.25022C16.2349 9.25022 15.9805 9.35553 15.793 9.54301L12 13.336L8.20702 9.54301C8.11477 9.4475 8.00443 9.37131 7.88242 9.3189C7.76042 9.26649 7.6292 9.23891 7.49642 9.23775C7.36364 9.2366 7.23196 9.2619 7.10907 9.31218C6.98617 9.36246 6.87452 9.43672 6.78062 9.53061C6.68673 9.6245 6.61248 9.73615 6.5622 9.85905C6.51192 9.98195 6.48662 10.1136 6.48777 10.2464C6.48892 10.3792 6.51651 10.5104 6.56892 10.6324C6.62133 10.7544 6.69751 10.8648 6.79302 10.957L11.293 15.457C11.4805 15.6445 11.7349 15.7498 12 15.7498C12.2652 15.7498 12.5195 15.6445 12.707 15.457L17.207 10.957C17.3945 10.7695 17.4998 10.5152 17.4998 10.25C17.4998 9.98484 17.3945 9.73053 17.207 9.54301Z" />
					</svg>
				</button>
			</div>

			<div class="search" aria-label="Hover to open search">
				<?php get_search_form() ?>
			</div>
			<a href="https://communityaccessability.com.au/257-2/" class="btn btn--primary btn--small" type="button">Contact Us</a>
		</section>

		<nav id="site-navigation" class="nav">
			<button class="nav__toggle btn btn--secondary" aria-controls="primary-menu" aria-expanded="false">
				Menu
				<svg class="nav__toggle-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect x="4" y="5" width="16" height="2" rx="1" />
					<rect x="4" y="11" width="16" height="2" rx="1" />
					<rect x="4" y="17" width="16" height="2" rx="1" />
				</svg>
			</button>

			<div class="nav__container">
				<header class="nav__controls">
					<a href="https://communityaccessability.com.au/257-2/" class="btn btn--primary btn--small" type="button">Contact Us</a>
					<!-- Button duplicated so that styles don't effect the accessibility flow that re-ordering has -->
					<button class="btn btn--primary btn--icon nav__close nav__close--mob">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M13.4139 12.0004L16.9499 8.46538C17.0454 8.37314 17.1216 8.26279 17.174 8.14079C17.2264 8.01878 17.254 7.88756 17.2552 7.75478C17.2563 7.622 17.231 7.49032 17.1807 7.36743C17.1305 7.24453 17.0562 7.13288 16.9623 7.03899C16.8684 6.94509 16.7568 6.87084 16.6339 6.82056C16.511 6.77028 16.3793 6.74498 16.2465 6.74613C16.1137 6.74729 15.9825 6.77487 15.8605 6.82728C15.7385 6.87969 15.6282 6.95587 15.5359 7.05138L11.9999 10.5864L8.46392 7.05138C8.27531 6.86922 8.02271 6.76843 7.76052 6.77071C7.49832 6.77299 7.24751 6.87816 7.0621 7.06356C6.87669 7.24897 6.77152 7.49978 6.76924 7.76198C6.76696 8.02418 6.86776 8.27678 7.04992 8.46538L10.5859 12.0004L7.04992 15.5354C6.95441 15.6276 6.87822 15.738 6.82582 15.86C6.77341 15.982 6.74582 16.1132 6.74467 16.246C6.74351 16.3788 6.76881 16.5104 6.8191 16.6333C6.86938 16.7562 6.94363 16.8679 7.03752 16.9618C7.13141 17.0557 7.24307 17.1299 7.36596 17.1802C7.48886 17.2305 7.62054 17.2558 7.75332 17.2546C7.8861 17.2535 8.01732 17.2259 8.13932 17.1735C8.26133 17.1211 8.37167 17.0449 8.46392 16.9494L11.9999 13.4144L15.5359 16.9494C15.6282 17.0449 15.7385 17.1211 15.8605 17.1735C15.9825 17.2259 16.1137 17.2535 16.2465 17.2546C16.3793 17.2558 16.511 17.2305 16.6339 17.1802C16.7568 17.1299 16.8684 17.0557 16.9623 16.9618C17.0562 16.8679 17.1305 16.7562 17.1807 16.6333C17.231 16.5104 17.2563 16.3788 17.2552 16.246C17.254 16.1132 17.2264 15.982 17.174 15.86C17.1216 15.738 17.0454 15.6276 16.9499 15.5354L13.4139 12.0004Z"/>
						</svg>
					</button>
					<?php get_search_form() ?>
					<button class="btn btn--primary btn--icon nav__close nav__close--tab">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M13.4139 12.0004L16.9499 8.46538C17.0454 8.37314 17.1216 8.26279 17.174 8.14079C17.2264 8.01878 17.254 7.88756 17.2552 7.75478C17.2563 7.622 17.231 7.49032 17.1807 7.36743C17.1305 7.24453 17.0562 7.13288 16.9623 7.03899C16.8684 6.94509 16.7568 6.87084 16.6339 6.82056C16.511 6.77028 16.3793 6.74498 16.2465 6.74613C16.1137 6.74729 15.9825 6.77487 15.8605 6.82728C15.7385 6.87969 15.6282 6.95587 15.5359 7.05138L11.9999 10.5864L8.46392 7.05138C8.27531 6.86922 8.02271 6.76843 7.76052 6.77071C7.49832 6.77299 7.24751 6.87816 7.0621 7.06356C6.87669 7.24897 6.77152 7.49978 6.76924 7.76198C6.76696 8.02418 6.86776 8.27678 7.04992 8.46538L10.5859 12.0004L7.04992 15.5354C6.95441 15.6276 6.87822 15.738 6.82582 15.86C6.77341 15.982 6.74582 16.1132 6.74467 16.246C6.74351 16.3788 6.76881 16.5104 6.8191 16.6333C6.86938 16.7562 6.94363 16.8679 7.03752 16.9618C7.13141 17.0557 7.24307 17.1299 7.36596 17.1802C7.48886 17.2305 7.62054 17.2558 7.75332 17.2546C7.8861 17.2535 8.01732 17.2259 8.13932 17.1735C8.26133 17.1211 8.37167 17.0449 8.46392 16.9494L11.9999 13.4144L15.5359 16.9494C15.6282 17.0449 15.7385 17.1211 15.8605 17.1735C15.9825 17.2259 16.1137 17.2535 16.2465 17.2546C16.3793 17.2558 16.511 17.2305 16.6339 17.1802C16.7568 17.1299 16.8684 17.0557 16.9623 16.9618C17.0562 16.8679 17.1305 16.7562 17.1807 16.6333C17.231 16.5104 17.2563 16.3788 17.2552 16.246C17.254 16.1132 17.2264 15.982 17.174 15.86C17.1216 15.738 17.0454 15.6276 16.9499 15.5354L13.4139 12.0004Z"/>
						</svg>
					</button>
				</header>
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'menu_class'		 => 'nav__list',
						)
					);
				?>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
