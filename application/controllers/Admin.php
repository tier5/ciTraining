<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
	}
	
	public function index()
	{
		$this->load->view('adminview');
	}

	public function update()
	{
		
      extract($_POST);
      if(isset($updtemp1))
      {
        $data['id']=$empid1;
        $data['name']=$newname1;
        $data['email']=$newemail1;
        $data['password']=$newpass1;
         
        $this->load->model('Addmodel');

        $this->Addmodel->updateEmp($data);

	  }
   }
}
