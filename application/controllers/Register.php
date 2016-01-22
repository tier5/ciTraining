<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller 
{
	public function __construct()
	{
		parent:: __construct();
		//echo "i am construct";
		$this->load->model('Registermodel');

		//$this->load->library('session');

		//$this->load->helper('url');
	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('loginview');
	
	}

	public function showRegistration()
	{
		$this->load->view('header');
		$this->load->view('registerview');
	
	}

	public function login()
	{
		

		extract($_POST);

		$data['name'] = $name;
		$data['password'] = $password;

		$cm = $this->Registermodel->loginUser($data);

		if($cm)
		{	
			//print_r($cm);

			if($cm->name==$data['name'] && $cm->password==$data['password'])
			{	
				

				$data['id'] = $cm->id;

				$this->session->set_userdata($data);

				//$id = $this->session->userdata('id');

				//print_r($id);
				//echo "successfull login";
				if($this->session->userdata('id'))
				{
					$this->load->view('header');
					$this->load->view('dashboardview',$data);
				}

				else
				{
					echo "no sessions";
				}
				
			}

			//$userdata['id'] = $cm->id;
			//$userdata['name'] = $cm->name;
			//$userdata['password'] = $cm->password;

			//$this->session->set_userdata($userdata);

			//if($this->session->has_userdata('id'))
			//{
			//	$this->load->view('dashboardview',$userdata);
			//}

			//$this->load->view('dashboardview',$userdata);
			//print_r($cm->name);

		}

		else
		{
			echo "invalid username or password";
		}
		
	}

	public function register()
	{
		extract($_POST);

		$data['name'] = $name;
		$data['password'] = $password;


		if (isset($submit))
		{
			

			$ret = $this->Registermodel->registerUser($data);

			if($ret)
			{	
				$userdata['id'] = $ret->id;
				$userdata['name'] = $ret->name;
				$userdata['password'] = $ret->password;

				$this->session->set_userdata($userdata);

				if($this->session->userdata('id'))
				{
					$this->load->view('header');
					$this->load->view('dashboardview',$userdata);
				}

				else
				{
					echo "no sessions";
				}
				
				//print_r($cm->name);
			}
			
			
		}
	}

	public function myfun()
	{
		

		extract($_POST);

		$data['name'] = $name;

		$data['id'] = 1102;

		$data['password'] = $password;

		echo $data['name'];

		$this->load->view('dashboardview',$data);


	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->index();
	}

	public function showAllUser()
	{
		//echo "in showAllUser";

		$ret['info'] = $this->Registermodel->allUser();

		$this->load->view('header');

		$this->load->view('showalluserview',$ret);

		
		
		
	}
}