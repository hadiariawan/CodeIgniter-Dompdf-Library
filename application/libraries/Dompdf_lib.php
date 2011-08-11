<?php

class Dompdf_lib {
    
	var $_dompdf = NULL;
	
	function __construct()
	{
		require_once("dompdf/dompdf_config.inc.php");
		if(is_null($this->_dompdf)){
			$this->_dompdf = new DOMPDF();
		}
	}
	
	function convert_html_to_pdf($html, $filename ='', $stream = TRUE) 
	{
		$this->_dompdf->load_html($html);
		$this->_dompdf->render();
		if ($stream) {
			$this->_dompdf->stream($filename);
		} else {
			return $this->_dompdf->output();
		}
	}
	
}
?>