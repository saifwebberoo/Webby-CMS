<a style="float:right;" href="#" onclick="closeTab('<?php echo $this->data['TemplateFile']['id'];?>');return false;"><img src="/admin_theme/cross_grey_small.png" alt="Add"></a>
<?php 
	if(isset($saved) && $saved)
		echo $this->Session->flash('flash', array('element' => 'flash/success'));
	else
		echo $this->Session->flash('flash', array('element' => 'flash/waring'));
	echo $this->Form->create(null, array(
		'url' => '/admin/template_files/edit/'.$this->data['TemplateFile']['id'],
		'inputDefaults' => array(
            'label' => false,
            'div' => false,
			'error'=>array('wrap' => 'span', 'class' => 'input-notification error png_bg', 'escape' => true)
        )
	)); 
	echo $this->Form->input('id');
	echo $this->Form->input('name',array('type'=>'hidden'));
	echo $this->Form->input('path',array('type'=>'hidden'));
?>
	<fieldset>
 		<legend><?php __('Edit TemplateFile');?> &gt;&gt;<strong><?php echo $this->data['TemplateFile']['path'];?></strong></legend>

		<div class="form_input">
			<label>File Content</label>
			<?php
				echo $this->Form->input('File.content',array('type'=>'textarea','id'=>'template_'.$this->data['TemplateFile']['id'],'label'=>false,'style'=>'width:100%','cols'=>'40','rows'=>'25'));
			?>
		</div>
		<div class="form_input">
		<?php
			echo $this->Js->submit('Save Changes', array(
				'update' => '#tabc_'.$this->data['TemplateFile']['id'], 
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
<script language="Javascript" type="text/javascript">
//<![CDATA[
editAreaLoader.init({
	id: "template_<?php echo $this->data['TemplateFile']['id'];?>"	// id of the textarea to transform		
	,start_highlight: true	// if start with highlight
	,allow_resize: "no"
	,allow_toggle: true
	,word_wrap: true
	,language: "en"
	,syntax: "<?php echo $ext;?>"	
});
//]]>
</script>
<?php
echo $this->Js->writeBuffer();
?>