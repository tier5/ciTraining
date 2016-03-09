<?php 
   Class AdminModel extends CI_Model 
   { 
	
      Public function __construct() 
      { 
         parent::__construct(); 
         //$this->load->database();
      } 

      public function updateEmp($data1, $data)
      {  
          $d=$this->db->where($data1);
          $res=$this->db->update('employee',$data);

          if($res)
          {
            return true;
          }
               
      }
      public function addEmployee($data)
      {
          $data1=array(
            'email'=>$data['email']); 
            //email already exists or not
          $result= $this->db->get_where('employee',$data1);
           //print_r($result);
          $abc=$result->row();
          if($abc)
          {
              return false;
          }
          else
          {
          //return true;
          $res2=$this->db->insert('employee',$data);
          //print_r($res2);
          //die;
             if($res2)
              {
                 return true;
              }
             else
              {
                 return false;
              }
          }
      }
      public function insert($tbl,$data)
      {
        $this->db->insert($tbl,$data);
        return $this->db->affected_rows();
      }

      public function ShowEmployee()
      {
          $result = $this->db->get('employee');
          return $result->result();
      }

      public function empClockIn($data)
      {
 
        $result = $this->db->get_where('attendance',$data);

        return $result->result_array();

        
      }   

      public function showName($data)
      {
        //return $data;
        $result = $this->db->get_where('employee',$data);

        $res = $result->row_array()['name'];

        return $res;
      }

      public function empFbreak($data)
      {
        $result = $this->db->get_where('attendance',$data);

        return $result->result_array();

      }

      public function empFclockin($data)
      {
        $result = $this->db->get_where('fbreak',$data);
        
        return $result->result_array();        
      }

      public function empSbreak($data)
      {
        $result = $this->db->get_where('attendance',$data);

        return $result->result_array();

      }

      public function empSbreakstart($data)
      {
        $result = $this->db->get_where('sbreak',$data);
        
        return $result->result_array();
      }

       public function empLbreakstart($data)
      {
        $result = $this->db->get_where('lbreak',$data);
        
        return $result->result_array();
      }

      public function checkEndTime($breaktable, $data)
      {
        
        $result = $this->db->get_where($breaktable,$data);

        return $result->result_array();


      }

      public function employeeLate($data)
      {
          $result = $this->db->get_where('tbl_late_emp',$data);

          return $result->result_array();

      }

      public function deleteEmpLate($data,$update)
      {
          //$result = $this->db->delete('tbl_late_emp',$data);
        $this->db->where($data);
        if($this->db->update('tbl_late_emp',$update))
        {
          return true;
        }
        



      }

      public function lateTblTruncate($data)
      {
          $this->db->truncate($data);
      }

      public function resetPoints($data)
      {
        $hello=$this->db->update('employee',$data);
        return $hello;
      }

      public function updateEmployeeTbl($data, $data1)
      {
        $this->db->where($data);
        if($this->db->update('employee',$data1))
        {
          return true;
        }
      }

      public function ShowEmpCurrentPoint($data)
      {
        $result = $this->db->get_where('employee',$data);
        return $result->row_array()['points'];
      }

      public function markAbsent($data)
      {
        if($this->db->insert('tbl_late_emp',$data))
        {
          return true;
        }
      }
      
      public function allLateRecord($data)
      {

          $result = $this->db->get_where('tbl_late_emp',$data);

          return $result->result_array();

      }
        public function delete($tbl,$data)
      {
          $this->db->where($data);
          $this->db->delete($tbl);
          return $this->db->affected_rows();
      }

      public function deleteEmp($data)
      {
          $this->db->where($data);
          $this->db->delete('employee');
      }

      public function deleteEmpFromAllTbl($data)
      {
        $table = array('fbreak','sbreak','attendance', 'lbreak', 'tbl_late_emp');
          $this->db->where($data);
          $this->db->delete($table);
      }
      public function fetch_data($tbl,$where=null)
      {
        if($where)
        {
          $this->db->where($where);
        }
       $result = $this->db->get($tbl);

          return $result->result_array();
       // echo $this->db->last_query();exit;
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

      /*public function showAllEvents()
      {
          $result = $this->db->get('tbl_event_informations');
      }*/
      public function showorder($data)
      {
          $result = $this->db->get_where('lunchorder',$data);
          return $result->result();
      }

      public function dltordr($data, $data1)
      {
        $d=$this->db->where($data);
          $res=$this->db->update('lunchorder',$data1);
          if($res)
          {
            return true;
          }
          else
          {
            return false;
          } 
      }

      public function dltallordr($data)
      {
         $this->db->where($data);
         
         if($this->db->delete('lunchorder'))
          {
            return true;
          }

      }

      public function showshop($data)
      {

        $result= $this->db->get_where('items',$data);
        return $result->result();
      }   

      public function addshop($data)
      {
        $result=$this->db->insert('items',$data);
        if($result)
              {
                 return true;
              }
             else
              {
                 return false;
              }
      }

      public function deleteshopitem($data)
      {

         $this->db->where($data);
         
         if($this->db->delete('items'))
          {
            return true;
          }

      }
      public function deleteshop($data1)
      {
          $this->db->where($data1);
         
         if($this->db->delete('items'))
          {
            return true;
          }
      }


      public function showitemsbyshop($data)
      {
        $result= $this->db->get_where('items',$data);
        return $result->result();
      }

      public function deleteitems($data)
      {
        $this->db->where($data);
         
         if($this->db->delete('items'))
          {
            return true;
          }
      }

      public function additems($data)
      {
        $result=$this->db->insert('items',$data);
        if($result)
              {
                 return true;
              }
             else
              {
                 return false;
              }
      }

      public function showshopname($data)
      {
        $result= $this->db->get_where('items',$data);
        return $result->row_array();

      }
       public function showpropName($data1)
      {
        //return $data;
        $result = $this->db->get_where('employee',$data1);

        $res = $result->row_array()['propname'];

        return $res;
      }

      public function FnPointmonth($month=null)
         {
           if($month)
           {
           $curMonth=$month;
           }
           else
           {
             $curMonth=date('n');
           }
           $curYear=date('Y');
           $this->db->select('point_history.*,employee.name,employee.propname');
           $this->db->join('employee','employee.id=point_history.Eid');

           $where="MONTH( `time_stamp` ) =".$curMonth." AND YEAR( `time_stamp` ) =".$curYear;
           $this->db->where($where);
           $res=$this->db->get('point_history');
           return $result=$res->result_array();
           
           }

           public function FnAllorder()
           {
            $this->db->select('lunchorder.*,employee.propname');
            $this->db->where('date',date('Y-m-d'));
            $this->db->join('employee','employee.id=lunchorder.Eid');
            $res=$this->db->get('lunchorder');
           return $res->result_array();
           }


          public function selectprint($data)
          {
             $this->db->select('lunchorder.*,employee.propname');
             //$result= $this->db->get_where('lunchorder',$data);
             //return $result->row_array();
             //return $data;
             $this->db->where('Liid',$data);
             $this->db->join('employee','employee.id=lunchorder.Eid');
             $res=$this->db->get('lunchorder');
             return $res->result_array();

          }

   } 
?> 