<?php
$this->Paginator->options(array(
    'update' => '#mainlist',
    'evalScripts' => true,
    'before' => '$(\'#busy-indicator\').show();',
	'complete'=>'$(\'#busy-indicator\').hide();PaginationRefresh();'
));
?>


<a style="float:right;" id="addlink_0" href="/admin/template_files/add" onclick="creatTab(this.id,'0',this.href,this.title,$('#'+this.id).html());return false;" title="Add New Page"><img src="/admin_theme/user_add.png" alt="Add"> Add New Template File</a>
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
			<th colspan="2">
			<?php
				echo $this->Form->create(null, array(
					'url' => '/admin/template_files/list',
					'inputDefaults' => array(
						'label' => false,
						'div' => false,
						'error'=>false
					)
				));
				
				echo $this->Form->input('name',array(
					'empty' => '',
					'value' => ($this->Session->check('ATemplateFile.name')?$this->Session->read('ATemplateFile.name'):'')
				));
				
				echo $this->Js->submit('Apply Filter', array(
					'update' => '#mainlist', 
					'url'=> '/admin/template_files/list',
					'div' => false, 
					'type' => 'post', 
					'async' => false,
					'complete'=>'PaginationRefresh();',
					'class'=>'button'
				));
			?>
				<a href="#" onclick="updateUrl('/admin/template_files/list/1','Template Files List');return false;"> Clear</a>
				</form>
			</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="8">
				<div class="bulk-actions align-left">
					<?php echo $this->element('admin/common/paging',array('cur_url'=>'/admin/settings/list/1/','title'=>'Template Files List'));?>
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
			foreach ($templateFiles as $templateFile): 
		?>
			<tr id="row-<?php echo h($templateFile['TemplateFile']['id']); ?>">
				<!--<td><input type="checkbox"></td> -->

				<td><?php echo $templateFile['TemplateFile']['id']; ?>&nbsp;</td>
				<td><?php echo $templateFile['TemplateFile']['name']; ?>&nbsp;</td>
				<td class="actions">

					<a id="editlink_<?php echo h($templateFile['TemplateFile']['id']); ?>" href="/admin/template_files/edit/<?php echo h($templateFile['TemplateFile']['id']); ?>" onclick="creatTab(this.id,'<?php echo h($templateFile['TemplateFile']['id']); ?>',this.href,this.title,$('#'+this.id).html());return false;" title="Edit <?php echo $this->Text->truncate(h($templateFile['TemplateFile']['name']),12); ?>">
						<img src="/admin_theme/pencil.png" alt="Edit" />
					</a>
					
					<a id="deleteLink_<?php echo h($templateFile['TemplateFile']['id']); ?>" href="/admin/template_files/delete/<?php echo h($templateFile['TemplateFile']['id']); ?>" onclick="deleteRec(this.href,<?php echo h($templateFile['TemplateFile']['id']); ?>,'Are you sure you want to delete?');return false;">
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