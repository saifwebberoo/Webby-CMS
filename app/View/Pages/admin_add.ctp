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
	<table width="100%" cellpadding="4" cellspacing="0">
		<tr>
			<td valign="top" width="70%" style="padding-right:20px; vertical-align: top;">
				
				<div class="form_input" style="width: 45%; float: left;">
				<label>Menu Label</label>
				<?php
					echo $this->Form->input('menu_label',array('class'=>'text-input large-input'));
				?>
				<br /><small>Please add Menu Label</small>
				</div>
				<div class="form_input" style="width: 45%; float: right;" id="block_0_0">
				<label>Page Title</label>
				<?php
					echo $this->Form->input('title',array('class'=>'text-input large-input'));
				?>
				<br /><small>Please add page title.</small>
				</div>
				<div class="form_input" style="clear:both; width: 99%;" id="block_0_1">
				<?php
					echo $this->Form->input('content',array('label'=>false));
				?>
				<a href="#" id="editori-0" class="editor-switch fr" onclick ="toggleEditor('PageContent',$('#'+this.id));return false;">Switch To Html</a>
				</div>
				
				<div class="form_input" id="block_0_2">
					<h3 id="hhead_script-0"  onclick="xTogle('head_script-0','Head Section CSS/Script');">&#9658; Head Section CSS/Script</h3>
					<div id="head_script-0" style="display:none;">
						<?=$this->Form->input('head_script');?>
					</div>
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
							'complete'=>'messageCloseReactivate(\'/admin/pages\',\'Page List\');',
							'class'=>'button'
						));
					?>
					<?php echo $this->Form->input('islink',array('options'=>array('0'=>'Page', '1'=>'Link'),'onchange'=>'selectpagetype_0(this.value)'));?>
				</div>	
				<div class="form_input">
				<label>Would you like to publish this page?</label>
					<?=$this->Form->input('published',array('type'=>'checkbox'));?> Publish
				</div>
				<div class="form_input">
					<h3 id="hpageparent-0" onclick="xTogle('pageparent-0','Menu Setting');">&#9660; Menu Setting</h3>
					<div id="pageparent-0" style="display:block;">
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

				<div class="form_input" id="block_0_3">
					<h3 id="hformslist-0" onclick="xTogle('formslist-0','Forms');">&#9658; Forms</h3>
					<div id="formslist-0" style="display:none;">
						<ul>
						<?php
							$form_class = ClassRegistry::init('Form');
							$form_class->displayField = 'keyword';
							$iforms = $form_class->find('list',array('order'=>'keyword'));
							foreach($iforms as $ikey=>$iform){
								echo '<li><a href="#" onclick="addtotiny(\'{',$iform,'}\',\'PageContent\');return false;">{',$iform,'}</a>&nbsp;<a href="/admin/forms/view/',$ikey,'" target="_blank"><img  border="0" src="/img/icons/magnifier--arrow.png" title="Preview" width="16px" align="top" /></a></li>';
							}
						?>
						</ul>
					</div>
				</div>
				<div class="form_input" id="block_0_4">
					<h3 id="hseodiv-0" onclick="xTogle('seodiv-0','SEO');">&#9658; SEO</h3>
					<div id="seodiv-0" style="display:none;">
						<div class="form_input">
						<label>Meta Keyword</label>
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
					<h3 id="hwidgetdiv-0" onclick="xTogle('widgetdiv-0','Widgets');" >&#9658; Widgets</h3>
					<div id="widgetdiv-0" style="display:none;">
						<?php echo $this->Form->input('Widget.Widget',array('multiple'=>'checkbox','options'=>$widgets,'label'=>false));?>
					</div>
				</div>
				
			</td>
		</tr>
	</table>
	</fieldset>
<?php
	echo $this->TinyMce->init('PageContent');
?>
	<div class="clear"></div>
</form>

<?php
echo $this->Js->writeBuffer(); // Write cached scripts
?>
<script type="text/javascript">
//<![CDATA[
function selectpagetype_0(val){
	if(val==0){
		$('#block_0_0').show();
		$('#block_0_1').show();
		$('#block_0_2').show();
		$('#block_0_3').show();
		$('#block_0_4').show();	
	}else{
		$('#block_0_0').hide();
		$('#block_0_1').hide();
		$('#block_0_2').hide();
		$('#block_0_3').hide();
		$('#block_0_4').hide();			
	}
}
//]]>
</script>