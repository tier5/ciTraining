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
	}
	
	public function index()
	{

		if ($this->session->userdata('adminid'))
		{
			$this->load->view('adminview');
		}
		
		else
		{
			echo "session does not exist";
			header("location:".base_url()."index.php/Dashboard");
		}
		

	    //$this->load->view('adminview');
	}
    
    public function update()
	{
	    extract($_POST);
	    if (isset($updtemp1)) 
	    {
	      	$data1=array('id'=>$empid1);
			$data['name']= $newname1;
			$data['email']= $newemail1;
			$data['password']= $newpass1;
	      	$update=$this->AdminModel->updateEmp($data1, $data);
	      	if ($update) 
				{
					echo "Employee updated Sucessfully!!";
				}
		    else
				{
					echo "Oops! Cant update!!";
				}
	    }
    }

	public function showAllEmployee()
	{
		$add=$this->AdminModel->ShowEmployee();

		foreach ($add as $row) 
		{
			echo "ID ".$row->id." NAME ".$row->name." EMAIL ".$row->email."</br>";
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

		header("location:".base_url()."index.php/Dashboard");
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

				$chktime = strtotime("19:07:00");

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
}