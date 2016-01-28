<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->database();
		$this->load->library('session');
		

	}

	public function index()
	{
		if ($this->session->userdata('empid'))
		{
			$this->load->view('employeeview');
		}

		else
		{
			echo "Session Does not exists";
			header("location:".base_url()."index.php/Dashboard");

		}
		
	}

	public function logout()
	{
		$this->session->unset_userdata('empid');
		header("location:".base_url()."index.php/Dashboard");

		//$this->session->sess_destroy();
	}
}