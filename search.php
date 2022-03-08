<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package commaccessability
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header section section--grey section--full">
				<article class="content section--content">
					<h1 class="page-title title--grey">
						<?php
						/* translators: %s: search query. */
						global $wp_query;
						$resultText = 'results.';

						if ( $wp_query->found_posts == 1 ) {
							$resultText = 'result.';
						}

						printf( esc_html__( 'You searched for %s', 'commaccessability' ), '<span>' . get_search_query() . ', showing ' . $wp_query->found_posts . ' ' . $resultText . '</span>' );
						?>
					</h1>
				</article>
			</header><!-- .page-header -->

			<section class="section">
				<div class="content section--content search__results">

					<h2>Search Results</h2>
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );

					endwhile;

					// the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</div>
		</section>

	</main><!-- #main -->

<?php
get_footer();
