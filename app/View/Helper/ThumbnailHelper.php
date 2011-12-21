<?php
class ThumbnailHelper extends AppHelper {
	function validate($path){
		if(file_exists(realpath($path))){
			if(strlen(trim(realpath($path)))>0){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	function render($image,$params){
		//Set defaults
        $path='';
        $width=150;
        $height=225;
        $quality=75;
        $extension='jpg';
		$zoom_crop = false;

        //Extract Parameters
        if(isset($params['path'])){
            $path = str_replace(array('\/','//'),'/',$params['path'].DS);
        }
        if(isset($params['width'])){
            $width = $params['width'];
        }
        if(isset($params['height'])){
            $height = $params['height'];
        }
        if(isset($params['quality'])){
            $quality = $params['quality'];
        }
        if(isset($params['extension'])){
            $extension = $params['extension'];
        }
		if(isset($params['zoom_crop'])){
            $zoom_crop = $params['zoom_crop'];
        }
	
		app::import('Vendor','phpthumb3',array('file'=>'phpThumb3'.DS.'ThumbLib.inc.php'));
		 
		 
		$options = array('resizeUp' => true, 'jpegQuality' => 80);

		try{
			$thumb = PhpThumbFactory::create($path.$image, $options);
			$image = $width.'x'.$height.'_'.$image;
			$thumb->Resize($width, $height)->save(WWW_ROOT.'img'.DS.'thumbs'.DS.$image); //,'PNG' ;
			return $image;
		}catch (Exception $e){
			// handle error here however you'd like
			return '';
		}

		//$thumb->crop(0,0,$width, $height);
		//$thumb->adaptiveResize($width, $height); //->createReflection(40, 40, 80, true, '#a4a4a4');
		
		//
		//$thumb->cropFromCenter($width, $height);
		//$thumb->adaptiveResizePercent($width, $height);
		//$thumb->adaptiveResize($width, $height);
		//$thumb->crop(0,0,$width, $height);
		//$thumb->adaptiveResize($width, $height);
	}
	
	function reflection($image,$params){
		//Set defaults
        $path='';
        $width=150;
        $height=225;
        $quality=75;
        $extension='jpg';
		$zoom_crop = false;

        //Extract Parameters
        if(isset($params['path'])){
            $path = str_replace(array('\/','//'),'/',$params['path'].DS);
        }
        if(isset($params['width'])){
            $width = $params['width'];
        }
        if(isset($params['height'])){
            $height = $params['height'];
        }
        if(isset($params['quality'])){
            $quality = $params['quality'];
        }
        if(isset($params['extension'])){
            $extension = $params['extension'];
        }
		if(isset($params['zoom_crop'])){
            $zoom_crop = $params['zoom_crop'];
        }
	
		app::import('Vendor','phpthumb3',array('file'=>'phpThumb3'.DS.'ThumbLib.inc.php'));
		 
		 
		$options = array('resizeUp' => true, 'jpegQuality' => 80);

		try{
			$thumb = PhpThumbFactory::create($path.$image, $options);
			$image = $width.'x'.$height.'_'.$image;
			$thumb->crop(0,0,$width, $height)->save(WWW_ROOT.'img'.DS.'thumbs'.DS.$image); //,'PNG' ;
			return $image;
		}catch (Exception $e){
			// handle error here however you'd like
			return '';
		}
		
		//$thumb->crop(0,0,$width, $height);
		//$thumb->adaptiveResize($width, $height); //->createReflection(40, 40, 80, true, '#a4a4a4');
		
		//
		//$thumb->cropFromCenter($width, $height);
		//$thumb->adaptiveResizePercent($width, $height);
		//$thumb->adaptiveResize($width, $height);
		//$thumb->crop(0,0,$width, $height);
		//$thumb->adaptiveResize($width, $height);
	}
	
	
	function get_ss_fixed_path($full_path){
		if($this->validate($full_path)){
			$full_path = realpath($full_path);
			$image_info = pathinfo($full_path);
			
			return 	'img/thumbs/'.$this->reflection(
					$image_info['basename'],
					array( 
						'path'=>$image_info['dirname'],						
						'width'=>322,
						'height'=>316,
						'quality'=>100,
						'extension'=>$image_info['extension'],
						'zoom_crop'=>true									
					)
				);
			
			return 	'img/thumbs/'.$this->render(
					$image_info['basename'],
					array( 
						'path'=>$image_info['dirname'],						
						'width'=>322,
						'height'=>316,
						'quality'=>100,
						'extension'=>$image_info['extension'],
						'zoom_crop'=>true									
					)
				);
		}else{
			return 0;
		}
	}
	
	function get_ss_path($image_name){
		$full_path = WWW_ROOT.'attachments/original/'.$image_name;
		if(strlen(trim($image_name))>0 && $this->validate($full_path)){
			$full_path = realpath(WWW_ROOT.'attachments/original/'.$image_name);
			$image_info = pathinfo($full_path);
			
			return 	'img/thumbs/'.$this->reflection(
					$image_info['basename'],
					array( 
						'path'=>$image_info['dirname'],						
						'width'=>322,
						'height'=>316,
						'quality'=>100,
						'extension'=>$image_info['extension'],
						'zoom_crop'=>true									
					)
				);
			
			return 	'img/thumbs/'.$this->render(
					$image_info['basename'],
					array( 
						'path'=>$image_info['dirname'],						
						'width'=>322,
						'height'=>316,
						'quality'=>100,
						'extension'=>$image_info['extension'],
						'zoom_crop'=>true									
					)
				);
		}else{
			return 0;
		}
	}
}
?>