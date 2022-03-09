<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package commaccessability
 */
?>

<?php
	function get_menu_by_location( $location ) {
		if( empty($location) ) return false;

		$locations = get_nav_menu_locations();
		if( ! isset( $locations[$location] ) ) return false;

		$menu_obj = get_term( $locations[$location], 'nav_menu' );

		return wp_nav_menu(
			array(
				// 'theme_location' => 'footer-menu-1',
				'theme_location' => $location,
				'items_wrap'		 => '<h3>'.esc_html($menu_obj->name).'</h3><ul id="%1$s" class="%2$s">%3$s</ul>',
				'menu_id'        => $location,
				'menu_class'		 => 'footer__nav-list',
			)
		);
	}
?>

	<footer class="footer">
		<section class="footer__top">
			<div class="footer__cols">
				<nav class="footer__nav">
					<?php	get_menu_by_location('footer-menu-1'); ?>
				</nav>

				<nav class="footer__nav">
					<?php	get_menu_by_location('footer-menu-2'); ?>
				</nav>

				<nav class="footer__nav">
					<?php	get_menu_by_location('footer-menu-3'); ?>
				</nav>

				<nav class="footer__nav">
					<?php	get_menu_by_location('footer-menu-4'); ?>
				</nav>
			</div>

			<nav aria-label="Legal Links" class="footer__links">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer-menu-legals',
							'menu_id'        => 'footer-menu-legals',
							'menu_class'		 => 'footer__nav-legals',
						)
					);
				?>
			</nav>
		</section>

		<section class="footer__bottom">
			<div class="flags">
				<img src="<?php echo get_template_directory_uri(); ?>/images/flag-aus.jpg" alt="Australian Flag">
				<img src="<?php echo get_template_directory_uri(); ?>/images/flag-ab.jpg" alt="Aboriginal Flag">
				<img src="<?php echo get_template_directory_uri(); ?>/images/flag-torres.jpg" alt="Torres Strait Islander Flag">
				<img src="<?php echo get_template_directory_uri(); ?>/images/flag-LGTBQIA.jpg" alt="LGTBQIA Flag">
				<img src="<?php echo get_template_directory_uri(); ?>/images/flag-trans.jpg" alt="Transgender Pride Flag">
			</div>

			<section class="footer__legals grid grid--2">
				<p>Community Accessability acknowledge the Traditional Custodians of the land on which we work and live, and recognise their continuing connection to land, water and community. We pay our respects to Aboriginal and Torres Strait Islander cultures and to Elders past, present and emerging.</p>
				<p>Community Accessability celebrate the richness of diversity in our community. We respect and suport all people in equal measure, irrespective of their disability, ethnicity, faith, secual orientation and gender identity.</p>
			</section>
		</section>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script>
		const html = document.querySelector('html')
		const highContrastToggle = document.querySelector('.acc__high-contrast')
		const sessionZoom = sessionStorage.getItem('zoom')
		const sessionHighContrast = sessionStorage.getItem('high-contrast')

		// With the above scripts loaded, you can call `tippy()` with a CSS
		// selector and a `content` prop:
		tippy('#accessabillity', {
			content: `
				<ul>
					<li>
						<label for="high-contrast">
							<input type="checkbox" name="high-contrast" id="high-contrast" value="high-contrast" class="acc__high-contrast" ${sessionHighContrast && 'checked'} />
							<span class="checkbox--right">High Contrast</span>
						</label>
					</li>
					<li class="acc__zoom-actions">
						<span>Zoom</span>
						<button class="acc__zoom--minus" aria-label="Zoom Out">-</button>
						<button class="acc__zoom--plus" aria-label="Zoom In">+</button>
					</li>
				</ul>
			`,
			allowHTML: true,
			interactive: true,
			trigger: 'click',
			theme: 'light',
			placement: 'bottom',
			arrow: false,
		});

		let zoom = 0

		if (sessionZoom) {
			zoom = sessionZoom
			html.classList.add('zoom-' + zoom)
		}

		if (sessionHighContrast) {
			html.classList.add('high-contrast')
		}


		// highContrastToggle.addEventListener('change', function (event) {
		// 	console.log('changed')
		// 	html.classList.toggle('high-contrast');
		// 	updateSessionStorage()
		// })

		document.addEventListener('click', function (event) {
			if (event.target.matches('.acc__high-contrast')) {

				html.classList.toggle('high-contrast');
				updateSessionStorage()
			}

			if (event.target.matches('.acc__zoom--plus')) {
				event.preventDefault();
				if (zoom < 2) {
					zoom++
					clearZooms()
					html.classList.add('zoom-'+zoom)
				}
				updateSessionStorage()
			}

			if (event.target.matches('.acc__zoom--minus')) {
				event.preventDefault();
				if (zoom > 0) {
					zoom--
					clearZooms()
					html.classList.add('zoom-'+zoom)
				}
				updateSessionStorage()
			}
		});

		function clearZooms () {
			html.classList.remove('zoom-0')
			html.classList.remove('zoom-1')
			html.classList.remove('zoom-2')
		}

		function updateSessionStorage () {
			if (html.classList.contains('high-contrast')) {
				sessionStorage.setItem('high-contrast', true)
			} else {
				sessionStorage.removeItem('high-contrast')
			}
			sessionStorage.setItem('zoom', zoom);
		}
</script>

</body>
</html>
