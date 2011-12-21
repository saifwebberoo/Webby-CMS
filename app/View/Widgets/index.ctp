<div class="widgets index">
	<h2><?php echo __('Widgets');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('content');?></th>
			<th><?php echo $this->Paginator->sort('worder');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('created_by');?></th>
			<th><?php echo $this->Paginator->sort('modified_by');?></th>
			<th><?php echo $this->Paginator->sort('published');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($widgets as $widget): ?>
	<tr>
		<td><?php echo h($widget['Widget']['id']); ?>&nbsp;</td>
		<td><?php echo h($widget['Widget']['name']); ?>&nbsp;</td>
		<td><?php echo h($widget['Widget']['content']); ?>&nbsp;</td>
		<td><?php echo h($widget['Widget']['worder']); ?>&nbsp;</td>
		<td><?php echo h($widget['Widget']['created']); ?>&nbsp;</td>
		<td><?php echo h($widget['Widget']['modified']); ?>&nbsp;</td>
		<td><?php echo h($widget['Widget']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($widget['Widget']['modified_by']); ?>&nbsp;</td>
		<td><?php echo h($widget['Widget']['published']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $widget['Widget']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $widget['Widget']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $widget['Widget']['id']), null, __('Are you sure you want to delete # %s?', $widget['Widget']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Widget'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Pages'), array('controller' => 'pages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Page'), array('controller' => 'pages', 'action' => 'add')); ?> </li>
	</ul>
</div>
