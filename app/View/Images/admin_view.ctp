<div class="images view">
<a style="float:right;" href="#" onclick="closeTab('v_<?php echo h($image['Image']['id']); ?>');return false;"><img src="/admin_theme/cross_grey_small.png" alt="Add"></a>
<h2><?php  echo __('Image');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($image['Image']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($image['ImageCategory']['name'], array('controller' => 'image_categories', 'action' => 'view', $image['ImageCategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image Name'); ?></dt>
		<dd>
			<?php echo h($image['Image']['image_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Thumb Image Name'); ?></dt>
		<dd>
			<?php echo h($image['Image']['thumb_image_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Crop Image Name'); ?></dt>
		<dd>
			<?php echo h($image['Image']['crop_image_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($image['Image']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($image['Image']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>