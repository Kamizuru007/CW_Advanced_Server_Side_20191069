<?php

class LoginController extends CI_Controller {

	
	public function LoginUser()
	{

		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('Login');
		}else
		{
			$this->load->model('Model_user');
			$result = $this->Model_user->LoginUser();


			if ($result != false){
				
				$user_data = array(
					'user_id' => $result->id,
					'username' => $result->username,
					'email' => $result->email,
					'loggedin' => TRUE	
				);

				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('welcome','Welcome To The Quiz Box!');
				redirect('AdminController/index1');


			}else{
				$this->session->set_flashdata('loginmsg','Something went wrong! Try again');
				redirect('HomeController/Login');
			}
		}
	}

	public function LogoutUser(){
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('loggedin');
		redirect('HomeController/Login');
	}
}
