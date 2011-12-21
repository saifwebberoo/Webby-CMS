<a style="float:right;" href="#" onclick="closeTab('0');return false;"><img src="/admin_theme/cross_grey_small.png" alt="Add"></a>
<?php 
	if(isset($saved) && $saved)
		echo $this->Session->flash('flash', array('element' => 'flash/success'));
	else
		echo $this->Session->flash('flash', array('element' => 'flash/waring'));
	echo $this->Form->create(null, array(
		'url' => '/admin/template_files/add/',
		'inputDefaults' => array(
            'label' => false,
            'div' => false,
			'error'=>array('wrap' => 'span', 'class' => 'input-notification error png_bg', 'escape' => true)
        )
	)); 
?>
	<fieldset>
		<div class="form_input">
			<label>Name</label>
			<?php
				echo $this->Form->input('name',array('class'=>'text-input large-input'));
			?>
		</div>
		
		<div class="form_input">
			<label>Path</label>
			<?php
				echo $this->Form->input('path',array('class'=>'text-input large-input','type'=>'text'));
			?>
		</div>

		<div class="form_input">
		<?php
			echo $this->Js->submit('Save As New Template File', array(
				'update' => '#tabc_0', 
				'div' => false, 
				'type' => 'post', 
				'async' => false,
				'complete'=>'messageCloseReactivate(\'/admin/template_files\',\'Template Files List\');',
				'class'=>'button'
			));
		?>
		</div>
	</fieldset>
</form>
<?php
echo $this->Js->writeBuffer();
?>