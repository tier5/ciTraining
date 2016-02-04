<?php
class EmployeeModel extends CI_model
{
//======================Insert ClockIn Time In Database=================
    public function clockintime($data)
    {
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
//======================Set Clockout Time In Database=====================
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
//======================Changing The Clock Button Value====================
    public function buttonvalue($data)//Catching The Data from controller
    {
        //print_r($data);
        $qwe=$this->db->get_where('attendance', $data);//Checking The value from database
        //print_r($qwe->result());
        if ($this->db->affected_rows() > 0)//Checking the Effected Rows
        {    
            //echo "clock in";
            return true; //If row exsits return 
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
//=============Select the break value when returning from break-=======
    public function brkback($data)
    {
        $pqr=$this->db->get_where('attendance', $data);
            if ($this->db->affected_rows() > 0)
            {    
                
                print_r($pqr->row('breakname'));
            }
            else
            {
                return false;
            }
    }
//======================Returning From the break============================  
    public function breakout($data)
    {
        //print_r($data);
        $data['Eid']=$data['Eid'];
        $data['date']=$data['date'];
        //$data1['breakname']='';
        $data1['breakstatus']='';
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
//========================Carry break disable=====================
    public function disablebrk($data)
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
//=============brkval on page load=================
    public function brkbackpl($data)
       {
            $pqr=$this->db->get_where('attendance', $data);
            if ($this->db->affected_rows() > 0)
            {    
                
                print_r($pqr->row('breakname'));
            }
            else
            {
                return false;
            }
       }
//==============Show Clock In Time On Page Load===================
    public function showclkin($data)
    {
       //echo "I am in employeemodel";
        $shw=$this->db->get_where('attendance', $data);
        if ($this->db->affected_rows() > 0)
            {    
                
                print_r($shw->row('clockin'));
            }
            else
            {
                return false;
            }
    }
//===============Show Emp Name On Page Load=========================
    public function showname($data)
    {     
       // print_r($data);
        //print_r('Hey');
        $data1['id']=$data['Eid'];
         //print_r($data1);
        $showname=$this->db->get_where('employee', $data1);
            if ($showname->result()) 
            {
                print_r($showname->row()->name);   
            }
            else
            {
                print_r('there is no data associated with this id');
            }
    }
}
?>