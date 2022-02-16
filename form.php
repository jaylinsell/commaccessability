<?php
/* Template Name: Multi Form Page */
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

		<?php
			while ( have_posts() ) :
				the_post();

				echo '<div class="entry-content">';
				the_content();
				echo '</div>';

			endwhile; // End of the loop.
		?>
	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
