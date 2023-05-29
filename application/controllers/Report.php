<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {


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

		$data['page_title'] = 'My Assessment Reports';
		$data['result_country'] = $this-> database_model->selectall('r_countries');
		$data['result_industry'] = $this-> database_model->selectall('r_industry');
		$data['result_category'] = $this-> database_model->selectall('r_category');

		$user_id = $this->session->userdata('ses_user_id');
		$data_ass = array(
        	'user_id'=> $user_id,
        );
		$data['result_ass'] = $this-> database_model->select_all_query('v_assessment',$data_ass);


		$data['result_user'] = $this-> database_model->selectonequery('SELECT A.*, B.industry_name, C.country_name as orig_country, D.country_name as target_country FROM r_user AS A LEFT JOIN r_industry AS B ON A.b_industry = B.industry_id LEFT JOIN r_countries AS C ON A.b_country = C.country_id LEFT JOIN r_countries AS D ON A.b_target = D.country_id WHERE A.user_id = '.$user_id);

		$this->load->view('includes/view_header', $data);
		$this->load->view('view_myreports', $data);
		$this->load->view('includes/view_footer');
	}

	public function goto($orig,$target)
	{
		redirect('report/view/'.encryptthis($orig).'/'.encryptthis($target));
	}

	public function view($orig,$target)
	{
		$data['page_title'] = 'Assessment Report';

		if ($this->session->userdata('ses_logged_in')==FALSE)
		{
			redirect('login');
		}else{
			$data['result_country'] = $this-> database_model->selectall('r_countries');
			$data['result_industry'] = $this-> database_model->selectall('r_industry');
			$data['result_category'] = $this-> database_model->selectall('r_category');
			$orig = decryptthis($orig);
			$target = decryptthis($target);

			$user_id = $this->session->userdata('ses_user_id');
			$data['user_id'] = $user_id;
			$data['orig_country'] = $orig;
			$data['target_country'] = $target;


			$data_ass = array(
	        	'user_id'=> $user_id,
	        	'origin_country'=> $orig,
	        	'target_country'=> $target,
	        );
			$data['result_ass'] = $this-> database_model->select_one_query('v_assessment',$data_ass);


			$data['result_user'] = $this-> database_model->selectonequery('SELECT A.*, B.industry_name, C.country_name as orig_country, D.country_name as target_country FROM r_user AS A LEFT JOIN r_industry AS B ON A.b_industry = B.industry_id LEFT JOIN r_countries AS C ON A.b_country = C.country_id LEFT JOIN r_countries AS D ON A.b_target = D.country_id WHERE A.user_id = '.$user_id);

			$data['result_overall'] = $this-> database_model->selectonequery('SELECT (SUM(uq_is_yes)/COUNT(*))*100 AS grade, (SELECT grade_name FROM r_grade WHERE (SUM(uq_is_yes)/COUNT(*))*100 BETWEEN grade_min AND grade_max) as grade_name, (SELECT grade_description FROM r_grade WHERE (SUM(uq_is_yes)/COUNT(*))*100 BETWEEN grade_min AND grade_max) as grade_description FROM r_user_question AS A LEFT JOIN r_question_detail AS B ON A.uq_question_id = B.q_id WHERE uq_orig_country = '.$orig.' AND uq_target_country = '.$target.' AND uq_user_id = '.$user_id);

			$data['result_q_cat'] = $this-> database_model->selectall('r_question_category');


			$data['result_docs'] = $this-> database_model->selectquery('SELECT A.*, B.doc_name, B.doc_action, B.doc_link FROM r_doc_country AS A LEFT JOIN r_doc AS B on A.doc_id = b.doc_id WHERE A.country_id = 1 AND A.doc_id NOT IN (SELECT ud_doc_id FROM r_user_documents WHERE ud_user_id = '.$user_id.' AND ud_orig_country = '.$orig.' and ud_target_country = '.$target.');');

			//echo count($data['result_docs']);

			$this->load->view('includes/view_header', $data);
			$this->load->view('view_report', $data);
			$this->load->view('includes/view_footer');
		}
	}

}
