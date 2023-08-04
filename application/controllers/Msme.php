<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msme extends CI_Controller {

	public function view($id)
	{
		$data['page_title'] = 'Home';
		$data['result_country'] = $this-> database_model->selectall('r_countries');
		$data['result_industry'] = $this-> database_model->selectall('r_industry');
		$data['result_category'] = $this-> database_model->selectall('r_category');

		$user_id = decryptthis($id);
		$data_query = array(
        	'user_id'=> $user_id,
        );
		$data['result_msme'] = $this-> database_model->select_one_query('v_msme',$data_query);


		$this->load->view('includes/view_header', $data);
		$this->load->view('view_msme', $data);
		$this->load->view('includes/view_footer');
	}
}
