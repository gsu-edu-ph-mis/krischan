<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Krischan
 * subpackage Krischan 1.0
 */
?>

<div id="secondary" class=" widget-area col-md-3 text-left pt-5" role="complementary">
	<div class="widgetx mb-5 mt-5">
		<h3 class="h3 mb-3">CENTER FOR JOURNAL PUBLICATIONS</h3>
		<div>
			<ul>
				<li><a href="#">Vision, Mission &amp; Objectives</a></li>
				<li><a href="<?php echo get_permalink( get_page_by_path( 'organizational-structure' ) ) ?>">Organizational Structure</a></li>
				<li><a href="#">Operations Manual</a></li>
			</ul>
		</div>
	</div>
	<div class="widgetx mb-5">
		<h3 class="h3 mb-3">CALL FOR PAPER</h3>
		<div>
			<ul>
				<li><a href="#">Himal-us  </a></li>
				<li><a href="#">Graduate School Journal </a></li>
				<li><a href="#">Higher Education Research Review </a></li>
			</ul>
		</div>
	</div>
	<!-- <div class="widgetx mb-5">
		<h3 class="h3 mb-3">Tags</h3>
		<div>
			<ul>
				<li><a href="#">Himal-us  </a></li>
				<li><a href="#">Graduate School Journal </a></li>
				<li><a href="#">Higher Education Research Review </a></li>
			</ul>
		</div>
	</div> -->
	<div class="widgetx mb-5">
		<h3 class="h3 mb-3">Forms & Guidelines</h3>
		<div>
			<ul>
				<li><a href="#">Author Guidelines</a></li>
				<li><a href="<?= get_permalink(get_page_by_path('style-sheet')); ?>">Style Sheet</a></li>
				<li><a href="#">Peer Review Form</a></li>
			</ul>
		</div>
	</div>
	<!-- <div class="widgetx mb-5">
		<h3 class="h3 mb-3">Latest Issues</h3>
		<div>
			<ul>
				<li><a href="#">Himal-us  Vol. 11, No. 1</a></li>
				<li><a href="#">Graduate School Journal Vol.3 No. 1</a></li>
				<li><a href="#">Higher Education Research Review Vol. 3 No. 1</a></li>
			</ul>
		</div>
	</div> -->
	<!-- <div class="widgetx mb-5">
		<h3 class="h3 mb-3">Archives</h3>
		<div>
			<ul>
				<li><a href="#">Himal-us  </a></li>
				<li><a href="#">Graduate School Journal </a></li>
				<li><a href="#">Higher Education Research Review </a></li>
			</ul>
		</div>
	</div> -->
</div><!-- . .widget-area -->
