<div class="forms view">
<h2><?php  echo __('Form');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($form['Form']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($form['Form']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($form['Form']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($form['Form']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($form['Form']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Keyword'); ?></dt>
		<dd>
			<?php echo h($form['Form']['keyword']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($form['Form']['modified_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($form['Form']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Successmsg'); ?></dt>
		<dd>
			<?php echo h($form['Form']['successmsg']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($form['Form']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Savetodb'); ?></dt>
		<dd>
			<?php echo h($form['Form']['savetodb']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Redirect'); ?></dt>
		<dd>
			<?php echo h($form['Form']['redirect']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fmethod'); ?></dt>
		<dd>
			<?php echo h($form['Form']['fmethod']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Faction'); ?></dt>
		<dd>
			<?php echo h($form['Form']['faction']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ccemail'); ?></dt>
		<dd>
			<?php echo h($form['Form']['ccemail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Response Content'); ?></dt>
		<dd>
			<?php echo h($form['Form']['response_content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Response Email'); ?></dt>
		<dd>
			<?php echo h($form['Form']['response_email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Response Subject'); ?></dt>
		<dd>
			<?php echo h($form['Form']['response_subject']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Response From'); ?></dt>
		<dd>
			<?php echo h($form['Form']['response_from']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Form'), array('action' => 'edit', $form['Form']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Form'), array('action' => 'delete', $form['Form']['id']), null, __('Are you sure you want to delete # %s?', $form['Form']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Forms'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Form'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Form Data'), array('controller' => 'form_data', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Form Datum'), array('controller' => 'form_data', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Form Data');?></h3>
	<?php if (!empty($form['FormDatum'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Value'); ?></th>
		<th><?php echo __('Form Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($form['FormDatum'] as $formDatum): ?>
		<tr>
			<td><?php echo $formDatum['id'];?></td>
			<td><?php echo $formDatum['value'];?></td>
			<td><?php echo $formDatum['form_id'];?></td>
			<td><?php echo $formDatum['created'];?></td>
			<td><?php echo $formDatum['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'form_data', 'action' => 'view', $formDatum['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'form_data', 'action' => 'edit', $formDatum['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'form_data', 'action' => 'delete', $formDatum['id']), null, __('Are you sure you want to delete # %s?', $formDatum['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Form Datum'), array('controller' => 'form_data', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
