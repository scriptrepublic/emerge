<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$data['page_title'] = 'MSME Login';

		if ($this->session->userdata('ses_logged_in')==TRUE)
		{
			redirect('homepage');
		}else{
			$data['result_country'] = $this-> database_model->selectall('r_countries');
			$data['result_industry'] = $this-> database_model->selectall('r_industry');
			$data['result_category'] = $this-> database_model->selectall('r_category');
			$this->load->view('includes/view_header', $data);
			$this->load->view('view_login', $data);
			$this->load->view('includes/view_footer');
		}
	}

	public function sendotp()
	{
		$value = $this-> database_model->save_otp();
		echo $value;
	}

	public function loginnow()
	{
		$value = $this-> database_model->loginnow();
		echo $value;
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login', 'refresh');
	}
}
