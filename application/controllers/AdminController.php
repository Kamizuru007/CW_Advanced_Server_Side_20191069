<?php

class AdminController extends CI_Controller {

	public function index1()
	{
		$this->load->view('dashboard');
	}

	public function index()
	{
		redirect('Quizz/index');
	}

}
