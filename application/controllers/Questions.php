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
		$this->load->view('play_quiz', $this->data);
	}
	
	public function resultdisplay()
	{
		$this->data['checks'] = array(
		     'ques1' => $this->input->post('quizid34'),
		     'ques2' => $this->input->post('quizid35'),
			 'ques3' => $this->input->post('quizid36'),
			 'ques4' => $this->input->post('quizid37'),
		     'ques5' => $this->input->post('quizid38'),
			 'ques6' => $this->input->post('quizid39'),
			 'ques7' => $this->input->post('quizid40'),
			 'ques8' => $this->input->post('quizid41'),
		     'ques9' => $this->input->post('quizid42'),
			 'ques10' => $this->input->post('quizid43'),
		);

        $this->load->model('quizmodel');
		$this->data['results'] = $this->quizmodel->getQuestions();
		$this->load->view('result_display', $this->data);
	}
}

