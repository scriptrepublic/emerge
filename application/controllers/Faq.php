<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$data['page_title'] = 'Frequently Asked Questions';


		$data['result_country'] = $this-> database_model->selectall('r_countries');
		$data['result_industry'] = $this-> database_model->selectall('r_industry');
		$data['result_category'] = $this-> database_model->selectall('r_category');
		$data['result_faq'] = $this-> database_model->selectall('r_faqs');

		$this->load->view('includes/view_header', $data);
		$this->load->view('view_faq', $data);
		$this->load->view('includes/view_footer');
	
	}

}
