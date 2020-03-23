<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('Ajax_pagination');
        $this->perPage = 1;
	}

	public function index()
	{
		$this->general->adminauth();
		$data = array();
		$this->global['pageTitle'] = ' | Contacts';
        $this->global['ActiveMenu'] = 'Manage-contact';
        $this->general->loadViews(ADMIN."contact/contact", $this->global, $data, NULL);
	}

    public function edit_contact()
    {
        $this->general->adminauth();
        $this->global['pageTitle'] = ' | Edit Contact Detail';
        $this->global['ActiveMenu'] = 'Edit-contact';
        $contact_details = $this->common->get_all_record('doc_contact_details');
        if(!empty($contact_details)) {
            $data['contact_details'] = $contact_details[0];
        } else {
            $contact_details = array();
            $data['contact_details'] = $contact_details;
        }
        $this->general->loadViews(ADMIN."contact/edit_contact", $this->global, $data, NULL);
    }

    public function create_update_contact_details()
    {
        $response = array();
        $post = $this->input->post();
        $action = $post['action'];
        unset($post['action']);
        if($action == 'edit') {
            $data = $post;
            $wh = array();
            $update = $this->common->update_record('doc_contact_details',$data,$wh);

            $messge = array('message' => 'Contact Updated Successfully..','class' => 'success');
            $this->session->set_flashdata('success',$messge['message']);
            redirect(ADMIN_LINK.'edit-contact');
        }
        else {
            $data = $post;
            $insert = $this->common->insert_record('doc_contact_details',$data);

            $messge = array('message' => 'Contact Added Successfully..','class' => 'success');
            $this->session->set_flashdata('success',$messge['message']);
            redirect(ADMIN_LINK.'edit-contact');
        }
    }

    public function newsletter()
    {
        $this->general->adminauth();
        $data = array();
        $this->global['pageTitle'] = ' | Newsletter';
        $this->global['ActiveMenu'] = 'Manage Newsletter';
        $this->general->loadViews(ADMIN."contact/newsletter", $this->global, $data, NULL);
    }

    public function ajax_newsletter()
    {
        $conditions = array();
        $page = $this->input->post('page');
        $perpage = $this->input->post('perpage');
        $this->perPage = $perpage;
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
        $field_array = array();
        $keywords = $this->input->post('keywords');
        if(!empty($keywords)){
            $conditions['search']['keywords'] = $keywords;
            $field_array = array("n.fname","n.email");
        }
       
        $tables = array('doc_newsletter n');
        $joins = array();
        $rows = '*';
        $order_by = 'n.id';
        $order = 'DESC';
        $groupBy = "";
        $wh = array('n.isDelete'=> 0);
        $params = array();
        
        $record = $this->common->get_join_all_record($tables,$joins,$rows,$groupBy,$order_by,$wh,$keywords,$field_array,$params);
        if($record != '') {
            $totalRec = count($record);
            $config['target']      = '#tourList';
            $config['base_url']    = base_url(ADMIN).'Tour/ajax_newsletter';
            $config['total_rows']  = $totalRec;
            $config['per_page']    = $this->perPage;
            $config['link_func']   = 'gettour';
            $config['uri_segment'] = 4;
            $config['show_count'] = false;
            $this->ajax_pagination->initialize($config);
            $conditions['start'] = $offset;
            $conditions['limit'] = $this->perPage;
            /**/
            $limit['start'] = $offset;
            $limit['limit'] = $this->perPage;
            /**/
            $result = $this->common->get_join_all_record($tables,$joins,$rows,$groupBy,$order_by,$wh,$keywords,$field_array,$limit);
            $data['tours'] = $result;
            
        }
        else {
            $data['tours'] = array();   
        }
        $this->load->view(ADMIN.'contact/get_newsletter', $data, false);
    }

    /* Change Status */
    public function changeStatus($type='')
    {
        $response = array();
        $post = $this->input->post();
        $status = $post['status'];
        $data = array('status'=>$status);
        if($type == 'newsletter') {            
            $where = array('id'=>$post['id']);
            $table = 'doc_newsletter';
        }        
        $update = $this->common->update_record($table,$data,$where);        
        $response['success'] = true;
        $response['message'] = 'Status Changed Successfully..';
        echo json_encode($response);
    }
    /* Change Status */

	function deleteData()
    {
        $id = $this->input->post('id');
        $table_name = base64_decode( $this->input->post('td') );
        $field = base64_decode( $this->input->post('i') );
        
        $where_array = array($field => $id);

        $data_array = array('isDelete'=>1);
        $result = $this->common->update_record($table_name, $data_array,$where_array);
        if ($result > 0) { 
            echo(json_encode(array('status'=>TRUE))); 
        }
        else { 
            echo(json_encode(array('status'=>FALSE))); 
        }
        
    }

}
