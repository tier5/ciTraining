<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('Dashboardmodel');
	}

	public function index()
	{
		$this->load->view('dashboardview');
	}

	public function adminlogin()
	{
		//echo "in admin login";
		extract($_POST);

		$data['name'] = $name;
		$data['password'] = $password;


		$result = $this->Dashboardmodel->adminlogin($data);
		
		if($result)
		{
			$this->load->view('adminview');
		}
		else
		{
			echo "wrong name or password";
		}
		
	}

	public function employeelogin()
	{
		extract($_POST);

		$data['name'] = $name;
		$data['password'] = $password;


		$result = $this->Dashboardmodel->employeelogin($data);
		
		if($result)
		{
			$this->load->view('employeeview');
		}
		else
		{
			echo "wrong name or password";
		}
	}

}