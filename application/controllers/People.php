<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class People extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('peoplemodel');
	}

	public function index()
	{
		$this->load->model('peoplemodel');
		$this->data['names'] = $this->peoplemodel->getPeoples();
		$this->load->view('name_display', $this->data);
	}
	
	public function person() {
		
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			
			$question = $this->input->post('question');
			$option1 = $this->input->post('option1');
			$option2 = $this->input->post('option2');
			$option3 = $this->input->post('option3');
			$option4 = $this->input->post('option4');
			$answer = $this->input->post('answer');
			
			$data = $this->peoplemodel->insertperson($question, $option1, $option2, $option3, $option4, $answer);
			echo json_encode($data);
		}
		
		elseif ($this->input->server('REQUEST_METHOD') == 'GET') {
		     
			 $quizID = $this->input->get('quizID');
			 
			 $deleted = $this->peoplemodel->deleteperson($quizID);
			 echo json_encode($deleted);
		
		}
	}
	
	public function user() {
		
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			
			$quizID = $this->input->post('quizID');
			$question = $this->input->post('question');
			$option1 = $this->input->post('option1');
			$option2 = $this->input->post('option2');
			$option3 = $this->input->post('option3');
			$option4 = $this->input->post('option4');
			$answer = $this->input->post('answer');
			
			$update = $this->peoplemodel->updatePerson($quizID, $question, $option1,$option2,$option3,$option4, $answer);
			echo json_encode($update);
			
	
		}
		
		elseif ($this->input->server('REQUEST_METHOD') == 'GET') {
		     
			 $quizID = $this->input->get('quizID');	 
			 $edit = $this->peoplemodel->getPerson($quizID);
			 echo json_encode($edit);
		}
	}

}
