<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cronjob extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('CronjobModel');
		$this->load->library('session');
	}

	public function index()
	{
		$result = $this->CronjobModel->showTable();
		
		foreach ($result as $key)
		{
			$data['Eid'] = $key['id'];
			$data['points'] = $key['points'];
			$result1 = $this->CronjobModel->inserInPoint_History($data);
			print_r("tbl insertion status".$result1);
		}

		$this->resetPoints();		
	}

	public function resetPoints()
	{
		$data['points'] = 3000;
		$result = $this->CronjobModel->resetPoints($data);
		print_r("point reset status".$result);
	}
  //======Cron Job For Reset Lunch Bonus Monthly========================  
    public function insertemployee()
    {   


        $result = $this->CronjobModel->showTable();
        foreach ($result as $key)
		{
			//print_r($key['id']);
			$data['Eid'] = $key['id'];
            $data['Lunch_bonus']=0;
            $data['	last_update']=date("Y-m-d");
            $result1 = $this->CronjobModel->insertemployee($data);
            print_r($result1) ;
		}
    }

//==============Calculate Per Day Lunch Bonus===========================

    public function callunchbonus()
    {
    	
    	$result = $this->CronjobModel->showTable();
        foreach ($result as $key)
		{  


		   $today=date("Y-m-d");
           $first_day=date('d-m-Y', strtotime('first day of this month'));  

		   $emp=$key['id'];
           $data['Eid'] = $key['id'];
           $data['date'] = date("Y-m-d");
           $check_clock_in = $this->CronjobModel->fetchinfo('attendance',$data,'row');
           
           if($check_clock_in)
           {
           	 $check_lunch = $this->CronjobModel->fetchinfo('lunchorder',$data,'row');
           	 
           	 if(!$check_lunch)
           	 {

                $get_lunch_bonus=$this->CronjobModel->getlunchbonus($emp);
           	    $new_bonus=($get_lunch_bonus['Lunch_bonus'])+50;
                 
               
                $con['Eid']=$key['id'];
                $con['last_update']=$get_lunch_bonus['last_update'];
               
           
                $updata['last_update']=$today;
                $updata['Lunch_bonus']=$new_bonus;


           	    $update_bonus=$this->CronjobModel->update_lunch_bonus($con,$updata);
           	    //print_r($update_bonus);
           	 }

           }

		} 
    }

}
