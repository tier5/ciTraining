<?php 
   Class CronjobModel extends CI_Model 
   { 
	
      Public function __construct() 
      { 
         parent::__construct(); 
         //$this->load->database();
      } 


      public function showTable()
      {
      	 $result = $this->db->get('employee');
      	 return $result->result_array();
      }

      public function inserInPoint_History($data)
      {
      	if($result = $this->db->insert('point_history', $data))
      	{
      		return $result;
      	}
      	
      }

      public function resetPoints($data)
      {
        $hello=$this->db->update('employee',$data);
        return $hello;
      }


      public function fetchinfo($tbl,$con,$type)
          {
            $this->db->select('*');
            if($con)
            {
            $this->db->where($con);
            }
            $res=$this->db->get($tbl);
            if($type=="row")
            {
            return  $result=$res->row_array();
            }
             if($type=="count")
            {
            return  $result=$res->num_rows();
            }
             if($type=="result")
            {
            return  $result=$res->result_array();
            }

          }
 //======Cron Job For Reset Lunch Bonus Monthly========================     
      public function insertemployee($data)
      {
         if($result = $this->db->insert('lunch_bonus', $data))
        {
          return $result;
        }
      }
//==============Calculate Per Day Lunch Bonus===========================

     public function getlunchbonus($emp)
     {

       
        $today=date("Y-m-d");
        $first_day=date('d-m-Y', strtotime('first day of this month'));  
        
        $this->db->select('*');
        $this->db->where('Eid',$emp);
        $this->db->where('last_update BETWEEN "'. date('Y-m-d', strtotime($first_day)). '" and "'. date('Y-m-d', strtotime($today)).'"');
        $res = $this->db->get('lunch_bonus');
        $result=$res->row_array();
        return $result;


     }

    public function update_lunch_bonus($con,$updata)
    {  
          $this->db->where($con);
          $res=$this->db->update('lunch_bonus',$updata);

          if($res)
          {
            return true;
          }
               
    }
}