<a style="float:right;" href="#" onclick="closeTab('0');return false;"><img src="/admin_theme/cross_grey_small.png" alt="Close Tab"></a>
<?php 
	if(isset($saved) && $saved)
		echo $this->Session->flash('flash', array('element' => 'flash/success'));
	else
		echo $this->Session->flash('flash', array('element' => 'flash/waring'));
		
	echo $this->Form->create(null, array(
		'url' => '/admin/widgets/add',
		'inputDefaults' => array(
            'label' => false,
            'div' => false,
			'error'=>array('wrap' => 'span', 'class' => 'input-notification error png_bg', 'escape' => true)
        )
	)); 
?>	
	<fieldset> 
	<table width="100%" cellpadding="4" cellspacing="0">
		<tr>
			<td valign="top" width="70%" style="padding-right:20px; vertical-align: top;">
				<div class="form_input" style="width: 95%; float: left;">
				<label>Name</label>
				<?php
					echo $this->Form->input('name',array('class'=>'text-input large-input'));
				?>
				</div>
				<div class="form_input" style="clear:both;width:92%;">
				<?php
					echo $this->Form->input('content',array('label'=>false));
				?>
				<a href="#" id="editori-0" class="editor-switch fr" onclick ="toggleEditor('WidgetContent',$('#'+this.id));return false;">Switch To Html</a>
				</div>
			</td>
			<td valign="top" width="30%" style="padding-left:20px;vertical-align: top;">
				<div class="form_input">
					<?php
						echo $this->Js->submit('Save', array(
							'update' => '#tabc_0', 
							'div' => false, 
							'type' => 'post', 
							'async' => false,
							'complete'=>'messageCloseReactivate(\'/admin/widgets\',\'Widget List\');',
							'class'=>'button'
						));
					?>
				</div>	
				<div class="form_input">
				<label>Would you like to publish this widget?</label>
					<?=$this->Form->input('published',array('type'=>'checkbox'));?> Publish
				</div>
				<div class="form_input">
				<label>Would you like show widget title?</label>
					<?=$this->Form->input('show_title',array('type'=>'checkbox'));?> Show Title
				</div>
				<div class="form_input">
				<label>Placing Order</label>
					<?=$this->Form->input('worder',array('class'=>'text-input small-input'));?>
				</div>
				<div class="form_input">
					<h3 onclick="$('#formslist-0').slideToggle('fast');">+ Forms</h3>
					<div id="formslist-0" style="display:none;">
						<ul>
						<?php
							$form_class = ClassRegistry::init('Form');
							$form_class->displayField = 'keyword';
							$iforms = $form_class->find('list',array('order'=>'keyword'));
							foreach($iforms as $ikey=>$iform){
								echo '<li><a href="#" onclick="addtotiny(\'{',$iform,'}\',\'WidgetContent\');return false;">{',$iform,'}</a>&nbsp;<a href="/admin/forms/view/',$ikey,'" target="_blank"><img  border="0" src="/img/icons/magnifier--arrow.png" title="Preview" width="16px" align="top" /></a></li>';
							}
						?>
						</ul>
					</div>
				</div>			
			</td>
		</tr>
	</table>
	</fieldset>
<?php
	echo $this->TinyMce->init('WidgetContent');
?>
	<div class="clear"></div>
</form>
<?php
echo $this->Js->writeBuffer(); // Write cached scripts
?>