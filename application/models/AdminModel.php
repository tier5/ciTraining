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

        $res = $result->row_array()['propname'];

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

      public function deleteEmpLate($data)
      {
          $result = $this->db->delete('tbl_late_emp',$data);



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
      
      public function allLateRecord()
      {
          $result = $this->db->get('tbl_late_emp');

          return $result->result_array();

      }
<<<<<<< HEAD

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

=======
      
>>>>>>> dbb86bf90c4ec609038235eb55762e3f34ef5edb
   } 
?> 