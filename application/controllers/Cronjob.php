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


}
