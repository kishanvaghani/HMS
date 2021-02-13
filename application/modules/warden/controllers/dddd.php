$warden_id = ($this->session->userdata['warden_logged_in']['warden_id']);
 		$hostel_id = ($this->session->userdata['warden_logged_in']['hostel_id']);
 		$this->db->select('status');
		$this->db->where('hostel_id',$hostel_id);
		 $data['sdata'] = $this->db->get('student_data');
    	$this->load->view('view_pending',$data);