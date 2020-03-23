<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->general->adminauth();
		$this->load->model('Adminmodel');

		$data['school'] = rand(10,100);
		$this->global['pageTitle'] = ' | Dashboard';
        $this->general->loadViews(ADMIN."home", $this->global, $data, NULL);
	}
}
