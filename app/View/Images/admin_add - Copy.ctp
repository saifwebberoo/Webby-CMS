<link href="/ajax_upload_crop/fileuploader.css" rel="stylesheet" type="text/css">	
<script src="/ajax_upload_crop/fileuploader.js" type="text/javascript"></script>

<script src="/ajax_upload_crop/js/jquery.min.js"></script>
<script src="/ajax_upload_crop/js/jquery.Jcrop.js"></script>
<script type="text/javascript" src="/ajax_upload_crop/js/jquery.form.js"></script>
<link rel="stylesheet" href="/ajax_upload_crop/css/jquery.Jcrop.css" type="text/css" />	
	
<script>        
	function createUploader(){            
		var uploader = new qq.FileUploader({
			element: document.getElementById('file-uploader-demo1'),
			action: '/admin/images/ajax_upload/',
			sizeLimit: 5000000, // max size   
			minSizeLimit: 10, // min size				
			debug: true,

			onComplete: function(id, fileName, responseJSON)
			{
				var filenameServer = responseJSON['file_name'];
				$('#crop_area').show();
				$('#preview').html('<img id="cropbox" width="400" src="/uploads/thumb_images/'+filenameServer+'"><input type="hidden" name="image_name" id="image_name" value="'+filenameServer+'" />');
				$('#add_form').html('<input type="hidden" name="data[Image][image_name]" id="image_name" value="'+filenameServer+'" />');			
			},
			
		});           
	}
	
	// in your app create uploader as soon as the DOM is ready
	// don't wait for the window to load  
	createUploader();     
</script> 
<script type="text/javascript" >
 $(function(){
 
	$("#preview").bind({
		mouseover:function(){$('#cropbox').Jcrop({aspectRatio: 1,onSelect: updateCoords});}  
	});


  $("#crop_button").click(function(){
	$.ajax(
		{
			url:"/admin/images/crop_image",
			success:function(result){
			  $("#crop_preview").html('');
			  $("#crop_preview").html(result);
			},
			data:$("form").serialize(),
			type:"post",
		}
	);
  });

 
  
});
</script>
<script language="Javascript">
function updateCoords(c)
{
	$('#x').val(c.x);
	$('#y').val(c.y);
	$('#w').val(c.w);
	$('#h').val(c.h);
};

function checkCoords()
{
	if (parseInt($('#w').val())) return true;
	alert('Please select a crop region then press submit.');
	return false;
};
</script>
<a style="float:right;" href="#" onclick="closeTab('0');return false;"><img src="/admin_theme/cross_grey_small.png" alt="Add"></a>
<?php 
	if(isset($saved) && $saved)
		echo $this->Session->flash('flash', array('element' => 'flash/success'));
	else
		echo $this->Session->flash('flash', array('element' => 'flash/waring'));
	echo $this->Form->create(null, array(
		'url' => '/admin/images/add',
		'inputDefaults' => array(
            'label' => false,
            'div' => false,
			'error'=>array('wrap' => 'span', 'class' => 'input-notification error png_bg', 'escape' => true)
        )
	)); 
?>	
	<fieldset> 
			<div class="form_input">
			<label>Upload Image</label>
				<div id="file-uploader-demo1">		
					<noscript>			
						<p></p>
						<!-- or put a simple form for upload here -->
					</noscript>         
				</div>			
			<?php
				//echo $this->Form->input('image_name',array('class'=>'text-input small-input','type'=>'file'));
			?>
			</div>
			<div class="form_input">
			<label>Category </label>
			<?php
				echo $this->Form->input('image_category_id',array('class'=>'text-input small-input'));
			?>
			<br /><small>Please add the category name</small>
			</div>
			<div class="form_input">
			<div id="add_form"></div>
			<?php
				echo $this->Js->submit('Save', array(
					'update' => '#tabc_0', 
					'div' => false, 
					'type' => 'post', 
					'async' => false,
					'complete'=>'messageCloseReactivate(\'/admin/images\');',
					'class'=>'button'
				));
			?>
			</div>
	</fieldset>
	<div class="clear"></div>
</form>
<div id="crop_area" style="display:none">
<form action="/admin/images/crop_image" method="post" onsubmit="return checkCoords();">
	<input type="hidden" id="x" name="x" />
	<input type="hidden" id="y" name="y" />
	<input type="hidden" id="w" name="w" />
	<input type="hidden" id="h" name="h" />
	<div id='preview'>

	</div>			
	<input type="button" id="crop_button" value="Crop Image" />
</form>	
 <div id="crop_preview"></div>
 </div>

<?php
echo $this->Js->writeBuffer(); // Write cached scripts
?>