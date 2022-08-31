<?php if(!defined('ABSPATH')) die('Direct access denied.'); ?>
<div class="krischan-field">
	<label for="krischan_journal_issn"><?php _e('ISSN:', 'krischan'); ?> </label>
	<input id="krischan_journal_issn" type="text" class="widefat" name="krischan_journal_issn" value="<?php echo esc_attr($issn); ?>" />
	<span class="note"><?php _e('International Standard Serial Number.', 'krischan'); ?></span>
</div>
<div class="krischan-field">
	<label for="krischan_journal_eissn"><?php _e('EISSN:', 'krischan'); ?> </label>
	<input id="krischan_journal_eissn" type="text" class="widefat" name="krischan_journal_eissn" value="<?php echo esc_attr($eissn); ?>" />
	<span class="note"><?php _e('Electronic International Standard Serial Number (Online).', 'krischan'); ?></span>
</div>
<div class="krischan-field">
	<label for="krischan_journal_frequency"><?php _e('Frequency:', 'krischan'); ?> </label>
	<input id="krischan_journal_frequency" type="text" class="widefat" name="krischan_journal_frequency" value="<?php echo esc_attr($frequency); ?>" />
</div>
<div class="krischan-field">
	<label for="krischan_journal_editorial_policy"><?php _e('Editorial Policy:', 'krischan'); ?> </label>
	<input id="krischan_journal_editorial_policy" type="text" class="widefat" name="krischan_journal_editorial_policy" value="<?php echo esc_attr($editorial_policy); ?>" />
</div>
<div class="krischan-field">
	<label for="krischan_journal_editorial_board"><?php _e('Editorial Board:', 'krischan'); ?> </label>
	<input id="krischan_journal_editorial_board" type="text" class="widefat" name="krischan_journal_editorial_board" value="<?php echo esc_attr($editorial_board); ?>" />
</div>
<div class="krischan-field">
	<label for="krischan_journal_style_sheet"><?php _e('Style Sheet:', 'krischan'); ?> </label>
	<input id="krischan_journal_style_sheet" type="text" class="widefat" name="krischan_journal_style_sheet" value="<?php echo esc_attr($style_sheet); ?>" />
</div>
<div class="krischan-field">
	<label for="krischan_journal_access"><?php _e('Access:', 'krischan'); ?> </label>
	<input id="krischan_journal_access" type="text" class="widefat" name="krischan_journal_access" value="<?php echo esc_attr($access); ?>" />
</div>

