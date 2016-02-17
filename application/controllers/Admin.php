<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('AdminModel');
		$this->load->library('session');

		

		if (!$this->session->userdata('adminid'))
		{
			redirect("Dashboard");
		}

		if($this->input->post('optdate'))
		{
			$this->date=$this->input->post('optdate');
			/*$this->empClockIn();*/
		}
		else
		{
			$this->date = $this->date = date("d/m/Y");
		}

	}
	
	public function index()
	{

		if ($this->session->userdata('adminid'))
		{
			$this->load->view('adminview');
		}
		
		else
		{
			//echo "session does not exist";
			redirect("Dashboard");
		}
		

	    //$this->load->view('adminview');
	}
    
    public function update()
	{
	    extract($_POST);
	    
	      	$data1=array('id'=>$id);
			$data['name']= $newname;
			$data['email']= $newemail;
			$data['password']= $newpass;
			$data['points'] = $points;

			//print_r($data1);
	      	$update=$this->AdminModel->updateEmp($data1, $data);
	      	if ($update) 
				{
					echo "Employee updated Sucessfully!!";
					//print_r($update);
				}
		    else
				{
					echo "Oops! Cant update!!";
				}
	    
    }

	public function showAllEmployee()
	{
		$add=$this->AdminModel->ShowEmployee();

		foreach ($add as $row) 
		{
			echo $row->id.",".$row->name.",".$row->email.",".$row->password.",".$row->points."/";
		}
	}
    
	public function addEmp()
	{	
		/*extract($_POST);
		if (isset($btn)) 
		{
		echo "hi";
		}*/
		//$this->load->view('html/addRec');
		extract($_POST);
		if (isset($btn)) 
		{
			$data['name']=$name;
			//echo "$name";
			$data['email']=$email;
			//echo "$email";
			$data['password']=$pass;
			//echo "$pass";
			
			$add=$this->AdminModel->addEmployee($data);
			if ($add) 
			{
				echo "Employee Added Sucessfully";
			}
			else
			{
				echo "oops! Cant Add. Email already exists!!";

			}
		}
		else
		{
			$this->load->view('html/adminview');
		}
	}

	

	public function logout()
	{
		$this->session->unset_userdata('adminid');

		redirect('Dashboard');
	}

	public function empClockIn()
	{
		$data['date'] = $this->date;

		$res = $this->AdminModel->empClockIn($data);

		//$ret = json_encode($res);
		if($res)
		{
			foreach ($res as $key) {
				
				//print_r();
				$data1['id'] = $key['Eid'];
				$res1 = $this->AdminModel->showName($data1);

				$clockintime = strtotime($key['clockin']);

				$chktime = strtotime(CLOCK_IN_TIME);

				if($clockintime>$chktime)
				{
					$colorclass = "class='danger'";				
				}

				else
				{
					$colorclass = "class='info'";
				}

				$clockinTime  = date("g:i:sa", strtotime($key['clockin']));
				if($key['clockout'])
				{
					$clockoutTime = date("g:i:sa", strtotime($key['clockout']));
				}
				else
				{
					$clockoutTime = "";
				}
				

				echo "<tr ".$colorclass.">
                <td>".$res1."</td>

                <td>".$clockinTime."</td>
                <td>".$clockoutTime."</td>
              		</tr>";

			}
			
		}
		
	}

	public function empFbreak()
	{
		$data['date'] = $this->date;
		$data['breakname'] = "fbreak"; 

		$nowtime = new DateTime('now');

		$totaltime = FBREAK_TIME;

		$res = $this->AdminModel->empFbreak($data);

		foreach ($res as $key) 
		{
			//print_r($key);

			$data1['Eid'] = $key['Eid'];
			$data1['date'] = $key['date'];

			$resclockin = $this->AdminModel->empFclockin($data1);

			foreach ($resclockin as $val)
			{
				$data2['id'] = $val['Eid'];
				$resname = $this->AdminModel->showName($data2);
				
				
				$diff = $nowtime->diff(new DateTime($val['starttime']));

				$sum = ((($diff->h*60)+$diff->i)*60)+$diff->s;

				$remainingtime = $totaltime - $sum;

				echo $resname.",";

				echo $remainingtime;

				echo ".";
			}

			//
		}

		

		/*if($res)
		{
			foreach ($res as $key) {
			
			$data1['id'] = $key['Eid'];
			
			$res1 = $this->AdminModel->showName($data1);

			$diff = $nowtime->diff(new DateTime($key['starttime']));
		
			$sum = ((($diff->h*60)+$diff->i)*60)+$diff->s;

			$remainingtime = $totaltime - $sum;

			echo $res1.",";

			echo $remainingtime;

			echo ".";
			}
		}*/

		
	}

	public function empSbreak()
	{
		$data['date'] = $this->date;
		$data['breakname'] = "Sbreak"; 

		$nowtime = new DateTime('now');

		$totaltime = SBREAK_TIME;

		$res = $this->AdminModel->empSbreak($data);

		if($res)
		{
			foreach ($res as $key)
			{
				$data1['Eid'] = $key['Eid'];
				$data1['date'] = $key['date'];

				$resbreakstart = $this->AdminModel->empSbreakstart($data1);

				foreach ($resbreakstart as $val)
				{
					$data2['id'] = $val['Eid'];
					$resname = $this->AdminModel->showName($data2);
					
					
					$diff = $nowtime->diff(new DateTime($val['starttime']));

					$sum = ((($diff->h*60)+$diff->i)*60)+$diff->s;

					$remainingtime = $totaltime - $sum;

					echo $resname.",";

					echo $remainingtime;

					echo ".";
				}
			}
		}


		
	}
	public function empLbreak()
	{
		$data['date'] = $this->date;
		$data['breakname'] = "lbreak"; 

		$nowtime = new DateTime('now');

		$totaltime = LBREAK_TIME;

		$res = $this->AdminModel->empFbreak($data);

		if($res)
		{
			foreach ($res as $key)
			{
				$data1['Eid'] = $key['Eid'];
				$data1['date'] = $key['date'];

				$resbreakstart = $this->AdminModel->empLbreakstart($data1);

				foreach ($resbreakstart as $val)
				{
					$data2['id'] = $val['Eid'];
					$resname = $this->AdminModel->showName($data2);
					
					
					$diff = $nowtime->diff(new DateTime($val['starttime']));

					$sum = ((($diff->h*60)+$diff->i)*60)+$diff->s;

					$remainingtime = $totaltime - $sum;

					echo $resname.",";

					echo $remainingtime;

					echo ".";
				}
			}
		}
	}

	public function empLateFbreak()
	{
		$breaktable = 'fbreak';
		$totaltime = FBREAK_TIME;


		$nowtime = new DateTime('now');

		$data['date'] = date("d/m/Y");
		$data['endtime'] = NULL;

		$result = $this->AdminModel->checkEndTime($breaktable, $data);

		foreach ($result as $key)
		{
			

			$diff = $nowtime->diff(new DateTime($key['starttime']));
			$sum = ((($diff->h*60)+$diff->i)*60)+$diff->s;
			$remainingtime = $totaltime - $sum;

			if($remainingtime<0)
			{
				print_r($key['Eid']);
			}
			


		}
		
	}

	public function employeeLate()
	{	
		$data['date'] = $this->date;
		$result = $this->AdminModel->employeeLate($data);

		foreach ($result as $key)
		{
			
			$data2['id'] = $key['Eid'];
			$resname = $this->AdminModel->showName($data2);

			echo $key['date'].",".$key['Eid'].",".$resname.",".$key['late_in'].",".$key['late_time'].",".$key['tbl_id'].".";

		}

	}

	public function deleteEmpLate()
	{
		extract($_POST);

		$data['tbl_id'] = $tbl_id;

		$result = $this->AdminModel->deleteEmpLate($data);

		print_r($result);



	}

	public function lateTblTruncate()
	{
		$data = "tbl_late_emp";
		$result = $this->AdminModel->lateTblTruncate($data);
		
	}

	public function resetPoints()
	{
		$data['points'] = 3000;
		$result = $this->AdminModel->resetPoints($data);
		print_r($result);
	}

	public function markAbsent()
	{
		extract($_POST);

		$data['Eid'] = $Eid;
		$data['date']= date("d/m/Y");
		
		$data['late_time'] = 28800;
		$data['late_in'] = "Absent";

		$result = $this->AdminModel->markAbsent($data);

		if($result)
		{
			$id['id'] = $Eid;
			$currpoint=$this->AdminModel->ShowEmpCurrentPoint($id);
			

			$data1['points']= $currpoint - 1000;
			
			$result2 = $this->AdminModel->updateEmployeeTbl($id, $data1);

			print_r($result2);




			//$result1 = $this->AdminModel->deductPoint();
		}

		//print_r($result);
	}

	/*public function calculatePoint()
	{
		$result = $this->AdminModel->employeeLate();

		foreach ($result as $key)
		{
			//print_r($key['Eid']);
			//print_r($key['late_time']);
			$points=$this->deductPointBySec($key['late_time']);
			$data['id']=$key['Eid'];

			$result1=$this->AdminModel->ShowEmpCurrentPoint($data);

			//print_r($result1);

			$data1['points']= $result1-$points;
			
			$result2 = $this->AdminModel->updateEmployeeTbl($data, $data1);

			print_r($result2);

		}
	}*/

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

	public function showAllLateview()
	{
		$this->load->view('employeelateview');
	}
	public function allLateRecord()
	{
		$res = $this->AdminModel->allLateRecord();
		//print_r($result);
		//$result['result'] = $res;

		

		foreach ($res as $key)
		{
			
			$data2['id'] = $key['Eid'];
			$resname = $this->AdminModel->showName($data2);

			echo $key['date'].",".$key['Eid'].",".$resname.",".$key['late_in'].",".$key['late_time'].",".$key['tbl_id']."?";


		}

		//$this->load->view('employeelateview',$result);
	}

	
public function empClockInDateChk()
{
		$this->empClockIn();
}

public function empSbreakDateChk()
{
	$this->empSbreak();
}

public function empFbreakDateChk()
{
	$this->empFbreak();
}

public function empLbreakDateChk()
{
	$this->empLbreak();
}

public function employeeLateDateChk()
{
	$this->employeeLate();
}

public function shoEmpFcompleteDateChk()
{
	$this->shoEmpFcomplete();
}

public function shoEmpScompleteDateChk()
{
	$this->shoEmpScomplete();
}

public function shoEmpLcompleteDateChk()
{
	$this->shoEmpLcomplete();
}

public function shoEmpFcomplete()
{
	$tbl_name="fbreak";

	$data['date'] = $this->date;

	$result = $this->AdminModel->empFclockin($data);

	foreach ($result as $key)
	{
		if($key['endtime'] && $key['endtime']!=1)
		{
			//echo $key['endtime'];
			//echo $key['starttime'];

			$nowtime = new DateTime($key['starttime']);

			$diff = $nowtime->diff(new DateTime($key['endtime']));
					
			$sum = ((($diff->h*60)+$diff->i)*60)+$diff->s;

			$data2['id'] = $key['Eid'];

			$name = $this->AdminModel->showName($data2);

			$time = gmdate("H:i:s", $sum);

			echo $name.",".$time.",".$sum."?";

		}
	}
}

public function shoEmpScomplete()
{
	$tbl_name="sbreak";

	$data['date'] = $this->date;

	$result = $this->AdminModel->empSbreakstart($data);

	foreach ($result as $key)
	{
		if($key['endtime'] && $key['endtime']!=1)
		{
			//echo $key['endtime'];
			//echo $key['starttime'];

			$nowtime = new DateTime($key['starttime']);

			$diff = $nowtime->diff(new DateTime($key['endtime']));
					
			$sum = ((($diff->h*60)+$diff->i)*60)+$diff->s;

			$data2['id'] = $key['Eid'];

			$name = $this->AdminModel->showName($data2);

			$time = gmdate("H:i:s", $sum);

			echo $name.",".$time.",".$sum."?";

		}
	}
}

public function shoEmpLcomplete()
{
	$tbl_name="lbreak";

	$data['date'] = $this->date;

	$result = $this->AdminModel->empLbreakstart($data);

	foreach ($result as $key)
	{
		if($key['endtime'] && $key['endtime']!=1)
		{
			//echo $key['endtime'];
			//echo $key['starttime'];

			$nowtime = new DateTime($key['starttime']);

			$diff = $nowtime->diff(new DateTime($key['endtime']));
					
			$sum = ((($diff->h*60)+$diff->i)*60)+$diff->s;

			$data2['id'] = $key['Eid'];

			$name = $this->AdminModel->showName($data2);

			$time = gmdate("H:i:s", $sum);

			echo $name.",".$time.",".$sum."?";

		}
	}
}



}