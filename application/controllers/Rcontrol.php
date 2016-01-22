<?php
  //if defined('BASEPATH') OR exit('No direct script access allowed');
	class Rcontrol extends CI_Controller 
	{
		public function __construct() 
		  {
         parent::__construct();
      }
 
	  public function index()
	    {
		     $name=NULL;
		     $pwd=NULL;
		     $email=NULL;
		     $register=NULL;
		     extract($_POST);
  		     if (isset($register)) 
  		     {
  		 	     $data= array(
  		 		   'Name' => $name,
  		 		   'Email' => $email,
  		 		   'Password' => $pwd
  		 		   );
  		        $this->load->model('Rmodel');
              $this->load->database();
              $this->Rmodel->insert($data);
              echo "Successfully Registered";
              $this->load->view('html/log');
  		      }
  		      else
  		     {    
          	  $this->load->view('html/Rview');
            }
      }

    public function log()
      {
		     extract($_POST);
		       if (isset($login)) 
		       {
		         $data['Email'] = $email1;
		 		     $data['Password'] = $pwd1;
             $this->load->model('Rmodel');
             $this->load->database();
             $abc=$this->Rmodel->match($data);
                if($abc)
                 {
                   	$data['Name']= $abc->Name;
                   	$this->load->view('html/employeedash',$data);
                  }
                else
                 {
                   	echo "invalid id or password";
                  }
		        }
           else
		       {
        	   $this->load->view('html/log');
            }
      }
    public function loginpage()
      {
        $this->load->view('html/log');
      }

    public function regpage()

      {
        $this->load->view('html/Rview');
      }

    }
?>