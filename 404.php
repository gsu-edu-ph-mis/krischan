<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Krischan
 * subpackage Krischan 1.0
 */

get_header(); ?>
<div class="section section-page-title">
	<div class="container">
		<h1 class="page-title"><?php _e( '404 Error', 'krischan' ); ?></h1>
	</div>
</div>
<div class="container site-content">
	<div class="row">
		<main id="main" class="col-md-9 site-main" role="main">
			<div class="page-content">
				<p><?php _e( 'It looks like nothing was found at this location.', 'krischan' ); ?></p>
				<p><a href="<?= home_url(); ?>"> <?php _e( 'Back to home.', 'krischan' ); ?> </a></p>
			</div><!-- .page-content -->
		</main>
		<?php get_sidebar(); ?>
	</div><!-- .row -->
</div>
<?php get_footer(); ?>
