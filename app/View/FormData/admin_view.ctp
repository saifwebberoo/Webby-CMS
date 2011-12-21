<div class="formData view">
<h2><?php  echo __('Form Datum');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($formDatum['FormDatum']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($formDatum['FormDatum']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Form'); ?></dt>
		<dd>
			<?php echo $this->Html->link($formDatum['Form']['name'], array('controller' => 'forms', 'action' => 'view', $formDatum['Form']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($formDatum['FormDatum']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($formDatum['FormDatum']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Form Datum'), array('action' => 'edit', $formDatum['FormDatum']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Form Datum'), array('action' => 'delete', $formDatum['FormDatum']['id']), null, __('Are you sure you want to delete # %s?', $formDatum['FormDatum']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Form Data'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Form Datum'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Forms'), array('controller' => 'forms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Form'), array('controller' => 'forms', 'action' => 'add')); ?> </li>
	</ul>
</div>
