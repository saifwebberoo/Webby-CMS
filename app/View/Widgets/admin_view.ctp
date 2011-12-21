<div class="widgets view">
<a style="float:right;" href="#" onclick="closeTab('v_<?php echo h($widget['Widget']['id']); ?>');return false;"><img src="/admin_theme/cross_grey_small.png" alt="View"></a>
	<dl>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($widget['Widget']['content']); ?>
			&nbsp;
		</dd>
				<dt><?php echo __('Published'); ?></dt>
		<dd>
			<?php echo h($widget['Widget']['published']); ?>
			&nbsp;
		</dd>
	</dl>
</div>