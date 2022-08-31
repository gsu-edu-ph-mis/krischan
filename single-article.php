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
		<main id="main" class="site-main col-md-12 text-left" role="main">
			<?php $article = (krischan_get_post_meta($post->ID, '_krischan_settings_article')); ?>
			<?php $issue = get_page_by_path($article['issue_id'], OBJECT, array('issue')); ?>
			<a href="<?= get_permalink($issue->ID); ?>"><?= $issue->post_title; ?></a>
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();
				/*
				 * Include the post format-specific template for the content. If you want to
				 * use this in a child theme, then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php
						// Post thumbnail.
						krischan_post_thumbnail();
					?>

					<header class="entry-header">
						<?php
							if ( is_single() ) :
								the_title( '<h1 class="entry-title">', '</h1>' );
							else :
								the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
							endif;
						?>
						<div class="text-center">
							<?php echo ($article['authors']); ?>
						</div>
					</header><!-- .entry-header -->

					<div class="entry-content">
						
						<?php
							
							/* translators: %s: Name of current post */
							the_content( sprintf(
								__( 'Continue reading %s', 'krischan' ),
								the_title( '<span class="screen-reader-text">', '</span>', false )
							) );

							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'krischan' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'krischan' ) . ' </span>%',
								'separator'   => '<span class="screen-reader-text">, </span>',
							) );
						?>
						
						<iframe src="<?php echo $article['pdf']; ?>" width="100%" height="480" allow="autoplay"></iframe>
					</div><!-- .entry-content -->

					<?php
						// Author bio.
						if ( is_single() && get_the_author_meta( 'description' ) ) :
							get_template_part( 'author-bio' );
						endif;
					?>

				</article><!-- #post-## -->
				<?php

			// End the loop.
			endwhile;
			?>
		</main>
		<?php //get_sidebar(); ?>
	</div><!-- .container -->
</div>
<?php get_footer(); ?>
