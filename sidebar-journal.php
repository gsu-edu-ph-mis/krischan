<?php
/**
 * The sidebar
 *
 * @package WordPress
 * @subpackage Krischan
 * subpackage Krischan 1.0
 */
?>

	<div id="secondary" class=" widget-area col-md-3 text-left pt-5" role="complementary">
		
		<div class="widgetx mb-5 mt-5">
			<h3 class="h3 mb-3">Journal Quick Links</h3>

			<?php $journalP = get_page_by_path($post->post_name, OBJECT, 'journal'); ?>
			<?php $journal = (krischan_get_post_meta($journalP->ID, '_krischan_settings_journal')); ?>

			<div>
				<ul>
					<li><a href="<?= $journal['editorial_policy']; ?>">Editorial Policy</a></li>
					<li><a href="<?= $journal['style_sheet']; ?>">Style Sheet</a></li>
				</ul>
			</div>
		</div>
		
	</div><!-- . .widget-area -->
