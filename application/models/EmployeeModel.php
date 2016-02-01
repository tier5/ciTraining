<?php
class EmployeeModel extends CI_model
{
//======================Set ClockIn Time In Database=================
    public function clockintime($data)
    {
        $data2['Eid'] = $data['Eid'];
        $data2['date'] = $data['date'];
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
            //echo "clock in";
            return true;
        }
        else
        {
            return false;
        }
    }

//======================Set Text Of break button ================
    public function brkbtnval($data)
    {
       $zxc=$this->db->get_where('attendance', $data);
        if ($this->db->affected_rows() > 0)
        {    
            
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
            $selecttbl=$data1['breakname'];
            $insert['Eid']=$data['Eid'];
            $insert['date']=$data['date'];
            $insert['starttime']=date("H:i:s");
            
            $result=$this->db->insert($selecttbl,$insert);

            //return true;
            if($result)
            {    
                return true;
            }
            else
            {   

                return false;
            }
        } 
        else
        {
            return false;  
        }  
    }
//=========================================================================  
public function breakout($data)
    {
        //print_r($data);
        $data['Eid']=$data['Eid'];
        $data['date']=$data['date'];
        $data['breakname']=$data['breakname'];
        $data1['breakstatus']=0;
        $brkout=$this->db->update('attendance', $data1, $data);
        //print_r($brkout);
        if ($this->db->affected_rows() > 0)
        {
            $selecttbl=$data['breakname'];
            $insert['Eid']=$data['Eid'];
            $insert['date']=$data['date'];
            
            $stotime['endtime']=date("H:i:s");

            
            $result=$this->db->update($selecttbl,$stotime,$insert);

            //return true;
            if($result)
            {    
                return true;

            }
            else
            {   
                //echo"Not inserted";
                return false;
            }
            //return true;
        } 
        else
        {
            return false;  
        } 
    } 
    //===================disable==================
    public function breakdisable($data)
    {
        $result2=$this->db->get_where('fbreak',$data);
        //print_r($result2->row_array(0));
        if ($result2) 
        {
           return $result2->row_array(0);
        }
        else
        {
            echo "some error occured";
        }
        
            
    }



}
?>