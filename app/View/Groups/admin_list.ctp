<?php
$this->Paginator->options(array(
    'update' => '#mainlist',
    'evalScripts' => true,
    'before' => '$(\'#busy-indicator\').show();',
	'complete'=>'$(\'#busy-indicator\').hide();PaginationRefresh();'
));
?>


<a style="float:right;" id="addlink_0" href="/admin/groups/add" onclick="creatTab(this.id,'0',this.href,this.title,$('#'+this.id).html());return false;" title="Add New User"><img src="/admin_theme/user_add.png" alt="Add"> Add New Group</a>
<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
	));?>	
</p>
<?php
	echo $this->Form->create(null, array(
		'url' => '/admin/groups/list',
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
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th>Actions</th> 
		</tr>
		<tr>
			<th></th>
			<th><?php echo $this->Form->input('name',array('value'=>$this->Session->read('GRP.name')));?></th>
			<th><?php echo $this->Form->input('modified',array('type'=>"text",'id'=>'datepicker','value'=>$this->Session->read('GRP.modified')));?></th>
			<th>
			<?php
				echo $this->Js->submit('Apply Filter', array(
					'update' => '#mainlist', 
					'url'=> '/admin/groups/list',
					'div' => false, 
					'type' => 'post', 
					'async' => false,
					'complete'=>'PaginationRefresh();',
					'class'=>'button'
				));
			?><a href="#" onclick="updateUrl('/admin/groups/list/1','Admin User');return false;"> Clear</a>
			</th> 
		</tr>
	</thead>
 
	<tfoot>
		<tr>
			<td colspan="4">
			<?php /* 	<div class="bulk-actions align-left">
					<select name="dropdown">
						<option selected="selected" value="option1">Choose an action...</option>
						<option value="option2">Edit</option>
						<option value="option3">Delete</option>
					</select>
					<a class="button" href="#">Apply to selected</a>
				</div> */ ?>
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
			foreach ($groups as $group): 
			$alt_row = 'class="alt-row"';
			if($i%2==0){
				$alt_row = '';
			}
		?>
			<tr <?php echo $alt_row;?> id="row-<?php echo h($group['Group']['id']); ?>">
				<!--<td><input type="checkbox"></td> -->
				<td><?php echo h($group['Group']['id']); ?>&nbsp;</td>
				<td><b><?php echo h($group['Group']['name']); ?></b></td>
				<td><?php echo date('d-m-Y',strtotime($group['Group']['modified'])); ?>&nbsp;</td>
				<td class="actions">

					<a id="viewlink_<?php echo h($group['Group']['id']); ?>" href="/admin/groups/view/<?php echo h($group['Group']['id']); ?>" onclick="creatTab(this.id,'v_<?php echo h($group['Group']['id']); ?>',this.href,this.title,$('#'+this.id).html());return false;" title="View <?php echo $this->Text->truncate(h($group['Group']['name']),12); ?>">
						<img src="/admin_theme/view_icon.png" alt="View" />
					</a>
					
					
					<a id="editlink_<?php echo h($group['Group']['id']); ?>" href="/admin/groups/edit/<?php echo h($group['Group']['id']); ?>" onclick="creatTab(this.id,'<?php echo h($group['Group']['id']); ?>',this.href,this.title,$('#'+this.id).html());return false;" title="Edit <?php echo $this->Text->truncate(h($group['Group']['name']),12); ?>">
						<img src="/admin_theme/pencil.png" alt="Edit" />
					</a>
					
					<a id="deleteLink_<?php echo h($group['Group']['id']); ?>" href="/admin/groups/delete/<?php echo h($group['Group']['id']); ?>" onclick="deleteRec(this.href,<?php echo h($group['Group']['id']); ?>,'Are you sure you want to delete?');return false;">
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