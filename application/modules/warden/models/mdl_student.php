<?php 

class Mdl_student extends CI_Model
{

function _construct()
{
	parent::_construct();
	$this->load->library('form_validation');
			$this->form_validation->CI=& $this;
}
function get_student_data($id,$sid)
{
	 $this->db->select("student_room.*,student_data.*");
	$this->db->from('student_data');
	$this->db->join('student_room', 'student_data.id=student_room.student_id');
	$this->db->where("student_id",$id);
	$query = $this->db->get();
	return $query;
}

function get_student_id($id,$student_id)
{
        $this->db->select('student_data.*,student_room.*');
		$this->db->from('student_data');
		$this->db->join('student_room','student_room.student_id=student_data.id');
		$this->db->where('hostel_id',$hostel_id);
		$this->db->where('student_id',$student_id);
		$query = $this->db->get();
	    return $query;
}

function get_roomdata()
{
        $this->db->select('hostel_details.*,room_details.*');
		$this->db->from('hostel_details');
		$this->db->join('room_details','room_details.hostel_id=hostel_details.id');
		$query = $this->db->get();
	    return $query;
}

function get_complain_data($hostel_id,$status)
{
        $this->db->select('complain_data.*,student_room.*');
		$this->db->from('complain_data');
		$this->db->join('student_room','student_room.student_id=complain_data.student_id');
		$this->db->where("c_status",$status);
		$this->db->where('hostel_id',$hostel_id);
		$query = $this->db->get();
	    return $query;
}
 
    //$this->db->select("student_data.*,hostel_details.id AS hid,hostel_details.hostel_name");
	//$this->db->from('hostel_details');
	//$this->db->join('student_data', 'hostel_details.id=student_data.hostel_id');
	//$this->db->where("status",$status);
	//$query = $this->db->get();
	//return $query;
function get_hostel_student($hostel_id,$status)
{
        $this->db->select('student_data.*,student_room.*');
		$this->db->from('student_data');
		$this->db->join('student_room','student_room.student_id=student_data.id');
		$this->db->where("status",$status);
		$this->db->where('hostel_id',$hostel_id);
		$query = $this->db->get();
	    return $query;
}
 
function get_hostel_student1($hid,$status)
{
	
	$this->db->select("student_room.*,student_data.*");
	$this->db->from('student_data');
	$this->db->join('student_room', 'student_data.id=student_room.student_id');
	$this->db->where("status",$status);
	$query = $this->db->get();
	return $query;
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