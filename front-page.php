<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Krischan
 * subpackage Krischan 1.0
 */

get_header(); ?>
<article>
	
	
	<section id="section-pres" class="pt-5 pb-5" >
		<div class="container">
			<div class="row pt-5 pb-5 mb-5">
				<!-- Content -->
				<div class="col-md-9 text-left">
					<div class="pr-5">
						<!-- <div class="row mb-5 pb-5">
							<div class="col-md-12">	
								<h2 class="h1 mb-4">Announcements</h2>
								<div id="home-slides" class="carousel slide pb-5" data-ride="carousel">
									<ol class="carousel-indicators">
										<li data-target="#home-slides" data-slide-to="0" class="active"></li>
										<li data-target="#home-slides" data-slide-to="1"></li>
										<li data-target="#home-slides" data-slide-to="2"></li>
									</ol>
									<div class="carousel-inner mb-5">
										<div class="carousel-item active">
											<div class="row">
												<div class="col-md-6 mb-4 text-center">
													<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sample-cover-1.jpg" alt="">
												</div>
												<div class="col-md-6">
													<h2 class="h2 mb-4">Announcement Title</h2>
													<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p>
													<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit necessitatibus fugiat adipisci asperiores at, quod officiis consequuntur totam, praesentium est autem, aliquam atque repellendus modi? Vero atque amet esse sunt.</p>
													<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit necessitatibus fugiat adipisci asperiores at, quod officiis consequuntur totam, praesentium est autem, aliquam atque repellendus modi? Vero atque amet esse sunt.</p>
												</div>
											</div>
										</div>
										<div class="carousel-item">
											<div class="row">
												<div class="col-md-6 mb-4 text-center">
													<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sample-cover-2.jpg" alt="">
												</div>
												<div class="col-md-6">
													<h2 class="h2 mb-4">Announcement Title</h2>
													<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p>
													<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit necessitatibus fugiat adipisci asperiores at, quod officiis consequuntur totam, praesentium est autem, aliquam atque repellendus modi? Vero atque amet esse sunt.</p>
													<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit necessitatibus fugiat adipisci asperiores at, quod officiis consequuntur totam, praesentium est autem, aliquam atque repellendus modi? Vero atque amet esse sunt.</p>
												</div>
											</div>
										</div>
										<div class="carousel-item">
											<div class="row">
												<div class="col-md-6 mb-4 text-center">
													<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sample-cover-3.jpg" alt="">
												</div>
												<div class="col-md-6">
													<h2 class="h2 mb-4">Announcement Title</h2>
													<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p>
													<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit necessitatibus fugiat adipisci asperiores at, quod officiis consequuntur totam, praesentium est autem, aliquam atque repellendus modi? Vero atque amet esse sunt.</p>
													<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit necessitatibus fugiat adipisci asperiores at, quod officiis consequuntur totam, praesentium est autem, aliquam atque repellendus modi? Vero atque amet esse sunt.</p>
												</div>
											</div>
										</div>
									</div>
									<a class="carousel-control-prev" href="#home-slides" role="button" data-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
									</a>
									<a class="carousel-control-next" href="#home-slides" role="button" data-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
									</a>
								</div>
							</div>
						</div> -->
						<div class="row mb-5">
							<div class="col-md-12">
								<h2 class="h1 mb-3">About the Center </h2>
								<p>The Center for Journal Publications undertakes the publication of the institutional research journals, namely, Himal-us, Higher Education Research Review (HERR), and The Graduate School Journal. </p>
								<p>These journals are recognized by the National Library and with respective International Standard Serial Numbers (ISSN). The Himal-us and HERR include quality completed research outputs that satisfactorily complied with the in-house review's rigorous process. </p>
								<p>On the other hand, the Graduate School Journal enclosed the research articles endorsed by the Graduate School and approved by the editorial board. Further, the center mediates the GSC personnel in complying with the standards for Scopus, Thomson Reuters, Web of Science Indexability, ASEAN, and other reputable citation indexes for possible external journal publications.</p>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-12">
								<h2 class="h2 text-center p-3" style="background: #9ACFDD;">Research Journals</h2>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 text-center mb-5 pt-5">
								<div class="mb-4">
									<a href="<?php echo get_permalink( get_page_by_path( 'himal-us' ) ) ?>">
										<?= get_the_post_thumbnail(get_page_by_path( 'himal-us' ), 'full'); ?>
									</a>
								</div>
								<h2 class="h2">Himal-us <br> &nbsp;</h2>
								<!-- <h3 class="h5 mb-5">ISSN Number: xxxx-xxxx  (Online)</h3> -->
								<div class="text-left">
									<div class="pt-0 pt-md-4  text-center">
										<a href="<?php echo get_permalink( get_page_by_path( 'himal-us' ) ) ?>" class="btn btn-lg btn-danger">View Journal</a>
									</div>
								</div>
							</div>
							<div class="col-md-4 text-center mb-5 pt-5">
								<div class="mb-4">
									<a href="<?php echo get_permalink( get_page_by_path( 'the-graduate-school-journal' ) ) ?>">
										<?= get_the_post_thumbnail(get_page_by_path( 'the-graduate-school-journal' ), 'full'); ?>
									</a>
								</div>
								<h2 class="h2">The Graduate School Journal </h2>
								<!-- <h3 class="h5 mb-5">ISSN Number: xxxx-xxxx  (Online)</h3> -->
								<div class="text-left">
									<div class="pt-0 pt-md-4  text-center">
										<a href="<?php echo get_permalink( get_page_by_path( 'the-graduate-school-journal' ) ) ?>" class="btn btn-lg btn-danger">View Journal</a>
									</div>
								</div>
							</div>
							<div class="col-md-4 text-center mb-5 pt-5">
								<div class="mb-4">
									<a href="<?php echo get_permalink( get_page_by_path( 'higher-education-research-review' ) ) ?>">
										<?= get_the_post_thumbnail(get_page_by_path( 'higher-education-research-review' ), 'full'); ?>
									</a>
								</div>
								<h2 class="h2">Higher Education Research Review </h2>
								<!-- <h3 class="h5 mb-5">ISSN Number: xxxx-xxxx  (Online)</h3> -->
								<div class="text-left">
									<div class="pt-0 pt-md-4  text-center">
										<a href="<?php echo get_permalink( get_page_by_path( 'higher-education-research-review' ) ) ?>" class="btn btn-lg btn-danger">View Journal</a>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				<!-- Sidebar -->
				<?php get_sidebar(); ?>
			</div>
		</div>
	</section>



	


	
</article>

<?php get_footer(); ?>
