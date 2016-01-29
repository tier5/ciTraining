<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller 
{
//===================Constructer================
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->database();

		$this->load->library('session');

		$this->load->model('EmployeeModel');
	}
//========================Index===================
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
//=======================Log Out======================
	public function logout()
	{
		$this->session->unset_userdata('empid');
		header("location:".base_url()."index.php/Dashboard");
		//$this->session->sess_destroy();
	}
//=======================Set The Break Value======================    
    public function breakstart()
    {
        extract($_POST);
        //echo "hi";
        if (isset($brkval))
        {
	          $data['Eid']= $this->session->userdata('empid');
	          $data['date']= date("d/m/Y");

	          $data1['breakname']=$brkval;
	          $data1['breakstatus']=1;
	          
	          $brk=$this->EmployeeModel->breakin($data, $data1);
	          if ($brk)
	          {
                 echo "Enjoy Your Break & come back soon!";
	          }
	          else
	          {
                  echo "You Have Already Taken the break";
	          }
        }
        else
        {
      	echo "Choose The Proper Break";
        }

    }
//=======================Set The Clock In Time======================
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
//=======================Set The Clock Out Time======================
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
//=======================Changeing the value of clock in button======================
	public function buttonvalue()
	{    
      $data['Eid'] = $this->session->userdata('empid');
      $data['date']= date("d/m/Y");
		$acc=$this->EmployeeModel->buttonvalue($data);
		//print_r($acc);
		if($acc)
		{
			return true;
		}
		else
		{
			return false;
		}

	}
//====================================================================================================================================
}