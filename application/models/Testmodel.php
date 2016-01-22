<?php 

 class Testmodel extends CI_Model 
 {

 	public function mymodel()
 	{
 		$a['name']='kingsuk';
 		

 		return $a;

 		
 	}

 	public function showname()
 	{
 		$query = $this->db->query('SELECT * FROM user');

 		$row = $query->num_rows();

 		if($row)
 		{
 			return $query->result();
 		}

 		else
 		{
 			echo "row doesnot exists";
 		}
 	}

 }
