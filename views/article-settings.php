<?php if(!defined('ABSPATH')) die('Direct access denied.'); ?>
<div class="krischan-field">
	<label for="krischan_article_issue_id"><?php _e('Issue:', 'krischan'); ?> </label>
	<input id="krischan_article_issue_id" type="text" class="widefat" name="krischan_article_issue_id" value="<?php echo esc_attr($issue_id); ?>" />
</div>
<div class="krischan-field">
	<label for="krischan_article_authors"><?php _e('Author(s):', 'krischan'); ?> </label>
	<input id="krischan_article_authors" type="text" class="widefat" name="krischan_article_authors" value="<?php echo esc_attr($authors); ?>" />
</div>
<div class="krischan-field">
	<label for="krischan_article_pdf"><?php _e('PDF:', 'krischan'); ?> </label>
	<input id="krischan_article_pdf" type="text" class="widefat" name="krischan_article_pdf" value="<?php echo esc_attr($pdf); ?>" />
</div>

