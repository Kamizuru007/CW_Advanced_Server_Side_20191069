<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class peoplemodel extends CI_Model {

	public function getPeoples()
	{
		$this->db->select("*");
		$this->db->from('quiz');
		
		$query = $this->db->get();
		
		return $query->result();
		
		$num_data_returned = $query->num_rows;
		
		if ($num_data_returned < 1) {
			
			echo "There is no data in the database";
			exit(); }
	}
	
	public function insertPerson($question, $option1, $option2, $option3, $option4, $answer,$qtype) {
		
		$this->db->set('question', $question);
		$this->db->set('option1', $option1);
		$this->db->set('option2', $option2);
		$this->db->set('option3', $option3);
		$this->db->set('option4', $option4);
		$this->db->set('answer', $answer);
		$this->db->set('qtype', $qtype);
		$this->db->insert('quiz');
	}
	
	public function deletePerson($quizID) {
		$this->db->where('quizID', $quizID);
		$this->db->delete('quiz');
	}
	
	public function getPerson($quizID) {
         
		 $this->db->where('quizID', $quizID);
		 $query = $this->db->get('quiz');
		 
		 if($query->result()) {
		
		$result = $query->result();
		
		foreach ($result as $row) {
			
			$users[$row->quizID] = array($row->question, $row->option1 ,$row->option2 ,$row->option3 ,$row->option4 , $row->answer,$row->qtype);	
		}
		return $users;	 
		 }
		 
	}
	
	
	public function updatePerson($quizID, $question, $option1,$option2,$option3,$option4, $answer,$qtype) {
	
		$this->db->where('quizID', $quizID);
		$this->db->set('question', $question);
		$this->db->set('option1', $option1);
		$this->db->set('option2', $option2);
		$this->db->set('option3', $option3);
		$this->db->set('option4', $option4);
		$this->db->set('answer', $answer);
		$this->db->set('qtype', $qtype);
		$this->db->update('quiz');
	}
	
	
}
