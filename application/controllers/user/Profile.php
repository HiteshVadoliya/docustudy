<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Settingmodel');
		$this->sendemail = false;
	}

	public function index()
	{ 

		$data = array();
		$this->global['pageTitle'] = ' | Profile';		

		$sesssion = $this->session->get_userdata('DS_USER');
		
		if($sesssion['DS_USER']['DS_Id']) {

		} else {
			$_SESSION['FAIL'] = "Something Went wrong..";
			redirect(base_url());
		}

		/* Profile Details */
		$wh_user = array(
			"id" => $sesssion['DS_USER']['DS_Id'],
			"status"=>"1",
			"isDelete"=>"0",
		);
		$data['profile'] = $this->common->get_one_row("doc_user",$wh_user);
		/* Profile Details */

		//$wh =  array('user_id'=>$sesssion['DS_USER']['DS_Id']);
		//$total_reward = $this->common->get_num_rows_with_where('doc_rewards',$wh);
		//$result_reward = $this->db->select('SUM(point) as total_reward')->from('doc_rewards')->where($wh)->get()->result_array();
		$total_reward = $this->get_score(1);
		
		$data['total_reward'] = $total_reward['total_reward'];
		$this->general->loadViewsFront(FRONTEND."profile", $this->global, $data, NULL);
	}

	public function profile_update() {

		$post = $this->input->post();
		$sesssion = $this->session->get_userdata('DS_USER');
		$response = array();
		
		$this->form_validation->set_rules('fname','name','required');
		$this->form_validation->set_rules('lname','Email','required');
		$this->form_validation->set_rules('email','Title','required');
		$this->form_validation->set_rules('phone','Description','required');
		
		if($this->form_validation->run())
		{

			$wh_update = array(
				"id"=>$sesssion['DS_USER']['DS_Id']
			);
			$data = array(
				"fname" => $post['fname'],
				"lname" => $post['lname'],
				"email" => $post['email'],
				"phone" => $post['phone'],
			);
			$res = $this->common->update_record("doc_user",$data,$wh_update);

			if($res) {
				$response['msg'] = "Profile update successfully!";
				$response['res'] = true;
				$response['res_type'] = 'success';

			} else {
				$response['msg'] = "nothing to update!";
				$response['res'] = ture;
				$response['res_type'] = 'success';
			}

		} else {			
			$response['msg'] = "Something went wrong..!";
			$response['res'] = false;
			$response['res_type'] = 'danger';
		}
		echo json_encode($response);
		die();
	}

	public function password_update() {

		$post = $this->input->post();
		$sesssion = $this->session->get_userdata('DS_USER');
		$response = array();
		
		$this->form_validation->set_rules('password','name','required');
		$this->form_validation->set_rules('new_password','Email','required');
		$this->form_validation->set_rules('confirm_password','Title','required');
		
		if($this->form_validation->run())
		{

			$wh_update = array(
				"id"=>$sesssion['DS_USER']['DS_Id']
			);
			$user = $this->common->get_one_row("doc_user",$wh_update);
			
			if($user['password']==md5($post['password'])) {

				$data = array(
					"password" => md5($post['new_password']),
				);
				$res = $this->common->update_record("doc_user",$data,$wh_update);

				if($res) {
					$response['msg'] = "password changed successfully!";
					$response['res'] = true;
					$response['res_type'] = 'success';

				} else {
					$response['msg'] = "Something went wrong..!";
					$response['res'] = ture;
					$response['res_type'] = 'success';
				}

			} else {
				$response['msg'] = "old password not matched!";
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

	public function my_uploads( $rowno = 0 ) {

		$sesssion = $this->session->get_userdata('DS_USER');
		$DS_Id = $sesssion['DS_USER']['DS_Id'];

		$post = $this->input->get();

		$tbl 		= "doc_documents";
		$rows 		= '*';
		$wh 		= array('isDelete'=>0,'user_id'=>$DS_Id);
		$params 	= array();
		$params['ShortBy'] = "id";
		$params['ShortOrder'] = "desc";
		$res2 = $this->common->get_all($tbl,$wh,$params);

		$rowperpage = 5;
		if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        } 

        $this->load->library('pagination');
        $config ['base_url'] =  base_url().'Profile/my_uploads';
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
		
		$res = $this->common->get_all($tbl,$wh,$params);

		$this->pagination->initialize($config);
        $data['page_link'] = $this->pagination->create_links( );
        $data['result'] = $res;
        $data['row'] = $rowno;
		$data['no_of_item'] = count($res2);
		
		$this->load->view(FRONTEND.'ajax/ajax_my_uploads',$data);
	}

	public function my_download( $rowno = 0 ) {

		$sesssion = $this->session->get_userdata('DS_USER');
		$DS_Id = $sesssion['DS_USER']['DS_Id'];

		$post = $this->input->get();

		$tbl 		= "doc_documents dd";
		$rows 		= '*';
		$wh 		= array('dw.user_id'=>$DS_Id,'dw.reward_plus_minius'=>'minus');
		$params 	= array();
		$params['ShortBy'] = "dd.id";
		$params['ShortOrder'] = "dd.desc";
		$joins['doc_rewards dw'] = ' dw.doc_id=dd.id ';
		$res2 = $this->common->get_all($tbl,$wh,$params,$joins);

		$rowperpage = 5;
		if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        } 

        $this->load->library('pagination');
        $config ['base_url'] =  base_url().'Profile/my_download';
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
		
		$res = $this->common->get_all($tbl,$wh,$params,$joins);

		$this->pagination->initialize($config);
        $data['page_link'] = $this->pagination->create_links( );
        $data['result'] = $res;
        $data['row'] = $rowno;
		$data['no_of_item'] = count($res2);

		$this->load->view(FRONTEND.'ajax/ajax_my_download',$data);
	}

	public function add_to_fav() {

		$post = $this->input->post();
		$doc_id = $post['id'];
		$sesssion = $this->session->get_userdata('DS_USER');		
		if($sesssion['DS_USER']['DS_Id']) {

			$fav_doc = $this->common->get_num_rows_with_where("doc_wishlist",array("doc_id"=>$doc_id,"user_id"=>$sesssion['DS_USER']['DS_Id']));
			if(!$fav_doc){

				$data =  array(
							'doc_id' => $doc_id,
							'user_id' => $sesssion['DS_USER']['DS_Id']
						);
				$res = $this->common->insert_record('doc_wishlist',$data);
				if($res) {

					$response['success'] = 'success';
					$response['msg'] = 'Document added to wishlist successfully.';		

				}else{

					$response['success'] = 'danger';
					$response['msg'] = 'Something went wrong.';		
						
				}
				$response['type'] = 'add';		

			}else{

				$wh =  array( 'doc_id' => $doc_id, 'user_id' => $sesssion['DS_USER']['DS_Id']);
				$res = $this->common->delete_record_from_db('doc_wishlist',$wh);
				if($res) {

					$response['success'] = 'success';
					$response['msg'] = 'Document remove from wishlist successfully.';		

				}else{

					$response['success'] = 'danger';
					$response['msg'] = 'Something went wrong.';		
				}
				$response['type'] = 'remove';

			}	

		}else{
			$response['res_type'] = 'danger';
			$response['msg'] = 'Please Loging ...';			
		}
		echo json_encode($response);

	}

	public function get_wishlist_documents( $rowno = 0 ) {

		$post = $this->input->get();
		$sesssion = $this->session->get_userdata('DS_USER');		
		$user_id = $sesssion['DS_USER']['DS_Id'];

		//$rowno = 0;

		$tbl 		= "doc_documents d";
		$rows 		= '*';
		$wh 		= array('d.isDelete'=>0,'d.status'=>1,'dw.user_id'=>$user_id);
		$params 	= array();
		$params['ShortBy'] = "id";
		$params['ShortOrder'] = "desc";
		$joins['doc_wishlist dw'] = ' dw.doc_id=d.id ';
		
		$res2 = $this->common->get_all($tbl,$wh,$params,$joins);

		$rowperpage = 3;
		if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        } 

        $this->load->library('pagination');
        $config ['base_url'] =  base_url().'Profile/get_wishlist_documents';
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
        $config ['cur_tag_open'] = '<li class="active"><a href="javascript:;" class="paging">';
        $config ['cur_tag_close'] = '</a></li>';
        $config ['num_tag_open'] = '<li>';
        $config ['num_tag_close'] = '</li>';
        $config ['last_tag_open'] = '<li class="page-item">';
        $config ['last_link'] = 'Last';
        $config ['last_tag_close'] = '</li>';

        // $params['limit'] = array($rowno,$rowperpage); // $rowperpage;

		$params['limit'] = $rowperpage;
		$params['start'] = $rowno;
		// $params['offset'] = $rowno;

		$res = $this->common->get_all($tbl,$wh,$params,$joins);

		// echo $this->db->last_query(); die();
		// $res = $this->common->get_all_join_record($tables,$joins,$rows,$groupBy,$order_by,$wh,$keywords,$field_array,$params,$find_in_set);

		$this->pagination->initialize($config);
        $data['page_link'] = $this->pagination->create_links( );
        $data['result'] = $res;
        $data['row'] = $rowno;
		$data['no_of_item'] = count($res2);
		//return $data;
		// echo $this->db->last_query();
		$this->load->view(FRONTEND.'ajax/ajax_wishlist_documents',$data);
	}

	public function get_reviews( $rowno = 0 ) {


	
		$post = $this->input->get();
		$sesssion = $this->session->get_userdata('DS_USER');		
		$user_id = $sesssion['DS_USER']['DS_Id'];

		//$rowno = 0;

		$tbl 		= "doc_tbl_rating r";
		$rows 		= '*';
		$wh 		= array('r.isDelete'=>0,'r.status'=>1,'r.userId'=>$user_id);
		$params 	= array();
		$params['ShortBy'] = "r.id";
		$params['ShortOrder'] = "desc";
		
		$res2 = $this->common->get_all($tbl,$wh,$params);

		$rowperpage = 5;
		if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        } 

        $this->load->library('pagination');
        $config ['base_url'] =  base_url().'Profile/get_reviews';
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

        // $params['limit'] = array($rowno,$rowperpage); // $rowperpage;

		$params['limit'] = $rowperpage;
		$params['start'] = $rowno;
		// $params['offset'] = $rowno;

		$res = $this->common->get_all($tbl,$wh,$params,$joins);

		// echo $this->db->last_query(); die();
		// $res = $this->common->get_all_join_record($tables,$joins,$rows,$groupBy,$order_by,$wh,$keywords,$field_array,$params,$find_in_set);

		$this->pagination->initialize($config);
        $data['page_link'] = $this->pagination->create_links( );
        $data['result'] = $res;
        $data['row'] = $rowno;
		$data['no_of_item'] = count($res2);
		//return $data;
		// echo $this->db->last_query();
		$this->load->view(FRONTEND.'ajax/ajax_reviews',$data);
	}

	public function edit_review()
	{	

		$sesssion = $this->session->get_userdata('DS_USER');
		$post = $this->input->post();
		if($post['type'] == 'get') {
			
			$dup = $this->common->get_one_row("doc_tbl_rating",array("id"=>$post['id']));
			$response['data'] = $dup;
			

		}else{

			$sesssion = $this->session->get_userdata('DS_USER');
			$post = $this->input->post();

			$data = array(
				"doc_id" 		=> $post['doc_id'],
				"rating" 		=> $post['rating'],
				"userId" 		=> isset($sesssion["DS_USER"]) && !empty($sesssion["DS_USER"]) ? $sesssion["DS_USER"]["DS_Id"] : 0,
				"review" 	    => $post['review_commnet']
			);

			$dup = $this->common->get_one_row("doc_tbl_rating",array("id"=>$post['id'],"userId"=>$sesssion["DS_USER"]["DS_Id"],"isDelete"=>0));
			
			if(!empty($dup) && count($dup) > 0) {
				$wh_update = array("id"=>$dup['id']);
				$res = $this->common->update_record("doc_tbl_rating",$data,$wh_update);
				$response['msg'] = 'Review update successfully.';
			}
			
			if($res) {
				$response['res_type'] = 'success';
			}
			else {
				$response['res_type'] = 'danger';
				$response['msg'] = 'Review not updated.';
			}

		}
		echo json_encode($response);
		die();
	}


	public function get_score($isreturn='')
	{	
		$sesssion = $this->session->get_userdata('DS_USER');
		$wh =  array('user_id'=>$sesssion['DS_USER']['DS_Id']);
		$result_reward = $this->db->select(			
			' SUM( if(reward_plus_minius = "plus", point , 0 ) ) AS plus_rewards,
			  SUM( if(reward_plus_minius = "minus", point , 0 ) ) AS minus_rewards,
			  SUM(  if(reward_plus_minius = "plus", point , 0 )  - if(reward_plus_minius = "minus", point , 0 ) ) AS total_reward 			  
			'
			)->from('doc_rewards')->where($wh)->get()->result_array();
		
		$response['total_reward'] = $result_reward[0]['total_reward'];
		if($isreturn){
			return $response;
		}else{
			echo json_encode($response);
		}
	}

	public function get_download_data($isreturn='')
	{	
		$post = $this->input->post();
		
		$get_score = $this->get_score(1);

		
		
		
		$response['total_reward'] = $get_score["total_reward"];
		
		
		echo json_encode($response);
		
	}

	public function pay_and_download()
	{	
		
		$sesssion = $this->session->get_userdata('DS_USER');
		$post = $this->input->post();
		$data_reward =  array(
                            'user_id' => $sesssion['DS_USER']['DS_Id'],
                            'doc_id' => $post['id'],
                            'reward_description' => 'document download',
                            'reward_plus_minius' => 'minus',
                            'point' => '1'
                        );

		$alreadydownload_doc = $this->common->get_num_rows_with_where("doc_rewards",array("doc_id"=>$post["id"],"user_id"=>$sesssion['DS_USER']['DS_Id']));
		
		$wh = array('id'=>$post['id']);
		$data = $this->common->get_one_row("doc_documents",$wh);

		if(!$alreadydownload_doc){

        	$res = $this->common->insert_record('doc_rewards',$data_reward);
	    	
	        if($res) {

	        	

				$response['msg'] = "Download successfully";
				$response['res'] = true;
				$response['res_type'] = 'success';
				$response['data_attach_url'] =  $download_ulr = base_url(IMG_DOC.$data['image']);

			} else {
				$response['msg'] = "nothing to update!";
				$response['res'] = ture;
				$response['res_type'] = 'success';
			}
		}else{
			$response['msg'] = "Download successfully";
			$response['res'] = true;
			$response['res_type'] = 'success';
			$response['data_attach_url'] =  $download_ulr = base_url(IMG_DOC.$data['image']);
		}

		echo json_encode($response);

		
	}

}