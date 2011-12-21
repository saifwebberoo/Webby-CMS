<?php
$this->Paginator->options(array(
    'update' => '#mainlist',
    'evalScripts' => true,
    'before' => '$(\'#busy-indicator\').show();',
	'complete'=>'$(\'#busy-indicator\').hide();PaginationRefresh();'
));
?>


<a style="float:right;" id="addlink_0" href="/admin/image_categories/add" onclick="creatTab(this.id,'0',this.href,this.title,$('#'+this.id).html());return false;" title="Add New Category"><img src="/admin_theme/user_add.png" alt="Add">Add New Category</a>
<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
	));?>	
</p>
<?php
	echo $this->Form->create(null, array(
		'url' => '/admin/image_categories/list',
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
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th>Actions</th> 
		</tr>
		<tr>
			<th><?php echo $this->Form->input('id');?></th>
			<th><?php echo $this->Form->input('name');?></th>
			<th>
			<?php
				echo $this->Js->submit('Apply Filter', array(
					'update' => '#mainlist', 
					'url'=> '/admin/image_categories/list',
					'div' => false, 
					'type' => 'post', 
					'async' => false,
					'complete'=>'PaginationRefresh();',
					'class'=>'button'
				));
			?><a href="#" onclick="updateUrl('/admin/image_categories/list/1','Image Category');return false;"> Clear</a>
			</th> 
		</tr>
	</thead>
 
	<tfoot>
		<tr>
			<td colspan="6">
				<div class="bulk-actions align-left">
					<?php echo $this->element('admin/common/paging',array('cur_url'=>'/admin/image_categories/list/1/','title'=>'Image Category'));?>
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
			foreach ($image_categories as $category): 
			$alt_row = 'class="alt-row"';
			if($i%2==0){
				$alt_row = '';
			}
		?>
			<tr <?php echo $alt_row;?> id="row-<?php echo h($category['ImageCategory']['id']); ?>">
				<!--<td><input type="checkbox"></td> -->
				<td><?php echo h($category['ImageCategory']['id']); ?>&nbsp;</td>
				<td><b><?php echo h($category['ImageCategory']['name']); ?></b><br />(<?php echo h($category['ImageCategory']['crop_width']); ?>x<?php echo h($category['ImageCategory']['crop_height']); ?>)</td>
				<td class="actions">

					<a id="viewlink_<?php echo h($category['ImageCategory']['id']); ?>" href="/admin/image_categories/view/<?php echo h($category['ImageCategory']['id']); ?>" onclick="creatTab(this.id,'v_<?php echo h($category['ImageCategory']['id']); ?>',this.href,this.title,$('#'+this.id).html());return false;" title="View <?php echo $this->Text->truncate(h($category['ImageCategory']['name']),12); ?>">
						<img src="/admin_theme/view_icon.png" alt="View" />
					</a>
					
					
					<a id="editlink_<?php echo h($category['ImageCategory']['id']); ?>" href="/admin/image_categories/edit/<?php echo h($category['ImageCategory']['id']); ?>" onclick="creatTab(this.id,'<?php echo h($category['ImageCategory']['id']); ?>',this.href,this.title,$('#'+this.id).html());return false;" title="Edit <?php echo $this->Text->truncate(h($category['ImageCategory']['name']),12); ?>">
						<img src="/admin_theme/pencil.png" alt="Edit" />
					</a>
					
					<a id="deleteLink_<?php echo h($category['ImageCategory']['id']); ?>" href="/admin/image_categories/delete/<?php echo h($category['ImageCategory']['id']); ?>" onclick="deleteRec(this.href,<?php echo h($category['ImageCategory']['id']); ?>,'Are you sure you want to delete?');return false;">
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