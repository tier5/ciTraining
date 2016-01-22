<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Test extends CI_Controller {



		public function __construct()
        {
            parent::__construct();

            echo "in constructor<br>";
                       
        }

        public function index()
        
        {
        	echo "in index <br>";
        	$this->myfun();

        	
        }
		

		public function myfun()
		{
			$data['name']='kingsuk';

			//$data = array("name" => $name);

			

			$this->load->view('testview',$data);
		}

		public function ajaxtest()
		{
			echo "from ajax";
		}

		public function modelfun()
		{
			$this->load->model('Testmodel','model');

			$data = $this->model->mymodel();

			$this->load->view('testview',$data);
			
		}

		public function showfun()
		{
			$this->load->model('Testmodel','model');

			$data = $this->model->showname();

			//print_r($data);

			foreach ($data as $row) {

				echo $row->id."<br>";
				

			}
		}


	}


