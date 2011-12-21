<div class="imageCategories view">
<a style="float:right;" href="#" onclick="closeTab('v_<?php echo h($imageCategory['ImageCategory']['id']); ?>');return false;"><img src="/admin_theme/cross_grey_small.png" alt="Add"></a>
<h2><?php  echo __('Image Category');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($imageCategory['ImageCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($imageCategory['ImageCategory']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Crop Width'); ?></dt>
		<dd>
			<?php echo h($imageCategory['ImageCategory']['crop_width']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Crop Height'); ?></dt>
		<dd>
			<?php echo h($imageCategory['ImageCategory']['crop_height']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="related">
	<h3><?php echo __('Related Images');?></h3>
	<?php if (!empty($imageCategory['Image'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Image Category Id'); ?></th>
		<th><?php echo __('Image Name'); ?></th>
		<th><?php echo __('Thumb Image Name'); ?></th>
		<th><?php echo __('Crop Image Name'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($imageCategory['Image'] as $image): ?>
		<tr>
			<td><?php echo $image['id'];?></td>
			<td><?php echo $image['image_category_id'];?></td>
			<td><?php echo $image['image_name'];?></td>
			<td><?php echo $image['thumb_image_name'];?></td>
			<td><?php echo $image['crop_image_name'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
