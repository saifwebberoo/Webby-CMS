<style type="text/css">
.qq-upload-list{
	display:none;
}
</style>
<a style="float:right;" href="#" onclick="closeTab('0');return false;"><img src="/admin_theme/cross_grey_small.png" alt="Add"></a><br />
<?php 
	if(isset($saved) && $saved)
		echo $this->Session->flash('flash', array('element' => 'flash/success'));
	else
		echo $this->Session->flash('flash', array('element' => 'flash/waring'));
?>	
	<fieldset> 
	<table width="100%" cellpadding="4" cellspacing="0">
		<tr>
			<td valign="top">
				<?php 
					echo $this->Form->create(null, array(
					'url' => '/admin/images/add',
					'default' => false,
					'inputDefaults' => array(
					'label' => false,
					'div' => false,
					'error'=>array('wrap' => 'span', 'class' => 'input-notification error png_bg', 'escape' => true)
					)
					)); 
					echo $this->Form->input('image_name',array('type'=>'hidden','id'=>'image_name_0'));
				?>
				<div class="form_input" style="float: left;width: 400px;">
				<label>Category</label>
				<?php
					echo $this->Form->input('image_category_id',array('class'=>'text-input','id'=>'ImageCat_0','onchange'=>'createUploader_0();'));
				?>
				<br /><small>Please select the category.</small>
				</div>
				<div class="form_input" style="float: right;margin-top: 30px;width: 100px;" >
				<?php
						echo $this->Js->submit('Save Image', array(
							'update' => '#tabc_0', 
							'div' => false, 
							'type' => 'post', 
							'async' => false,
							'complete'=>'messageCloseReactivate(\'/admin/images\',\'Images List\');',
							'class'=>'button',
							'style'=>'display:none',
							'id'=>'imageSavebtn_0'
						));
					?>
				</div>
				<div class="form_input crlb">
					<div id="file-uploader-0">		
						<noscript></noscript>         
					</div>	
					<div id="add_form"></div>
				</div>	
				<div class="form_input crlb">
					<div id="crop_area_0" style="float:left">
						<div id="pageparent-0" style="display:block;">
							<div class="form_input">
								<div id="preview_0" style="float:left"></div>	<div id="crop_preview_0" style="float:left;margin-left:10px;"></div>			
								<input type="button" id="crop_button_0" value="Crop Image" style="clear:both; display:block;" />				
							</div>
						</div>
					</div>
				</div>
				<div class="form_input" style="clear:both;">
				<label>Image Title</label>
				<?php
					echo $this->Form->input('name',array('class'=>'text-input large-input'));
				?>
				</div>
				<div class="form_input crlb">
				<label>Description</label>
				<?php
					echo $this->Form->input('description',array('class'=>'text-input large-input'));
				?>
				<br /><small>Used to display in description tag.</small>
				</div>
				<div class="form_input crlb">
				<label>Url</label>
				<?php
					echo $this->Form->input('url',array('class'=>'text-input large-input'));
				?>
				<br /><small>Please add a url to link on the image. for example (www.google.com)</small>
				</div>
				<div class="form_input crlb">
				<div class="checkbox">
				<?php
					echo $this->Form->input('new_window',array('label'=>'Open In New Window'));
				?>
				</div>
				</div>
				</form>	
				<form action="#" method="post" id="crop_values_0">
					<input type="hidden" id="x_0" name="x" />
					<input type="hidden" id="y_0" name="y" />
					<input type="hidden" id="w_0" name="w" />
					<input type="hidden" id="h_0" name="h" />
					<input type="hidden" id="cimage_name_0" name="cimage_name" />
				</form>	
			</td>
		</tr>
	</table>
</fieldset>
<div class="clear"></div>
<script type="text/javascript">  
//<![CDATA[ 

function createUploader_0(){
		$('#preview_0').html('');
		$('#crop_preview_0').html('');
		var uploader = new qq.FileUploader({
			element: document.getElementById('file-uploader-0'),
			action: '/admin/images/ajax_upload/'+$('#ImageCat_0').val(),
			sizeLimit: 5000000, // max size   
			minSizeLimit: 10, // min size				
			debug: true,
			onSubmit: function(id, fileName){
				$('#preview_0').html('<img src="/img/loading.gif" alt="Uploading" />');
			},
			onProgress: function(id, fileName, loaded, total){
				function getFormatSize(bytes){
					var i = -1;                                    
					do {
						bytes = bytes / 1024;
						i++;  
					} while (bytes > 99);
					
					return Math.max(bytes, 0.1).toFixed(1) + ['kB', 'MB', 'GB', 'TB', 'PB', 'EB'][i];          
				}
				var text; 
				if (loaded != total){
					text = Math.round(loaded / total * 100) + '% from ' + getFormatSize(total);
				} else {                                   
					text = getFormatSize(total);
				}          
				
				$('#preview_0').html(text+'&nbsp;&nbsp;<img src="/img/loading.gif" alt="Uploading" />');
			},
			onComplete: function(id, fileName, responseJSON){
				var filenameServer =  responseJSON['file_name'];
				$('#crop_area_0').show();
				$('#preview_0').html('<img id="cropbox_0" src="/uploads/'+$("#ImageCat_0 option[value='"+$("#ImageCat_0").val()+"']").text().replace(' ','_')+'/thumb_images/'+filenameServer+'" />');
				
				/* Preview Image */
				$('#image_name_0').val(filenameServer);
				/* Preview Image */				
						
				/* Crop Image */
				$('#x_0').val(0);
				$('#y_0').val(0);
				$('#w_0').val(responseJSON['crop_width']);
				$('#h_0').val(responseJSON['crop_height']);
				$('#cimage_name_0').val(filenameServer);	
				/* Crop Image */

				$('#cropbox_0').Jcrop({
					allowSelect: true,
					allowResize: false,
					minSize: [ responseJSON['crop_width'], responseJSON['crop_height'] ],
					maxSize: [ responseJSON['crop_width'], responseJSON['crop_height'] ],
					setSelect: [ 0, 0, responseJSON['crop_width'], responseJSON['crop_height'] ],
					onSelect: updateCoords_0
				});
				
			},
		});           
	}

	$(function(){
		createUploader_0();  
		$("#crop_button_0").click(function(){
			if(checkCoords_0()){
				$('#crop_preview_0').html('<img src="/img/loading.gif" alt="Uploading" />');
				$.ajax({
						url:"/admin/images/crop_image/"+$('#ImageCat_0').val(),
						success:function(result){
						  $("#crop_preview_0").html('').html(result);
						},
						data:$("#crop_values_0").serialize(),
						type:"post",
				});
				$('#imageSavebtn_0').show();
			}
		});
	});	

function updateCoords_0(c){
	$('#x_0').val(c.x);
	$('#y_0').val(c.y);
	$('#w_0').val(c.w);
	$('#h_0').val(c.h);
};

function checkCoords_0(){
	if (parseInt($('#w_0').val(),10)>0) return true;
	alert('Please select a crop region then press submit.');
	return false;
};	

//]]>
</script> 
<?php
echo $this->Js->writeBuffer(); // Write cached scripts
?>