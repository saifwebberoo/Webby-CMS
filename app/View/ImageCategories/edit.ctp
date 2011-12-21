<div class="imageCategories form">
<?php echo $this->Form->create('ImageCategory');?>
	<fieldset>
		<legend><?php echo __('Edit Image Category'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('crop_width');
		echo $this->Form->input('crop_height');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ImageCategory.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ImageCategory.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Image Categories'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
