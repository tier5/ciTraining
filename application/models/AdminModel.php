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
            if ($this->db->affected_rows() > 0)
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
      public function clockInEmp()
      {
        $date['date']=date("d/m/Y");
        $resultClockIn= $this->db->get_where('attendance',$date);


        if ($resultClockIn) 
        {
         echo"<table border =1> <th>ID</th>
                 <th>Name</th>
                 <th>ClockIn Time</th>
                 <th>ClockOut Time</th>" ;
          foreach ($resultClockIn->result() as $row)
          {
            //echo "Employee Id: \n".$row->Eid."Clock in Time: \n".$row->clockin."<br/>";
            //$fetchname=$this->db->get('employee');
             $idEmp['id']= $row->Eid;
             $resultname= $this->db->get_where('employee',$idEmp);

                echo "</tr>"."<tr>
                <td>".$row->Eid."</td>
                <td>".$resultname->row('name')."</td>
                <td>".$row->clockin."</td>
                <td>".$row->clockout."</td>";
          }
            "</tr> 
            </table>";

                
            
          

          return true;
        }
        
          else
          {
            return false;
          }
        
      }
      public function updateEmpNew($data)
      {
       
        $data2['id']=$data['id'];
        $test=$this->db->update('employee', $data, $data2);
        //print_r($data);
        if ($test) 
        {
          return true;
        }
        else
        {
          return false;
        }

       

      }   
   } 
?> 