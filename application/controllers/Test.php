<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller 

{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('AdminModel');
		$this->load->library('session');

		$this->date = "2/11/2015";

		

	}

	public function index()
	{
		echo $this->date;
	}
}