<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function findname($Eid)
    {
        $CI=& get_instance();
        $CI->load->database(); 

        $CI->db->select('propname');
        $CI->db->where('id',$Eid);
        $res = $CI->db->get('employee');
        return $return = $res->row_array();     
    }

?>