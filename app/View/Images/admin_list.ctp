<?php
$this->Paginator->options(array(
    'update' => '#mainlist',
    'evalScripts' => true,
    'before' => '$(\'#busy-indicator\').show();',
	'complete'=>'$(\'#busy-indicator\').hide();PaginationRefresh();'
));
?>


<a style="float:right;" id="addlink_0" href="/admin/images/add" onclick="creatTab(this.id,'0',this.href,this.title,$('#'+this.id).html());return false;" title="Add New Image"><img src="/admin_theme/user_add.png" alt="Add"> Add New Image</a>
<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
	));?>	
</p>
<?php
	echo $this->Form->create(null, array(
		'url' => '/admin/images/list',
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
			<th><?php echo $this->Paginator->sort('image_name','Image');?></th>
			<th><?php echo $this->Paginator->sort('ImageCategory.name','Category');?></th>
			<th>Actions</th> 
		</tr>
		<tr>
			<th>&nbsp;</th>
			<th><?php echo $this->Form->input('name',array('empty'=>'','value'=>($this->Session->check('AImage.name')?$this->Session->read('AImage.name'):'')));?></th>
			<th></th>
			<th><?php echo $this->Form->input('image_category_id',array('empty'=>'','value'=>($this->Session->check('AImage.image_category_id')?$this->Session->read('AImage.image_category_id'):0)));?></th>
			<th>
			<?php
				echo $this->Js->submit('Apply Filter', array(
					'update' => '#mainlist', 
					'url'=> '/admin/images/list',
					'div' => false, 
					'type' => 'post', 
					'async' => false,
					'complete'=>'PaginationRefresh();',
					'class'=>'button'
				));
			?><a href="#" onclick="updateUrl('/admin/images/list/1','Image List');return false;"> Clear</a>
			</th> 
		</tr>
	</thead>
 
	<tfoot>
		<tr>
			<td colspan="6">
				<div class="bulk-actions align-left">
					<?php echo $this->element('admin/common/paging',array('cur_url'=>'/admin/images/list/1/','title'=>'Image List'));?>
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
			foreach ($images as $image): 
			$alt_row = 'class="alt-row"';
			if($i%2==0){
				$alt_row = '';
			}
		?>
			<tr <?php echo $alt_row;?> id="row-<?php echo h($image['Image']['id']); ?>">
				<!--<td><input type="checkbox"></td> -->
				<td style="vertical-align: middle;"><?php echo h($image['Image']['id']); ?>&nbsp;</td>
				<td style="vertical-align: middle;"><?php echo h($image['Image']['name']); ?>&nbsp;</td>
				<td style="vertical-align: middle;">
					<img height="100px" src="/uploads/<?php echo str_replace(' ','_',$image['ImageCategory']['name']);?>/croped_images/<?php echo $image['Image']['image_name'];?>" />
				</td>
				<td style="vertical-align: middle;"><?php echo h($image['ImageCategory']['name']); ?>&nbsp;</td>
				<td class="actions" style="vertical-align: middle;">
					<!--<a id="viewlink_<?php //echo h($image['Image']['id']); ?>" href="/admin/images/view/<?php //echo h($image['Image']['id']); ?>" onclick="creatTab(this.id,'v_<?php //echo h($image['Image']['id']); ?>',this.href,this.title,$('#'+this.id).html());return false;" title="View <?php //echo $this->Text->truncate(h($image['Image']['image_name']),12); ?>">
						<img src="/admin_theme/view_icon.png" alt="View" />
					</a>-->

					<a id="editlink_<?php echo h($image['Image']['id']); ?>" href="/admin/images/edit/<?php echo h($image['Image']['id']); ?>" onclick="creatTab(this.id,'<?php echo h($image['Image']['id']); ?>',this.href,this.title,$('#'+this.id).html());return false;" title="Edit <?php echo $this->Text->truncate(h($image['Image']['image_name']),12); ?>">
						<img src="/admin_theme/pencil.png" alt="Edit" />
					</a>
					
					<a id="deleteLink_<?php echo h($image['Image']['id']); ?>" href="/admin/images/delete/<?php echo h($image['Image']['id']); ?>" onclick="deleteRec(this.href,<?php echo h($image['Image']['id']); ?>,'Are you sure you want to delete?');return false;">
						<img src="/admin_theme/cross.png" alt="Delete" />
					</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
	
</table>
</form>
<?php
	echo $this->element('sql_dump');
    echo $this->Js->writeBuffer(); // Write cached scripts
?>