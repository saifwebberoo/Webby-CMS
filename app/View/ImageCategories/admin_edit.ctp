<a style="float:right;" href="#" onclick="closeTab('<?php echo $this->data['ImageCategory']['id'];?>');return false;"><img src="/admin_theme/cross_grey_small.png" alt="Add"></a>
<?php 
	if(isset($saved) && $saved)
		echo $this->Session->flash('flash', array('element' => 'flash/success'));
	else
		echo $this->Session->flash('flash', array('element' => 'flash/waring'));
	echo $this->Form->create(null, array(
		'url' => '/admin/image_categories/edit/'.$this->data['ImageCategory']['id'],
		'inputDefaults' => array(
            'label' => false,
            'div' => false,
			'error'=>array('wrap' => 'span', 'class' => 'input-notification error png_bg', 'escape' => true)
        )
	)); 
	echo $this->Form->input('id');
?>	
	<fieldset>                                                          
			<div class="form_input">
			<label>Category Name</label>
			<?php
				echo $this->Form->input('name',array('class'=>'text-input small-input'));
			?>
			<br /><small>Please add the category name</small>
			</div>
			<div class="form_input">
			<label>Crop Width</label>
			<?php
				echo $this->Form->input('crop_width',array('class'=>'text-input small-input'));
			?>
			<br /><small>Please enter the width of the image to be cropped by</small>
			</div>
			<div class="form_input">
			<label>Crop Height</label>
			<?php
				echo $this->Form->input('crop_height',array('class'=>'text-input small-input'));
			?>
			<br /><small>Please enter the height of the image to be cropped by</small>
			</div>
			<div class="form_input">
			<?php
				echo $this->Js->submit('Save', array(
					'update' => '#tabc_0', 
					'div' => false, 
					'type' => 'post', 
					'async' => false,
					'complete'=>'messageCloseReactivate(\'/admin/image_categories\',\'Image Categories List\');',
					'class'=>'button'
				));
			?>
			</div>
	</fieldset>
	<div class="clear"></div>
</form>

<?php
echo $this->element('sql_dump');
echo $this->Js->writeBuffer(); // Write cached scripts
?>