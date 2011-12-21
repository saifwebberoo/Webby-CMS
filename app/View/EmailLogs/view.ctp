<div class="emailLogs view">
<h2><?php  echo __('Email Log');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($emailLog['EmailLog']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($emailLog['EmailLog']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Open On'); ?></dt>
		<dd>
			<?php echo h($emailLog['EmailLog']['open_on']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Send On'); ?></dt>
		<dd>
			<?php echo h($emailLog['EmailLog']['send_on']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Joined'); ?></dt>
		<dd>
			<?php echo h($emailLog['EmailLog']['joined']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Member'); ?></dt>
		<dd>
			<?php echo $this->Html->link($emailLog['Member']['id'], array('controller' => 'members', 'action' => 'view', $emailLog['Member']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Email Log'), array('action' => 'edit', $emailLog['EmailLog']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Email Log'), array('action' => 'delete', $emailLog['EmailLog']['id']), null, __('Are you sure you want to delete # %s?', $emailLog['EmailLog']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Email Logs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Email Log'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
