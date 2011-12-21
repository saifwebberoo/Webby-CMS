<?php
$this->Paginator->options(array(
    'update' => '#mainlist',
    'evalScripts' => true,
    'before' => '$(\'#busy-indicator\').show();',
	'complete'=>'$(\'#busy-indicator\').hide();PaginationRefresh();'
));
?>


<a style="float:right;" id="addlink_0" href="/admin/menus/add" onclick="creatTab(this.id,'0',this.href,this.title,$('#'+this.id).html());return false;" title="Add New Menu"><img src="/admin_theme/user_add.png" alt="Add"> Add New Menu</a>
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
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th>Actions</th> 
		</tr>
		<tr>
			<th></th>
			<th><?php echo $this->Form->input('name',array('value'=>($this->Session->check('AMenu.name')?$this->Session->read('AMenu.name'):'')));?></th>
			<th><?php echo $this->Form->input('modified',array('type'=>"text",'id'=>'datepicker','style'=>'width:70px;','value'=>($this->Session->check('AMenu.modified')?$this->Session->read('AMenu.modified'):'')));?></th>
			<th>
			<?php
				echo $this->Js->submit('Apply Filter', array(
					'update' => '#mainlist', 
					'url'=> '/admin/menus/list',
					'div' => false, 
					'type' => 'post', 
					'async' => false,
					'complete'=>'PaginationRefresh();',
					'class'=>'button'
				));
			?><a href="#" onclick="updateUrl('/admin/menus/list/1','Menu List');return false;"> Clear</a>
			</th> 
		</tr>
	</thead>
 
	<tfoot>
		<tr>
			<td colspan="4">
				<div class="bulk-actions align-left">
					<?php echo $this->element('admin/common/paging',array('cur_url'=>'/admin/menus/list/1/','title'=>'Menu List'));?>
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
			//$i = 0;
			foreach ($menus as $menu):
		?>
			<tr id="row-<?php echo h($menu['Menu']['id']); ?>">
				<!--<td><input type="checkbox"></td> -->
				<td><?php echo h($menu['Menu']['id']); ?>&nbsp;</td>
				<td><?php echo h($menu['Menu']['name']); ?>&nbsp;</td>
				<td><?php echo date('d-m-Y',strtotime($menu['Menu']['modified'])); ?>&nbsp;</td>
				<td class="actions">
					<a id="editlink_<?php echo h($menu['Menu']['id']); ?>" href="/admin/menus/edit/<?php echo h($menu['Menu']['id']); ?>" onclick="creatTab(this.id,'<?php echo h($menu['Menu']['id']); ?>',this.href,this.title,$('#'+this.id).html());return false;" title="Edit <?php echo $this->Text->truncate(h($menu['Menu']['name']),12); ?>">
						<img src="/admin_theme/pencil.png" alt="Edit" />
					</a>
					
					<a id="deleteLink_<?php echo h($menu['Menu']['id']); ?>" href="/admin/menus/delete/<?php echo h($menu['Menu']['id']); ?>" onclick="deleteRec(this.href,<?php echo h($menu['Menu']['id']); ?>,'Are you sure you want to delete?');return false;">
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