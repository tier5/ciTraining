<?php 
   Class Dashboardmodel extends CI_Model 
   { 
	
      Public function __construct() 
      { 
         parent::__construct(); 
         //$this->load->database();
      } 

      public function adminlogin($data)
      {
      	$result= $this->db->get_where('admin',$data);
      	return $result->result();
      }

      public function employeelogin($data)
      {
      	$result= $this->db->get_where('employee',$data);
      	return $result->result();
      }
  }