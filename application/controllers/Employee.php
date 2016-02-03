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
	public function clockout()
	{
		
			//echo "hi";
			
			$data['Eid'] = $this->session->userdata('empid');
			$couttime=$this->EmployeeModel->clockouttime($data);
			if ($couttime) 
			{
				echo "you have clocked out";
			}
			else
			{
				echo "error";
			}
		
	}

	public function endBreak()
	{
		$data['Eid'] = $this->session->userdata('empid');
		$data['date'] = date("d/m/Y");

		$this->EmployeeModel->endBreak($data);

		

	}

	public function inBreak()
	{
		extract($_POST);

		$data['Eid'] = $this->session->userdata('empid');
		$data['opt'] = $opt;
		//$data['fbreak'] = date("H:i:s");
		$data['date'] = date("d/m/Y");

		$return = $this->EmployeeModel->inBreak($data);

		print_r($return);
	}

	public function autoChangeButton()
	{
		$data['Eid'] = $this->session->userdata('empid');
		$data['date'] = date("d/m/Y");

		$res = $this->EmployeeModel->autoChangeButton($data);

		if($res)
		{
			echo "Clock Out";
		}
		else
		{
			echo "Clock In";
		}
	}

	public function autoChangeBreakButton()
    {
        $data['Eid'] = $this->session->userdata('empid');
		$data['date'] = date("d/m/Y");

		$res = $this->EmployeeModel->autoChangeButton($data);

		if($res['breakstatus'])
		{
			echo "work";
		}
		else
		{
			echo "break";
		}


    }

    public function showBreakName()
    {
    	$data['Eid'] = $this->session->userdata('empid');
		$data['date'] = date("d/m/Y");

		$res = $this->EmployeeModel->autoChangeButton($data);

		echo $res['breakname'];
    }

    public function storeReturnTime()//store the return break time according to table whick will come as opt
    {
    	$storebreak['Eid'] = $this->session->userdata('empid');
        $storebreak['date'] = date("d/m/Y");
        $storebreak['endtime'] = date("H:i:s");

        extract($_POST);

        $storebreak['opt'] = $opt;

        $res = $this->EmployeeModel->storeReturnTime($storebreak);

        //print_r($res);

    	
    }

    public function autoDisableOption()

    {
    	$data['Eid'] = $this->session->userdata('empid');
    	$data['date'] = date("d/m/Y");

    	$this->EmployeeModel->autoDisableOption($data);
    }


    public function showTimerOnLoad()
    {

    	$data['Eid'] = $this->session->userdata('empid');
    	$data['date'] = date("d/m/Y");

    	$res = $this->EmployeeModel->showTimerOnLoad($data);//returns the time that the break have started

    	$nowtime = new DateTime('now');

		$diff = $nowtime->diff(new DateTime($res['starttime']));
		$sum = ((($diff->h*60)+$diff->i)*60)+$diff->s;



		if($res)
		{
			
			if($res['breakname']=='fbreak')
			{
				$totaltime = 1200;
			}

			else if($res['breakname']=='sbreak')
			{
				$totaltime = 3600;
			}

			if($res['breakname']=='lbreak')
			{
				$totaltime = 1200;
			}

			$remainingtime = $totaltime-$sum;

			print_r($remainingtime);


		}
		    	   	
    }
}