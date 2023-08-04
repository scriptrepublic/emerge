<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assessment extends CI_Controller {
	
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
		$data['page_title'] = 'Assessment';

		$data_rowquery = array(
        	'user_id'=> $this->session->userdata('ses_user_id')
        );
		$data['result'] = $this-> database_model->select_one_query('r_user',$data_rowquery);
		if($data['result']['b_country'] != NULL || $data['result']['b_country'] != NULL){
			$target_country = $data['result']['b_target'];
			$orig_country = $data['result']['b_country'];

			$data['result_docs'] = $this-> database_model->selectquery('SELECT A.*, B.doc_name, B.doc_description FROM r_doc_country AS A LEFT JOIN r_doc AS B on A.doc_id = B.doc_id WHERE A.country_id = '. $target_country);



			$cat = $this-> database_model->select_one_table_array_where('r_user_category','user_id', $this->session->userdata('ses_user_id'));
			$data['my_categories'] = array_column($cat, 'category_id');

			$data_query_docs = array(
	        	'ud_user_id'=> $this->session->userdata('ses_user_id'),
	        	'ud_orig_country'=> $orig_country,
	        	'ud_target_country'=> $target_country,
	        );
			$doc = $this-> database_model->select_all_query('r_user_documents',$data_query_docs);
			$data['my_docs'] = array_column($doc, 'ud_doc_id');




			$qa = $this-> database_model->selectquery('SELECT CONCAT(uq_question_id,"|",uq_is_yes) as q_a FROM r_user_question WHERE uq_orig_country = '.$orig_country.' AND uq_target_country = '.$target_country.' AND uq_user_id = '. $this->session->userdata('ses_user_id').' ');
			$data['my_qa'] = array_column($qa, 'q_a');
			


			$data['result_country'] = $this-> database_model->selectall('r_countries');
			$data['result_industry'] = $this-> database_model->selectall('r_industry');
			$data['result_category'] = $this-> database_model->selectall('r_category');
			$data['result_q_cat'] = $this-> database_model->selectall('r_question_category');

			$this->load->view('includes/view_header', $data);
			$this->load->view('view_assessment', $data);
			$this->load->view('includes/view_footer');
		}else{
			$this->load->view('includes/view_header', $data);
			$this->load->view('view_incomplete', $data);
			$this->load->view('includes/view_footer');
		}
		
	
	}


	public function save_assess()
	{
		$value = $this-> database_model->save_assess();
		echo $value;
	}

}
