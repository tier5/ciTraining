<?php 
class Addmodel extends CI_Model
{
    public function __construct()
	 {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
	 }

	public function updateEmp($data)
     {
        	$this->db->select('*');
            $this->db->from('employee');
            $this->db->where('id', $data['id']);
            $query = $this->db->get();
            $result = $query->result();
            //print_r($result);

            if ($result)
            {
                 $this->db->update('employee', $data);

            }
            else
            {
                 echo"Check The Employee Id";
            }     
	 }
}

?>