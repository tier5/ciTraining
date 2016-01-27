<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->database();
		

	}

	public function index()
	{
		$this->load->view('employeeview');
	}
}