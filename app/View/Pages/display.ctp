<?php
	/*********** All Other Page Start *********************/
?>
	<!--<h1 class="page-title"><?php //echo $page['Page']['title'];?></h1>-->
<?php
	$content = $page['Page']['content'];
	
	$from_class = ClassRegistry::init('Form');
	$from_objects = $from_class->find('all');
	
	foreach($from_objects as $fo){
		$pos = strpos($content, '{'.$fo['Form']['keyword'].'}');
		if($pos !== false){
			$content = str_replace('{'.$fo['Form']['keyword'].'}', getForm($fo,$this), $content);
		}
	}
	
	echo $content.'<br /><br />'; 
	/*********** All Other Page Start *********************/

	function getForm($fo, &$cur_this){
	
		$method = 'POST';
		//if($fo['Form']['fmethod']==1){
		//	$method = 'GET';
		//}
		
		$action = '/saveform';
		if(strlen(trim($fo['Form']['faction']))>2){
			$action = $fo['Form']['faction'];
		}
		
		$redirect = $cur_this->here;
		if(strlen(trim($fo['Form']['redirect']))>2){
			$redirect = $fo['Form']['redirect'];
		}
		
		if($cur_this->Session->check($fo['Form']['keyword'].'_message')){
			echo '<p>'.$cur_this->Session->read($fo['Form']['keyword'].'_message').'</p>';
			if(isset($_SESSION[$fo['Form']['keyword'].'_message'])){
				unset($_SESSION[$fo['Form']['keyword'].'_message']);
			}
		}
		
		$form_content = '<form name="'.$fo['Form']['keyword'].'" action="'.$action.'" method="'.$method.'" id="'.$fo['Form']['keyword'].'">';
		
		$form_content .= '<input name="data[formname]" type="hidden" value="'.base64_encode($fo['Form']['keyword'].'###'.$fo['Form']['id']).'" />';
		
		$form_content .= '<input name="data[redirect]" type="hidden" value="'.$redirect.'" />';
		
		$form_content .= $fo['Form']['content'];
		$form_content .= '</form>';
		
		return $form_content;
		
	}
?>