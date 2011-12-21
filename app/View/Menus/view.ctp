<div class="menus view">
<h2><?php  echo __('Menu');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['modified_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Morder'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['morder']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Menu'), array('action' => 'edit', $menu['Menu']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Menu'), array('action' => 'delete', $menu['Menu']['id']), null, __('Are you sure you want to delete # %s?', $menu['Menu']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Menus'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Menu'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pages'), array('controller' => 'pages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Page'), array('controller' => 'pages', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Pages');?></h3>
	<?php if (!empty($menu['Page'])):?>
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
		foreach ($menu['Page'] as $page): ?>
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
