<?php
/**
 * Template Name: About
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
<div class="section section-page-title">
	<div class="container">
		<h1 class="page-title"><?php single_post_title(); ?></h1>
	</div>
</div>
<div class="site-content">
	<div class="container">
		<main id="main" class="row pt-5 pb-5  text-left" role="main">
			<div class="col-md-3">

				<nav class="page-sub-menu text-center">
					<ul>
						<li><a href="#">Vision</a></li>
						<li><a href="#">Mission</a></li>
						<li><a href="#">Goal</a></li>
						<li class="current"><a href="#">Quality Policy</a></li>
						<li><a href="#">Mandate</a></li>

					</ul>

				</nav>
			</div>
			<div class="col-md-9">
				<h2 class="mb-5">College Vision</h2>
				<p>“Center of Excellence in Education and Green Technology Generation”</p>
				<p>Guimaras State College will be a center of excellence in education and green technology generation through the development of alternatives to technologies that have been proven damaging to health and the environment. It will create a center of economic activities through technologies and products that benefit the environment as well as creating new careers that truly protect and conserve the natural environment. Furthermore, it will work actively towards conservation of energy, natural resources, and foster the use of renewable resources.</p>
				<p>The success indicators are the following:
				<ol class="mb-5">
					<li>Reduced negative impact on the environment thus benefits health of the faculty and staff, students and the local community;	</li>
					<li>Cost saving on energy expenses;</li>
					<li>Increased income for the college greater than the GAA budget;</li>
					<li>Achieved the highest level of Accreditation;</li>
					<li>ISO Certified;</li>
					<li>Passing percentage of graduates in licensure examination is above 50 percentile;</li>
					<li>Presented/Published research outputs in international fora/journals;</li>
					<li>Forged MOA/MOU with national/international organizations.</li>
				</ol>
				<h2 class="mb-5">College Mission</h2>
				<p class="mb-5">Guimaras State College is committed to provide access to relevant and quality education and advocate sustainable development.</p>
				<h2 class="mb-5">Goals</h2>
				<ol class="mb-5">
					<li> Provide quality training for Tertiary Education and advocate sustainable development through green technology generation;</li>
					<li> Develop responsible, environment-friendly and productive citizens who can contribute to the attainment of local and national goals;</li>
					<li> Encourage and promote research, extension, and technological and educational development redirected towards green technology generation, and;</li>
					<li> Ensure that curricular offerings are responsive to the needs of the community, region, and nation in order to be globally competitive.</li>
				</ol>

				<h2 class="mb-5">Quality Policy</h2>

				<p>Guimaras State College (GSC) is a state college in the Philippines that aims to have an effective and efficient implementation of its quality management system along with its vision, mission and core values.</p>

				<ul>
					<li><span style="font-weight:bold; font-size:18px; color: #125198">G</span>oal-oriented and God-fearing servant leaders promoting Green Technology for sustainable development.</li>

					<li><span style="font-weight:bold; font-size:18px; color: #125198">S</span>ervice-effective, and service-efficient professionals with global standards and practices</li>

					<li><span style="font-weight:bold; font-size:18px; color: #125198">C</span>ommitted to excellence and desire for harmony among stakeholders.</li>
				</ul>
				<p>And to achieve this, Guimaras State College is committed to provide its client with quality and excellent education through green technology generation for sustainable development and global competitiveness. It shall endeavor to continually improve its quality management system, satisfying applicable requirements of the standard, addressing risks and maximizing opportunities.</p>

				<p class="mb-5">Further, the Top management pledges to inspire a college-wide commitment to this policy and ensure to regularly review and monitor strategic implementation of the Quality Management System in all levels of the organization for customer’s satisfaction and continual improvement.</p>

				<h2 class="mb-5">The GSC Mandate</h2>
				<p>The Guimaras State College shall offer undergraduate and graduate courses in technology education, agriculture, fishery, engineering, arts and sciences, forestry, business, health, computer, criminology, nautical and short-term vocational-technical and other continuing courses that may be found to be needed and relevant. It shall also promote research, advanced studies, extension work and progressive leadership in each area of specialization. It shall also provide primary consideration through the integration of research/studies for the development of the Province of Guimaras. The College shall offer undergraduate and graduate courses as well as short technical courses within its areas of specialization and according to its capabilities, as the Board of Trustees may deem necessary to carry out its objectives, particularly in order to meet the needs of the province and the region.</p>
			</div>
		</main>
	</div><!-- .container -->
</div>
<?php get_footer(); ?>
