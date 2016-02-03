<?php
class EmployeeModel extends CI_model
{
//======================Set ClockIn Time In Database=================
    public function clockintime($data)
    {
        //echo"I am clock In model";
        $data2['Eid'] = $data['Eid'];
        $data2['date'] = $data['date'];
        $a = $this->db->get_where('attendance',$data2);
        //print_r($a->result());  
        if($a->result())
        {
            echo "You have already clocked in today";
            die;
        }
        else
        {
            $result=$this->db->insert('attendance',$data);
            //print_r($result);
            if($result)
            {
                //echo"clock in model";
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
        //print_r($data);
        $qwe=$this->db->get_where('attendance', $data);

        //print_r($qwe->result());
        if ($this->db->affected_rows() > 0)
        {    
            //echo "clock in";
            return true;
        }
        else
        {
            //return false;
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
        $brknm=$data1['breakname'];
        $chkbrk['Eid']=$data['Eid'];
        $chkbrk['date']=$data['date'];

        $mno=$this->db->get_where($brknm,$chkbrk);
        if ($this->db->affected_rows() > 0)
        {    
            return false;
        }
        else
        {
            $statusbrk=$this->db->update('attendance', $data1, $data);
            if ($this->db->affected_rows() > 0)
            {   
            $selecttbl=$data1['breakname'];
            $insert['Eid']=$data['Eid'];
            $insert['date']=$data['date'];
            $insert['starttime']=date("H:i:s");
            $result=$this->db->insert($selecttbl,$insert);
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
    }
//=========================================================================  
public function breakout($data)
    {
        //print_r($data);
        $data['Eid']=$data['Eid'];
        $data['date']=$data['date'];
        $data1['breakname']=Null;
        $data1['breakstatus']=Null;
        $brkout=$this->db->update('attendance', $data1, $data);
        //print_r($brkout);
        if ($this->db->affected_rows() > 0)
        {
            $selecttbl=$data['breakname'];
            $insert['Eid']=$data['Eid'];
            $insert['date']=$data['date'];
            
            $stotime['endtime']=date("H:i:s");

            
            $result=$this->db->update($selecttbl,$stotime,$insert);
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
    //===================disable fbreak==================
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
/*//==============disbale sbreak==================
     public function sbreak($data)
    {
        //echo "model sbreak";
         $result3=$this->db->get_where('sbreak',$data);
        //print_r($result2->row_array(0));
        if ($result3) 
        {
           
           $breakname1=$this->db->get_where('attendance');
           if ($breakname1) 
           {
               print_r($breakname1->row());
               print_r($result3->row_array(0));
           }
           else
           {
            echo "cannot fetch the break name";
           }
           return $result3->row_array(0);
        }
        else
        {
            echo "some error occured";
        }
    }
    //====disable lbreak========================
      public function lbreak($data)
    {
        
         $result4=$this->db->get_where('lbreak',$data);
        
        if ($result4) 
        {
           
           return $result4->row_array(0);
        }
        else
        {
            echo "some error occured";
        }
        //echo "hello model sbreak";
    }*/
    public function carrydisable($data)
    {
         $result5=$this->db->get_where('attendance',$data);
         if ($result5) 
         {
            return $result5->row('breakname');
         }
         else
         {
            return false;
         }
         
        

    }


}
?>