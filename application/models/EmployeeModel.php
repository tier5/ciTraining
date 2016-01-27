<?php

class EmployeeModel extends CI_model
{

	public function clockintime($data)
	{
		//echo $data['date'].$data['time'];
		$result=$this->db->insert('attendance',$data);
		//print_r($result);
		if($result)
        {
            return true;
        }
        else
        {
            return false;
        }

	}
	public function clockouttime($data)
	{

		//$this->db->where('clockout', $data);
		$result1=$this->db->update('attendance',$data);
		if($result1)
        {
            return true;
        }
        else
        {
            return false;
        }

	}
}







?>