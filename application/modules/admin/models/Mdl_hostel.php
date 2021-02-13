<?php
 
class Mdl_hostel extends MX_Controller
{
	
	 function get_floor_id($hid)
{
        $this->db->select('hostel_details.*,room_details.*');
		$this->db->from('hostel_details');
		$this->db->join('room_details','room_details.hostel_id=hostel_details.id');
		$this->db->where('hostel_id',$hid);
		$query = $this->db->get();
	    return $query;
}

function get_hostel_student($status)
{
        $this->db->select('student_data.*,student_room.*');
		$this->db->from('student_data');
		$this->db->join('student_room','student_room.student_id=student_data.id');
		$this->db->where("status",$status);
		$query = $this->db->get();
	    return $query;
}
}