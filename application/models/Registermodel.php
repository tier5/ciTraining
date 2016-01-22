<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Registermodel extends CI_Model 
 {
 	public function __construct()
 	{
 		parent::__construct();
 		//$this->db->load();
 	}

 	public function registerUser($data)
 	{
 		$result=$this->db->insert('user',$data);

 		if($result)
 		{
 			$result1 = $this->db->get_where('user',$data);

 			$row = $result1->row();

 			if($row)
 			{
 				return $row;
 			}

 			else
 			{
 				return "couldnot fetch";
 			}
 		}

 		else
 		{
 			return "couldnot insert";
 		}

 		
 	}

 	public function loginUser($data)
 	{
		$result = $this->db->get_where('user',$data); 		
 		


 		$a = $result->row();

 		if($a)
 		{
 			return $a;
 		}
 		else
 		{
 			return false;
 		}

 		//
 		//return $s;
 	}

 	public function allUser()
 	{
 		//echo "in all user";

 		$result = $this->db->get('user');

 		return $result->result();
 	}
 	
 }