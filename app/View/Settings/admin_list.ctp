<?php
$this->Paginator->options(array(
    'update' => '#mainlist',
    'evalScripts' => true,
    'before' => '$(\'#busy-indicator\').show();',
	'complete'=>'$(\'#busy-indicator\').hide();PaginationRefresh();'
));
?>


<a style="float:right;" id="addlink_0" href="/admin/settings/add" onclick="creatTab(this.id,'0',this.href,this.title,$('#'+this.id).html());return false;" title="Add New Page"><img src="/admin_theme/user_add.png" alt="Add"> Add New Settings</a>
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
			<th><?php echo $this->Paginator->sort('key');?></th>
			<th><?php echo $this->Paginator->sort('pair','Value');?></th>
			<th><?php echo $this->Paginator->sort('setting_type_id','Type');?></th>
			<th><?php echo $this->Paginator->sort('description','Hint');?></th>
			<th>Actions</th> 
		</tr>
		<tr>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th colspan="3">
			<?php
				echo $this->Form->create(null, array(
					'url' => '/admin/settings/list',
					'inputDefaults' => array(
						'label' => false,
						'div' => false,
						'error'=>false
					)
				));
				
				echo $this->Form->input('setting_type_id',array(
					'empty' => '',
					'value' => ($this->Session->check('ASetting.setting_type_id')?$this->Session->read('ASetting.setting_type_id'):'')
				));
				
				echo $this->Js->submit('Apply Filter', array(
					'update' => '#mainlist', 
					'url'=> '/admin/settings/list',
					'div' => false, 
					'type' => 'post', 
					'async' => false,
					'complete'=>'PaginationRefresh();',
					'class'=>'button'
				));
			?>
				<a href="#" onclick="updateUrl('/admin/settings/list/1','Options List');return false;"> Clear</a>
				</form>
			</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="8">
				<div class="bulk-actions align-left">
					<?php echo $this->element('admin/common/paging',array('cur_url'=>'/admin/settings/list/1/','title'=>'Options List'));?>
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
			//$i = 0;
			foreach ($settings as $setting): 
		?>
			<tr id="row-<?php echo h($setting['Setting']['id']); ?>">
				<!--<td><input type="checkbox"></td> -->

				<td><?php echo $setting['Setting']['id']; ?>&nbsp;</td>
				<td><?php echo $setting['Setting']['key']; ?>&nbsp;</td>
				<td>
					<div id="pair_<?php echo $setting['Setting']['id']; ?>">
						<?php echo $setting['Setting']['pair']; ?>
					</div>
					<script type="text/javascript">
					//<![CDATA[
					$(document).ready(function(){
						$("#pair_<?php echo $setting['Setting']['id']; ?>").editInPlace({
							url: "/admin/settings/update/<?php echo $setting['Setting']['id']; ?>/pair",
							bg_over: "#cff",
							value_required:true,
							saving_image: "/img/loading.gif"
						});
					});
					//]]>
					</script>
				</td>
				<td><?php echo h($setting['SettingType']['name']); ?>&nbsp;</td>
				<td><?php echo $this->Text->truncate(h($setting['Setting']['description']),25); ?>&nbsp;</td>
				<td class="actions">

					<a id="editlink_<?php echo h($setting['Setting']['id']); ?>" href="/admin/settings/edit/<?php echo h($setting['Setting']['id']); ?>" onclick="creatTab(this.id,'<?php echo h($setting['Setting']['id']); ?>',this.href,this.title,$('#'+this.id).html());return false;" title="Edit <?php echo $this->Text->truncate(h($setting['Setting']['key']),12); ?>">
						<img src="/admin_theme/pencil.png" alt="Edit" />
					</a>
					
					<a id="deleteLink_<?php echo h($setting['Setting']['id']); ?>" href="/admin/settings/delete/<?php echo h($setting['Setting']['id']); ?>" onclick="deleteRec(this.href,<?php echo h($setting['Setting']['id']); ?>,'Are you sure you want to delete?');return false;">
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