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

		$i=0;

		foreach ($add as $row) 
		{
			echo $row->id.",".$row->name.",".$row->email."/";
			//echo "<br/>".$row->id."<br/>".$row->name."<br/>".$row->email;
			
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

	public function clockInEmp()
    {
    	extract($_POST);
    	
    	$value=$this->AdminModel->clockInEmp();
    	if(!$value)
    	{
    		echo "No Employees Has clocked in till now";
    	}
    	

    }
    public function updatenew()
    {
    	//echo "hi";
    	extract($_POST);
    	$data=array('id'=>$id, 'name'=>$name, 'email'=>$email);
    	//print_r($data);
    	$btn=$data['id'];
    	//print_r($btn);
    	if (isset($btn)) 
    	{
    		$output=$this->AdminModel->updateEmpNew($data);
    		//print_r($output);
    		if ($output) 
    		{
    			echo "Edited Sucessfully";
    		}
    		else
    		{
    			echo "Failed to edit";
    		}
    	}
    }   
}