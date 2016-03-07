<?php

class EmployeeModel extends CI_model
{

	public function clockintime($data)
	{
        $data2['Eid'] = $data['Eid'];
        $data2['date'] = $data['date'];
        $this->db->trans_start();
        $a = $this->db->get_where('attendance',$data2);
        $this->db->trans_complete();
       
        if($this->db->trans_status() === FALSE)
        {
            return false;
        }
        
        else
        {
            if($a->result())
            {
                echo "you have already clocked in today";
                die;
            }
            else
            {
                $this->db->trans_start();
                $result=$this->db->insert('attendance',$data);
                $this->db->trans_complete();
            
                if($result)
                {
                    return true;
                }
                else
                {
                    return false;
                }
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
            $storebreak['Eid'] = $data['Eid'];
            $storebreak['date'] = $data['date'];
            $storebreak['starttime'] = date("H:i:s");

            $breaktableres=$this->db->insert($data['opt'],$storebreak);


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

    public function autoChangeButton($data)
    {
        $res = $this->db->get_where('attendance',$data);

        return $res->row_array();
    }

    public function storeReturnTime($data)
    {
            $storebreak['Eid'] = $data['Eid'];
            $storebreak['date'] = $data['date'];
            $storebreakvalue['endtime'] = date("H:i:s");

            $tablename = $data['opt'];

            $d=$this->db->where($storebreak);
            $res=$this->db->update($tablename,$storebreakvalue);



    }

    public function autoDisableOption($data)
    {
        $fbreak = $this->db->get_where('fbreak',$data);
        if($fbreak->row_array()['endtime'])
        {
            echo "#fbreak,";
            //print_r($fbreak->row_array()['endtime']);
        }
        



        $sbreak = $this->db->get_where('sbreak',$data);
        if($sbreak->row_array()['endtime'])
        {
            echo "#sbreak,";
        }
        


        $lbreak = $this->db->get_where('lbreak',$data);
        if($lbreak->row_array()['endtime'])
        {
            echo "#lbreak,";
        }
        
            
    }

    public function showTimerOnLoad($data)
    {
            $res = $this->db->get_where('attendance',$data);

            $breakstatus = $res->row_array()['breakstatus'];

            $breakname = $res->row_array()['breakname'];

            if($breakstatus)
            {
                $breaktblres = $this->db->get_where($breakname,$data);//breakname is also the table name

                $starttime['starttime'] = $breaktblres->row_array()['starttime'];
                $starttime['breakname'] = $breakname;
                return $starttime;
               
            }

            
          
    }

    public function lateInBreak($data, $tablename)
    {

        $res = $this->db->get_where($tablename,$data);

        return $res->result_array();

    }

    public function storeInLateTable($data)
    {
        $result=$this->db->insert('tbl_late_emp',$data);

        

    }

    public function showName($data)
    {
        //return $data;
        $result = $this->db->get_where('employee',$data);

        $res = $result->row_array()['name'];

        return $res;
    }

    public function ShowEmpCurrentPoint($data)
    {
        $result = $this->db->get_where('employee',$data);
        return $result->row_array()['points'];
    }


    public function updateEmployeePoints($id, $points)
    {
        $this->db->where($id);
        if($this->db->update('employee',$points))
        {
          return true;
        }
    }

    public function showClockinTime($id)
    {
        $result = $this->db->get_where('attendance',$id);

        return $result->row_array()['clockin'];
    }

    public function returnBreakName($data)
    {
        $result = $this->db->get_where('attendance',$data);
        return $result->row_array();
    }
    public function pointalt($data)
    {
        $result= $this->db->get_where('tbl_late_emp',$data);
        //print_r($result->row_array());
        if ($result->num_rows() > 0)
        {
            return $result->result_array();
        }
        else
        {
            return false;
        }
    }

    public function fetchBreaktbl($data,$tblname)
    {
        $result=$this->db->get_where($tblname,$data);

        return $result->row_array();

    }

    public function insertNonTakenBreaktbl($data,$tablename)
    {
        if($this->db->insert($tablename,$data))
        {
            return true;
        }
        

    }

    public function allBreakTableInfo($data, $tablename)
    {

        $res = $this->db->get_where($tablename,$data);

        return $res->row_array();

    }
    public function shopoption($data)
    { 
      $result=$this->db->get_where('items',$data);
      return $result->result_array();
      
    }
    public function itemoption($data)
    {
        $result=$this->db->get_where('items',$data);
        return $result->result_array();

    }
    public function shopname($data)
    {
     $result=$this->db->get_where('items',$data);
     return $result->row_array()['item'];
    }
    public function submitorder($data)
    {
        $data1['Eid']=$data['Eid'];
        $data1['date']= $data['date'];
        $data1['status']= 0;
        $res=$this->db->get_where('lunchorder',$data1);
        if ($res->num_rows() > 0)
        {
            return false;
        }
        {
            $result=$this->db->insert('lunchorder',$data);
            return $result;
        } 
    }


    public function FngetAlldata($tbl,$where=null,$orderby=null)
      {
        $this->db->select('tbl_event_informations.*,employee.name,employee.propname');
       if($where)
        {
          $this->db->where($where);
        }
        if($orderby)
        {
          $this->db->order_by('date',$orderby);
        }
        $this->db->join('employee','employee.id =tbl_event_informations.Eid','inner');
        $result=$this->db->get($tbl);
        return $result->result_array();
      // echo $this->db->last_query();exit;
      }

      public function pointalt1()
   {
       $date1=date('Y-m-01');
       $date2=date('Y-m-t');
       $this->db->where('date >= ',$date1);
       $this->db->where('date <= ',$date2);
        $this->db->where('status',0);
         $this->db->where('Eid',$this->session->userdata('empid'));
       $result= $this->db->get('tbl_late_emp');
     //  echo $this->db->last_query();
      // die;
       //print_r($result->row_array());
       if ($result->num_rows() > 0)
       {
           return $result->result_array();
       }
       else
       {
           return false;
       }
   }

    
}


?>