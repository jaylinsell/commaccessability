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

		<?php if( have_rows('content_block') ): ?>
				<!-- <h1>TESTING</h1> -->
				<?php while( have_rows('content_block') ): the_row(); ?>

					<?php if( get_row_layout() == 'header' ): ?>
						<?php get_template_part('partials/intro'); ?>
					<?php endif; ?>

					<?php if( get_row_layout() == 'general_content' ): ?>
						<?php get_template_part('partials/generic'); ?>
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
