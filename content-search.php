<?php
/**
 * The template part for displaying results in search pages
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Krischan
 * subpackage Krischan 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<h1 class="h1"><?= get_the_title(); ?> <small class="alert alert-warning text-capitalize"><?= $post->post_type; ?></small></h1>
	</header><!-- .entry-header -->

	<div class="entry-content row mb-5">
		<div class="col-md-3 text-center">
			<a href=""></a>
			<?php
				// Post thumbnail.
				krischan_post_thumbnail('full');
			?>
		</div>
		<div class="col-md-9">
			<?php the_excerpt(); ?>
		</div>
	</div><!-- .entry-content -->

	<div class="entry-content row pt-5">
		<div class="col-md-12">
			<!-- <h2 class="h2 mb-3">Table of contents</h2> -->
			<!-- <h2 class="h2 mb-3">Front Matter</h2> -->
			
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
