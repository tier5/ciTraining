<?php 
   Class AdminModel extends CI_Model 
   { 
	
      Public function __construct() 
      { 
         parent::__construct(); 
         //$this->load->database();
      } 

      public function updateEmp($data)
     {  
            $data12= array('id'=>$data['id']);
            $check= $this->db->get_where('employee',$data12);
            if ($check) 
            {
              print_r($data);
             /* $data= array(
                'id'=>$data['id'],
                'name'=>$data['name'],
                'email'=>$data['email'],
                'password'=>$data['password']
                );*/
              //$check13= $this->db->update('employee',$data);
              //print_r($check13->row());
              //if ($check13) 
              //{
                //return true;
                //print_r($check13);
              //}
              //else
              //{
                //return false;
              //}

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