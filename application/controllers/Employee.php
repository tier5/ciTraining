<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->database();
		$this->load->model('EmployeeModel');
		//$this->$data['clockin']=$time;
		

	}

	public function index()
	{
		$this->load->view('employeeview');
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
		//echo $data;
		//$dataset=$this->$data;
		//print_r($dataset['clockin']);
		//die;
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