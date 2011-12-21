<div class="formData form">
<?php echo $this->Form->create('FormDatum');?>
	<fieldset>
		<legend><?php echo __('Admin Add Form Datum'); ?></legend>
	<?php
		echo $this->Form->input('value');
		echo $this->Form->input('form_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Form Data'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Forms'), array('controller' => 'forms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Form'), array('controller' => 'forms', 'action' => 'add')); ?> </li>
	</ul>
</div>
