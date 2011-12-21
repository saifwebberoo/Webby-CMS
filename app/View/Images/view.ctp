<div class="images view">
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Image'), array('action' => 'edit', $image['Image']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Image'), array('action' => 'delete', $image['Image']['id']), null, __('Are you sure you want to delete # %s?', $image['Image']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Images'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Categories'), array('controller' => 'image_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Category'), array('controller' => 'image_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
