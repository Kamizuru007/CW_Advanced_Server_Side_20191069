<?php

class RegisterController extends CI_Controller {

	
	public function RegisterUser()
	{
		$this->form_validation->set_rules('username','User Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('cpassword','Confirm Password','required|matches[password]');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('Register');
		}else
		{
			$this->load->model('Model_user');
			$responce = $this->Model_user->insertUserdata();
			if($responce){
				$this->session->set_flashdata('msg','Registered Successfully..please Login');
				redirect('HomeController/Login');
			}else{
				$this->session->set_flashdata('msg','Something went wrong! Try again');
				redirect('HomeController/Register');
			}
			
		}
	}
}
