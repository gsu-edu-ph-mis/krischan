<?php
/**
 * The template for displaying all single journals
 *
 * @package WordPress
 * @subpackage Krischan
 * subpackage Krischan 1.0
 */

get_header(); ?>
<div class="site-content container">
	<div class="row">
		<main id="main" class="site-main col-md-9 text-left" role="main">
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				// Include the page content template.
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-content row mb-5">
						<div class="col-md-6 text-center mb-5">
							<?php
								// Post thumbnail.
								krischan_post_thumbnail('full');
							?>
						</div>
						<div class="col-md-6">

							<?php the_content(); ?>

							<?php $journal = (krischan_get_post_meta(get_the_ID(), '_krischan_settings_journal')); ?>
							<p class="mb-0"><strong>Frequency</strong>: <?= $journal['frequency']; ?></p>
							<p class="mb-0"><strong>Editorial Policy</strong>: <a target="_blank" href="<?= $journal['editorial_policy']; ?>">View</a></p>
							<p class="mb-0"><strong>Style Sheet</strong>: <a target="_blank" href="<?= $journal['style_sheet']; ?>">View</a></p>
							<p class="mb-0"><strong>Access</strong>: <?= $journal['access']; ?></p>
							
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

					<div class="entry-content row pt-5">
						<div class="col-md-12">
							<h2 class="h2">All Issues</h2>
						</div>
						<?php 
						$args = array(
							'post_type' => 'issue',
							'post_status' => array('publish'), // As long as it exist, get it
							'numberposts' => -1, // Get all
							'meta_query' => array(
								array(
									'key'       => '_krischan_settings_issue',
									'value'     => '"' . $post->post_name . '"',
									'compare'   => 'LIKE'
								)
							)
						);
						$journal_issues   = get_posts( $args ); // Returns array 
						foreach($journal_issues as $issue){
							// print_r($issue);
						?>
						<div class="col-6 col-md-3 text-center">
							<a href="<?php echo get_permalink( $issue->ID); ?>">
								<?= get_the_post_thumbnail($issue, 'full'); ?>
							</a>
							<p><?php echo $issue->post_title; ?></p>
						</div>
						<?php } ?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->
				<?php
			// End the loop.
			endwhile;
			?>
		</main>
		<?php get_sidebar(); ?>
	</div><!-- .container -->
</div>
<?php get_footer(); ?>
