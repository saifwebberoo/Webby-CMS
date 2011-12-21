<?php
$this->Paginator->options(array(
    'update' => '#mainlist',
    'evalScripts' => true,
    'before' => '$(\'#busy-indicator\').show();',
	'complete'=>'$(\'#busy-indicator\').hide();PaginationRefresh();'
));
?>


<a style="float:right;" id="addlink_0" href="/admin/widgets/add" onclick="creatTab(this.id,'0',this.href,this.title,$('#'+this.id).html());return false;" title="Add New Widget"><img src="/admin_theme/user_add.png" alt="Add"> Add New Widget</a>
<p>
<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
	));
?>	
</p>
<?php
	echo $this->Form->create(null, array(
		'url' => '/admin/widgets/list',
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
			<th class="c"><?php echo $this->Paginator->sort('published','Pub');?></th>	
			<th><?php echo $this->Paginator->sort('modified');?></th>		
			<th class="c"><?php echo $this->Paginator->sort('worder','Order');?></th>
			<th>Actions</th> 
		</tr>
		<tr>
			<th></th>
			<th><?php echo $this->Form->input('name',array('value'=>($this->Session->check('AWidget.name')?$this->Session->read('AWidget.name'):'')));?></th>
			<th class="c"><?php echo $this->Form->input('published',array('empty'=>'','value'=>($this->Session->check('AWidget.published')?$this->Session->read('AWidget.published'):'')));?></th>
			<th><?php echo $this->Form->input('modified',array('type'=>"text",'id'=>'datepicker','style'=>'width:70px;','value'=>($this->Session->check('AWidget.modified')?$this->Session->read('AWidget.modified'):'')));?></th>
			<th class="c"><?php echo $this->Form->input('worder',array('empty'=>'','style'=>'width:25px;','value'=>($this->Session->check('AWidget.worder')?$this->Session->read('AWidget.worder'):'')));?></th>
			<th>
			<?php
				echo $this->Js->submit('Apply Filter', array(
					'update' => '#mainlist', 
					'url'=> '/admin/widgets/list',
					'div' => false, 
					'type' => 'post', 
					'async' => false,
					'complete'=>'PaginationRefresh();',
					'class'=>'button'
				));
			?><a href="#" onclick="updateUrl('/admin/widgets/list/1','Widget List');return false;"> Clear</a>
			</th> 
		</tr>
	</thead>
 
	<tfoot>
		<tr>
			<td colspan="6">
				<div class="bulk-actions align-left">
					<?php echo $this->element('admin/common/paging',array('cur_url'=>'/admin/widgets/list/1/','title'=>'Widget List'));?>
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
			foreach ($widgets as $widget):
		?>
			<tr id="row-<?php echo h($widget['Widget']['id']); ?>">
				<!--<td><input type="checkbox"></td> -->
				<td><?php echo h($widget['Widget']['id']); ?>&nbsp;</td>
				<td><?php echo h($widget['Widget']['name']); ?>&nbsp;</td>
				<td class="c"><?php echo ($widget['Widget']['published']==1)?'<font color="green">Yes</font>':'<font color="red">No</font>'; ?>&nbsp;</td>
				<td><?php echo date('d-m-Y',strtotime($widget['Widget']['modified'])); ?>&nbsp;</td>
				<td class="c"><?php echo h($widget['Widget']['worder']); ?>&nbsp;</td>
				
				<td class="actions">
					<a id="viewlink_<?php echo h($widget['Widget']['id']); ?>" href="/admin/widgets/view/<?php echo h($widget['Widget']['id']); ?>" onclick="creatTab(this.id,'v_<?php echo h($widget['Widget']['id']); ?>',this.href,this.title,$('#'+this.id).html());return false;" title="View <?php echo $this->Text->truncate(h($widget['Widget']['name']),12); ?>">
						<img src="/admin_theme/view_icon.png" alt="View" />
					</a>

					<a id="editlink_<?php echo h($widget['Widget']['id']); ?>" href="/admin/widgets/edit/<?php echo h($widget['Widget']['id']); ?>" onclick="creatTab(this.id,'<?php echo h($widget['Widget']['id']); ?>',this.href,this.title,$('#'+this.id).html());return false;" title="Edit <?php echo $this->Text->truncate(h($widget['Widget']['name']),12); ?>">
						<img src="/admin_theme/pencil.png" alt="Edit" />
					</a>
					
					<a id="deleteLink_<?php echo h($widget['Widget']['id']); ?>" href="/admin/widgets/delete/<?php echo h($widget['Widget']['id']); ?>" onclick="deleteRec(this.href,<?php echo h($widget['Widget']['id']); ?>,'Are you sure you want to delete?');return false;">
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