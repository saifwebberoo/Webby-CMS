<a style="float:right;" href="#" onclick="closeTab('<?php echo $this->data['Menu']['id'];?>');return false;"><img src="/admin_theme/cross_grey_small.png" alt="Add"></a>
<?php 
	if(isset($saved) && $saved)
		echo $this->Session->flash('flash', array('element' => 'flash/success'));
	else
		echo $this->Session->flash('flash', array('element' => 'flash/waring'));
	echo $this->Form->create(null, array(
		'url' => '/admin/menus/edit/'.$this->data['Menu']['id'],
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
			<label>Menu Name</label>
			<?php
				echo $this->Form->input('name',array('class'=>'text-input small-input'));
			?>
			</div>
			<div class="form_input">
			<label>Would you like to publish this menu?</label>
			<?php
			echo $this->Form->input('published',array('type'=>'checkbox'));
			?>Publish
			</div>
			<div class="form_input">
			<?php
				echo $this->Js->submit('Save', array(
					'update' => '#tabc_'.$this->data['Menu']['id'], 
					'div' => false, 
					'type' => 'post', 
					'async' => false,
					'complete'=>'messageCloseReactivate(\'/admin/menus\');',
					'class'=>'button'
				));
			?>
			</div>
	</fieldset>
	<div class="clear"></div>
</form>

<?php
echo $this->Js->writeBuffer(); // Write cached scripts
?>