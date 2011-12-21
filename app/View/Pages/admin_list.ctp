<?php
$this->Paginator->options(array(
    'update' => '#mainlist',
    'evalScripts' => true,
    'before' => '$(\'#busy-indicator\').show();',
	'complete'=>'$(\'#busy-indicator\').hide();PaginationRefresh();'
));
?>


<a style="float:right;" id="addlink_0" href="/admin/pages/add" onclick="creatTab(this.id,'0',this.href,this.title,$('#'+this.id).html());return false;" title="Add New Page"><img src="/admin_theme/user_add.png" alt="Add"> Add New Page</a>
<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
	));?>	
</p>
<?php
	echo $this->Form->create(null, array(
		'url' => '/admin/pages/list',
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
			<th><?php echo $this->Paginator->sort('menu_id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th class="c"><?php echo $this->Paginator->sort('islink','Link');?></th>
			<th class="c"><?php echo $this->Paginator->sort('published','Pub');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="c"><?php echo $this->Paginator->sort('porder','Sort');?></th>
			<th>Actions</th> 
		</tr>
		<tr>
			<th>&nbsp;</th>
			<th><?php echo $this->Form->input('menu_id',array('empty'=>'','value'=>($this->Session->check('APage.menu_id')?$this->Session->read('APage.menu_id'):0)));?></th>
			<th><?php echo $this->Form->input('title',array('value'=>($this->Session->check('APage.title')?$this->Session->read('APage.title'):'')));?></th>
			<th class="c"><?php echo $this->Form->input('islink',array('empty'=>'','value'=>($this->Session->check('APage.islink')?$this->Session->read('APage.islink'):'')));?></th>
			<th class="c"><?php echo $this->Form->input('published',array('empty'=>'','value'=>($this->Session->check('APage.published')?$this->Session->read('APage.published'):'')));?></th>
			<th><?php echo $this->Form->input('modified',array('type'=>"text",'id'=>'datepicker','style'=>'width:70px;','value'=>($this->Session->check('APage.modified')?$this->Session->read('APage.modified'):'')));?></th>
			<th class="c"><?php echo $this->Form->input('porder',array('empty'=>'','style'=>'width:35px;','value'=>($this->Session->check('APage.porder')?$this->Session->read('APage.porder'):'')));?></th>
			<th>
			<?php
				echo $this->Js->submit('Apply Filter', array(
					'update' => '#mainlist', 
					'url'=> '/admin/pages/list',
					'div' => false, 
					'type' => 'post', 
					'async' => false,
					'complete'=>'PaginationRefresh();',
					'class'=>'button'
				));
			?><a href="#" onclick="updateUrl('/admin/pages/list/1','Page List');return false;"> Clear</a>
			</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="8">
				<div class="bulk-actions align-left">
					<?php echo $this->element('admin/common/paging',array('cur_url'=>'/admin/pages/list/1/','title'=>'Page List'));?>
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
			foreach ($pages as $page): 
		?>
			<tr id="row-<?php echo h($page['Page']['id']); ?>">
				<!--<td><input type="checkbox"></td> -->

				<td><?php echo h($page['Page']['id']); ?>&nbsp;</td>
				<td><?php echo h($page['Menu']['name']); ?>&nbsp;</td>
				<td><?php echo $this->Text->truncate(h($page['Page']['title']),25); ?>&nbsp;</td>
				<td class="c"><?php echo ($page['Page']['islink']==1)?'<font color="green">Yes</font>':'<font color="red">No</font>'; ?>&nbsp;</td>
				<td class="c">
					<div id="published_<?php echo h($page['Page']['id']); ?>">
						<?php echo ($page['Page']['published']==1)?'<font color="green">Yes</font>':'<font color="red">No</font>'; ?>
					</div>
					<script type="text/javascript">
					//<![CDATA[
					$(document).ready(function(){
						$("#published_<?php echo h($page['Page']['id']); ?>").editInPlace({
							url: "/admin/pages/update/<?php echo h($page['Page']['id']); ?>/published",
							bg_over: "#cff",
							field_type: "select",
							select_options: "Yes:1,No:0",
							value_required:true,
							saving_image: "/img/loading.gif"
						});
					});
					//]]>
					</script>
				
				</td>
				<td><?php echo date('d-m-Y',strtotime($page['Page']['modified'])); ?>&nbsp;</td>
				<td class="c">
					<div id="porder_<?php echo h($page['Page']['id']); ?>">
					<?php echo h($page['Page']['porder']); ?>
					</div>
					<script type="text/javascript">
					//<![CDATA[
					$(document).ready(function(){
					$("#porder_<?php echo h($page['Page']['id']); ?>").editInPlace({
						url: "/admin/pages/update/<?php echo h($page['Page']['id']); ?>/porder",
						bg_over: "#cff",
						text_size:3,
						value_required:true,
						saving_image: "/img/loading.gif"
					});
					});
					//]]>
					</script>
				</td>
				
				<td class="actions">
					<?php
						if((int)$page['Page']['id']>100){
							if((int)$page['Page']['islink']==0){
					?>
					<a href="/pages/<?php echo $page['Page']['pageurl'];?>" target="_blank">
						<img src="/admin_theme/view_icon.png" alt="View" />
					</a>
					<?php
						} else {
					?>
					<a href="<?php echo $page['Page']['pageurl'];?>" target="_blank">
						<img src="/admin_theme/view_icon.png" alt="View" />
					</a>
					<?php
						} }
					?>
					<a id="editlink_<?php echo h($page['Page']['id']); ?>" href="/admin/pages/edit/<?php echo h($page['Page']['id']); ?>" onclick="creatTab(this.id,'<?php echo h($page['Page']['id']); ?>',this.href,this.title,$('#'+this.id).html());return false;" title="Edit <?php echo $this->Text->truncate(h($page['Page']['title']),12); ?>">
						<img src="/admin_theme/pencil.png" alt="Edit" />
					</a>
					<?php
						if((int)$page['Page']['id']>100){
					?>
					<a id="deleteLink_<?php echo h($page['Page']['id']); ?>" href="/admin/pages/delete/<?php echo h($page['Page']['id']); ?>" onclick="deleteRec(this.href,<?php echo h($page['Page']['id']); ?>,'Are you sure you want to delete?');return false;">
						<img src="/admin_theme/cross.png" alt="Delete" />
					</a>
					<?php
						}
					?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</form>
<?php
    echo $this->Js->writeBuffer(); // Write cached scripts
?>