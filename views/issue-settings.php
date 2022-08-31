<?php if(!defined('ABSPATH')) die('Direct access denied.'); ?>
<div class="krischan-field">
	<label for="krischan_issue_journal_id"><?php _e('Journal:', 'krischan'); ?> </label>
	<select name="krischan_issue_journal_id" id="krischan_issue_journal_id">
		<option value=""></option>
		<option <?php if($journal_id == 'himal-us'): ?>selected="selected"<?php endif; ?> value="himal-us">Himal-Us</option>
		<option <?php if($journal_id == 'higher-education-research-review'): ?>selected="selected"<?php endif; ?> value="higher-education-research-review">Higher Education Research Review</option>
		<option <?php if($journal_id == 'the-graduate-school-journal'): ?>selected="selected"<?php endif; ?> value="the-graduate-school-journal">The Graduate School Journal</option>
	</select>
</div>
<div class="krischan-field">
	<label for="krischan_issue_volume"><?php _e('Volume:', 'krischan'); ?> </label>
	<input id="krischan_issue_volume" type="text" class="widefat" name="krischan_issue_volume" value="<?php echo esc_attr($volume); ?>" />
</div>
<div class="krischan-field">
	<label for="krischan_issue_number"><?php _e('Number:', 'krischan'); ?> </label>
	<input id="krischan_issue_number" type="text" class="widefat" name="krischan_issue_number" value="<?php echo esc_attr($number); ?>" />
</div>
<div class="krischan-field">
	<label for="krischan_issue_authors"><?php _e('Authors:', 'krischan'); ?> </label>
	<textarea name="krischan_issue_authors" id="krischan_issue_authors" class="widefat" cols="30" rows="10"><?php echo esc_attr($issue_authors); ?></textarea>
</div>

