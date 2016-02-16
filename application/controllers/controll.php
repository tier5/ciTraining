<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DateControll extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('DateModel');
		$this->load->library('session');

		/*if (!$this->session->userdata('adminid'))
		{
			redirect("Dashboard");
		}*/

	}
}
?>