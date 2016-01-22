<?php
 
     //if defined('BASEPATH') OR exit('No direct script access allowed');
     class Hello extends CI_Controller {

     	public function __construct() {
          parent::__costruct();
          echo"Want To Register??";

     	}
		
		
		 
	    public function index(){
			
		   echo "Yeee ............I have done my Indexing";
			
		}

        public function fst($name)
        {  
            $this->load->model("Hello_models","models");
            $profile = $this->models-getProfile(Shahrukh);
        	
			$this->load->view('html/header');
			
			$data = array("name"=>$name);

			$data['profile'] =$profile;

			$this->load->view("html/fst", $data);
           
        }
        
        
        
        public function second(){
			echo "I am calling the second function";

        }
	}
?>
