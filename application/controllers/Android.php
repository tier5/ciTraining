<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Android extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//$this->load->helper('url');
		$this->load->database();
		$this->load->model('Dashboardmodel');
		//$this->load->library('session');
		
		/*if ($this->session->userdata('adminid'))
		{
			redirect("Admin");
			exit(0);
		}
		if ($this->session->userdata('empid'))
		{
			redirect("Employee");
			exit(0);
		}*/
	}

	public function index()
	{
		//echo "kingsuk";
		$name = $this->input->post('name');
		$password = $this->input->post('password');

		echo $name.'-'.$password;

	}

	public function login()
	{
		extract($_POST);

		$data['name'] = $name;
		$data['password'] = $password;


		$result = $this->Dashboardmodel->employeelogin($data);
		
		if($result)
		{

			//print_r($result);
			//$sessionval['id'] = $result[0]->id;
			//$sessionval['name'] = $result[0]->name;
			
			$empsession['empid'] = $result['id'];

			//$this->session->set_userdata($empsession);
			//print_r($this->session->userdata('id'));

			//$session_id = $this->session->userdata('id');

			//print_r($this->session->userdata('id'));
			
			//redirect('Employee');
			echo $result['id'];
		}
		else
		{
			//$this->session->set_userdata('e_message','Invalid Username or Password');
			echo "Error In Login";
			//redirect('Dashboard');

		}
	}

	public function FnBreakstatus()
	{
		extract($_POST);
		$data=array();
		//$id=1102;

		$where=array('Eid'=>$id,'date'=>date('Y-m-d'));
		$where1=array('id'=>$id);
		$fetch_info=$this->Dashboardmodel->getFulldata('attendance',$where,'row');
		$user_name=$this->Dashboardmodel->getFulldata('employee',$where1,'row');
		$name=$user_name['propname'];
		if($fetch_info['breakstatus']==0)
		{
			$data['status']='Not In Break';
			$data['time_left']='0';
			$data['user_name']=$name;
			echo json_encode($data);

		}
		else
		{
			
			if($fetch_info['breakname']=='lbreak')
			{

				$tot_time_sec=20*60;
				$fetchbreak_info=$this->Dashboardmodel->getFulldata('lbreak',$where,'row');
				$start_time=$fetchbreak_info['starttime'];
				$end_time=strtotime($start_time)+$tot_time_sec;
				  $diff=time()-strtotime($start_time);
				
				   $tot= $diff+strtotime($start_time);
				
				 $time_left=$end_time-$tot;
				$mint=round($time_left/60);
				
				$sec=round($time_left%60);
				$left_time=$mint.':'.$sec;
				$brk='Last Break';
				$data['status']=$brk;
				/*if($left_time<0)
				{
				$data['time_left']='Your breaktime already got overed';
				}
				else
				{
					$data['time_left']=$left_time;
				}*/
				$data['time_left']=$time_left;
				$data['user_name']=$name;
				echo json_encode($data);


			}

			if($fetch_info['breakname']=='fbreak')
			{
				$tot_time_sec=20*60;
				$fetchbreak_info=$this->Dashboardmodel->getFulldata('fbreak',$where,'row');
				$start_time=$fetchbreak_info['starttime'];
				$end_time=strtotime($start_time)+$tot_time_sec;
				  $diff=time()-strtotime($start_time);
				
				   $tot= $diff+strtotime($start_time);
				
				 $time_left=$end_time-$tot;
				$mint=round($time_left/60);
				
				$sec=round($time_left%60);
				$left_time=$mint.':'.$sec;
				$brk='First Break';
				$data['status']=$brk;
				/*if($left_time<0)
				{
				$data['time_left']='Your breaktime already got overed';
				}
				else
				{
					$data['time_left']=$left_time;
				}*/
				$data['time_left']=$time_left;
				$data['user_name']=$name;
				echo json_encode($data);



			}
			if($fetch_info['breakname']=='sbreak')
			{
				$tot_time_sec=60*60;
				$fetchbreak_info=$this->Dashboardmodel->getFulldata('sbreak',$where,'row');
				$start_time=$fetchbreak_info['starttime'];
				$end_time=strtotime($start_time)+$tot_time_sec;
				  $diff=time()-strtotime($start_time);
				
				   $tot= $diff+strtotime($start_time);
				
				 $time_left=$end_time-$tot;
				$mint=round($time_left/60);
				
				$sec=round($time_left%60);
				$left_time=$mint.':'.$sec;
				$brk='Second Break';
				$data['status']=$brk;
				/*if($left_time<0)
				{
				$data['time_left']='Your breaktime already got overed';
				}
				else
				{
					$data['time_left']=$left_time;
				}*/
				$data['time_left']=$time_left;
				$data['user_name']=$name;	
				echo json_encode($data);
				


			}
		}
		
	}

}