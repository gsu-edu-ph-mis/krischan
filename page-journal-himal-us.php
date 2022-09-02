<?php
/**
 * Template Name: Journal Himal-us
 * 
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
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

				$journalP = get_page_by_path('himal-us', OBJECT, 'journal');
				$journal = (krischan_get_post_meta($journalP->ID, '_krischan_settings_journal')); 
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title mb-3">', '</h1>' ); ?>
						<p class="mb-5"><strong>ISSN</strong>: <?= $journal['eissn']; ?> (Online) | <strong>ISSN</strong>: <?= $journal['issn']; ?> (Print)</p>
					</header><!-- .entry-header -->

					<div class="entry-content row mb-5">
						<div class="col-md-6 text-center mb-5">
							<?php
								// Post thumbnail.
								krischan_post_thumbnail('thumbnail');
							?>
						</div>
						<div class="col-md-6">
							
							<h2 class="h3">Description</h2>
							<?php the_content(); ?>

							<h2 class="h3">Editorial Policy</h2>
							<p>Contributors to the Himal-us must prepare the publishable articles in accordance with these parameters. These are designed to standardize the process of preparing the journal for publication. Failure to keep on with this reference may culminate in the rejection of the article for publication [...] <br>	<a href="<?= get_permalink(get_page_by_path('himal-us-editorial-policy')); ?>">Read Full Editorial Policy</a></p>
							
							<p class="mb-0"><strong>Editorial Board</strong>: <a href="<?= $journal['editorial_board']; ?>">View</a></p>
							<p class="mb-0"><strong>Frequency</strong>: <?= $journal['frequency']; ?></p>
							<p class="mb-0"><strong>Style Sheet</strong>: <a href="<?= $journal['style_sheet']; ?>">View</a></p>
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

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			// End the loop.
			endwhile;
			?>
		</main>
		<?php get_sidebar('journal'); ?>
	</div><!-- .container -->
</div>
<?php get_footer(); ?>
