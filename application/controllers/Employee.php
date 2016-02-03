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
                  echo "You have already taken that break for today";
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
		//echo "I am In Clock In";
		extract($_POST);
		if (isset($btn)) 
		{
			//echo "hello";
			//$day=date('l');
			$date=date("d/m/Y");
			$time= date("H:i:s");
			$data['date']=$date;
			$data['clockin']=$time;
			$data['Eid'] = $this->session->userdata('empid');
			$ctime=$this->EmployeeModel->clockintime($data);
			//print_r($ctime);
			//echo $data['date'].$data['time'];
			if ($ctime) 
			{
				echo "Attendance marked @"."\n".$data['clockin'];
			}
			else
			{
				echo "Try to Clock In Again";
		    }
		}
	}
//=======================Set The Clock Out Time======================
	public function clockout()
	{   //echo "I am In Clock Out";
		extract($_POST);
		if (isset($btn1)) 
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
		 //echo "I am in onload cotroller";
      $data['Eid'] = $this->session->userdata('empid');
      $data['date']= date("d/m/Y");
      //print_r($data); 
	  $acc=$this->EmployeeModel->buttonvalue($data);
	   //print_r($acc);
		if($acc)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
//======================Stop The Break=================
    public function breakstop()
    {
      extract($_POST);
      $data['Eid']= $this->session->userdata('empid');
	  $data['date']= date("d/m/Y");
	  $data['breakname']=$brkval;
	  $brkstp=$this->EmployeeModel->breakout($data);
	          if ($brkstp)
	          {
                 echo "Hope you enjoyed your break time";
	          	//print_r($brkstp->result());
	          }
	          else
	          {
                  echo "Some thing wrong.Try it again";
	          }
    }
//=================Changeing the value of break button=======
    public function breakbutton()
    {
      $data['Eid'] = $this->session->userdata('empid');
      $data['date']= date("d/m/Y");
      $data['breakstatus']=1;
      $bcd=$this->EmployeeModel->brkbtnval($data);
		if($bcd)
		{
			echo"1";
		}
		else
		{
			echo"0";
		}
    }
//======disable fbreak=============================================================
    public function breakdisable()
    {
    	//$dis=$this->EmployeeModel->breakdisable();
    	//return $dis;
    	$data['Eid'] = $this->session->userdata('empid');
    	$data['date']= date("d/m/Y");
    	//print_r($data);
    	$dis=$this->EmployeeModel->breakdisable($data);
    	//return $dis;
    	print_r($dis);

    }
//========disable sbreak=============================
    public function sbreak()
    {
    	//echo "hello sbreak";
    	$data['Eid'] = $this->session->userdata('empid');
    	$data['date']= date("d/m/Y");
    	$dissbrk=$this->EmployeeModel->sbreak($data);
    	print_r($dissbrk);
    }
    //=============disbale lbreak===========
    public function lbreak()
    {
    	//echo "hello sbreak";
    	$data['Eid'] = $this->session->userdata('empid');
    	$data['date']= date("d/m/Y");
    	//print_r($data);
    	$lbrk=$this->EmployeeModel->lbreak($data);
    	print_r($lbrk);
    }
    //==disable carry forward===========
    public function carrydisable()
    {
    	//echo "hii";
    	$data['Eid'] = $this->session->userdata('empid');
    	$data['date']= date("d/m/Y");
    	$carry=$this->EmployeeModel->carrydisable($data);
    	print_r($carry);
    }

}