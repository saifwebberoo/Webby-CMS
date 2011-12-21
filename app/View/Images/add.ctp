<div class="images form">
<?php echo $this->Form->create('Image');?>
	<fieldset>
		<legend><?php echo __('Add Image'); ?></legend>
	<?php
		echo $this->Form->input('image_category_id');
		echo $this->Form->input('image_name');
		echo $this->Form->input('thumb_image_name');
		echo $this->Form->input('crop_image_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Images'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Image Categories'), array('controller' => 'image_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Category'), array('controller' => 'image_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
