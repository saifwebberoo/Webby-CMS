<div class="emailLogs form">
<?php echo $this->Form->create('EmailLog');?>
	<fieldset>
		<legend><?php echo __('Edit Email Log'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('email');
		echo $this->Form->input('open_on');
		echo $this->Form->input('send_on');
		echo $this->Form->input('joined');
		echo $this->Form->input('member_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('EmailLog.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('EmailLog.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Email Logs'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
