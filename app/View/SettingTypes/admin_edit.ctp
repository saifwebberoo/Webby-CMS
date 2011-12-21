<a style="float:right;" href="#" onclick="closeTab('<?php echo $this->data['SettingType']['id'];?>');return false;"><img src="/admin_theme/cross_grey_small.png" alt="Add"></a>
<?php 
	if(isset($saved) && $saved)
		echo $this->Session->flash('flash', array('element' => 'flash/success'));
	else
		echo $this->Session->flash('flash', array('element' => 'flash/waring'));
		
	echo $this->Form->create(null, array(
		'url' => '/admin/setting_types/edit/'.$this->data['SettingType']['id'],
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
		<label>Name</label>
		<?php
			echo $this->Form->input('name',array('class'=>'text-input large-input'));
		?>
		</div>
		<div class="form_input">
			<?php
				echo $this->Js->submit('Save', array(
					'update' => '#tabc_'.$this->data['SettingType']['id'], 
					'div' => false, 
					'type' => 'post', 
					'async' => false,
					'complete'=>'messageCloseReactivate(\'/admin/setting_types\',\'Settings Types List\');',
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