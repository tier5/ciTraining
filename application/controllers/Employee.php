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

		$this->load->model('EmployeeModel');
	

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

	public function clockin()
	{
		extract($_POST);
		if (isset($btn)) 
		{
			//echo "hiii";
			//$day=date('l');
			$date=date("d/m/Y");
			$time= date("H:i:s");
			$data['date']=$date;
			$data['clockin']=$time;
			$data['Eid'] = $this->session->userdata('empid');
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
			$time= date("H:i:s");
			$data['clockout']=$time;
			$data['Eid'] = $this->session->userdata('empid');
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
	public function btnv()
    {
        $data['date']=date("d/m/Y");
        $data['Eid']=$this->session->userdata('empid');
        //print_r($data);
        $result=$this->EmployeeModel->btnv($data);
        //print_r($result);
        if ($result) 
        {
        	echo "hi i am clocked in";
        	//return true;
        }
        else
        {
        	//echo "no i am not clocked in";
        	return false;
        }
    }
    public function showclockin()
    {
    	//echo "check";
    	$data['date']=date("d/m/Y");
        $data['Eid']=$this->session->userdata('empid');
    	$result=$this->EmployeeModel->showclockin($data);
    	//print_r($result);
    	if ($result) 
    	{
    		print_r($result);
    	}
    	else
    	{
    		//print_r("Please clock in");
    		return false;
    	}
    }
}