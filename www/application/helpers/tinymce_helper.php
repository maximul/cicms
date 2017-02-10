<?php

/**
 *
 * �������� �����: ������ ��� ������ TinyMCE 
 *
 * @������ 8.9.2009
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

	//���������� ��� ��������� ��� �������� � ��������� ID 
	function show_tinymce ($id) {
		
		$CI = &get_instance ();
		
		$data = array ();
		$data['id'] = $id;
		
		//��������� ��� �� �����		
		$code = $CI->load->view ('tinymce',$data,TRUE);
		
		return $code;
			
	}
	
	//������� ������� Header-�, ���������� �����������
	function nocache_headers () {
		// Date in the past
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		
		// always modified
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		 
		// HTTP/1.1
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		
		// HTTP/1.0
		header("Pragma: no-cache");	
				
	}


?>