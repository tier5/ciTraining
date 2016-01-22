
<?php 
   Class FirstModel extends CI_Model 
   { 
	


      Public function __construct() 
      { 
         parent::__construct(); 
         //$this->load->database();
      } 



      public function insert()
      {
         //data array 'roll_no': row name and '6' is the data to be inserted 
      	$data= array('roll_no'=>'6', 'name'=>'Biplab');

      	$this->db->insert('stud',$data); //inserting
      }

       public function insert_form($data)
       {
            //$data= array('name'=>$name, 'password'=>$pwd, 'email'=> $email);
            //return $data;
            $this->db->insert('register',$data);
            /*if($a)
            {
               return "inserted";
            }
            else
            {
               return "failed";
            }*/
       }
       public function login($data)
       { 
          $res=$this->db->get_where('register',$data);
          //print_r($res);
          if ($res) 
          {
            $a=$res->row();
            return $a;
            //print_r($a->name);
          }
          else
          {
            return false;
          }


        }

        public function showall()
        {

          $query = $this->db->get('register');

          $res1=$query->result();

         
          //print_r($query);
          if($res1)
          { 


            return $res1;
            
          }
          else
          {
            return false;
          }

        }
      
       



   } 
?> 
