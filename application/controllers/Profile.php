<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ( $this->session->userdata('ses_logged_in')!=TRUE)
			{
				$url = base64_encode(current_url());
				redirect('login');
			}
	}
	public function index()
	{
		$data['page_title'] = 'Profile';

		$data_rowquery = array(
        	'user_id'=> $this->session->userdata('ses_user_id')
        );
		$data['result'] = $this-> database_model->select_one_query('r_user',$data_rowquery);

		$data['result_country'] = $this-> database_model->selectall('r_countries');
		$data['result_industry'] = $this-> database_model->selectall('r_industry');
		$data['result_category'] = $this-> database_model->selectall('r_category');


		$this->load->view('includes/view_header', $data);
		$this->load->view('view_profile', $data);
		$this->load->view('includes/view_footer');
	
	}

	public function updateprofile()
	{
		$value = $this-> database_model->updateprofile();
		echo $value;
	}

}
