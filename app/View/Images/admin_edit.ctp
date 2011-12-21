<a style="float:right;" href="#" onclick="closeTab('<?php echo $this->data['Image']['id'];?>');return false;"><img src="/admin_theme/cross_grey_small.png" alt="Edit"></a>
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
						'url' => '/admin/images/edit/'.$this->data['Image']['id'],
						'inputDefaults' => array(
							'label' => false,
							'div' => false,
							'error'=>array('wrap' => 'span', 'class' => 'input-notification error png_bg', 'escape' => true)
						)
					));
					echo $this->Form->input('id', array('type'=>'hidden'));
					echo $this->Form->input('image_name',array('type'=>'hidden','id'=>'image_name_'.$this->data['Image']['id']));
				?>
				<div class="form_input">
					<img height="150px" src="/uploads/<?php echo str_replace(' ','_',$this->data['ImageCategory']['name']);?>/croped_images/<?php echo $this->data['Image']['image_name'];?>" />
				</div>
				<div class="form_input" style="float: left;width: 400px;display:none;">
				<label>Category</label>
				<?php
					echo $this->Form->input('image_category_id',array('class'=>'text-input','id'=>'ImageCat_'.$this->data['Image']['id'],'onchange'=>'createUploader_'.$this->data['Image']['id'].'()'));
				?>
				<br /><small>Please select the category.</small>
				</div>
				<div class="form_input" style="float: right;margin-top: 30px;width: 100px;" >
				<?php
						echo $this->Js->submit('Save Image', array(
							'update' => '#tabc_'.$this->data['Image']['id'], 
							'div' => false, 
							'type' => 'post', 
							'async' => false,
							'complete'=>'messageCloseReactivate(\'/admin/images\',\'Images List\');',
							'class'=>'button',
							'id'=>'imageSavebtn_'.$this->data['Image']['id']
						));
					?>
				</div>
				<div class="form_input crlb">
					<div id="file-uploader-<?php echo $this->data['Image']['id'];?>">		
						<noscript></noscript>         
					</div>	
					<div id="add_form"></div>
				</div>	
				<div class="form_input crlb">
					<div id="crop_area_<?php echo $this->data['Image']['id'];?>" style="float:left">
						<div id="pageparent-<?php echo $this->data['Image']['id'];?>" style="display:block;">
							<div class="form_input">
								<div id="preview_<?php echo $this->data['Image']['id'];?>" style="float:left"></div>	<div id="crop_preview_<?php echo $this->data['Image']['id'];?>" style="float:left;margin-left:10px;"></div>			
								<input type="button" id="crop_button_<?php echo $this->data['Image']['id'];?>" value="Crop Image" style="clear:both; display:block;" />				
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
				<form action="#" method="post" id="crop_values_<?php echo $this->data['Image']['id'];?>">
					<input type="hidden" id="x_<?php echo $this->data['Image']['id'];?>" name="x" />
					<input type="hidden" id="y_<?php echo $this->data['Image']['id'];?>" name="y" />
					<input type="hidden" id="w_<?php echo $this->data['Image']['id'];?>" name="w" />
					<input type="hidden" id="h_<?php echo $this->data['Image']['id'];?>" name="h" />
					<input type="hidden" id="cimage_name_<?php echo $this->data['Image']['id'];?>" name="cimage_name" />
				</form>	
			</td>
		</tr>
	</table>
</fieldset>
<div class="clear"></div>
<script type="text/javascript">  
//<![CDATA[ 

function createUploader_<?php echo $this->data['Image']['id'];?>(){    
		$('#preview_<?php echo $this->data['Image']['id'];?>').html('');
		$('#crop_preview_<?php echo $this->data['Image']['id'];?>').html('');
		var uploader = new qq.FileUploader({
			element: document.getElementById('file-uploader-<?php echo $this->data['Image']['id'];?>'),
			action: '/admin/images/ajax_upload/'+$('#ImageCat_<?php echo $this->data['Image']['id'];?>').val(),
			sizeLimit: 5000000, // max size   
			minSizeLimit: 10, // min size				
			debug: true,
			onSubmit: function(id, fileName){
				$('#preview_<?php echo $this->data['Image']['id'];?>').html('<img src="/img/loading.gif" alt="Uploading" />');
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
				
				$('#preview_<?php echo $this->data['Image']['id'];?>').html(text+'&nbsp;&nbsp;<img src="/img/loading.gif" alt="Uploading" />');
			},
			onComplete: function(id, fileName, responseJSON){
				var filenameServer =  responseJSON['file_name'];
				$('#crop_area_<?php echo $this->data['Image']['id'];?>').show();
				$('#preview_<?php echo $this->data['Image']['id'];?>').html('<img id="cropbox_<?php echo $this->data['Image']['id'];?>" src="/uploads/'+$("#ImageCat_<?php echo $this->data['Image']['id'];?> option[value='"+$("#ImageCat_<?php echo $this->data['Image']['id'];?>").val()+"']").text().replace(' ','_')+'/thumb_images/'+filenameServer+'" />');
				
				/* Preview Image */
				$('#image_name_<?php echo $this->data['Image']['id'];?>').val(filenameServer);
				/* Preview Image */				
						
				/* Crop Image */
				$('#x_<?php echo $this->data['Image']['id'];?>').val(0);
				$('#y_<?php echo $this->data['Image']['id'];?>').val(0);
				$('#w_<?php echo $this->data['Image']['id'];?>').val(responseJSON['crop_width']);
				$('#h_<?php echo $this->data['Image']['id'];?>').val(responseJSON['crop_height']);
				$('#cimage_name_<?php echo $this->data['Image']['id'];?>').val(filenameServer);	
				/* Crop Image */

				$('#cropbox_<?php echo $this->data['Image']['id'];?>').Jcrop({
					allowSelect: true,
					allowResize: false,
					minSize: [ responseJSON['crop_width'], responseJSON['crop_height'] ],
					maxSize: [ responseJSON['crop_width'], responseJSON['crop_height'] ],
					setSelect: [ 0, 0, responseJSON['crop_width'], responseJSON['crop_height'] ],
					onSelect: updateCoords_<?php echo $this->data['Image']['id'];?>
				});
				
			},
		});           
	}

	$(function(){
		createUploader_<?php echo $this->data['Image']['id'];?>();  
		$("#crop_button_<?php echo $this->data['Image']['id'];?>").click(function(){
			if(checkCoords_<?php echo $this->data['Image']['id'];?>()){
				$('#crop_preview_<?php echo $this->data['Image']['id'];?>').html('<img src="/img/loading.gif" alt="Uploading" />');
				$.ajax({
						url:"/admin/images/crop_image/"+$('#ImageCat_<?php echo $this->data['Image']['id'];?>').val(),
						success:function(result){
						  $("#crop_preview_<?php echo $this->data['Image']['id'];?>").html('').html(result);
						},
						data:$("#crop_values_<?php echo $this->data['Image']['id'];?>").serialize(),
						type:"post",
				});
				$('#imageSavebtn_<?php echo $this->data['Image']['id'];?>').show();
			}
		});
	});	

function updateCoords_<?php echo $this->data['Image']['id'];?>(c){
	$('#x_<?php echo $this->data['Image']['id'];?>').val(c.x);
	$('#y_<?php echo $this->data['Image']['id'];?>').val(c.y);
	$('#w_<?php echo $this->data['Image']['id'];?>').val(c.w);
	$('#h_<?php echo $this->data['Image']['id'];?>').val(c.h);
};

function checkCoords_<?php echo $this->data['Image']['id'];?>(){
	if (parseInt($('#w_<?php echo $this->data['Image']['id'];?>').val(),10)>0) return true;
	alert('Please select a crop region then press submit.');
	return false;
};	

//]]>
</script> 
<?php
echo $this->Js->writeBuffer(); // Write cached scripts
?>
