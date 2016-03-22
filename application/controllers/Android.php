<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Android extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('Dashboardmodel');
		$this->load->library('session');
		
		/*if ($this->session->userdata('adminid'))
		{
			redirect("Admin");
			exit(0);
		}
		if ($this->session->userdata('empid'))
		{
			redirect("Employee");
			exit(0);
		}*/
	}

	public function index()
	{
		//echo "kingsuk";
		$name = $this->input->post('name');

		echo $name;

	}

	public function login()
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
			
			//redirect('Employee');
			echo $result['id'];
		}
		else
		{
			$this->session->set_userdata('e_message','Invalid Username or Password');
			//redirect('Dashboard');

		}
	}

}