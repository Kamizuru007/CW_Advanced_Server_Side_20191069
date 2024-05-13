<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Questions extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function quizdisplay()
	{
		$this->load->model('quizmodel');
		$this->data['questions'] = $this->quizmodel->getQuestions();
		$this->load->view('selecttype', $this->data);
	}

	public function quizdisplay2()
	{
		// Load the quiz model and get questions
		$this->load->model('quizmodel');
		$this->data['questions'] = $this->quizmodel->getQuestions();
	
		// Load the comment model and get comments
		$this->load->model('commentmodel');
		$this->data['comments'] = $this->commentmodel->getComments();
	
		// Combine data from both models into a single array
		$data['questions'] = $this->data['questions'];
		$data['comments'] = $this->data['comments'];
	
		// Load the view and pass the combined data
		$this->load->view('play_quiz', $data);
	
	}

	public function welcomequizdisplay()
	{
		$this->load->view('quiz_game');
	}
	
	public function resultdisplay()
	{
		// Load the quiz model and get questions
		$this->load->model('quizmodel');
		$this->data['questions'] = $this->quizmodel->getQuestions();
		print($questions);
		$this->data['checks'] = array(
		     'ques1' => $this->input->post('quizid60'),
		     'ques2' => $this->input->post('quizid61'),
			 'ques3' => $this->input->post('quizid62'),
			 'ques4' => $this->input->post('quizid63'),
		     'ques5' => $this->input->post('quizid64'),
			 'ques6' => $this->input->post('quizid65'),
			 'ques7' => $this->input->post('quizid66'),
			 'ques8' => $this->input->post('quizid67'),
		     'ques9' => $this->input->post('quizid68'),
			 'ques10' => $this->input->post('quizid69'),
		);

        $this->load->model('quizmodel');
		$this->data['results'] = $this->quizmodel->getQuestions();
		$this->load->view('result_display', $this->data);
	}

	public function createcommentdislay()
	{
		$this->load->model('commentmodel');
		$this->data['commentspg'] = $this->commentmodel->getComments();
		$this->load->view('commentcreate', $this->data);


	}

	public function comment() {
	   
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			
			$commentText = $this->input->post('commentText');
			$data = $this->commentmodel->insertComment($commentText);
			echo json_encode($data);
		}
		
		elseif ($this->input->server('REQUEST_METHOD') == 'GET') {
		     
			 $commentID = $this->input->get('commentID');
			 
			 $deleted = $this->commentmodel->deleteperson($commentID);
			 echo json_encode($deleted);
		
		}
	}
}

