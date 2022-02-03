<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package commaccessability
 */

get_header();
?>

	<main id="primary" class="site-main">

	<section class="page__header section section--full">
		<article>
			<h1>Enabling Independance</h1>
			<p>Every person has the opportunity to live the life they choose.</p>
			<a href="#" class="btn btn--invert">Call to action</a>
		</article>

		<figure>
			<!-- // TODO - MAKE CHANGEABLE -->
			<img src="<?php echo get_template_directory_uri(); ?>/images/Disability_Transport.jpg" alt="">
		</figure>
	</section>

			<section class="section--full section--grey">
				<article class="content content--center content--feature">Community Accessability provides quality care, transport  services and innovative programs to support clients to live independantly and stay connected to their community.</article>
			</section>

			<section class="section--center">
				<article class="content content--center">
					<h2>Our services</h2>
					<p>We provide transport services, community activities and home-based care in regional Victoria.</p>
				</article>

				<section class="card__wrapper">
					<article class="card card--link">
						<a href="#">
							<figure class="card__thumb"><img src="https://picsum.photos/400/301" alt=""></figure>
							<section class="card__content">
								<header class="card__header">
									<h3>Card Title</h3>
								</header>

								<p class="card__excerpt">Egestas pulvinar libero, sit amet interdum quam imperdiet vel. Et aenean.</p>
							</section>
						</a>
					</article>
					<article class="card card--link">
						<a href="#">
							<figure class="card__thumb"><img src="https://picsum.photos/400/303" alt=""></figure>
							<section class="card__content">
								<header class="card__header">
									<h3>Disability Services</h3>
								</header>

								<p class="card__excerpt">Egestas pulvinar libero, sit amet interdum quam imperdiet vel. Et aenean.</p>
							</section>
						</a>
					</article>
					<article class="card card--link">
						<a href="#">
							<figure class="card__thumb"><img src="https://picsum.photos/400/302" alt=""></figure>
							<section class="card__content">
								<header class="card__header">
									<h3>Card Title</h3>
								</header>

								<p class="card__excerpt">Egestas pulvinar libero, sit amet interdum quam imperdiet vel. Et aenean.</p>
							</section>
						</a>
					</article>
					<article class="card card--link">
						<a href="#">
							<figure class="card__thumb"><img src="https://picsum.photos/400/304" alt=""></figure>
							<section class="card__content">
								<header class="card__header">
									<h3>Card Title</h3>
								</header>

								<p class="card__excerpt">Egestas pulvinar libero, sit amet interdum quam imperdiet vel. Et aenean.</p>
							</section>
						</a>
					</article>
				</section>

				<footer class="section__actions">
					<a href="#" class="btn btn--primary">See more services</a>
				</footer>
			</section>

			<section class="section">
				<article class="card card--feature">
					<figure class="card__thumb"><img src="https://picsum.photos/600/604" alt=""></figure>
					<section class="card__content">
						<header class="card__header">
							<h3>Card Title</h3>
						</header>

						<p class="card__excerpt">
							Egestas pulvinar libero, sit amet interdum quam imperdiet vel. Et aenean.
						</p>

						<a href="#" class="btn btn--primary">c2a</a>
					</section>
				</article>

				<article class="card card--feature">
					<figure class="card__thumb"><img src="https://picsum.photos/600/605" alt=""></figure>
					<section class="card__content">
						<header class="card__header">
							<h3>Card Title</h3>
						</header>

						<p class="card__excerpt">
							Egestas pulvinar libero, sit amet interdum quam imperdiet vel. Et aenean.
						</p>

						<a href="#" class="btn btn--primary">c2a</a>
					</section>
				</article>
			</section>

	<section class="section--grey">
		<div class="section grid grid--2 grid--center">
			<article class="content">
				<h2>See the impact a little support can make</h2>
				<p>Fusce magna massa, ornare in consectetur in, rutrum non mauris.</p>
				<p>Praesent nunc mi, dapibus sed turpis et, fementum.</p>
			</article>

			<figure>
				<img src="https://picsum.photos/600/406" alt="">
			</figure>
		</div>
	</section>

		<?php
		// while ( have_posts() ) : the_post();


		// 	get_template_part( 'template-parts/content', 'page' );

		// 	// If comments are open or we have at least one comment, load up the comment template.
		// 	if ( comments_open() || get_comments_number() ) :
		// 		comments_template();
		// 	endif;

		// endwhile; // End of the loop.
		?>

		<?php if( have_rows('content_block') ): ?>
				<!-- <h1>TESTING</h1> -->
				<?php while( have_rows('content_block') ): the_row(); ?>

					<?php if( get_row_layout() == 'header' ): ?>
						<?php get_template_part('partials/intro'); ?>
					<?php endif; ?>

					<?php if( get_row_layout() == 'general_content' ): ?>
						<!-- // TODO Finish styling generic content and finish implementing -->
						<?php the_sub_field('generic'); ?>
					<?php endif; ?>

					<?php if( get_row_layout() == 'service_grid' ): ?>
						<?php get_template_part('partials/services'); ?>
					<?php endif; ?>

					<?php if( get_row_layout() == 'feature_cards' ): ?>
						<?php get_template_part('partials/feature-cards'); ?>
					<?php endif; ?>

					<?php if( get_row_layout() == '2_col_video_section' ): ?>
						<?php get_template_part('partials/videos'); ?>
					<?php endif; ?>

					<?php if( get_row_layout() == 'additional_pages' ): ?>
						<?php get_template_part('partials/related'); ?>
					<?php endif; ?>

				<?php endwhile; ?>
		<?php endif; ?>
	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
