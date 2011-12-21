<?php
$this->Paginator->options(array(
    'update' => '#mainlist',
    'evalScripts' => true,
    'before' => '$(\'#busy-indicator\').show();',
	'complete'=>'$(\'#busy-indicator\').hide();PaginationRefresh();'
));
?>


<a style="float:right;" id="addlink_0" href="/admin/setting_types/add" onclick="creatTab(this.id,'0',this.href,this.title,$('#'+this.id).html());return false;" title="Add New Settings Type"><img src="/admin_theme/user_add.png" alt="Add">Add New Settings type</a>
<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
	));?>	
</p>
<table class="index">
	<thead>
		<tr>
			<!--<th><input class="check-all" type="checkbox"></th>-->
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th>Actions</th> 
		</tr>
		<tr>
			<th>&nbsp;</th>
			<th><?php echo $this->Form->input('name',array('label'=>false,'value'=>($this->Session->check('ASettingType.name')?$this->Session->read('ASettingType.name'):'')));?></th>
			<th>
			<?php
				echo $this->Js->submit('Apply Filter', array(
					'update' => '#mainlist', 
					'url'=> '/admin/setting_types/list',
					'div' => false, 
					'type' => 'post', 
					'async' => false,
					'complete'=>'PaginationRefresh();',
					'class'=>'button'
				));
			?><a href="#" onclick="updateUrl('/admin/setting_types/list/1','Setting Types List');return false;"> Clear</a>
			</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="8">
				<div class="bulk-actions align-left">
					<?php echo $this->element('admin/common/paging',array('cur_url'=>'/admin/setting_types/list/1/','title'=>'Setting Types List'));?>
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
				<div class="clear"></div>
			</td>
		</tr>
	</tfoot>
	<tbody>
		<?php
			foreach ($settingTypes as $settingType): 
		?>
			<tr id="row-<?php echo h($settingType['SettingType']['id']); ?>">
				<!--<td><input type="checkbox"></td> -->
				<td><?php echo $settingType['SettingType']['id']; ?>&nbsp;</td>
				<td><?php echo $settingType['SettingType']['name']; ?>&nbsp;</td>
				<td class="actions">

					<a id="editlink_<?php echo h($settingType['SettingType']['id']); ?>" href="/admin/setting_types/edit/<?php echo h($settingType['SettingType']['id']); ?>" onclick="creatTab(this.id,'<?php echo h($settingType['SettingType']['id']); ?>',this.href,this.title,$('#'+this.id).html());return false;" title="Edit <?php echo $this->Text->truncate(h($settingType['SettingType']['name']),12); ?>">
						<img src="/admin_theme/pencil.png" alt="Edit" />
					</a>
					
					<a id="deleteLink_<?php echo h($settingType['SettingType']['id']); ?>" href="/admin/setting_types/delete/<?php echo h($settingType['SettingType']['id']); ?>" onclick="deleteRec(this.href,<?php echo h($settingType['SettingType']['id']); ?>,'Are you sure you want to delete?');return false;">
						<img src="/admin_theme/cross.png" alt="Delete" />
					</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php
    echo $this->Js->writeBuffer(); // Write cached scripts
?>