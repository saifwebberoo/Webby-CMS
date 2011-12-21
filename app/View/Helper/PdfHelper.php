<?php 

App::import('Vendor','mPDF',array('file' => 'mpdf/mpdf.php'));

class PdfHelper extends AppHelper {

	var $mpdf;
	
	function PdfHelper($mode = 'c', $page_type = 'fullpage'){
		$this->mpdf = new mPDF($mode); 
		$this->mpdf->directionality = 'ltr';
		$this->mpdf->SetDisplayMode($page_type);
	}

	function setStyleSheet($stylesheet){
	
		// LOAD a stylesheet
		$this->mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
	}
	
	function setStyleSheetFile($file_path){
	
		// LOAD a stylesheet
		$stylesheet = file_get_contents($file_path);
		$this->mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
	}
	
	function render($html){
	
		$this->mpdf->WriteHTML($html);
		$this->mpdf->Output();
		exit;
	}
	
}
?>