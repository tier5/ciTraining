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
         

        $finalres=$this->db->update('employee', $data, $data1);
        
          if ($finalres) 
          {
            return true;
          }
          else
          {
            return false;
          }
          

            
            
      }
        public function addEmployee($data)
        {
          $data1=array(
            'email'=>$data['email']

            ); 
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
        
      
          if($res2)
          {
            return true;
          }
          else
          {
            return false;
          }
        }

        public function ShowEmployee()
        {
          $result = $this->db->get('employee');
          return $result->result();
        }

      
       
   } 
?> 