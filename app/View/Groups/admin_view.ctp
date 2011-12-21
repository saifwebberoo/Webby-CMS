<div class="groups view">
	<a style="float:right;" href="#" onclick="closeTab('v_<?php echo h($group['Group']['id']); ?>');return false;"><img src="/admin_theme/cross_grey_small.png" alt="Close"></a>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($group['Group']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($group['Group']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($group['Group']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<p>
<div class="related">
	<h4><?php echo __('Related Users');?></h4>
	<?php if (!empty($group['User'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<thead>
		<tr>
			<th><?php echo __('Name'); ?></th>
			<th><?php echo __('Username'); ?></th>
			<th><?php echo __('Email'); ?></th>
		</tr>
	</thead>
	<tbody>
	<?php
		$i = 0;
		foreach ($group['User'] as $user): 
		$alt_row = 'class="alt-row"';
		if($i++%2==0){
			$alt_row = '';
		}
		
	?>
		<tr <?php echo $alt_row;?>>
			<td><?php echo $user['name'];?></td>
			<td><?php echo $user['username'];?></td>
			<td><?php echo $user['email'];?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>
</div>
</p>