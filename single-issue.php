<?php
/**
 * The template for displaying all single issues
 *
 * @package WordPress
 * @subpackage Krischan
 * subpackage Krischan 1.0
 */

get_header(); ?>
<div class="site-content container">
	<div class="row">
		<main id="main" class="site-main col-md-12 text-left" role="main">
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				// Include the page content template.
				?>
				<?php $issue = (krischan_get_post_meta($post->ID, '_krischan_settings_issue')); ?>
				<?php $journalP = get_page_by_path($issue['journal_id'], OBJECT, 'journal'); ?>
				<?php $journal = (krischan_get_post_meta($journalP->ID, '_krischan_settings_journal')); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title mb-3">', '</h1>' ); ?>
						<p class="mb-5"><strong>ISSN</strong>: <?= $journal['eissn']; ?> (Online) | <strong>ISSN</strong>: <?= $journal['issn']; ?> (Print)</p>
					</header><!-- .entry-header -->

					<div class="entry-content row mb-5">
						<div class="col-md-3 text-center mb-5">
							<?php
								// Post thumbnail.
								krischan_post_thumbnail('full');
							?>
							
							<div class="text-center text-md-left pt-4 pb-5">
								<div class="btn-group mb-4" role="group" aria-label="Basic example" style="font-size: 16px">
									<a class="btn btn-light" style="font-size: 14px; text-decoration: none;" href="<?= $journal['editorial_board']; ?>">Editorial Board</a>
									<a class="btn btn-light" style="font-size: 14px; text-decoration: none;" href="<?= $journal['style_sheet']; ?>">Style Sheet</a>
									<a class="btn btn-light" style="font-size: 14px; text-decoration: none;" href="<?= $journal['editorial_policy']; ?>">Editorial Policy</a>
								</div>
								<p class="mb-0"><strong>Frequency</strong>: <?= $journal['frequency']; ?></p>
								<p class="mb-0"><strong>Access</strong>: <?= $journal['access']; ?></p>
								
							</div>
						</div>
						<div class="col-md-9">
							<h2 class="h2 mb-4 text-center text-md-left">Articles</h2>
							<ol class="articles pl-0 pl-md-5">
							<?php 
							$issue_articles = krischan_get_articles_by_issue_slug($post->post_name);
							foreach($issue_articles as $article):
							?>
								<?php $article_meta = (krischan_get_post_meta($article->ID, '_krischan_settings_article')); ?>
								<li class="mb-4">
									<h2 class="h3"><a href="<?php echo get_permalink( $article->ID); ?>"><?php echo $article->post_title; ?></a></h2>
									<p class="pl-1 font-italic" rel="author"><?= $article_meta['authors']; ?></p>
								</li>
							<?php 
							endforeach; 
							?>
							</ol>

							<hr>
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

					<div class="entry-content row pt-5">
						<div class="col-md-12">
							<!-- <h2 class="h2 mb-3">Table of contents</h2> -->
							<!-- <h2 class="h2 mb-3">Front Matter</h2> -->
							
						</div>
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
		<?php //get_sidebar('issue'); ?>
	</div><!-- .container -->
</div>
<?php get_footer(); ?>
