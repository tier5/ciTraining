<?php

class Rmodel extends CI_model 
	{
		public function __construct() 
      {
          parent::__construct();

     	 }

    public function insert($data)
     	{
          
     	
     	   $this->db->insert('codeigniter', $data);
       }

    public function match($data) 

    { //echo $data['Email']."<br/>".$data['Password'];

         
       $result = $this->db->get_where('codeigniter', $data);
       //print_r($result);
      if ($result->row()) 
       {
        $check= $result->row();
       return $check;
       //print_r($result->row()->id);
       }
       else
       {
        return false;
       }


  }

}

?> 