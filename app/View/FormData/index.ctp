<div class="formData index">
	<h2><?php echo __('Form Data');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('value');?></th>
			<th><?php echo $this->Paginator->sort('form_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($formData as $formDatum): ?>
	<tr>
		<td><?php echo h($formDatum['FormDatum']['id']); ?>&nbsp;</td>
		<td><?php echo h($formDatum['FormDatum']['value']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($formDatum['Form']['name'], array('controller' => 'forms', 'action' => 'view', $formDatum['Form']['id'])); ?>
		</td>
		<td><?php echo h($formDatum['FormDatum']['created']); ?>&nbsp;</td>
		<td><?php echo h($formDatum['FormDatum']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $formDatum['FormDatum']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $formDatum['FormDatum']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $formDatum['FormDatum']['id']), null, __('Are you sure you want to delete # %s?', $formDatum['FormDatum']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Form Datum'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Forms'), array('controller' => 'forms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Form'), array('controller' => 'forms', 'action' => 'add')); ?> </li>
	</ul>
</div>
