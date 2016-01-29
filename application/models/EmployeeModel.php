<?php

class EmployeeModel extends CI_model
{

	public function clockintime($data)
	{
        $data2['Eid'] = $data['Eid'];
        $data2['date'] = date("d/m/Y");
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

        $data1['clockout'] = date("H:i:s");
        $data['date'] = date("d/m/Y");
		//$this->db->where('clockout', $data);
        $d=$this->db->where($data);
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

    public function endBreak($data)
    {
        $data1['breakstatus'] = 0;
        $data1['breakname'] = 0;
        $d=$this->db->where($data);
        $result=$this->db->update('attendance',$data1);

       


    }

    public function inBreak($data)
    {
        $ifclockedincheck['Eid'] = $data['Eid'];
        $ifclockedincheck['date'] = $data['date'];

        $ifclockedin = $this->db->get_where('attendance',$ifclockedincheck);
        
        if($ifclockedin->result())
        {
            //print_r($ifclockedin->result());
            $wheredata['Eid'] = $data['Eid'];
            $wheredata['date'] = $data['date'];
            $inputdata['breakname'] = $data['opt'];
            $inputdata['breakstatus'] = 1;

            $d=$this->db->where($wheredata);
            $res=$this->db->update('attendance',$inputdata);
            
            return "have a nice break";
            
        }
        else
        {
            return "clocked in first";
        }


        /*$wheredata['Eid'] = $data['Eid'];
        $wheredata['date'] = $data['date'];
        $inputdata['breakname'] = $data['opt'];
        $inputdata['breakstatus'] = 1;

        $d=$this->db->where($wheredata);
        $result=$this->db->update('attendance',$inputdata);
        */
    }
}







?>