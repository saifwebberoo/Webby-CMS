<?php
	/**
	 * Handle file uploads via XMLHttpRequest
	 */
	class qqUploadedFileXhr {
		/**
		 * Save the file to the specified path
		 * @return boolean TRUE on success
		 */
		function save($path) {    
			$input = fopen("php://input", "r");
			$temp = tmpfile();
			$realSize = stream_copy_to_stream($input, $temp);
			fclose($input);
			
			if ($realSize != $this->getSize()){            
				return false;
			}
			
			$target = fopen($path, "w");        
			fseek($temp, 0, SEEK_SET);
			stream_copy_to_stream($temp, $target);
			fclose($target);
			
			return true;
		}
		function getName() {
			return $_GET['qqfile'];
		}
		function getSize() {
			if (isset($_SERVER["CONTENT_LENGTH"])){
				return (int)$_SERVER["CONTENT_LENGTH"];            
			} else {
				throw new Exception('Getting content length is not supported.');
			}      
		}   
	}

	/**
	 * Handle file uploads via regular form post (uses the $_FILES array)
	 */
	class qqUploadedFileForm {  
		/**
		 * Save the file to the specified path
		 * @return boolean TRUE on success
		 */
		function save($path) {
			if(!move_uploaded_file($_FILES['qqfile']['tmp_name'], $path)){
				return false;
			}
			echo $path;
			return true;
		}
		function getName() {
			return $_FILES['qqfile']['name'];
		}
		function getSize() {
			return $_FILES['qqfile']['size'];
		}
	}




	
	class AjaxUploadCropComponent extends Component{
	
		public $allowedExtensions = array();
		public $sizeLimit = 10485760;
		public $file;
		public function init(array $allowedExtensions = array(), $sizeLimit = 10485760){        
			$allowedExtensions = array_map("strtolower", $allowedExtensions);
				
			$this->allowedExtensions = $allowedExtensions;        
			$this->sizeLimit = $sizeLimit;
			
			$this->checkServerSettings();       

			if (isset($_GET['qqfile'])) {
				$this->file = new qqUploadedFileXhr();
			} elseif (isset($_FILES['qqfile'])) {
				$this->file = new qqUploadedFileForm();
			} else {
				$this->file = false; 
			}
		}
		
		private function checkServerSettings(){        
			$postSize = $this->toBytes(ini_get('post_max_size'));
			$uploadSize = $this->toBytes(ini_get('upload_max_filesize'));        
			
	/*         if ($postSize < $this->sizeLimit || $uploadSize < $this->sizeLimit){
				$size = max(1, $this->sizeLimit / 1024 / 1024) . 'M';             
				die("{'error':'increase post_max_size and upload_max_filesize to $size'}");    
			}   */      
		}
		
		private function toBytes($str){
			$val = trim($str);
			$last = strtolower($str[strlen($str)-1]);
			switch($last) {
				case 'g': $val *= 1024;
				case 'm': $val *= 1024;
				case 'k': $val *= 1024;        
			}
			return $val;
		}
		
		/**
		 * Returns array('success'=>true) or array('error'=>'error message')
		 */
		function handleUpload($uploadDirectory, $replaceOldFile = FALSE){
			if (!is_writable($uploadDirectory)){
				return array('error' => "Server error. Upload directory isn't writable.");
			}
			
			if (!$this->file){
				return array('error' => 'No files were uploaded.');
			}
			
			$size = $this->file->getSize();
			
			if ($size == 0) {
				return array('error' => 'File is empty');
			}
			
			if ($size > $this->sizeLimit) {
				return array('error' => 'File is too large');
			}
			
			$pathinfo = pathinfo($this->file->getName());
			$filename = $pathinfo['filename'];
			//$filename = md5(uniqid());
			$ext = $pathinfo['extension'];

			if($this->allowedExtensions && !in_array(strtolower($ext), $this->allowedExtensions)){
				$these = implode(', ', $this->allowedExtensions);
				return array('error' => 'File has an invalid extension, it should be one of '. $these . '.');
			}
			
			if(!$replaceOldFile){
				/// don't overwrite previous files that were uploaded
				while (file_exists($uploadDirectory . $filename . '.' . $ext)) {
					$filename .= rand(10, 99);
				}
			}
			
			if ($this->file->save($uploadDirectory . $filename . '.' . $ext)){
				return array('success'=>true,'file_name'=>$filename . '.' . $ext);
			} else {
				return array('error'=> 'Could not save uploaded file.' .
					'The upload was cancelled, or server error encountered');
			}
			
		}
		function cropImage($folder){
			$allocateMemory = '100M';
			// We don't want to run out of memory
			ini_set('memory_limit', $allocateMemory);
			
			@unlink(WWW_ROOT.'uploads/'.$folder.'/croped_images/'.$_POST['cimage_name']);
			//$targ_w = $targ_h = 240;
			$quality = 90;
			$src = WWW_ROOT.'uploads/'.$folder.'/thumb_images/'.$_POST['cimage_name'];
			$thumb_path= WWW_ROOT.'uploads/'.$folder.'/croped_images/'.$_POST['cimage_name'];

			$imgInfo = getimagesize($src);
			$width_orig  = $imgInfo[0];
			$height_orig = $imgInfo[1];

			// Set up the appropriate image handling functions based on the original image's mime type
			switch ($imgInfo['mime']) {
				case 'image/gif':
					// We will be converting GIFs to PNGs to avoid transparency issues when resizing GIFs
					// This is maybe not the ideal solution, but IE6 can suck it
					$creationFunction = 'ImageCreateFromGif';
					$outputFunction = 'ImagePng';
					$mime = 'image/png'; // We need to convert GIFs to PNGs
					$doSharpen = FALSE;
					$quality = round(10 - ($quality / 10)); // We are converting the GIF to a PNG and PNG needs a compression level of 0 (no compression) through 9
					break;

				case 'image/x-png':
				case 'image/png':
					$creationFunction = 'ImageCreateFromPng';
					$outputFunction = 'ImagePng';
					$doSharpen = FALSE;
					$quality = round(10 - ($quality / 10)); // PNG needs a compression level of 0 (no compression) through 9
					break;

				default:
					$creationFunction = 'ImageCreateFromJpeg';
					$outputFunction = 'ImageJpeg';
					$doSharpen = TRUE;
					break;
			}
			
			// Read in the original image
			$img_r = $creationFunction($src);
			$dst_r = ImageCreateTrueColor( $_POST['w'],$_POST['h'] );

			if (in_array($imgInfo['mime'], array('image/gif', 'image/png'))) {
				// If this is a GIF or a PNG, we need to set up transparency
				imagealphablending($dst_r, false);
				imagesavealpha($dst_r, true);
			}

			$width = $_POST['w'];
			$height = $_POST['h'];
			if($width>$width_orig || $height>$height_orig){
				// Get new dimensions
				$ratio_orig = $width_orig/$height_orig;

				if ($width/$height > $ratio_orig) {
				   $width = $height*$ratio_orig;
				} else {
				   $height = $width/$ratio_orig;
				}	
	
				imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'], $_POST['w'],$_POST['h'],$width_orig,$height_orig);
				$outputFunction($dst_r,$thumb_path,$quality);
			}else{
				imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'], $_POST['w'],$_POST['h'],$_POST['w'],$_POST['h']);
				$outputFunction($dst_r,$thumb_path,$quality);
			}
			
			/* if ($doSharpen) {
				// Sharpen the image based on two things:
				//	(1) the difference between the original size and the final size
				//	(2) the final size
				$sharpness = $this->_findSharp($width_orig, $_POST['w']);

				$sharpenMatrix = array(
					array(-1, -2, -1),
					array(-2, $sharpness + 12, -2),
					array(-1, -2, -1)
				);
				$divisor = $sharpness;
				$offset = 0;
				imageconvolution($dst_r, $sharpenMatrix, $divisor, $offset);
			} */
			
			echo '<img src="/uploads/'.$folder.'/croped_images/'.$_POST['cimage_name'].'?'.rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).'">';			
			
		}	

		/**
		 * Detects the sharpness of the photo
		 * 
		 * @access private
		 * @param float $orig
		 * @param float $final
		 * @return float 
		 */
		private function _findSharp($orig, $final) {
			$final = $final * (750.0 / $orig);
			$a = 52;
			$b = -0.27810650887573124;
			$c = .00047337278106508946;

			$result = $a + $b * $final + $c * $final * $final;

			return max(round($result), 0);
		}
	}	
	
	
?>

