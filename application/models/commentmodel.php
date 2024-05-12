<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class commentmodel extends CI_Model {

	public function getComments()
	{
		$this->db->select("*");
		$this->db->from('comments');
		
		$query = $this->db->get();
		
		return $query->result();
		
		$num_data_returned = $query->num_rows;
		
		if ($num_data_returned < 1) {
			
			echo "There is no data in the database";
			exit(); }
	}
	
	public function insertComment($commentText ) {
		
		$this->db->set('commentText', $commentText);
		$this->db->insert('comments');
	}
	
	
}
