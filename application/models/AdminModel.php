<?php 
   Class AdminModel extends CI_Model 
   { 
	
      Public function __construct() 
      { 
         parent::__construct(); 
         //$this->load->database();
      } 
     
        public function addEmployee($data)
        {
          $res2=$this->db->insert('employee',$data);
          if($res2)
          {
            return true;
          }
          else
          {
            return false;
          }
        }

        public function ShowEmployee()
        {
          $result = $this->db->get('employee');
          return $result->result();
        }
      
       
   } 
?> 