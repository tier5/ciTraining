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
//=======================Employee Logout==========================
	public function logout()
	{
		$this->session->unset_userdata('empid');
		header("location:".base_url()."index.php/Dashboard");
		//$this->session->sess_destroy();
	}
//=======================Start The Break======================    
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
	         
                 print_r('Enjoy Your Break & come back soon!');
	          }
	          else
	          {   
	          	  print_r('Clock In First');
	          }
        }
        else
        {
           print_r('Choose The Break First');
        }
    }
//==========================Clock In======================
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
				print_r('Today you Logged In @'.'&nbsp'.$data['clockin']);
			}
			else
			{
				print_r('Try to Clock In Again');
		    }
		}
	}
//=======================Clock Out================================
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
//=======================Clock Button Value On Page Load======================
	public function buttonvalue()
	{    
		 //echo "I am in onload cotroller";
         $data['Eid'] = $this->session->userdata('empid'); //Taking the id from sessions
         $data['date']= date("d/m/Y");//Taking the date
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
       //echo "I am in employee controller";
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
			echo "1";
		}
		else
		{
			echo "0";
		}
    }
//===============================================
    public function breakback()
    {
    //echo('I im back to work model');
      $data['Eid'] = $this->session->userdata('empid');
      $data['date']= date("d/m/Y");
      $data['breakstatus']=1;
      $back=$this->EmployeeModel->brkback($data);
    }
//========================disable carry forward===========
    public function disablebrk()
    {
    	//echo "hii";
    	$data['Eid'] = $this->session->userdata('empid');
    	$data['date']= date("d/m/Y");
    	$carry=$this->EmployeeModel->disablebrk($data);
    	print_r($carry);
    }
//==================break Button Value In Page LOad============
    public function breakbackpl()
    {
    //echo('I im back to work model');
        $data['Eid']= $this->session->userdata('empid');
        $data['date']= date("d/m/Y");
	    $data['breakstatus']=1;
        $back=$this->EmployeeModel->brkbackpl($data);
    }
//===============Show Clock In Time On Employee===============================
    public function showclkin()
    {
      //echo "I am In cONTROLLER";
        $data['Eid']= $this->session->userdata('empid');
        $data['date']= date("d/m/Y");
        $show=$this->EmployeeModel->showclkin($data);
        print_r($show);
    }
//=============Show Name On Empdashboard========================
    public function showname()
    {
      //echo "I am In cONTROLLER";
        $data['Eid']= $this->session->userdata('empid');
        $show=$this->EmployeeModel->showname($data);
        print_r($show);
    }
}
