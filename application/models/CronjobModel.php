<?php 
   Class CronjobModel extends CI_Model 
   { 
	
      Public function __construct() 
      { 
         parent::__construct(); 
         //$this->load->database();
      } 


      public function showTable()
      {
      	 $result = $this->db->get('employee');
      	 return $result->result_array();
      }

      public function inserInPoint_History($data)
      {
      	if($result = $this->db->insert('point_history', $data))
      	{
      		return $result;
      	}
      	
      }

      public function resetPoints($data)
      {
        $hello=$this->db->update('employee',$data);
        return $hello;
      }

    }