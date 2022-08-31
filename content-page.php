<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Krischan
 * subpackage Krischan 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content row">
		<div class="col-md-6">
			<?php
				// Post thumbnail.
				krischan_post_thumbnail('full');
			?>
		</div>
		<div class="col-md-6">

			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'krischan' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'krischan' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
			?>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
