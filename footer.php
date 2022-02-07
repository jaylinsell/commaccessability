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

	<footer class="footer">
		<section class="footer__top">
			<div class="footer__cols">
				<nav class="footer__nav">
					<h3>Navigation</h3>
					<ul class="footer__nav-list">
						<li class="footer__nav-item"><a href="#" class="footer__nav-link">Nav Link</a></li>
						<li class="footer__nav-item"><a href="#" class="footer__nav-link">Nav Link</a></li>
						<li class="footer__nav-item"><a href="#" class="footer__nav-link">Nav Link</a></li>
						<li class="footer__nav-item"><a href="#" class="footer__nav-link">Nav Link</a></li>
					</ul>
				</nav>

				<nav class="footer__nav">
					<h3>Navigation</h3>
					<ul class="footer__nav-list">
						<li class="footer__nav-item"><a href="#" class="footer__nav-link">Nav Link</a></li>
						<li class="footer__nav-item"><a href="#" class="footer__nav-link">Nav Link</a></li>
						<li class="footer__nav-item"><a href="#" class="footer__nav-link">Nav Link</a></li>
						<li class="footer__nav-item"><a href="#" class="footer__nav-link">Nav Link</a></li>
					</ul>
				</nav>

				<nav class="footer__nav">
					<h3>Navigation</h3>
					<ul class="footer__nav-list">
						<li class="footer__nav-item"><a href="#" class="footer__nav-link">Nav Link</a></li>
						<li class="footer__nav-item"><a href="#" class="footer__nav-link">Nav Link</a></li>
						<li class="footer__nav-item"><a href="#" class="footer__nav-link">Nav Link</a></li>
						<li class="footer__nav-item"><a href="#" class="footer__nav-link">Nav Link</a></li>
					</ul>
				</nav>

				<nav class="footer__nav">
					<h3>Navigation</h3>
					<ul class="footer__nav-list">
						<li class="footer__nav-item"><div class="icon">i</div><a href="#" class="footer__nav-link">Nav Link</a></li>
						<li class="footer__nav-item"><div class="icon">i</div><a href="#" class="footer__nav-link">Nav Link</a></li>
						<li class="footer__nav-item"><div class="icon">i</div><a href="#" class="footer__nav-link">Nav Link</a></li>
					</ul>
				</nav>
			</div>

			<nav aria-label="Legal Links" class="footer__links">
				<a href="#" class="footer__link">NDIS Price Guide</a>
				<a href="#" class="footer__link">Privacy Policy</a>
				<a href="#" class="footer__link">Terms of Use</a>
			</nav>
		</section>

		<section class="footer__bottom">
			<div class="flags">
				<img src="" alt="">
				<img src="" alt="">
				<img src="" alt="">
				<img src="" alt="">
			</div>

			<section class="footer__legals grid grid--2">
				<p>Community Accessability acknowledge the Traditional Custodians of the land on which we work and live, and recognise their continuing connection to land, water and community. We pay our respects to Aboriginal and Torres Strait Islander cultures and to Elders past, present and emerging.</p>
				<p>Community Accessability celebrate the richness of diversity in our community. We respect and suport all people in equal measure, irrespective of their disability, ethnicity, faith, secual orientation and gender identity.</p>
			</section>
		</section>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://unpkg.com/tippy.js@6"></script>

<script>
		// With the above scripts loaded, you can call `tippy()` with a CSS
		// selector and a `content` prop:
		tippy('#accessabillity', {
			content: `
				<ul>
					<li>Toggle One <button>Toggle</button></li>
					<li>Toggle Two <button>Toggle</button></li>
				</ul>
			`,
			allowHTML: true,
			interactive: true,
			trigger: 'click',
			theme: 'light',
			placement: 'bottom',
			arrow: false,
		});
</script>

</body>
</html>
