<div class="pages index">
	<h2><?php echo __('Pages');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('content');?></th>
			<th><?php echo $this->Paginator->sort('published');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('created_by');?></th>
			<th><?php echo $this->Paginator->sort('updated_by');?></th>
			<th><?php echo $this->Paginator->sort('meta_keywords');?></th>
			<th><?php echo $this->Paginator->sort('meta_descriptions');?></th>
			<th><?php echo $this->Paginator->sort('pageurl');?></th>
			<th><?php echo $this->Paginator->sort('fixed');?></th>
			<th><?php echo $this->Paginator->sort('admin_name');?></th>
			<th><?php echo $this->Paginator->sort('head_script');?></th>
			<th><?php echo $this->Paginator->sort('porder');?></th>
			<th><?php echo $this->Paginator->sort('menu_id');?></th>
			<th><?php echo $this->Paginator->sort('menu_label');?></th>
			<th><?php echo $this->Paginator->sort('link_type');?></th>
			<th><?php echo $this->Paginator->sort('islink');?></th>
			<th><?php echo $this->Paginator->sort('boxcontainer');?></th>
			<th><?php echo $this->Paginator->sort('page_id');?></th>
			<th><?php echo $this->Paginator->sort('tmenu_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($pages as $page): ?>
	<tr>
		<td><?php echo h($page['Page']['id']); ?>&nbsp;</td>
		<td><?php echo h($page['Page']['title']); ?>&nbsp;</td>
		<td><?php echo h($page['Page']['content']); ?>&nbsp;</td>
		<td><?php echo h($page['Page']['published']); ?>&nbsp;</td>
		<td><?php echo h($page['Page']['created']); ?>&nbsp;</td>
		<td><?php echo h($page['Page']['modified']); ?>&nbsp;</td>
		<td><?php echo h($page['Page']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($page['Page']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($page['Page']['meta_keywords']); ?>&nbsp;</td>
		<td><?php echo h($page['Page']['meta_descriptions']); ?>&nbsp;</td>
		<td><?php echo h($page['Page']['pageurl']); ?>&nbsp;</td>
		<td><?php echo h($page['Page']['fixed']); ?>&nbsp;</td>
		<td><?php echo h($page['Page']['admin_name']); ?>&nbsp;</td>
		<td><?php echo h($page['Page']['head_script']); ?>&nbsp;</td>
		<td><?php echo h($page['Page']['porder']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($page['Menu']['name'], array('controller' => 'menus', 'action' => 'view', $page['Menu']['id'])); ?>
		</td>
		<td><?php echo h($page['Page']['menu_label']); ?>&nbsp;</td>
		<td><?php echo h($page['Page']['link_type']); ?>&nbsp;</td>
		<td><?php echo h($page['Page']['islink']); ?>&nbsp;</td>
		<td><?php echo h($page['Page']['boxcontainer']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($page['Page']['title'], array('controller' => 'pages', 'action' => 'view', $page['Page']['id'])); ?>
		</td>
		<td><?php echo h($page['Page']['tmenu_id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $page['Page']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $page['Page']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $page['Page']['id']), null, __('Are you sure you want to delete # %s?', $page['Page']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Page'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Menus'), array('controller' => 'menus', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Menu'), array('controller' => 'menus', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pages'), array('controller' => 'pages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Page'), array('controller' => 'pages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Widgets'), array('controller' => 'widgets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Widget'), array('controller' => 'widgets', 'action' => 'add')); ?> </li>
	</ul>
</div>
