<div class="forms form">
<?php echo $this->Form->create('Form');?>
	<fieldset>
		<legend><?php echo __('Add Form'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('content');
		echo $this->Form->input('keyword');
		echo $this->Form->input('modified_by');
		echo $this->Form->input('created_by');
		echo $this->Form->input('successmsg');
		echo $this->Form->input('email');
		echo $this->Form->input('savetodb');
		echo $this->Form->input('redirect');
		echo $this->Form->input('fmethod');
		echo $this->Form->input('faction');
		echo $this->Form->input('ccemail');
		echo $this->Form->input('response_content');
		echo $this->Form->input('response_email');
		echo $this->Form->input('response_subject');
		echo $this->Form->input('response_from');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Forms'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Form Data'), array('controller' => 'form_data', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Form Datum'), array('controller' => 'form_data', 'action' => 'add')); ?> </li>
	</ul>
</div>
