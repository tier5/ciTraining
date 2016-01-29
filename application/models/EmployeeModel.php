<?php
class EmployeeModel extends CI_model
{
//======================Set ClockIn Time In Database=================
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
//======================Set Clockout Time In Database==============
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
//======================Changing The Clock Button Value==============
    public function buttonvalue($data)
    {
        $qwe=$this->db->get_where('attendance', $data);
        //print_r($qwe->result());
        if ($this->db->affected_rows() > 0)
        {
            //echo "Hi";
            return true;
        }
        else
        {
            return false;
        }
    }
//===================Set Break Value & Status In Database============
    public function breakin($data, $data1)
    {
        $statusbrk=$this->db->update('attendance', $data1, $data);
        if ($this->db->affected_rows() > 0)
        {
            return true;
        } 
        else
        {
            return false;  
        }  
    }

//=========================================================================    
}
?>