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
      	return $result->row_array();
      }

      public function employeelogin($data)
      {
      	$result= $this->db->get_where('employee',$data);
      	return $result->row_array();
      }

      public function getFulldata($tbl=null,$where=null,$type=null)
      {
         $this->db->select('*');
         $this->db->where($where);
         $res=$this->db->get($tbl);
            if($type=='count')
            {
               return $result=$res->num_rows();
            }
            if($type=='result')
            {
               return $result=$res->result_array();
            }
            if($type=='row')
            {
               return $result=$res->row_array();
            }
      }
  }