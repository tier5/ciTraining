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
		extract($_POST);
		$q=$this->input->post('datepicker');
		//print_r($q);
		//$this->date= "12/02/2016";

		

		if (!$this->session->userdata('adminid'))
		{
			redirect("Dashboard");
			exit(0);
		}


		if($this->input->post('optdate'))
		{
			$this->date=$this->input->post('optdate');
			/*$this->empClockIn();*/
		}
		else
		{
			$this->date = $this->date = date("Y-m-d");
		}

	}

	
	
	public function index()
	{

		if ($this->session->userdata('adminid'))
		{
			$data=array();
			$event_date=array();
			$event_info=$this->AdminModel->fetch_data('tbl_event_informations');
			/* events data */
            foreach($event_info as $infos)
            {
            	$date=date('Y-n-j',strtotime($infos['date']));
                array_push($event_date,$date);
            }
            /* events data */
            $select_date=date('Y-m-d');
            $tomorrow=time()+(24*3600);
            $date_tomorrow=date('Y-m-d',$tomorrow);

            $where_tm=array('tbl_event_informations.date'=>$date_tomorrow);
            $data['event_info_tm']=$this->AdminModel->FngetAlldata('tbl_event_informations',$where_tm);


            $where=array('tbl_event_informations.date'=>$select_date);
            $data['event_info']=$this->AdminModel->FngetAlldata('tbl_event_informations',$where);
            $data['str']=implode(',',$event_date);
			$this->load->view('adminview',$data);
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

		$data['date'] =$this->date; //date("d/m/Y");

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


	public function empEventChk()
	{
		 //$select_date=date('Y-m-d',strtotime($this->date));
		//11/03/2016
		 $get_date=$this->date;
		
		 $exp_dat=explode('/',$get_date);
		// echo '<pre>';print_r($exp_dat);
		 
		 $select_date=$exp_dat[2].'-'.$exp_dat[1].'-'.$exp_dat[0];
		 $next_d=strtotime($select_date)+(24*3600);
		 $date_tomorrow=date('Y-m-d',$next_d);
         $where_tm=array('tbl_event_informations.date'=>$date_tomorrow);
         $event_tomorrow=$this->AdminModel->FngetAlldata('tbl_event_informations',$where_tm);
		 $where=array('tbl_event_informations.date'=>$select_date);
		 $get_all_events=$this->AdminModel->FngetAlldata('tbl_event_informations',$where);
		 //echo '<pre>';print_r($get_all_events);
		 $result='';
		       foreach($get_all_events as $results)
		       {
				$result.= "<tr class='info'>
                <td>".$results['name']."</td>

                <td>".date('d/m/Y',strtotime($results['date']))."</td>
                <td>".$results['event_informations']."</td>
              		</tr>";
              	}

              	if(empty($event_tomorrow))
              	{
              	echo $result.'+'.count($event_tomorrow);
                }
                else
                {
                  echo $result.'+'.count($event_tomorrow);
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
		$data['status'] = 0;
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

		$update['status'] = 1;

		$result = $this->AdminModel->deleteEmpLate($data,$update);

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
		$data['date']= date("Y-m-d");
		
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

	public function lunchorderview()
	{
		$this->load->view('lunchorderview');
	}

	

	public function allLateRecord()
	{
		$data['status']=0;
		$res = $this->AdminModel->allLateRecord($data);
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

public function empEventcheck()
{
	$this->empEventChk();	
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

public function deleteEmp()
{
	$data['id']=$this->input->post('id');
	$data1['Eid']=$this->input->post('id');
	
	//$data['id'] = $id;

	$result = $this->AdminModel->deleteEmp($data);

	$result1 = $this->AdminModel->deleteEmpFromAllTbl($data1);


}

public function deductPointCustomReason()
{
	$data3['points']=$this->input->post('point');

	$data['late_in']=$this->input->post('msg');
	$data['Eid']=$this->input->post('id');
	$data['date'] = $this->date;
	$data['late_time']="0000";
	$data2['id'] = $data['Eid'];

	$currpoint = $this->AdminModel->ShowEmpCurrentPoint($data2);

	if($currpoint)
	{
		$data4['points'] = $currpoint - $data3['points'];

		$result1 = $this->AdminModel->updateEmployeeTbl($data2,$data4);

		if($result1)
		{
			$result = $this->AdminModel->markAbsent($data);

			if($result)
			{
					print_r($result);

			}
		}
	}

	

	

	/*$result = $this->AdminModel->markAbsent($data);

	if($result)
	{
			print_r($result);

	}*/


}

	public function addEventview()
	{
		//$this->load->view('eventview');
		$result['info_event'] = $this->AdminModel->FngetAlldata('tbl_event_informations','','asc');
		//print_r($result);
		$result['employeeinfo'] =$this->AdminModel->fetch_data('employee');
		$this->load->view('eventview',$result);
	}

	public function newEventInsert()
	{

		//$this->form_validation->set_rules('empId', 'Employee Name', 'required');
		$this->form_validation->set_rules('event_info', 'Event', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			if($_POST)
			{
				//echo'<pre>';print_r($_POST);exit;
				$emp_id=$this->input->post('empId');
				
				for($i=0;$i<count($emp_id);$i++)
				{
				$insert['Eid']=$emp_id[$i];
				$insert['event_informations']=$this->input->post('event_info');
				$insert['date']=date('Y-m-d',strtotime($this->input->post('date')));

				$result = $this->AdminModel->insert('tbl_event_informations',$insert);
                
                }

                if($result)
                {
                	$this->session->set_userdata('s_message','New Event Added Successfully.');
                	redirect('Admin/addEventview');
                }

			}
			else
			{
				redirect('Admin/addEventview');
			}
		}
		else
		{
			$this->session->set_userdata('e_message','Sorry Not Added');
			redirect('Admin/addEventview');
		}


	}

	public function delete_event($id)
	{

		//$where=array('EventId'=>$id);
		$where['EventId'] = $id;
		$result = $this->AdminModel->delete('tbl_event_informations',$where);
		$this->session->set_userdata('s_message','Event Has Been Deleted');
			redirect('Admin/addEventview');

	}

	public function showorder()
    {
    	extract($_POST);
    	//echo $optdate;
       $data['date']=$this->date;
       $data['status']=0;
       $result = $this->AdminModel->showorder($data);
       foreach ($result as $row) 
       {
       	$data1['id']=$row->Eid;
       	$name = $this->AdminModel->showName($data1);
       	//print_r($name);
       	echo $row->Liid.",".$row->Eid.",".$name.",".date('d/m/Y',strtotime($row->date)).",".$row->shopname.",".$row->items.",".$row->cost."?";
       }
    }

    public function dltordr()
    {
        extract($_POST);
    	$data['Liid']=$orderid1;
    	$data['status']=0;
    	$data1['status']=1;
    	$result=$this->AdminModel->dltordr($data,$data1);
    	if($result)
    	{
           print_r("Lunch Order Deleted Sucessfully");
    	}
    	else
    	{
          print_r("Something Wrong!!!!");
    	}
    }

    public function dltallordr()
    {
    	//echo 'Hello';
    	extract($_POST);
    	$data['date']=$this->date;
    	$result=$this->AdminModel->dltallordr($data);
    	return $result;
    }
    
    public function addlunchitems()
	{

		$this->load->view('addlunchitems');
	}

	public function showshop()
	{

		$data['parent_id']=0;
		$result=$this->AdminModel->showshop($data);
		foreach ($result as $row) 
       {
            echo $row->Lnid.",".$row->item."/";
       }
	}

	public function addshop()
	{
		extract($_POST);
		$data['item']=$addshop;
		$data['cost']=0;
		$data['limit']=0;
		$data['parent_id']=0;
		$result=$this->AdminModel->addshop($data);
		print_r($result);
	}
    
    public function deleteshop()
    {
    	extract($_POST);
    	$data['parent_id']=$shopid;
    	$data1['Lnid']=$shopid;
    	$result=$this->AdminModel->deleteshopitem($data);
    	$result1=$this->AdminModel->deleteshop($data1);
    	//print_r($result);
    	print_r($result1);

    }

    public function showitemsbyshop()
    {
    	extract($_POST);
    	$data['parent_id']=$shopid;
    	$result=$this->AdminModel->showitemsbyshop($data);
        //print_r($result);
        foreach ($result as $row) 
       {
            echo $row->Lnid.",".$row->item.",".$row->cost.",".$row->limit.",".$row->parent_id."/";
       }
    }

    public function showshopname()
    {
    	extract($_POST);
        $data['Lnid']=$shopid;
        $result=$this->AdminModel->showshopname($data);
        print_r($result['item']);
    }
    public function deleteitems()
    {
    	extract($_POST);
    	$data['Lnid']=$itemid;
    	$result=$this->AdminModel->deleteitems($data);
    	print_r($result);
    }

    public function additems()
    {
    	extract($_POST);
    	$data['item']=$newitems;
    	$data['cost']=$newcost;
    	$data['limit']=$newlimit;
    	$data['parent_id']=$parent;
    	$result=$this->AdminModel->additems($data);
    	print_r($result);

    }




}