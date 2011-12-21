<head>
	<link href="fileuploader.css" rel="stylesheet" type="text/css">	
    <script src="fileuploader.js" type="text/javascript"></script>
	
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.Jcrop.js"></script>
	<script type="text/javascript" src="js/jquery.form.js"></script>
	<link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />	
	
    <script>        
        function createUploader(){            
            var uploader = new qq.FileUploader({
                element: document.getElementById('file-uploader-demo1'),
                action: 'php.php',
				sizeLimit: 5000000, // max size   
				minSizeLimit: 10, // min size				
                debug: true,

				onComplete: function(id, fileName, responseJSON)
				{
				var filenameServer = responseJSON['file_name'];
				$('#preview').html('<img id="cropbox" src="/ajax_upload_crop/uploads/'+filenameServer+'"><input type="hidden" name="image_name" id="image_name" value="'+filenameServer+'" />');
				},
				
            });           
        }
        
        // in your app create uploader as soon as the DOM is ready
        // don't wait for the window to load  
        window.onload = createUploader;     
    </script> 
	<script type="text/javascript" >
	 $(function(){
	 
		$("#preview").bind({
			mouseover:function(){$('#cropbox').Jcrop({aspectRatio: 1,onSelect: updateCoords});}  
		});


	  $("#crop_button").click(function(){
		$.ajax(
			{
				url:"crop.php",
				success:function(result){
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
</head>
<body>		
	<div id="file-uploader-demo1">		
		<noscript>			
			<p>Please enable JavaScript to use file uploader.</p>
			<!-- or put a simple form for upload here -->
		</noscript>         
	</div>
    <div id="crop_preview"></div>
	
	<form action="crop.php" method="post" onsubmit="return checkCoords();">
		<input type="hidden" id="x" name="x" />
		<input type="hidden" id="y" name="y" />
		<input type="hidden" id="w" name="w" />
		<input type="hidden" id="h" name="h" />
		<div id='preview'>
		<!-- <img width='200' src="uploads/1322645952-Bmw-hochhaus_1.jpg" id="cropbox"  class='preview'> -->
		</div>			
		<input type="button" id="crop_button" value="Crop Image" />
	</form>
