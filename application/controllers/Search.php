<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function result()
	{
		$data['page_title'] = 'Home';
		$data['result_country'] = $this-> database_model->selectall('r_countries');
		$data['result_industry'] = $this-> database_model->selectall('r_industry');
		$data['result_category'] = $this-> database_model->selectall('r_category');

		$industry_id = $this->input->get('industry_id');
		$category_id = $this->input->get('category_id');
		if($category_id){
			$data['my_categories'] = $category_id;
			$categories = implode(', ', $category_id);
			$where_industry = 'user_id IN (SELECT user_id FROM r_user_category WHERE category_id IN('.$categories.'))';
		}else{
			$where_industry = '1 = 1';
			$data['my_categories'] = array();
		}

		$country_origin = $this->input->get('country_origin');
		$country_target = $this->input->get('country_target');


		$industry = 'b_industry';
		$industry_value = $industry_id;
		if($industry_id == 0){
			$industry = '1';
			$industry_value = '1';
		}

		$orig = 'b_country';
		$orig_value = $country_origin;
		if($country_origin == 0){
			$orig = '1';
			$orig_value = '1';
		}

		$target = 'b_target';
		$target_value = $country_target;
		if($country_target == 0){
			$target = '1';
			$target_value = '1';
		}

		$data_search = array(
        	'b_public'=> 1,
        	$industry=> $industry_value,
        	$orig=> $orig_value,
        	$target=> $target_value,
        	$where_industry => NULL,
        );


		
		$data['result_msme'] = $this-> database_model->select_all_query('v_msme',$data_search);


		$this->load->view('includes/view_header', $data);
		$this->load->view('view_result', $data);
		$this->load->view('includes/view_footer');
	}
}
