<a style="float:right;" href="#" onclick="closeTab('0');return false;"><img src="/admin_theme/cross_grey_small.png" alt="Add"></a>
<?php 
	if(isset($saved) && $saved)
		echo $this->Session->flash('flash', array('element' => 'flash/success'));
	else
		echo $this->Session->flash('flash', array('element' => 'flash/waring'));
		
	echo $this->Form->create(null, array(
		'url' => '/admin/pages/add',
		'default' => false,
		'inputDefaults' => array(
            'label' => false,
            'div' => false,
			'error'=>array('wrap' => 'span', 'class' => 'input-notification error png_bg', 'escape' => true)
        )
	)); 
?>	
	<fieldset> 
		<div class="form_input">
		<label>Setting Type</label>
		<?php
			echo $this->Form->input('setting_type_id',array('class'=>'text-input large-input'));
		?>
		</div>
		<div class="form_input">
		<label>Key</label>
		<?php
			echo $this->Form->input('key',array('class'=>'text-input large-input'));
		?>
		</div>
		<div class="form_input">
		<label>Value</label>
		<?php
			echo $this->Form->input('pair',array('class'=>'text-input large-input'));
		?>
		</div>
		<div class="form_input">
		<label>Hints</label>
		<?php
			echo $this->Form->input('description',array('class'=>'text-input large-input', 'type'=>'textarea'));
		?>
		</div>
		<div class="form_input">
			<?php
				echo $this->Js->submit('Save', array(
					'update' => '#tabc_0', 
					'div' => false, 
					'type' => 'post', 
					'async' => false,
					'complete'=>'messageCloseReactivate(\'/admin/settings\',\'Option List\');',
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