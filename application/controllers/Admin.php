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
			echo $row->id.",".$row->name.",".$row->email.",".$row->password."/";
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
		$data['date'] = date("d/m/Y");

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

				echo "<tr ".$colorclass.">
                <td>".$res1."</td>

                <td>".$key['clockin']."</td>
              		</tr>";

			}
			
		}
		
	}

	public function empFbreak()
	{
		$data['date'] = date("d/m/Y");
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
		$data['date'] = date("d/m/Y");
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
		$data['date'] = date("d/m/Y");
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
		$result = $this->AdminModel->employeeLate();

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



	}

	public function lateTblTruncate()
	{
		$data = "tbl_late_emp";
		$result = $this->AdminModel->lateTblTruncate($data);
		
	}
}