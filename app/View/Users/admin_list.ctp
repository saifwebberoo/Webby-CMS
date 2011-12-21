<?php
$this->Paginator->options(array(
    'update' => '#mainlist',
    'evalScripts' => true,
    'before' => '$(\'#busy-indicator\').show();',
	'complete'=>'$(\'#busy-indicator\').hide();PaginationRefresh();'
));
?>


<a style="float:right;" id="addlink_0" href="/admin/users/add" onclick="creatTab(this.id,'0',this.href,this.title,$('#'+this.id).html());return false;" title="Add New User"><img src="/admin_theme/user_add.png" alt="Add"> Add New User</a>
<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
	));?>	
</p>
<?php
	echo $this->Form->create(null, array(
		'url' => '/admin/users/list',
		'inputDefaults' => array(
            'label' => false,
            'div' => false,
			'error'=>false
        )
	)); 
?>
<table class="index">
	<thead>
		<tr>
			<!--<th><input class="check-all" type="checkbox"></th>-->
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('username');?></th>
			<th><?php echo $this->Paginator->sort('group_id');?></th>
			<th><?php echo $this->Paginator->sort('is_online','Online');?></th>
			<th><?php echo $this->Paginator->sort('blocked');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th>Actions</th> 
		</tr>
		<tr>
			<th></th>
			<th><?php echo $this->Form->input('name');?></th>
			<th><?php echo $this->Form->input('username');?></th>
			<th><?php echo $this->Form->input('group_id',array('empty'=>''));?></th>
			<th class="c"><?php echo $this->Form->input('is_online');?></th>
			<th class="c"><?php echo $this->Form->input('blocked');?></th>
			<th><?php echo $this->Form->input('modified',array('type'=>"text",'id'=>'datepicker'));?></th>
			<th>
			<?php
				echo $this->Js->submit('Apply Filter', array(
					'update' => '#mainlist', 
					'url'=> '/admin/users/list',
					'div' => false, 
					'type' => 'post', 
					'async' => false,
					'complete'=>'PaginationRefresh();',
					'class'=>'button'
				));
			?><a href="#" onclick="updateUrl('/admin/users/list/1','Admin User');return false;"> Clear</a>
			</th> 
		</tr>
	</thead>
 
	<tfoot>
		<tr>
			<td colspan="6">
				<div class="bulk-actions align-left">
					<?php echo $this->element('admin/common/paging',array('cur_url'=>'/admin/users/list/1/','title'=>'Admin User'));?>
				</div>
				<div class="paging">
				<?php
					echo $this->Paginator->first('<< First');
					echo $this->Paginator->prev(__('< Previous'), array(), null, array('class' => 'prev disabled'));
					echo $this->Paginator->numbers(array('separator' => ''));
					echo $this->Paginator->next(__('Next >'), array(), null, array('class' => 'next disabled'));
					echo $this->Paginator->last('Last >>');
				?><img src="/img/loading.gif" alt="Loading" id="busy-indicator" style="display:none;float: right;margin-top: 2px;" />
				</div>
				 <!-- End .pagination -->
				<div class="clear"></div>
			</td>
		</tr>
	</tfoot>
 
	<tbody>
	
		<?php
			$i = 0;
			foreach ($users as $user): 
			$alt_row = 'class="alt-row"';
			if($i%2==0){
				$alt_row = '';
			}
		?>
			<tr <?php echo $alt_row;?> id="row-<?php echo h($user['User']['id']); ?>">
				<!--<td><input type="checkbox"></td> -->
				<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
				<td><b><?php echo h($user['User']['name']); ?></b><br /><a href="mailto:<?php echo h($user['User']['email']); ?>"><?php echo h($user['User']['email']); ?></a></td>
				<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
				<td><?php echo h($user['Group']['name']); ?>&nbsp;</td>
				<td class="c"><?php echo ($user['User']['is_online']==1)?'<font color="green">Yes</font>':'<font color="red">No</font>'; ?>&nbsp;</td>
				<td class="c"><?php echo ($user['User']['blocked']==1)?'<font color="green">Yes</font>':'<font color="red">No</font>'; ?>&nbsp;</td>
				<td><?php echo date('d-m-Y',strtotime($user['User']['modified'])); ?>&nbsp;</td>
				<td class="actions">

					<a id="viewlink_<?php echo h($user['User']['id']); ?>" href="/admin/users/view/<?php echo h($user['User']['id']); ?>" onclick="creatTab(this.id,'v_<?php echo h($user['User']['id']); ?>',this.href,this.title,$('#'+this.id).html());return false;" title="View <?php echo $this->Text->truncate(h($user['User']['username']),12); ?>">
						<img src="/admin_theme/view_icon.png" alt="View" />
					</a>
					
					
					<a id="editlink_<?php echo h($user['User']['id']); ?>" href="/admin/users/edit/<?php echo h($user['User']['id']); ?>" onclick="creatTab(this.id,'<?php echo h($user['User']['id']); ?>',this.href,this.title,$('#'+this.id).html());return false;" title="Edit <?php echo $this->Text->truncate(h($user['User']['username']),12); ?>">
						<img src="/admin_theme/pencil.png" alt="Edit" />
					</a>
					
					<a id="deleteLink_<?php echo h($user['User']['id']); ?>" href="/admin/users/delete/<?php echo h($user['User']['id']); ?>" onclick="deleteRec(this.href,<?php echo h($user['User']['id']); ?>,'Are you sure you want to delete?');return false;">
						<img src="/admin_theme/cross.png" alt="Delete" />
					</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
	
</table>
</form>
<?php
    echo $this->Js->writeBuffer(); // Write cached scripts
?>