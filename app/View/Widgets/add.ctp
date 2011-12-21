<div class="widgets form">
<?php echo $this->Form->create('Widget');?>
	<fieldset>
		<legend><?php echo __('Add Widget'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('content');
		echo $this->Form->input('worder');
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
		echo $this->Form->input('published');
		echo $this->Form->input('Page');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Widgets'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Pages'), array('controller' => 'pages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Page'), array('controller' => 'pages', 'action' => 'add')); ?> </li>
	</ul>
</div>
