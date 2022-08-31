<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Krischan
 * subpackage Krischan 1.0
 */

get_header(); ?>
<div class="site-content container">
	<div class="row">
		<main id="main" class="site-main col-md-12 text-left" role="main">
        <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'krischan' ), get_search_query() ); ?></h1>
            </header><!-- .page-header -->

            <?php
            // Start the loop.
            while ( have_posts() ) : the_post(); ?>

                <?php
                /*
                * Run the loop for the search to output the results.
                * If you want to overload this in a child theme then include a file
                * called content-search.php and that will be used instead.
                */
                get_template_part( 'content', 'search' );

            // End the loop.
            endwhile;

            // Previous/next page navigation.
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'krischan' ),
                'next_text'          => __( 'Next page', 'krischan' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'krischan' ) . ' </span>',
            ) );

            // If no content, include the "No posts found" template.
        else :
            get_template_part( 'content', 'none' );

        endif;
        ?>
		</main>
		<?php //get_sidebar(); ?>
	</div><!-- .container -->
</div>
<?php get_footer();