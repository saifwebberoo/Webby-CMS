<a style="float:right;" href="#" onclick="closeTab('<?php echo $this->data['Page']['id'];?>');return false;"><img src="/admin_theme/cross_grey_small.png" alt="Add"></a>
<?php 
	if(isset($saved) && $saved)
		echo $this->Session->flash('flash', array('element' => 'flash/success'));
	else
		echo $this->Session->flash('flash', array('element' => 'flash/waring'));
		
	echo $this->Form->create(null, array(
		'url' => '/admin/pages/edit/'.$this->data['Page']['id'],
		'inputDefaults' => array(
            'label' => false,
            'div' => false,
			'error'=>array('wrap' => 'span', 'class' => 'input-notification error png_bg', 'escape' => true)
        )
	)); 
	echo $this->Form->input('id');
	$linkFrm = ($this->data['Page']['islink']==1)?'display:none;':'';
?>	
	<fieldset> 
	<table width="100%" cellpadding="4" cellspacing="0">
		<tr>
			<td valign="top" width="70%" style="padding-right:20px; vertical-align: top;">
				<div class="form_input" style="width: 45%; float:left ;">
				<label>Menu Label</label>
				<?php
					echo $this->Form->input('menu_label',array('class'=>'text-input large-input'));
				?>
				<br /><small>Please add Menu Label</small>
				</div>
				<div class="form_input" style="width: 45%; float:right ;<?php echo $linkFrm;?>" id="block_<?php echo $this->data['Page']['id'];?>_0">
				<label>Page Title</label>
				<?php
					echo $this->Form->input('title',array('class'=>'text-input large-input'));
				?>
				<br /><small>Please add page title.</small>
				</div>
				<div class="form_input" style="clear:both; width: 99%;<?php echo $linkFrm;?>" id="block_<?php echo $this->data['Page']['id'];?>_1">
				<?php
					echo $this->Form->input('content',array('label'=>false,'id'=>'PageContent_'.$this->data['Page']['id']));
				?>
				<a href="#" id="editori-<?php echo $this->data['Page']['id'];?>" class="editor-switch fr" onclick ="toggleEditor('PageContent_<?php echo $this->data['Page']['id'];?>',$(this));return false;">Switch To Html</a>
				</div>
				
				<div class="form_input" id="block_<?php echo $this->data['Page']['id'];?>_2" style="<?php echo $linkFrm;?>">
					<h3 id="hhead_script-<?php echo $this->data['Page']['id'];?>"  onclick="xTogle('head_script-<?php echo $this->data['Page']['id'];?>','Head Section CSS/Script');">&#9658; Head Section CSS/Script</h3>
					<div id="head_script-<?php echo $this->data['Page']['id'];?>" style="display:none;">
						<?=$this->Form->input('head_script');?>
					</div>
				</div>
			</td>
			<td valign="top" width="30%" style="padding-left:20px;vertical-align: top;">
				<div class="form_input">
					<?php
						echo $this->Js->submit('Save Changes', array(
							'update' => '#tabc_'.$this->data['Page']['id'], 
							'div' => false, 
							'type' => 'post', 
							'async' => false,
							'complete'=>'messageCloseReactivate(\'/admin/pages\',\'Page List\');',
							'class'=>'button'
						));
					?>
					<?php echo $this->Form->input('islink',array('options'=>array('0'=>'Page', '1'=>'Link'),'onchange'=>'selectpagetype_'.$this->data['Page']['id'].'(this.value)'));?>
				</div>	
				<div class="form_input">
				<label>Would you like to publish this page?</label>
					<?=$this->Form->input('published',array('type'=>'checkbox'));?> Publish
				</div>
				<div class="form_input">
					<h3 id="hpageparent-<?php echo $this->data['Page']['id'];?>" onclick="xTogle('pageparent-<?php echo $this->data['Page']['id'];?>','Menu Setting');">&#9660; Menu Setting</h3>
					<div id="pageparent-<?php echo $this->data['Page']['id'];?>" style="display:block;">
						<div class="form_input">
						<label>Page Url</label>
						<?php
							echo $this->Form->input('pageurl',array('class'=>'text-input  large-input'));
						?>
						<br /><small>seo friendly page url(eg: services.html)</small>
						</div>
						<div class="form_input">
						<label>Open Page In</label>
						<?php echo $this->Form->input('link_type',array('options'=>array('External'=>'New Window', 'Internal'=>'Same Window')));?>
						</div>
						<div class="form_input">
						<label>Menu</label>
						<?php
							echo $this->Form->input('menu_id',array('class'=>'text-input   large-input','empty'=>array('0'=>'--Select Menu--')));
						?>
						<br /><small>Used to attach a page to a Menu</small>
						</div>
						<!--<div class="form_input">
						<label>Parent Page (if any)</label>
						<?php
							//echo $this->Form->input('page_id',array('class'=>'text-input   large-input','empty'=>array('0'=>'--Select Parent Page--')));
						?>
						<br /><small>Used to set as parent page</small>
						</div>-->
					</div>
				</div>

				<div class="form_input" id="block_<?php echo $this->data['Page']['id'];?>_3" style="<?php echo $linkFrm;?>">
					<h3 id="hformslist-<?php echo $this->data['Page']['id'];?>" onclick="xTogle('formslist-<?php echo $this->data['Page']['id'];?>','Forms');">&#9658; Forms</h3>
					<div id="formslist-<?php echo $this->data['Page']['id'];?>" style="display:none;">
						<ul>
						<?php
							$form_class = ClassRegistry::init('Form');
							$form_class->displayField = 'keyword';
							$iforms = $form_class->find('list',array('order'=>'keyword'));
							foreach($iforms as $ikey=>$iform){
								echo '<li><a href="#" onclick="addtotiny(\'{',$iform,'}\',\'PageContent_',$this->data['Page']['id'],'\');return false;">{',$iform,'}</a>&nbsp;<a href="/admin/forms/view/',$ikey,'" target="_blank"><img  border="0" src="/img/icons/magnifier--arrow.png" title="Preview" width="16px" align="top" /></a></li>';
							}
						?>
						</ul>
					</div>
				</div>
				<div class="form_input" id="block_<?php echo $this->data['Page']['id'];?>_4" style="<?php echo $linkFrm;?>">
					<h3 id="hseodiv-<?php echo $this->data['Page']['id'];?>" onclick="xTogle('seodiv-<?php echo $this->data['Page']['id'];?>','SEO');">&#9658; SEO</h3>
					<div id="seodiv-<?php echo $this->data['Page']['id'];?>" style="display:none;">
						<div class="form_input">
						<label>Meta Keywords</label>
						<?php
							echo $this->Form->input('meta_keywords',array('class'=>'text-input  large-input','rows'=>3));
						?>
						</div>
						<div class="form_input">
						<label>Meta Description</label>
						<?php
							echo $this->Form->input('meta_descriptions',array('class'=>'text-input  large-input','rows'=>3));
						?>
						</div>
					</div>
				</div>
				
				<div class="form_input">
					<h3 id="hwidgetdiv-<?php echo $this->data['Page']['id'];?>" onclick="xTogle('widgetdiv-<?php echo $this->data['Page']['id'];?>','Widgets');" >&#9658; Widgets</h3>
					<div id="widgetdiv-<?php echo $this->data['Page']['id'];?>" style="display:none;">
						<?php echo $this->Form->input('Widget.Widget',array('multiple'=>'checkbox','options'=>$widgets,'label'=>false));?>
					</div>
				</div>
				
			</td>
		</tr>
	</table>


	

	</fieldset>
<?php
	echo $this->TinyMce->init('PageContent_'.$this->data['Page']['id']);
?>
	<div class="clear"></div>
</form>

<?php
echo $this->Js->writeBuffer(); // Write cached scripts
?>
<script type="text/javascript">
//<![CDATA[
function selectpagetype_<?php echo $this->data['Page']['id'];?>(val){
	if(val==0){
		$('#block_<?php echo $this->data['Page']['id'];?>_0').show();
		$('#block_<?php echo $this->data['Page']['id'];?>_1').show();
		$('#block_<?php echo $this->data['Page']['id'];?>_2').show();
		$('#block_<?php echo $this->data['Page']['id'];?>_3').show();
		$('#block_<?php echo $this->data['Page']['id'];?>_4').show();
	}else{
		$('#block_<?php echo $this->data['Page']['id'];?>_0').hide();
		$('#block_<?php echo $this->data['Page']['id'];?>_1').hide();
		$('#block_<?php echo $this->data['Page']['id'];?>_2').hide();
		$('#block_<?php echo $this->data['Page']['id'];?>_3').hide();
		$('#block_<?php echo $this->data['Page']['id'];?>_4').hide();			
	}
}
//]]>
</script>