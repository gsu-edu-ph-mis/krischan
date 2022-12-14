<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Krischan
 * subpackage Krischan 1.0
 */

get_header(); ?>
<div class="site-content container">
	<div class="form-row">
		<main id="main" class="site-main col-md-9 text-left" role="main">
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();
				/*
				 * Include the post format-specific template for the content. If you want to
				 * use this in a child theme, then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );

			// End the loop.
			endwhile;
			?>
		</main>
		<?php get_sidebar(); ?>
	</div><!-- .container -->
</div>
<?php get_footer(); ?>
