<div class="images index">
	<h2><?php echo __('Images');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('image_category_id');?></th>
			<th><?php echo $this->Paginator->sort('image_name');?></th>
			<th><?php echo $this->Paginator->sort('thumb_image_name');?></th>
			<th><?php echo $this->Paginator->sort('crop_image_name');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($images as $image): ?>
	<tr>
		<td><?php echo h($image['Image']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($image['ImageCategory']['name'], array('controller' => 'image_categories', 'action' => 'view', $image['ImageCategory']['id'])); ?>
		</td>
		<td><?php echo h($image['Image']['image_name']); ?>&nbsp;</td>
		<td><?php echo h($image['Image']['thumb_image_name']); ?>&nbsp;</td>
		<td><?php echo h($image['Image']['crop_image_name']); ?>&nbsp;</td>
		<td><?php echo h($image['Image']['created']); ?>&nbsp;</td>
		<td><?php echo h($image['Image']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $image['Image']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $image['Image']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $image['Image']['id']), null, __('Are you sure you want to delete # %s?', $image['Image']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Image'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Image Categories'), array('controller' => 'image_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Category'), array('controller' => 'image_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
