<div class="pages view">
<h2><?php  echo __('Page');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($page['Page']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($page['Page']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($page['Page']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Published'); ?></dt>
		<dd>
			<?php echo h($page['Page']['published']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($page['Page']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($page['Page']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($page['Page']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($page['Page']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Keywords'); ?></dt>
		<dd>
			<?php echo h($page['Page']['meta_keywords']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Descriptions'); ?></dt>
		<dd>
			<?php echo h($page['Page']['meta_descriptions']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pageurl'); ?></dt>
		<dd>
			<?php echo h($page['Page']['pageurl']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fixed'); ?></dt>
		<dd>
			<?php echo h($page['Page']['fixed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Admin Name'); ?></dt>
		<dd>
			<?php echo h($page['Page']['admin_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Head Script'); ?></dt>
		<dd>
			<?php echo h($page['Page']['head_script']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Porder'); ?></dt>
		<dd>
			<?php echo h($page['Page']['porder']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Menu'); ?></dt>
		<dd>
			<?php echo $this->Html->link($page['Menu']['name'], array('controller' => 'menus', 'action' => 'view', $page['Menu']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Menu Label'); ?></dt>
		<dd>
			<?php echo h($page['Page']['menu_label']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link Type'); ?></dt>
		<dd>
			<?php echo h($page['Page']['link_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Islink'); ?></dt>
		<dd>
			<?php echo h($page['Page']['islink']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Boxcontainer'); ?></dt>
		<dd>
			<?php echo h($page['Page']['boxcontainer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Page'); ?></dt>
		<dd>
			<?php echo $this->Html->link($page['Page']['title'], array('controller' => 'pages', 'action' => 'view', $page['Page']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tmenu Id'); ?></dt>
		<dd>
			<?php echo h($page['Page']['tmenu_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Page'), array('action' => 'edit', $page['Page']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Page'), array('action' => 'delete', $page['Page']['id']), null, __('Are you sure you want to delete # %s?', $page['Page']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Page'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Menus'), array('controller' => 'menus', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Menu'), array('controller' => 'menus', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pages'), array('controller' => 'pages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Page'), array('controller' => 'pages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Widgets'), array('controller' => 'widgets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Widget'), array('controller' => 'widgets', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Pages');?></h3>
	<?php if (!empty($page['Page'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('Published'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Updated By'); ?></th>
		<th><?php echo __('Meta Keywords'); ?></th>
		<th><?php echo __('Meta Descriptions'); ?></th>
		<th><?php echo __('Pageurl'); ?></th>
		<th><?php echo __('Fixed'); ?></th>
		<th><?php echo __('Admin Name'); ?></th>
		<th><?php echo __('Head Script'); ?></th>
		<th><?php echo __('Porder'); ?></th>
		<th><?php echo __('Menu Id'); ?></th>
		<th><?php echo __('Menu Label'); ?></th>
		<th><?php echo __('Link Type'); ?></th>
		<th><?php echo __('Islink'); ?></th>
		<th><?php echo __('Boxcontainer'); ?></th>
		<th><?php echo __('Page Id'); ?></th>
		<th><?php echo __('Tmenu Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($page['Page'] as $page): ?>
		<tr>
			<td><?php echo $page['id'];?></td>
			<td><?php echo $page['title'];?></td>
			<td><?php echo $page['content'];?></td>
			<td><?php echo $page['published'];?></td>
			<td><?php echo $page['created'];?></td>
			<td><?php echo $page['modified'];?></td>
			<td><?php echo $page['created_by'];?></td>
			<td><?php echo $page['updated_by'];?></td>
			<td><?php echo $page['meta_keywords'];?></td>
			<td><?php echo $page['meta_descriptions'];?></td>
			<td><?php echo $page['pageurl'];?></td>
			<td><?php echo $page['fixed'];?></td>
			<td><?php echo $page['admin_name'];?></td>
			<td><?php echo $page['head_script'];?></td>
			<td><?php echo $page['porder'];?></td>
			<td><?php echo $page['menu_id'];?></td>
			<td><?php echo $page['menu_label'];?></td>
			<td><?php echo $page['link_type'];?></td>
			<td><?php echo $page['islink'];?></td>
			<td><?php echo $page['boxcontainer'];?></td>
			<td><?php echo $page['page_id'];?></td>
			<td><?php echo $page['tmenu_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'pages', 'action' => 'view', $page['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'pages', 'action' => 'edit', $page['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'pages', 'action' => 'delete', $page['id']), null, __('Are you sure you want to delete # %s?', $page['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Page'), array('controller' => 'pages', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Widgets');?></h3>
	<?php if (!empty($page['Widget'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('Worder'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th><?php echo __('Published'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($page['Widget'] as $widget): ?>
		<tr>
			<td><?php echo $widget['id'];?></td>
			<td><?php echo $widget['name'];?></td>
			<td><?php echo $widget['content'];?></td>
			<td><?php echo $widget['worder'];?></td>
			<td><?php echo $widget['created'];?></td>
			<td><?php echo $widget['modified'];?></td>
			<td><?php echo $widget['created_by'];?></td>
			<td><?php echo $widget['modified_by'];?></td>
			<td><?php echo $widget['published'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'widgets', 'action' => 'view', $widget['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'widgets', 'action' => 'edit', $widget['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'widgets', 'action' => 'delete', $widget['id']), null, __('Are you sure you want to delete # %s?', $widget['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Widget'), array('controller' => 'widgets', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
