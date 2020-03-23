<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CMS extends CI_Controller
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
		$this->global['pageTitle'] = ' | Home';		
		$this->general->loadViewsFront(FRONTEND."home", $this->global, $data, NULL);
	}

	public function terms()
	{ 
		$data = array();
		$data['cms'] = $this->common->get_one_row("doc_content",array("id"=>1));
		$this->global['pageTitle'] = ' | Terms and Condition';		
		$this->general->loadViewsFront(FRONTEND."terms", $this->global, $data, NULL);
	}

	public function privacy_policy()
	{ 
		$data = array();
		$data['cms'] = $this->common->get_one_row("doc_content",array("id"=>2));
		$this->global['pageTitle'] = ' | Privacy Policy';		
		$this->general->loadViewsFront(FRONTEND."privacy_policy", $this->global, $data, NULL);
	}
	public function payment()
	{ 
		$data = array();		
		$this->global['pageTitle'] = ' | payment';		
		$this->general->loadViewsFront(FRONTEND."payment", $this->global, $data, NULL);
	}
	/*public function profile()
	{ 
		$data = array();		
		$this->global['pageTitle'] = ' | Profile';		
		$this->general->loadViewsFront(FRONTEND."profile", $this->global, $data, NULL);
	}*/
	
	public function compare_list()
	{ 
		$data = array();		
		$this->global['pageTitle'] = ' | Compare List';		

		if($this->session->userdata('compareDoc')) {
			$compareDocArrId = $this->session->userdata('compareDoc');
			

			/* Start :  Get compare data from particular ID */
			$this->db->select('d.*,AVG(r.rating) as ratingstart,r.review');
	        $this->db->from('doc_documents as d');        
	        $this->db->join('doc_tbl_rating as r','r.doc_id = d.id ','left');        
	        $this->db->where_in('d.id', $compareDocArrId);
	        $this->db->group_by('d.id');
	        
	        $query = $this->db->get();
	        $result = $query->result_array();  
	        /* End :  Get compare data from particular ID */
	        $data['compare_result'] = $result;


		}
		else {

			$data['compareDocArr'] = array();
		}

		
		
		$this->general->loadViewsFront(FRONTEND."compare-list", $this->global, $data, NULL);

	}

	public function details_page()
	{ 
		$data = array();		
		$this->global['pageTitle'] = ' | Details';		
		$this->general->loadViewsFront(FRONTEND."details-page", $this->global, $data, NULL);
	}

	public function cookie_statement()
	{ 
		$data = array();
		$data['cms'] = $this->common->get_one_row("doc_content",array("id"=>3));
		$this->global['pageTitle'] = ' | Cookie Statement';		
		$this->general->loadViewsFront(FRONTEND."cookie_statement", $this->global, $data, NULL);
	}

	public function about()
	{ 
		$data = array();
		$data['cms'] = $this->common->get_one_row("doc_content",array("id"=>4));
		$this->global['pageTitle'] = ' | About us';		
		$this->general->loadViewsFront(FRONTEND."about", $this->global, $data, NULL);
	}

	public function who_we_are()
	{ 
		$data = array();
		$data['cms'] = $this->common->get_one_row("doc_content",array("id"=>5));
		$this->global['pageTitle'] = ' | Who we are';		
		$this->general->loadViewsFront(FRONTEND."who_we_are", $this->global, $data, NULL);
	}

	public function what_we_do()
	{ 
		$data = array();
		$data['cms'] = $this->common->get_one_row("doc_content",array("id"=>6));
		$this->global['pageTitle'] = ' | What we do';		
		$this->general->loadViewsFront(FRONTEND."what_we_do", $this->global, $data, NULL);
	}

	public function contact()
	{ 
		$data = array();
		$this->global['pageTitle'] = ' | Contact';		
		$this->general->loadViewsFront(FRONTEND."contact", $this->global, $data, NULL);
	}

	public function faq()
	{ 
		$data = array();
		$param = array();
		$param['ShortBy'] = "id";
		$param['ShortOrder'] = "DESC";
		$data['faq'] = $this->common->get_all("doc_faq",array("status"=>"1","isDelete"=>0),$param);
		$this->global['pageTitle'] = ' | FAQ';		
		$this->general->loadViewsFront(FRONTEND."faq", $this->global, $data, NULL);
	}
	
}