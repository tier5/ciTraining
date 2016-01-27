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
	}
	
	public function index()
	{
		$this->load->view('adminview');
		
	}
    
    public function update()
	{
		
      extract($_POST);
      if (isset($updtemp1)) 
      {
      	//echo "hello";
      	$data['id']= $empid1;
      	//echo $data['id'];
      	$data['name']= $newname1;
      	$data['email']= $newemail1;
      	$data['password']= $newpass1;
      	//print_r($data);
      	$update=$this->AdminModel->updateEmp($data);
      	if ($update) 
			{
				echo "Employee updated Sucessfully";
			}
			else
			{
				echo "oops! Cant update!!";
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


	public function myfun()
	{
		$this->load->view('testtimer');
	}



}