<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('session');
		$this->load->helper('url');
		$this->load->database();

		

		$this->load->model('EmployeeModel');

		if (!$this->session->userdata('empid'))
		{
			redirect("Dashboard");
			exit(0);
		}

		if($this->input->post('optdate'))
		{
			$this->todaydate=$this->input->post('optdate');
			/*$this->empClockIn();*/
		}
		else
		{
			$this->todaydate = $this->date = date("d/m/Y");
		}

	

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
			//header("location:".base_url()."index.php/Dashboard");
			redirect("Dashboard");
			exit(0);

		}
		
	}

	public function logout()
	{
		$this->session->unset_userdata('empid');
		redirect('Dashboard');
		//$this->session->sess_destroy();
	}

	public function idleDestroySession()
	{
		$this->session->unset_userdata('empid');
		redirect('Dashboard');
		
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
				echo "Attendance marked @"."\n".$data['clockin'].",";
				$this->clockinLateChk();
				$this->clockinLatePoints();
				


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
				$totaltime = FBREAK_TIME;
			}

			else if($res['breakname']=='sbreak')
			{
				$totaltime = SBREAK_TIME;
			}

			if($res['breakname']=='lbreak')
			{
				$totaltime = LBREAK_TIME;
			}

			$remainingtime = $totaltime-$sum;

			print_r($remainingtime);


		}
		    	   	
    }

    public function lateInBreak()
    {
    	
    	extract($_POST);

    		if($opt=='fbreak')
			{
				$totaltime = FBREAK_TIME;
			}

			else if($opt=='sbreak')
			{
				$totaltime = SBREAK_TIME;
			}

			if($opt=='lbreak')
			{
				$totaltime = LBREAK_TIME;
			}

    	//echo $opt;
    	$data['Eid'] = $this->session->userdata('empid');
    	$data['date'] = date("d/m/Y");

    	$nowtime = new DateTime('now');

    	$res = $this->EmployeeModel->lateInBreak($data ,$opt);

    	if($res)
    	{
    		foreach ($res as $key)
	    	{
	    		$diff = $nowtime->diff(new DateTime($key['starttime']));
				
				$sum = ((($diff->h*60)+$diff->i)*60)+$diff->s;

				$remainingtime = $totaltime-$sum;

				if($remainingtime<0)
				{
					$remainingtime = abs($remainingtime);

					$data['late_in'] = $opt;
					$data['late_time'] = $remainingtime;

			    	$result = $this->EmployeeModel->storeInLateTable($data);

			    	print_r($result);

				}
	    		
	    	}
    	}
    	

    }

    public function clockinLateChk()
    {

    	$id['Eid'] = $this->session->userdata('empid');
    	$id['date'] = date("d/m/Y");

    	$clockin = $this->EmployeeModel->showClockinTime($id);

    	//print_r($clockin);



    	$timenow = new DateTime($clockin);

    	//$nowtime= date("H:i:s");

    	$now = strtotime($clockin);

    	$clockintime = strtotime(CLOCK_IN_TIME);



    	//print_r($clockintime);
    	if($clockintime<$now)
    	{
    		$diff = $timenow->diff(new DateTime(CLOCK_IN_TIME));
				
			$sum = ((($diff->h*60)+$diff->i)*60)+$diff->s;

			$data['late_time']=$sum;

			$data['Eid'] = $this->session->userdata('empid');
    		$data['date'] = date("d/m/Y");
    		$data['late_in'] = "Clock In";

    		$result = $this->EmployeeModel->storeInLateTable($data);

    		print_r("You Are Late,");
    	}
    	else
    	{
    		echo "Attendance marked @"."\n".$date('H:i:s').",";
    	}
    	
    }

    public function showUserName()
    {
    	$data['id'] = $this->session->userdata('empid');

    	if($result = $this->EmployeeModel->showName($data))
    	{
    		print_r($result);
    	}
    }

    public function clockinLatePoints()
    {
    	$id['Eid'] = $this->session->userdata('empid');
    	$id['date'] = date("d/m/Y");

    	$clockin = $this->EmployeeModel->showClockinTime($id);

    	//print_r($clockin);



    	$timenow = new DateTime($clockin);

    	//$nowtime= date("H:i:s");

    	$now = strtotime($clockin);

    	$clockintime = strtotime(CLOCK_IN_TIME);

    	//print_r($clockintime);
    	if($clockintime<$now)
    	{
    		$diff = $timenow->diff(new DateTime(CLOCK_IN_TIME));
				
			$sum = ((($diff->h*60)+$diff->i)*60)+$diff->s;

			$pointdeduct = $this->deductPointBySec($sum);

			$empid['id'] = $this->session->userdata('empid');

			$currpoint = $this->EmployeeModel->ShowEmpCurrentPoint($empid);

			//print_r($result);

			$newpoint['points'] = $currpoint - $pointdeduct;

			$res = $this->EmployeeModel->updateEmployeePoints($empid, $newpoint);

			if($res)
			{
				echo "Your ".$pointdeduct." points are deducted for late  Clock In,";
			}

    	}
    }

    public function breakLatePoints()
    {

    	
    	extract($_POST);
    		$lateBreak="";
    		if($opt=='fbreak')
			{
				$totaltime = FBREAK_TIME;
				$lateBreak = "First Break";
			}

			else if($opt=='sbreak')
			{
				$totaltime = SBREAK_TIME;
				$lateBreak = "Lunch Break";
			}

			if($opt=='lbreak')
			{
				$totaltime = LBREAK_TIME;
				$lateBreak = "Last Break";
			}

    	//echo $opt;
    	$data['Eid'] = $this->session->userdata('empid');
    	$data['date'] = date("d/m/Y");

    	$nowtime = new DateTime('now');

    	$res = $this->EmployeeModel->lateInBreak($data ,$opt);

    	if($res)
    	{
    		foreach ($res as $key)
	    	{
	    		$diff = $nowtime->diff(new DateTime($key['starttime']));
				
				$sum = ((($diff->h*60)+$diff->i)*60)+$diff->s;

				$remainingtime = $totaltime-$sum;

				if($remainingtime<0)
				{
					$remainingtime = abs($remainingtime);

					$pointdeduct = $this->deductPointBySec($remainingtime);

					$empid['id'] = $this->session->userdata('empid');

					$currpoint = $this->EmployeeModel->ShowEmpCurrentPoint($empid);

					//print_r($result);

					$newpoint['points'] = $currpoint - $pointdeduct;

					$res = $this->EmployeeModel->updateEmployeePoints($empid, $newpoint);

					if($res)
					{
						echo "Your ".$pointdeduct." points are deducted for late in  ".$lateBreak;
					}

				}
	    		
	    	}
    	}
    	

    
    }

    public function deductPointBySec($time)
	{
		if($time<=7200)
		{
			return 250;
		}

		else if($time>=7201 && $time<=14400)
		{
			return 500;
		}

		else
		{
			return 1000;
		}
	}

	public function selectBreakname()
	{
		$data['Eid']= $this->session->userdata('empid');
		$data['date']= date("d/m/Y");

		$result = $this->EmployeeModel->returnBreakName($data);

		if(($result['breakname']))
		{
			echo $result['breakname'];
		}
	}

	public function showPointsOnLoad()
	{
		$data['id']=$this->session->userdata('empid');

		$result = $this->EmployeeModel->ShowEmpCurrentPoint($data);

		echo $result;
	}

	public function markPreviousBreak()
	{
		extract($_POST);

		if($opt=="sbreak")
		{
			$data['Eid']= $this->session->userdata('empid');
			$data['date']= date("d/m/Y");
			//$updatedata['endtime'] = 1;
			$tblname="fbreak";

			$result = $this->EmployeeModel->fetchBreaktbl($data,$tblname);

			if(!$result)
			{
				$tblname="fbreak";
				$data['Eid']= $this->session->userdata('empid');
				$data['date']= date("d/m/Y");
				$data['starttime'] = 1;
				$data['endtime'] = 1;

				$result = $this->EmployeeModel->insertNonTakenBreaktbl($data,$tblname);
				//print_r($result);


			}

		}

		if($opt=="lbreak")
		{
			$data['Eid']= $this->session->userdata('empid');
			$data['date']= date("d/m/Y");
			//$updatedata['endtime'] = 1;
			$tblname="fbreak";

			$result = $this->EmployeeModel->fetchBreaktbl($data,$tblname);

			if(!$result)
			{
				$tblname="fbreak";
				$data['Eid']= $this->session->userdata('empid');
				$data['date']= date("d/m/Y");
				$data['starttime'] = 1;
				$data['endtime'] = 1;

				$result = $this->EmployeeModel->insertNonTakenBreaktbl($data,$tblname);
				//print_r($result);


			}

			$tblname="sbreak";

			$result = $this->EmployeeModel->fetchBreaktbl($data,$tblname);

			if(!$result)
			{
				$tblname="sbreak";
				$data['Eid']= $this->session->userdata('empid');
				$data['date']= date("d/m/Y");
				$data['starttime'] = 1;
				$data['endtime'] = 1;

				$result = $this->EmployeeModel->insertNonTakenBreaktbl($data,$tblname);
				//print_r($result);


			}
		}
	}
	public function pointalt()
	{
	  $data['Eid']=$this->session->userdata('empid');
	  $result = $this->EmployeeModel->pointalt($data);
	  if ($result)
	  {
		  foreach($result as $row)
		  {
		  	echo $row['date'].",".$row['late_time'].",".$row['late_in']."?";
		  }
	  }
	  else
	  {
	  	return false;
	  }
	  //print_r($result);

	}

	public function earlyClockOut()
	{	
		

		$nowtimestr = strtotime(date('H:i:s'));

		$clockoutstr = strtotime(CLOCK_OUT_TIME);

		$timediffstr =$nowtimestr - $clockoutstr;

		if($timediffstr<0)
		{
			$nowtime = new DateTime('now');

			$diff = $nowtime->diff(new DateTime(CLOCK_OUT_TIME));
					
			$sum = ((($diff->h*60)+$diff->i)*60)+$diff->s;

			$pointdeduct = $this->EarlyColockoutPointDeduct($sum);

			$empid['id'] = $this->session->userdata('empid');

			$currpoint = $this->EmployeeModel->ShowEmpCurrentPoint($empid);

					//print_r($result);

			$newpoint['points'] = $currpoint - $pointdeduct;

			$res = $this->EmployeeModel->updateEmployeePoints($empid, $newpoint);

			$latetbldata['Eid'] = $this->session->userdata('empid');

			$latetbldata['date'] = date("d/m/Y");

			$latetbldata['late_time'] = $sum;

			$latetbldata['late_in'] = "Early Clock Out";

			$storeInLateTable=$this->EmployeeModel->storeInLateTable($latetbldata);

			if($res)
			{
				echo "Your ".$pointdeduct." points are deducted for early Clock Out";
			}
		}

		/*$nowtime = new DateTime('now');

		$diff = $nowtime->diff(new DateTime('20:00:00'));
				
		$sum = ((($diff->h*60)+$diff->i)*60)+$diff->s;

		echo $sum;*/
	}


	 public function EarlyColockoutPointDeduct($time)
	{
		if($time<=7200)
		{
			return 250;
		}

		else if($time>=7201 && $time<=14400)
		{
			return 500;
		}

		else
		{
			return 750;
		}
	}

	public function calenderclockin()
	{	
		$clock = $this->input->post('clock');

		$data['Eid']=$this->session->userdata('empid');
		$data['date'] = $this->todaydate;

		$result = $this->EmployeeModel->autoChangeButton($data);

		$clockintime = strtotime($result[$clock]);

		$properclockintime = strtotime(CLOCK_IN_TIME);

		if($result[$clock])
		{
			if($clockintime>$properclockintime)
			{
				$colorclass = "error";
			}

			else
			{
				$colorclass = "";
			}

			echo $result[$clock].",".$colorclass;
		}

		

		

	}

	public function calenderclockout()
	{
		$clock = $this->input->post('clock');

		$data['Eid']=$this->session->userdata('empid');
		$data['date'] = $this->todaydate;

		$result = $this->EmployeeModel->autoChangeButton($data);

		$clockouttime = strtotime($result[$clock]);

		$properclockintime = strtotime(CLOCK_OUT_TIME);

		if($result[$clock])
		{
			if($clockouttime<$properclockintime)
			{
				$colorclass = "error";
			}

			else
			{
				$colorclass = "";
			}

			echo $result[$clock].",".$colorclass;
		}
	}

	public function calenderFbreak()
	{
		$data['Eid']=$this->session->userdata('empid');
		$data['date'] = $this->todaydate;
		$tblname = 'fbreak';
		$result = $this->EmployeeModel->allBreakTableInfo($data,$tblname);

		if($result['endtime'] && $result['endtime']!=1)
		{
			$nowtime = new DateTime($result['starttime']);

			$diff = $nowtime->diff(new DateTime($result['endtime']));
					
			$sum = ((($diff->h*60)+$diff->i)*60)+$diff->s;

			if($sum>1200)
			{
				$class = "error";
			}
			else
			{
				$class = "";
			}

			$time = gmdate("H:i:s", $sum);

			echo $time.",".$class;
		}
	}

	public function calenderSbreak()
	{
		$data['Eid']=$this->session->userdata('empid');
		$data['date'] = $this->todaydate;
		$tblname = 'sbreak';
		$result = $this->EmployeeModel->allBreakTableInfo($data,$tblname);

		if($result['endtime'] && $result['endtime']!=1)
		{
			$nowtime = new DateTime($result['starttime']);

			$diff = $nowtime->diff(new DateTime($result['endtime']));
					
			$sum = ((($diff->h*60)+$diff->i)*60)+$diff->s;

			if($sum>3600)
			{
				$class = "error";
			}
			else
			{
				$class = "";
			}

			$time = gmdate("H:i:s", $sum);

			echo $time.",".$class;
		}
	}

	public function calenderLbreak()
	{
		$data['Eid']=$this->session->userdata('empid');
		$data['date'] = $this->todaydate;
		$tblname = 'lbreak';
		$result = $this->EmployeeModel->allBreakTableInfo($data,$tblname);

		if($result['endtime'] && $result['endtime']!=1)
		{
			$nowtime = new DateTime($result['starttime']);

			$diff = $nowtime->diff(new DateTime($result['endtime']));
					
			$sum = ((($diff->h*60)+$diff->i)*60)+$diff->s;

			if($sum>1200)
			{
				$class = "error";
			}
			else
			{
				$class = "";
			}

			$time = gmdate("H:i:s", $sum);

			echo $time.",".$class;
		}
	}

	public function calenderclockinDateChk()
	{

		$this->calenderclockin();
	}

	public function calenderclockoutDateChk()
	{
		$this->calenderclockout();
	}

	public function calenderFbreakDateChk()
	{
		$this->calenderFbreak();
	}

	public function calenderSbreakDateChk()
	{
		$this->calenderSbreak();
	}

	public function calenderLbreakDateChk()
	{
		$this->calenderLbreak();
	}
	public function shopoption()
	{ 
	  $data['parent_id']="0";
	  $result=$this->EmployeeModel->shopoption($data);
		  
      foreach ($result as $key)
      {
      	echo $key['Lnid'].",".$key['item']."/";
      }
	}
	public function itemoption()
	{
		extract($_POST);
		$data['parent_id']=$shopopt;
		$result=$this->EmployeeModel->itemoption($data);
		//print_r($result);
		foreach($result as $row)
        {
         echo $row['Lnid'].",".$row['item'].",".$row['cost'].",".$row['limit']."/";
        }
		//echo "Hello";

	}
	public function shopname()
	{
		extract($_POST);
		$data['Lnid']=$shopopt;
		$result=$this->EmployeeModel->shopname($data);
		print_r($result);
	}

	public function submitorder()
	{

		extract($_POST);
		$data['Eid']=$this->session->userdata('empid');
		$data['date']=date("d/m/Y");
		$data['shopname']=$shopname;
		$data['items']=$lunchitm;
		$data['cost']=$finalcost;
		$result=$this->EmployeeModel->submitorder($data);
        print_r($result);
	}
}
?>