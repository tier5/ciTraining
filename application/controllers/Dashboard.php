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
			
			header("Location:".base_url()."index.php/Admin");
			
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
	public function clockin()
	{
		extract($_POST);
		if (isset($btn)) 
		{
			//echo "hiii";
			//$day=date('l');
			$date=date('d-m-y');
			$time= date('h:i:s');
			$data['date']=$date;
			$data['clockin']=$time;
			$ctime=$this->EmployeeModel->clockintime($data);
			//echo $data['date'].$data['time'];
			if ($ctime) 
			{
				echo "Attendance marked @"."\n".$data['clockin'];
			}
			else
			{
				echo "error";
			}
		}
	}

	public function clockout()
	{
		extract($_POST);
		if (isset($btn)) 
		{
			//echo "hi";
			$time= date('h:i:s');
			$data['clockout']=$time;
			$couttime=$this->EmployeeModel->clockouttime($data);
			if ($couttime) 
			{
				echo "Clocked out @"."\n".$data['clockout'];
			}
			else
			{
				echo "error";
			}
		}
	}


}