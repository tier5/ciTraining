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


      public function FngetAlldataevent()
      {
         $sql="SELECT * FROM  `tbl_event_informations` WHERE  DATE_ADD(`date`, 
                INTERVAL YEAR(CURDATE())-YEAR(`date`)
                         + IF(DAYOFYEAR(CURDATE()) > DAYOFYEAR(`date`),1,0)
                YEAR)  
            BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 1 DAY)";
        $result=$this->db->query($sql);
        return $result->result_array();
      }

      public function eventbeforespecificdate($date)
      {
       $sql="SELECT * 
FROM  `tbl_event_informations` 
WHERE DATE_ADD(  `date` , INTERVAL YEAR(  '".$date."' ) - YEAR(  `date` ) + IF( DAYOFYEAR( '".$date."' ) > DAYOFYEAR(  `date` ) , 1, 0 ) YEAR ) 
BETWEEN  '".$date."'
AND DATE_ADD(  '".$date."', INTERVAL 1 
DAY ) ";
        $result=$this->db->query($sql);
       // echo $this->db->last_query();
        return $result->result_array();
      }

       public function evenspecificdate($date)
      {
       $sql="SELECT  `tbl_event_informations`. * ,  `employee`.`propname` ,  `employee`.`name` 
FROM  `tbl_event_informations` 
INNER JOIN  `employee` ON  `employee`.`id` =  `tbl_event_informations`.`Eid` 
WHERE DATE_FORMAT(  `date` ,  '%m-%d' ) = DATE_FORMAT(  '".$date."',  '%m-%d' )";
 $result=$this->db->query($sql);
       // echo $this->db->last_query();
        return $result->result_array();
      }
      public function currentEvent()
      {
        $sql="SELECT `tbl_event_informations` . * , `employee`.`propname`,`employee`.`name`
FROM `tbl_event_informations`
INNER JOIN `employee` ON `employee`.`id` = `tbl_event_informations`.`Eid`
WHERE date_format( `date` , '%m-%d' ) = date_format( curdate( ) , '%m-%d' )";
 $result=$this->db->query($sql);
        return $result->result_array();

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
                 return $this->db->affected_rows;
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

           public function FnAllorder($data)
           {
            

            $this->db->select('lunchorder.*,employee.propname');
            if($data['date']=='')
            {
            $this->db->where('date',date('Y-m-d'));
            }
            else
            {
               $this->db->where('date',date('Y-m-d',strtotime($data['date'])));
            }
          //  $this->db->where('ord_emp',$data['ord_emp']);
            $this->db->where('status',$data['status']);
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


         public function FngetName($id)
         {
            $this->db->select('*');
            $this->db->where('id',$id);
            
            $res=$this->db->get('employee');
            return $res->row_array(); 
         }

          public function cardCheck($where)
           {
              $result = $this->db->get_where('card', $where);
              return $result->row_array();
           }

           public function assignCard($data,$where)
           {
              $this->db->where($where);
              if($result = $this->db->update('card',$data))
              {
                return $result;
              }

           }

           public function FngetProductivity($tbl,$con)
           {
            $this->db->select('tbl_employee_productivity.*,employee.name,employee.propname');
            $this->db->where($con);
            $this->db->join('employee','employee.id=tbl_employee_productivity.Eid');
            $res=$this->db->get($tbl);
            return $res->result_array(); 

           }

           function FnMonthwiseProductivity($l_time,$month)
           {
            $sql="SELECT `tbl_employee_productivity`.*,sum(TIME_TO_SEC(TIMEDIFF(`endTime`,`startTime` ))) AS DiffTime, `employee`.`propname` FROM `tbl_employee_productivity` JOIN `employee` ON `employee`.`id` = `tbl_employee_productivity`.`Eid`  WHERE `date` >= '2016-".$month."-01'
            AND `date` <= '".$l_time."' and `status`='0' group by `Eid`,`type`";
            $res=$this->db->query($sql);
            $result=$res->result_array();
            //echo '<pre>';print_r($result);
            $return1='';
            if(!empty($result))
            {
              $return1.=" <thead>
                              <tr>

                                <td><strong>NAME</strong></td>
                               
                                <td><strong>Field</strong></td>
                                <td><strong>Total time <br>(hh:mm:ss)</strong></td>
                               
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                            </tr>
                            </thead><tbody>";
                        foreach($result as $res)
                        {
                          if($res['type']==1)
                          {
                            $field='Production';
                          }
                          elseif($res['type']==2)
                          {
                            $field='R&D';
                          }
                          elseif ($res['type']==3) {
                            $field='Traning';
                          }
                          else
                          {
                            $field='Administrative';
                          }

                           if($res['DiffTime']>=3600)
                           {
                            $h=round($res['DiffTime']/3600);
                            $m=round(($res['DiffTime']%3600)/60);
                            $s=round(($res['DiffTime']%3600)%60);
                            if($h<10)
                            {
                              $h='0'.$h;
                            }
                            if($m<10)
                            {
                              $m='0'.$m;
                            }
                            if($s<10)
                            {
                              $s='0'.$s;
                            }
                            $time=$h.':'.$m.':'.$s;
                           }
                           else
                           {
                            $h='00';
                            $m=round($res['DiffTime']/60);
                            $s=round($res['DiffTime']%60);
                           
                            if($m<10)
                            {
                              $m='0'.$m;
                            }
                            if($s<10)
                            {
                              $s='0'.$s;
                            }
                             $time=$h.':'.$m.':'.$s;
                           }

                         $return1.="<tr><td>".$res['propname']."</td><td>".$field."</td><td>".$time."</td></tr>";
                                        
                                        
                         }
                         $return1.="</tbody>";
                         echo $return1;
            }
            else
            {
              echo "No result Found.";
            }
           }

   } 
?> 