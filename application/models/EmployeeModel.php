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
    public function clockindata($data)
    {
      //echo "clockindata function";
    $details=$this->db->get_where('attendance',$data);
    //print_r($details->result());
    if ($details) 
    {
       return $details->row_array();
    }
    else
    {
        return false;
    }


    }
    /*public function clockoutdata()
    {
        
    }*/
     public function breakload($data,$opt,$btn)
    {
        //print_r($data);
        //print_r($data);
        $a1 = $this->db->get_where('attendance',$data);
        //print_r($a1->row());
        if ($a1->row()) 
        {
            //print_r($btn);
            if ($btn=='work') 
            {
                
            
                $data1['breakstatus']=1;
                $data1['breakname']=$opt;
                $this->db->where($data);
                $fr=$this->db->update('attendance',$data1);
            }
            
        }

    }
    public function breakunload($data, $opt)
    {
        //print_r($data);
        //print_r($opt);
        $a2 = $this->db->get_where('attendance',$data);
        if ($a2->row('breakname')) 
        {
            if ($opt==$a2->row('breakname')) 
            {
                //echo $opt;
                $data1['breakstatus']='';
                $data1['breakname']='';
                //print_r($data1);
                $this->db->where($data);
                $fr=$this->db->update('attendance',$data1);

            }
            else
            {
                echo "choose a correct option \n".$a2->row('breakname');
            }
        }

    }
}







?>