<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Document extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Settingmodel');
		$this->sendemail = false;

		$config = array(
            'table' => 'doc_documents',
            'id' => 'id',
            'field' => 'uri',
            'title' => 'title',
            'replacement' => 'dash' // Either dash or underscore
        );
        $this->load->library('slug', $config);

	}
	public function index()
	{ 
		$data = array();
		$this->global['pageTitle'] = ' | Documents';	

		$post = $this->input->get();	
		if(isset($post['search']) && isset($post['schooltype'])){
			$data['search'] = $post['search'];
			$data['schooltype'] = $post['schooltype'];
		}
		$this->global['pageTitle'] = ' | Documents';		
		$this->general->loadViewsFront(FRONTEND."documents", $this->global, $data, NULL);
	}

	public function get_documents( $rowno = 0 ) {

		$post = $this->input->post();
		
		

		$wh    = array('d.isDelete'=>0,'d.status'=>1);
		$query = $this->db->select('*')->from('doc_documents as d');
		$query->where($wh);
		
		if( isset($post['schooltype']) && !empty($post['schooltype']) ){
			$query->join('tbl_school as s', 's.school_type = d.schools', 'left');
			$query->where('s.school_type',$post['schooltype']);
		}

		if( isset($post['search']) ){
			$query->group_start();
			$query->or_like('d.title',$post['search']);
			$query->or_like('d.description',$post['search']);
			$query->group_end();
		}
		$query->order_by('d.id','desc');
		$res2 = $query->get()->result_array();
		//echo $this->db->last_query();
		
		$rowperpage = 5;
		if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        } 

        $this->load->library('pagination');
        $config ['base_url'] =  base_url().'Document/get_documents';
        $config ['total_rows'] = count($res2);
        $config['use_page_numbers'] = TRUE;
        $config ['per_page'] = $rowperpage;
        $config ['num_links'] = 3;
        $config ['full_tag_open'] = '<nav><ul class="pagination justify-content-end">';
        $config ['full_tag_close'] = '</ul></nav>';
        $config ['first_tag_open'] = '<li class="page-item">';
        $config ['first_link'] = 'First';
        $config ['first_tag_close'] = '</li>';
        $config ['prev_link'] = 'Previous';
        $config ['prev_tag_open'] = '<li class="page-item">';
        $config ['prev_tag_close'] = '</li>';
        $config ['next_link'] = 'Next';
        $config ['next_tag_open'] = '<li class="page-item">';
        $config ['next_tag_close'] = '</li>';
        $config ['cur_tag_open'] = '<li class="active"><a href="javascript:;">';
        $config ['cur_tag_close'] = '</a></li>';
        $config ['num_tag_open'] = '<li>';
        $config ['num_tag_close'] = '</li>';
        $config ['last_tag_open'] = '<li class="page-item">';
        $config ['last_link'] = 'Last';
        $config ['last_tag_close'] = '</li>';

		$params['limit'] = $rowperpage;
		$params['start'] = $rowno;



		$wh    = array('d.isDelete'=>0,'d.status'=>1);
		$query = $this->db->select('*')->from('doc_documents as d');
		$query->where($wh);
		
		if( isset($post['schooltype']) && !empty($post['schooltype']) ){
			$query->join('tbl_school as s', 's.school_type = d.schools', 'left');
			$query->where('s.school_type',$post['schooltype']);
		}

		if( isset($post['search']) ){
			$query->group_start();
			$query->or_like('d.title',$post['search']);
			$query->or_like('d.description',$post['search']);
			$query->group_end();
		}
		$query->limit($rowperpage,$rowno);
		$query->order_by('d.id','desc');
		$res = $query->get()->result_array();
		//$res = $this->common->get_all('doc_documents',$wh,$params);
		

		$this->pagination->initialize($config);
        $data['page_link'] = $this->pagination->create_links( );
        $data['result'] = $res;
        $data['row'] = $rowno;
		$data['no_of_item'] = count($res2);
		
		// echo $this->db->last_query();
		$this->load->view(FRONTEND.'ajax/ajax_documents',$data);
	}

	
	public function doc_submit() {

		$sesssion = $this->session->get_userdata('DS_USER');
		$post	= $this->input->post();
		$schools = implode(",", $post["schools"]);
		
		$response = array();
		$this->form_validation->set_rules('doc_name','name','required');
		$this->form_validation->set_rules('doc_email','Email','required');
		$this->form_validation->set_rules('doc_title','Title','required');
		$this->form_validation->set_rules('doc_description','Description','required');
		//$this->form_validation->set_rules('doc_document','document','required');
		
		if($this->form_validation->run())
		{
			
			$data_uri = array(
				"title" 		=> $post['doc_title']
			);
			$data = array(
				"name" 			=> $post['doc_name'],
				"email" 		=> $post['doc_email'],
				"title" 		=> $post['doc_title'],
				"user_id" 		=> isset($sesssion["DS_USER"]) && !empty($sesssion["DS_USER"]) ? $sesssion["DS_USER"]["DS_Id"] : 0,
				"description" 	=> $post['doc_description'],
				"schools" 	=> $schools,
			);
			$data['uri'] = $this->slug->create_uri($data_uri);

			if($_FILES['doc_document']['error'] == 0) {
				$title = 'doc_';
				$file = $_FILES['doc_document'];

				$path = IMG_DOC;
				if(!is_dir($path)) {
				    mkdir($path);
				}

	            $attach =  $this->upload_files($path, $title, $file,'doc_document');

	            if(isset($attach['error'])) {
	            	$flag = false;
	            	$response['success'] = false;
	            	$response['message'] = $attach['error'];
	            }
	            else {
	            	$data['image'] = $attach['filename'];
	            }
			}

			$res = $this->common->insert_record("doc_documents",$data);

			if($res) {
				$response['msg'] = "Document send successfully!";
				$response['res'] = true;
				$response['res_type'] = 'success';

			} else {
				$response['msg'] = "Something Went Wrong.!";
				$response['res'] = false;
				$response['res_type'] = 'danger';
			}

			
		} else {			
			$response['msg'] = "Something went wrong..!";
			$response['res'] = false;
			$response['res_type'] = 'danger';
		}
		echo json_encode($response);
		die();
	}

	private function upload_files($path, $title, $files,$field_name)
    {
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => '*',
            'overwrite'     => 1,                       
        );

        if(!is_dir($path)) {
        	mkdir($path);
        }

        $image = str_replace(" ", "_", $files['name']);
        $fileName = $title .'_'.time().$image;
        $this->load->library('upload', $config);
        
        $config['file_name'] = $fileName;

        $this->upload->initialize($config);
        if (!$this->upload->do_upload($field_name)) {
        	$error = array('error' => $this->upload->display_errors());
        	return $error;
        }
        else {
        	$images['filename'] = $fileName;
        	return $images;
        }
        
    }


    public function doc_compare() {

    	$response = array();
		$post = $this->input->post();
		$count = 0;

		if($this->session->userdata('compareDoc')) {
			$compareArr = $this->session->userdata('compareDoc');
			if(count($compareArr) == 3) {
				$response['success'] = 'warning';
				$response['count'] = $count;
				$response['msg'] = 'you can compare up to 3 document';
				echo json_encode($response);
				exit;
			}
			array_push($compareArr, $post['id']);

		}else{

			$compareArr = array($post['id']);
		}
		$this->session->set_userdata('compareDoc',$compareArr);
		$count = count($compareArr);

		$response['res_type'] = 'success';
		$response['msg'] = 'Document Added to compare list successfully.';
		$response['count'] = $count;
		$response['html'] = $compareArr;
		
		echo json_encode($response);

	}


	public function remove_compare_doc()
	{
		$response = array();
		$post = $this->input->post();
		$count = 0;
		if($this->session->userdata('compareDoc')) {
			$compareArr = $this->session->userdata('compareDoc');
			if (($key = array_search($post['id'], $compareArr)) !== false) {
			    unset($compareArr[$key]);
			}
			$this->session->set_userdata('compareDoc',$compareArr);
			$count = count($compareArr);
			$response['res_type'] = 'success';
			$response['count'] = $count;
			$response['msg'] = 'Removed from compare list Successfully..';
		}
		else {
			$response['success'] = false;
			$response['msg'] = 'No Session..';
		}

		echo json_encode($response);
	}

	public function doc_detail($uri){
		
		$data = array();
		$this->db->select('d.*');
        $this->db->from('doc_documents as d');        
        $this->db->where('uri', $uri);	        
        $query = $this->db->get();
        $result = $query->result_array(); 
        $data['doc_detail'] = $result[0];
		$this->global['pageTitle'] = '| '.$result[0]["title"];	


		$this->db->select('r.*, CONCAT(u.fname," ", u.lname) as username ');
        $this->db->from('doc_tbl_rating as r');        
        $this->db->join('doc_user u ', 'u.id=r.userId');	        
        $this->db->where('r.status', '1');
        $this->db->where('r.doc_id',$data['doc_detail']['id']);
        $this->db->limit('4');	        
        $query = $this->db->get();
        
        $result_review = $query->result_array(); 
        $data['result_review'] = $result_review;

		$this->general->loadViewsFront(FRONTEND."details-page", $this->global, $data, NULL);



	}




	public function add_review()
	{
		$sesssion = $this->session->get_userdata('DS_USER');
		$post = $this->input->post();


		$data = array(
			"doc_id" 		=> $post['doc_id'],
			"rating" 		=> $post['rating'],
			"userId" 		=> isset($sesssion["DS_USER"]) && !empty($sesssion["DS_USER"]) ? $sesssion["DS_USER"]["DS_Id"] : 0,
			"review" 	    => $post['review_commnet']
		);

		$dup = $this->common->get_one_row("doc_tbl_rating",array("doc_id"=>$post['doc_id'],"userId"=>$sesssion["DS_USER"]["DS_Id"],"isDelete"=>0));
		
		if(!empty($dup) && count($dup) > 0) {
			$wh_update = array("id"=>$dup['id']);
			$res = $this->common->update_record("doc_tbl_rating",$data,$wh_update);
			$response['msg'] = 'Review update successfully.';
		} else {
			$res = $this->common->insert_record("doc_tbl_rating",$data);
			$response['msg'] = 'Review send successfully.';
		}
		
		if($res) {
			$response['res_type'] = 'success';
		}
		else {
			$response['res_type'] = 'danger';
			$response['msg'] = 'Review not changed..';
		}
		
		echo json_encode($response);
		die();
	}
	
}