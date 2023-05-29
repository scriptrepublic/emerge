<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function index()
	{
		$data['page_title'] = 'Home';
		$data['result_country'] = $this-> database_model->selectall('r_countries');
		$data['result_industry'] = $this-> database_model->selectall('r_industry');
		$data['result_category'] = $this-> database_model->selectall('r_category');
		$data['my_categories'] = array();
		$data_search = array(
        	'b_public'=> 1,
        	'is_featured'=> 1,
        );
		$data['result_msme'] = $this-> database_model->select_all_query('v_msme',$data_search);


		$this->load->view('includes/view_header', $data);
		$this->load->view('view_homepage', $data);
		$this->load->view('includes/view_footer');
	}
}
