<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller
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
		$this->global['pageTitle'] = ' | Manage Faq';
        $this->global['ActiveMenu'] = 'Manage Faq';
        $this->general->loadViews(ADMIN."faq/manage_faq", $this->global, $data, NULL);
	}

	public function ajax_faq()
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
        $wh = array();
        $field_array = array();
        $keywords = $this->input->post('keywords');
        
        if(!empty($keywords)){
            $conditions['search']['keywords'] = $keywords;
            $field_array = array("title","description");
        }
       
        $wh['isDelete'] = 0;
        
        $data = array();
        $tablename = 'doc_faq';
        $rows = '*';
        $order_by = 'id';
        $order = 'DESC';

        $limit = array();

        $record = $this->common->get_all_record_with_limit_like($tablename,$order_by,$order,$limit,$wh,"id",$keywords,$field_array);
        if($record != '') {
            $totalRec = count($record);
            $config['target']      = '#tourList';
            $config['base_url']    = base_url(ADMIN).'Tour/ajax_faq';
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
            $data['tours'] = $this->common->get_all_record_with_limit_like($tablename,$order_by,$order,$limit,$wh,$rows,$keywords,$field_array);
        }
        else {
            $data['tours'] = array();   
        }
        $this->load->view(ADMIN.'faq/get_faq', $data, false);
    }

	public function add_faq($id='')
	{
		$this->global['pageTitle'] = ' | Add Faq';		
        $data = array();

        if($id) {
            $data['edit'] = $this->common->get_one_row('doc_faq',array('id'=>$id));
            $this->global['pageTitle'] = ' | Edit Faq';
        }
        else {
            $this->global['pageTitle'] = ' | Add Faq';
        }

        $this->global['ActiveMenu'] = 'Add Faq';
        $this->general->loadViews(ADMIN."faq/add_faq", $this->global, $data, NULL);
	}

    public function save_data($id='')
    {
        $post = $this->input->post();

        $title = $post['title'];
        $description = $post['description'];

        $data = array(
            'title'         => $title,
            'description'   => $description,
        );

        if($id) {

            $wh = array('id'=>$id);
            $schoolId = $this->common->update_record('doc_faq',$data,$wh);
            $messge = array('message' => 'Updated Successfully..','class' => 'success');
            $this->session->set_flashdata('success',$messge['message']);
            redirect(ADMIN_LINK.'add-faq/'.$id);

        }
        else {

            $schoolId = $this->common->insert_record('doc_faq',$data);
            $messge = array('message' => 'Added Successfully..','class' => 'success');
            $this->session->set_flashdata('msg',$messge);
            redirect(ADMIN_LINK.'manage-faq');
        }
    }

    public function changeStatus($type='')
    {
        $response = array();
        $post = $this->input->post();
        $status = $post['status'];

        $data = array('status'=>$status);

        $where = array('id'=>$post['id']);
        $table = 'doc_faq';
    
        $update = $this->common->update_record($table,$data,$where);
        
        $response['success'] = true;
        $response['message'] = 'Status Changed Successfully..';
        echo json_encode($response);
    }

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

    public function upload_files()
    {
        try {
            if (
                !isset($_FILES['file']['error']) ||
                is_array($_FILES['file']['error'])
            ) {
                throw new RuntimeException('Invalid parameters.');
            }

            switch ($_FILES['file']['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    throw new RuntimeException('No file sent.');
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new RuntimeException('Exceeded filesize limit.');
                default:
                    throw new RuntimeException('Unknown errors.');
            }
            $filename = uniqid().'_'.$_FILES['file']['name'];
            // $filepath = sprintf(MyPath.'%s_%s', uniqid(), $_FILES['file']['name']);
            $filepath = MyPath.$filename;

            if (!move_uploaded_file($_FILES['file']['tmp_name'],$filepath)) {
                throw new RuntimeException('Failed to move uploaded file.');
            }

            // All good, send the response
            $data = array('status' => 'ok','path' => $filename);
            //echo json_encode($data);

        } catch (RuntimeException $e) {
            // Something went wrong, send the err message as JSON
            http_response_code(400);

            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
        echo json_encode($data);
    }

}
