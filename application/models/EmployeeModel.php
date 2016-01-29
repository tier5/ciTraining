<?php

class EmployeeModel extends CI_model
{

	public function clockintime($data)
	{
        $data2['Eid'] = $data['Eid'];
        $a = $this->db->get_where('attendance',$data2);

        //print_r($a->result());
        
        if($a->result())
        {
            echo "you have already clocked in today";
            die;
        }
        else
        {
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
		//echo $data['date'].$data['time'];
		

	}
	public function clockouttime($data)
	{

        $data1['clockout'] = $data['clockout'];
		//$this->db->where('clockout', $data);
        $d=$this->db->where('Eid', $data['Eid']);
		$result1=$this->db->update('attendance',$data1);
		if($result1)
        {
            return true;
        }
        else
        {
            return false;
        }

	}
    public function btnv($data)
    {
        //print_r($data);
        $value=$this->db->get_where('attendance',$data);
        //print_r($value->result());
        if($value->result())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
     public function showclockin($data)
    {
       $value1=$this->db->get_where('attendance',$data);
       if ($value1->row()) 
       {
           return $value1->row('clockin');
       }
       else
       {
        return false;
       }
       
       //print_r($value1->result());
       //die;
    }
}







?>