<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller
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
		$this->common->get_one_row("doc_content",array("id"=>""));
		$data['cms'] = $this->common->get_one_row("doc_content",array("id"=>4));

		$query = $this->db->select("id,name")->from('tbl_school')->where('status','1')->get();
        $schoollist = $query -> result_array();

		$data['schoollist'] = $schoollist;
		$this->general->loadViewsFront(FRONTEND."home", $this->global, $data, NULL);
	}
	
}