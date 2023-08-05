<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Database_model extends CI_Model {

	function  __construct(){
        parent::__construct();

   }

   function save_assess(){
		$user_id = $this->session->userdata('ses_user_id');
		$b_country = $this->input->post('b_country');
		$b_target = $this->input->post('b_target');
		$docs = $this->input->post('document_id');
		$category_id = $this->input->post('category_id');
		$q_id = $this->input->post('q_id');


		//ASSESS TABLE START
		$data_assess = array(
			'origin_country'=>$b_country,
			'target_country'=>$b_target,
			'user_id'=>$user_id,
		);
		$this->db->where($data_assess);
		$this->db->delete('t_assessments');

		$data_assess = array(
			'user_id'=>$user_id,
			'origin_country'=>$b_country,
			'target_country'=>$b_target,
		);
		$this->db->insert('t_assessments',$data_assess);
		//ASSESS TABLE

		//QUEST START
		$data_q_delete = array(
			'uq_orig_country'=>$b_country,
			'uq_target_country'=>$b_target,
			'uq_user_id'=>$user_id,
		);
		$this->db->where($data_q_delete);
		$this->db->delete('r_user_question');

		foreach ($q_id as $value) {
		  $data_q_insert = array(
	        'uq_user_id'=>$user_id,
	        'uq_orig_country'=>$b_country,
	        'uq_target_country'=>$b_target,
	        'uq_question_id'=>explode('|', $value)[0],
	        'uq_is_yes'=>explode('|', $value)[1],
	        );
		  $this->db->insert('r_user_question',$data_q_insert);
		}
		//QUES END

		//CATEGORY START
		$data_cat_delete = array(
			'user_id'=>$user_id,
		);
		$this->db->where($data_cat_delete);
		$this->db->delete('r_user_category');

		foreach ($category_id as $value) {
		  $data_cat_insert = array(
	        'user_id'=>$user_id,
	        'category_id'=>$value,
	        );
		  $this->db->insert('r_user_category',$data_cat_insert);
		}
		//CATEGORY END

		//DOCS START
		$data_doc_delete = array(
			'ud_orig_country'=>$b_country,
			'ud_target_country'=>$b_target,
			'ud_user_id'=>$user_id,
		);
		$this->db->where($data_doc_delete);
		$this->db->delete('r_user_documents');

		foreach ($docs as $value) {
		  $data_doc_insert = array(
	        'ud_user_id'=>$user_id,
	        'ud_orig_country'=>$b_country,
	        'ud_target_country'=>$b_target,
	        'ud_doc_id'=>$value,
	        );
		  $this->db->insert('r_user_documents',$data_doc_insert);
		}
		//DOCS END

		$data = array(
		'b_industry'=> $this->input->post('b_industry'),
		'b_public'=> $this->input->post('allow_public'),
		);

		$this->db->where('user_id', $user_id);
		$this->db->update('r_user', $data);
		return true;
	
    }

   function updateprofile(){
   		$user_id = $this->session->userdata('ses_user_id');

        $data = array(
        'user_fname'=>$this->input->post('firstname'),
        'user_lname'=>$this->input->post('lastname'),
        'b_name'=>$this->input->post('b_name'),
        'b_contact'=>$this->input->post('b_contact'),
        'b_info'=>$this->input->post('b_info'),
        'b_country'=>$this->input->post('b_country'),
        'b_target'=>$this->input->post('b_target'),
        'b_photo'=>$this->input->post('b_photo'),
        );

		$this->db->where('user_id', $user_id);
        $this->db->update('r_user', $data);
        return true;
	
    }

   function save_otp(){
   		$email = $this->input->post('email');
   		$query = $this->db->get_where('r_user',array('user_email'=>$email));
		$result = $query->row_array();

		$six_digit = random_int(100000, 999999);

        $data = array(
        'user_email'=>$email,
        'user_otp'=>$six_digit,
        );

		if($result == null){
			$this->db->insert('r_user',$data);
			return $six_digit;
		}else{
			$this->db->where('user_email', $email);
            $this->db->update('r_user', $data);
            return $six_digit;
		}
    }

    function loginnow(){
   		$email = $this->input->post('email');
   		$otp = $this->input->post('otp');
   		$query = $this->db->get_where('r_user',array('user_email'=>$email, 'user_otp'=>$otp));
		$result = $query->row_array();


		if($result != null){
			$newdata = array(
                'ses_user_email' => $result['user_email'],
                'ses_user_id' => $result['user_id'],
                'ses_logged_in' => true,
            );
            $this->session->set_userdata($newdata);
			return true;
		}else{
            return false;
		}
    }

    public function selectonequery($query){
		$query = $this->db->query($query);
		return $query->row_array();
	}
	
	function sp_json_return($sp, $data)
	{
		$query	= $this->db->query($sp,$data);

		$result = $query->result_array();
		$json_array_data = json_decode(json_encode($result), true);
		return $json_array_data;

	}


	function select_one_table($table_name)
	{
		$query = $this->db->get($table_name);
		return $query->result();
	}

	function select_one_table_where($table_name,$column,$where)
	{
		$query = $this->db->get_where($table_name,array($column=>$where));
		return $query->row_array();
	}


	function select_one_table_array_where($table_name,$column,$where)
	{
		$query = $this->db->get_where($table_name,array($column=>$where));
		return $query->result_array();
	}

	public function selectall_where($tablename, $column, $identifier)
	{
		$query = $this->db->get_where($tablename,array($column=>$identifier));
		return $query->result_array();
	}

	public function selectall($tablename)
	{
		$query = $this->db->get($tablename);
		return $query->result_array();
	}

	function delete_one_row($table_name, $column, $id)
	{
		$this->db->where($column, $id);
		$this->db->delete($table_name);
	}

	public function selectquery($query){
		$query = $this->db->query($query);
		return $query->result_array();
	}

	function select_one_query($table_name,$data_where)
	{
		$query = $this->db->get_where($table_name, $data_where);
		return $query->row_array();
	}

	function select_all_query($table_name,$data_where)
	{
		$query = $this->db->get_where($table_name, $data_where);
		return $query->result_array();
	}






}


?>