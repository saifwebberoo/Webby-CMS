<?php
/*
 * Fast Mail Sender
 */
class FastMailComponent extends Component {

	/*
	 *  params $option = array('to'=>'','subject=>'','message'=>'');
	 */

	public static function sendMail(array $options = array()) {
		extract($options);
		
		if(!isset($title)){
			$title = 'AandRNetwork Admin Email';
		}
		
		if(!isset($from)){
			$from = 'admin@aandrnetwork.com';
		}
		
		if(!isset($from_name)){
			$from_name = 'AandRNetwork Admin Email';
		}else{
			$from_name = str_replace(':', '', $from_name);
		}
		

		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

		// More headers
		$headers .= 'From: '. $from_name .' <'.$from.'>'. "\r\n";
		if(isset($cc)){
			$headers .= 'Cc: '.$cc. "\r\n";
		}

		$message = '<html><head><title>'.$title.'</title></head><body>'.$message.'</body></html>';
		$message	=  wordwrap($message, 70);
		
		mail($to,$subject,$message,$headers);

	}
}
?>