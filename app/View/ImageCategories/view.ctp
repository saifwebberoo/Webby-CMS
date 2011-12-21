<div class="imageCategories view">
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Image Category'), array('action' => 'edit', $imageCategory['ImageCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Image Category'), array('action' => 'delete', $imageCategory['ImageCategory']['id']), null, __('Are you sure you want to delete # %s?', $imageCategory['ImageCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Category'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
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
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
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
			<td><?php echo $image['created'];?></td>
			<td><?php echo $image['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'images', 'action' => 'view', $image['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'images', 'action' => 'edit', $image['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'images', 'action' => 'delete', $image['id']), null, __('Are you sure you want to delete # %s?', $image['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
