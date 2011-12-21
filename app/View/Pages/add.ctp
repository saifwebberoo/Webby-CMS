<div class="pages form">
<?php echo $this->Form->create('Page');?>
	<fieldset>
		<legend><?php echo __('Add Page'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('content');
		echo $this->Form->input('published');
		echo $this->Form->input('created_by');
		echo $this->Form->input('updated_by');
		echo $this->Form->input('meta_keywords');
		echo $this->Form->input('meta_descriptions');
		echo $this->Form->input('pageurl');
		echo $this->Form->input('fixed');
		echo $this->Form->input('admin_name');
		echo $this->Form->input('head_script');
		echo $this->Form->input('porder');
		echo $this->Form->input('menu_id');
		echo $this->Form->input('menu_label');
		echo $this->Form->input('link_type');
		echo $this->Form->input('islink');
		echo $this->Form->input('boxcontainer');
		echo $this->Form->input('page_id');
		echo $this->Form->input('tmenu_id');
		echo $this->Form->input('Widget');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pages'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Menus'), array('controller' => 'menus', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Menu'), array('controller' => 'menus', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pages'), array('controller' => 'pages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Page'), array('controller' => 'pages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Widgets'), array('controller' => 'widgets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Widget'), array('controller' => 'widgets', 'action' => 'add')); ?> </li>
	</ul>
</div>
