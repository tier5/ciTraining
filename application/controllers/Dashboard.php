<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('Dashboardmodel');
		$this->load->library('session');
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
			//$this->load->view('adminview');
			
			$adminsession['adminid'] = $result['id'];

			$this->session->set_userdata($adminsession);
			header("location:".base_url()."index.php/Admin");
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

			//print_r($result);
			//$sessionval['id'] = $result[0]->id;
			//$sessionval['name'] = $result[0]->name;
			
			$empsession['empid'] = $result['id'];

			$this->session->set_userdata($empsession);
			//print_r($this->session->userdata('id'));

			//$session_id = $this->session->userdata('id');

			//print_r($this->session->userdata('id'));
			
			header("location:".base_url()."index.php/Employee");
		}
		else
		{
			echo "wrong name or password";
		}
	}

	public function chksession()
	{
		print_r($this->session->userdata('empid'));
		
	}

}