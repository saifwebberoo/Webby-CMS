<div class="forms index">
	<h2><?php echo __('Forms');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('content');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('keyword');?></th>
			<th><?php echo $this->Paginator->sort('modified_by');?></th>
			<th><?php echo $this->Paginator->sort('created_by');?></th>
			<th><?php echo $this->Paginator->sort('successmsg');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('savetodb');?></th>
			<th><?php echo $this->Paginator->sort('redirect');?></th>
			<th><?php echo $this->Paginator->sort('fmethod');?></th>
			<th><?php echo $this->Paginator->sort('faction');?></th>
			<th><?php echo $this->Paginator->sort('ccemail');?></th>
			<th><?php echo $this->Paginator->sort('response_content');?></th>
			<th><?php echo $this->Paginator->sort('response_email');?></th>
			<th><?php echo $this->Paginator->sort('response_subject');?></th>
			<th><?php echo $this->Paginator->sort('response_from');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($forms as $form): ?>
	<tr>
		<td><?php echo h($form['Form']['id']); ?>&nbsp;</td>
		<td><?php echo h($form['Form']['name']); ?>&nbsp;</td>
		<td><?php echo h($form['Form']['content']); ?>&nbsp;</td>
		<td><?php echo h($form['Form']['created']); ?>&nbsp;</td>
		<td><?php echo h($form['Form']['modified']); ?>&nbsp;</td>
		<td><?php echo h($form['Form']['keyword']); ?>&nbsp;</td>
		<td><?php echo h($form['Form']['modified_by']); ?>&nbsp;</td>
		<td><?php echo h($form['Form']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($form['Form']['successmsg']); ?>&nbsp;</td>
		<td><?php echo h($form['Form']['email']); ?>&nbsp;</td>
		<td><?php echo h($form['Form']['savetodb']); ?>&nbsp;</td>
		<td><?php echo h($form['Form']['redirect']); ?>&nbsp;</td>
		<td><?php echo h($form['Form']['fmethod']); ?>&nbsp;</td>
		<td><?php echo h($form['Form']['faction']); ?>&nbsp;</td>
		<td><?php echo h($form['Form']['ccemail']); ?>&nbsp;</td>
		<td><?php echo h($form['Form']['response_content']); ?>&nbsp;</td>
		<td><?php echo h($form['Form']['response_email']); ?>&nbsp;</td>
		<td><?php echo h($form['Form']['response_subject']); ?>&nbsp;</td>
		<td><?php echo h($form['Form']['response_from']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $form['Form']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $form['Form']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $form['Form']['id']), null, __('Are you sure you want to delete # %s?', $form['Form']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Form'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Form Data'), array('controller' => 'form_data', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Form Datum'), array('controller' => 'form_data', 'action' => 'add')); ?> </li>
	</ul>
</div>
