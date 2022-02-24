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
		<section class="page__header section section--full <?php if( !is_front_page() || !is_home()) :?>page__header--home<?php endif; ?>">
			<article>
				<h1><?php single_post_title(); ?></h1>
					<?php if( get_field('page_summary') ): ?>
						<p><?php echo get_field('page_summary'); ?></p>
					<?php endif; ?>

					<?php
						$c2a = get_field('call_to_action');
						$btnLabel = get_field('button_label');
						$page = get_field('page');
						$url = get_field('url');

						$href = $c2a === 'page' ? $page : $url;

						if ( $c2a !== 'none' ):
					?>
						<a href="<?php echo $href; ?>" class="btn btn--invert"><?php echo $btnLabel; ?></a>
					<?php endif; ?>
			</article>

			<figure>
				<!-- // TODO - MAKE CHANGEABLE -->
				<?php the_post_thumbnail(); ?>
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
