<?php

class Hello extends CI_Controller {
	 private $variable = 'subhankar';

	

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');


		//echo "i am most powerful bcz i m constructor<br/>";

		
	}
	public function index()
	{
		/*//how to insert data manually in database
		$this->load->model('FirstModel'); // load model
		$this->load->database(); //call database configuration to open connection
		$this->FirstModel->insert(); //call model function 
		$this->load->view('html/database'); //load a confirmation view (this is optional)*/
		//=========================================================
		//$this->page();
		$this->login_page();
	}

	public function page()
	{
		//fetching input from a form
		$name=NULL;
		$pwd=NULL;
		$email=NULL;
		$btn=NULL;
		
		extract($_POST);
		
		
		if(isset($btn)) //checking on button click
		{	
			//data to be posted in database
			$data= array(
				'name'=>$name, 
				'password'=>$pwd, 
				'email'=> $email

				);
			//load model
			$this->load->model('FirstModel');
			//call database
			$this->load->database();
			//call function and passing data array
			$this->FirstModel->insert_form($data);
			//load view for a simple confirmation
			$this->load->view('html/Dbconfirm');


			//print_r($a);
		}
		//load registration form user interface 
		else
		{

		$this->load->view('html/firstview'); //load the view
		//it will first load the view because button is not set

		}
	

	}
	public function login_page()
	{	
		
		//$this->session->set_userdata($array1);
		extract($_POST);
		
		if(isset($login))
		{
			$data['email']=$email1;
			$data['password']=$pwd1;
			//echo $data['email'];
			//echo $data['password'];
			$this->load->model('FirstModel');
			$this->load->database();
			$b=$this->FirstModel->login($data);

			if($b)
			{
				$data=array(
				'name'=>$b->email);
				$this->session->set_userdata($data);
				//$session_id = $this->session->userdata('name');
				//print_r($session_id);
				$this->load->view('html/Dashboard',$data);
				//echo $data['view'];

			}
			else
			{
				echo "invalid  user id or password";
			}

		}
		else
		{
			$this->load->view('html/loginpage');

		}
		
	

	}
	public function load_login()
	{

		$this->load->view('html/loginpage');
	}
	public function logout()
	{	
		
		//$this->session->unset_userdata('name');
		$this->session->sess_destroy();
		$this->load->view('html/loginpage');
		
		//$this->load->library('session');
		
	}
	public function showalldata()
	{
		//echo "hello";
		
			$this->load->model('FirstModel');
			$op['title']=$this->FirstModel->showall();
			//print_r($op);
			
            $this->load->view('html/show',$op);
           
		
	}
	//this function in admin is adding employee
	public function addEmp()
	{
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
			$this->load->model('FirstModel');
			$add=$this->FirstModel->addEmployee($data);
			if ($add) 
			{
				echo "Employee Added Sucessfully";
			}
			else
			{
				echo "Cannot Add this employee";
			}

		}
		else
		{
			$this->load->view('html/addRec');
		}
	}
}

?>