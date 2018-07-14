<?php
class Form extends CI_Controller {
	
	function form()
	{
		$this->load->helper(array('form', 'url'));
		
		$this->load->library('validation');
				
		if ($this->validation->run() == FALSE)
		{
			$this->load->view('myform');
		}
		else
		{
			$this->load->view('formsuccess');
		}
	}
}
?>