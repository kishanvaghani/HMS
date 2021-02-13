<?php 

class Mdl_store_student extends CI_Model
{

function _construct()
{
	parent::_construct();
	$this->load->library('form_validation');
			$this->form_validation->CI=& $this;
}
function get_table()
{
	$table="student_accounts";
	return $table;
}
function get($order_by)
{

	$table=$this->get_table();
	$this->db->order_by($order_by);
	$query=$this->db->get($table);
	return $query;
}
function get_with_limit($limit, $offset,$order_by)
{

	$table=$this->get_table();
	$this->db->limit($limit,$offset);
	$this->db->order_by($order_by);
	$query=$this->db->get($table);
	$response = $query->result_array();

    return $response;

}
function get_dep_of_college($params = array())
{
	 $stateTbl='department_list';
	 $this->db->select('s.id, s.department_name');
      $this->db->from($this->stateTbl.' as s');
        
        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                if(strpos($key,'.') !== false){
                    $this->db->where($key,$value);
                }else{
                    $this->db->where('s.'.$key,$value);
                }
            }
        }
        
        $query = $this->db->get();
        $result = ($query->num_rows() > 0)?$query->result_array():FALSE;

        //return fetched data
        return $result;
}
function get_where($id)
{

	$table=$this->get_table();
	$this->db->where('stu_enroll',$id);
	$query=$this->db->get($table);
	return $query;
}
function _insert($data)
{
	$table = $this->get_table();
    $this->db->insert($table, $data);
}
function _update($id,$data)
{
	$table = $this->get_table();
	$this->db->where('stu_enroll', $id);
	$this->db->update($table, $data);
}


}